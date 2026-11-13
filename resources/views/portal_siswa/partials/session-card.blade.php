<article class="session">
    <div class="session-top">
        <span class="chip">{{ $s->date_label }}</span>
        <span class="time">{{ $s->time_label }}</span>
    </div>

    <h3>{{ $s->subject ?? 'Sesi Les' }}@if($s->topic) <span class="topic">· {{ $s->topic }}</span>@endif</h3>
    <p class="meta">
        {{ $s->tutor_name ?? 'Tutor belum ditentukan' }} · {{ $s->method_label }}
        @if($s->location) · {{ $s->location }} @endif
        @if($s->session_no) · Pertemuan ke-{{ $s->session_no }} @endif
    </p>

    <div class="session-bottom">
        <span class="badge badge-{{ $s->state_class }}">{{ $s->state }}</span>

        @if($s->status === 'terjadwal')
            <div class="actions">
                @unless($s->student_confirmed)
                    <form method="POST" action="{{ route('siswa.jadwal.confirm', $s->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">Konfirmasi Hadir</button>
                    </form>
                @endunless

                @unless($s->has_pending)
                    <button type="button" class="btn btn-ghost btn-sm"
                            data-reschedule
                            data-id="{{ $s->id }}"
                            data-title="{{ $s->subject }} — {{ $s->date_label }}, {{ $s->time_label }}"
                            data-date="{{ $s->date }}">
                        Ajukan Ganti Waktu
                    </button>
                @endunless
            </div>
        @endif
    </div>
</article>
