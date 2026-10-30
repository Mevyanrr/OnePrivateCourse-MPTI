<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Student;
use App\Support\Fmt;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $r)
    {
        $period = Fmt::period();
        $q = Payment::with('student')->orderByRaw("CASE WHEN status = 'belum' THEN 0 ELSE 1 END")->orderByDesc('paid_at')->orderBy('id');
        $studentName = '';
        if ($r->filled('student')) {
            $q->where('student_id', $r->student);
            $studentName = Student::find($r->student)->name ?? '';
        }
        $payments = $q->paginate(10)->withQueryString();
        foreach ($payments as $p) {
            $cnt = $p->student->sessions()->where('status', '!=', 'batal')->whereMonth('date', now()->month)->whereYear('date', now()->year)->count();
            $p->sessions_label = $p->student->billing_scheme === 'monthly' ? min($cnt, 8) . ' / 8 Sesi' : $cnt . ' Sesi Terjadwal';
        }
        $cur = Payment::where('period', $period)->get();
        $paid = $cur->where('status', 'lunas');
        $unpaid = $cur->where('status', 'belum');
        $tot = max(1, $cur->count());
        $k = [
            'students' => Student::where('status', 'aktif')->count(), 'paid' => $paid->count(), 'unpaid' => $unpaid->count(), 'paidPct' => round($paid->count() / $tot * 100, 1),
            'paidAmt' => $paid->sum('amount'), 'unpaidAmt' => $unpaid->sum('amount'), 'target' => $cur->sum('amount'),
        ];
        $pending = Payment::with('student')->where('status', 'belum')->orderBy('id')->get();

        return view('admin.pembayaran', [
            'payments' => $payments, 'k' => $k, 'pendingPayments' => $pending, 'studentFilterName' => $studentName,
            'pendingJson' => $pending->mapWithKeys(fn ($p) => [$p->id => ['id' => $p->id, 'student_id' => $p->student_id, 'amount_fmt' => number_format($p->amount, 0, ',', '.')]]),
        ]);
    }

    public function pay(Request $r, Payment $payment)
    {
        $d = $r->validate(['amount' => 'required|numeric|min:1', 'paid_at' => 'required|date', 'method' => 'nullable|string', 'ref' => 'nullable|string']);
        $payment->update([
            'status' => 'lunas', 'amount' => $d['amount'], 'paid_at' => $d['paid_at'], 'method' => ($d['method'] ?? 'transfer') === 'cash' ? 'Tunai di Cabang' : 'Transfer Bank',
            'receipt_no' => 'KW-' . now()->year . '-' . random_int(1000, 9999), 'note' => $d['ref'] ?? null,
        ]);

        return response()->json(['message' => 'Pembayaran dicatat. Kuitansi ' . $payment->receipt_no . ' diterbitkan.']);
    }

    public function receipt(Payment $payment)
    {
        return view('admin.kuitansi', ['p' => $payment->load('student')]);
    }
}
