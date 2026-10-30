<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LessonSession;
use App\Support\Fmt;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ConfirmationController extends Controller
{
    private function ago($dt): string
    {
        $m = max(0, $dt->diffInMinutes(now()));
        if ($m >= 1440) return intdiv($m, 1440) . ' hari' . (intdiv($m % 1440, 60) ? ' ' . intdiv($m % 1440, 60) . ' jam' : '');
        if ($m >= 60) return intdiv($m, 60) . ' jam' . ($m % 60 ? ' ' . ($m % 60) . ' menit' : '');
        return $m . ' menit';
    }

    public function index(Request $r)
    {
        $all = LessonSession::with(['student', 'tutor'])->where('status', '!=', 'batal')->whereDate('date', '>=', today())->orderBy('date')->orderBy('start_time')->get();
        foreach ($all as $s) {
            $hrs = $s->created_at->diffInHours(now());
            $s->cat = ! $s->tutor_confirmed ? 'tutor' : (! $s->parent_confirmed ? 'ortu' : 'ok');
            $lateT = ! $s->tutor_confirmed && $hrs > 24;
            $lateP = ! $s->parent_confirmed && $hrs > 4;
            $s->sla_critical = $lateT || $lateP;
            $s->sla_text = $this->ago($s->created_at);
            $s->sla_label = $lateT ? 'Melebihi SLA Tutor >24 Jam' : ($lateP ? 'Melebihi SLA Ortu >4 Jam' : 'Dalam Waktu Normal');
        }
        $tab = in_array($r->tab, ['tutor', 'ortu', 'ok'], true) ? $r->tab : 'all';
        $list = $tab === 'all' ? $all : $all->where('cat', $tab)->values();
        $page = max(1, (int) $r->input('page', 1));
        $sessions = new LengthAwarePaginator($list->forPage($page, 10)->values(), $list->count(), 10, $page, ['path' => $r->url(), 'query' => $r->query()]);

        $total = max(1, $all->count());
        $wt = $all->where('cat', 'tutor')->count(); $wp = $all->where('cat', 'ortu')->count(); $ok = $all->where('cat', 'ok')->count();
        $k = ['total' => $all->count(), 'waitTutor' => $wt, 'waitParent' => $wp, 'ok' => $ok, 'pctTutor' => round($wt / $total * 100, 1), 'pctParent' => round($wp / $total * 100, 1), 'pctOk' => round($ok / $total * 100, 1),
            'lateTutor' => $all->filter(fn ($s) => ! $s->tutor_confirmed && $s->created_at->diffInHours(now()) > 24)->count(),
            'lateParent' => $all->filter(fn ($s) => ! $s->parent_confirmed && $s->created_at->diffInHours(now()) > 4)->count(), 'urgent' => $all->where('sla_critical', true)->count()];

        $waJson = $sessions->getCollection()->mapWithKeys(function ($s) {
            $when = Fmt::dateShort($s->date) . ' ' . Fmt::hhmm($s->start_time) . ' WIB';
            $tt = 'Halo ' . ($s->tutor->name ?? 'Tutor') . ', mohon konfirmasi jadwal les privat ' . $s->student->name . ' (' . $when . '). Terima kasih - Admin One Private Course';
            $to = 'Halo ' . $s->student->guardian_name . ', mohon konfirmasi jadwal les privat ' . $s->student->name . ' (' . $when . '). Balas 1 untuk Setuju, 2 untuk Reschedule. Terima kasih - Admin One Private Course';
            return [$s->id => ['tutor' => $tt, 'ortu' => $to, 'tutor_link' => Fmt::waLink($s->tutor->phone ?? '', $tt), 'ortu_link' => Fmt::waLink($s->student->guardian_phone, $to)]];
        });

        return view('admin.konfirmasi', compact('sessions', 'k', 'tab', 'waJson'));
    }

    public function tutor(LessonSession $session)
    {
        $session->update(['tutor_confirmed' => true]);
        return response()->json(['message' => 'Tutor ' . ($session->tutor->name ?? '') . ' ditandai terkonfirmasi.']);
    }

    public function ortu(LessonSession $session)
    {
        $session->update(['parent_confirmed' => true]);
        return response()->json(['message' => 'Orang tua ' . $session->student->guardian_name . ' ditandai terkonfirmasi.']);
    }

    public function reminder()
    {
        $n = LessonSession::whereDate('date', '>=', today())->where('status', '!=', 'batal')->where(fn ($q) => $q->where('tutor_confirmed', false)->orWhere('parent_confirmed', false))->count();
        return response()->json(['message' => "Reminder WhatsApp dijadwalkan untuk {$n} sesi yang belum terkonfirmasi."]);
    }
}
