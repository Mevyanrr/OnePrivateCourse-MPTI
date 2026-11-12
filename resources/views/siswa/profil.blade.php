@extends('portal', ['role' => 'siswa', 'active' => 'profil'])

@section('title', 'Profil Siswa')

{{-- PROFIL SISWA: semua data dari tabel students / tutors / lesson_sessions / attendances. --}}

@php
    $inisial = fn ($n) => \App\Support\Fmt::initials($n);
    $val = fn ($v) => filled($v) ? $v : '-';
    $birth = $child->birth_date ? \App\Support\Fmt::dateLong($child->birth_date) : '-';
    $joined = $child->joined_at ? \App\Support\Fmt::dateLong($child->joined_at) : '-';
@endphp

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/siswa-shell.css') }}">
@endpush

@section('topbar')
    <x-siswa.topbar-left />
@endsection

@section('topbar-right')
    <x-siswa.topbar-right />
@endsection

@section('content')
    <div class="sw-head">
        <div>
            <h1>Profil Siswa</h1>
            <p class="pg-sub">Data pendaftaran, program les, dan tutor pendamping yang tercatat di administrasi cabang.</p>
        </div>
        <div class="child-switch">
            <div class="child-row">
                @foreach ($anak as $a)
                    <a href="{{ $a['url'] }}" class="child {{ $a['aktif'] ? 'on' : '' }}">
                        <span class="em">{{ $a['emoji'] }}</span>
                        <span><b>{{ $a['nama'] }}</b><small>{{ $a['info'] }}</small></span>
                        @if ($a['aktif'])<i class="st"></i>@endif
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="sw-grid">
        <div>
            {{-- Ringkasan --}}
            <section class="card pf-top">
                <span class="pf-av">{{ $emoji }}</span>
                <div>
                    <h2>{{ $child->name }}</h2>
                    <p class="sub">{{ $level }}{{ $child->school ? ' • ' . $child->school : '' }}</p>
                    <div class="chips">
                        <span class="chip vis">{{ $child->code }}</span>
                        <span class="chip {{ $child->status === 'aktif' ? 'ok' : 'warn' }}">{{ ucfirst($child->status) }}</span>
                        <span class="chip vis">{{ \App\Support\Fmt::method($child->method) }}</span>
                    </div>
                </div>
            </section>

            <section class="card pf-card">
                <h3><x-icon name="user" /> Data Siswa</h3>
                <dl class="pf-grid">
                    <div><dt>Nama Lengkap</dt><dd>{{ $child->name }}</dd></div>
                    <div><dt>Kode Siswa</dt><dd>{{ $child->code }}</dd></div>
                    <div><dt>Jenjang / Kelas</dt><dd>{{ $val($child->grade) }}</dd></div>
                    <div><dt>Sekolah</dt><dd>{{ $val($child->school) }}</dd></div>
                    <div><dt>Jenis Kelamin</dt><dd>{{ $val($child->gender) }}</dd></div>
                    <div><dt>Tanggal Lahir</dt><dd>{{ $birth }}</dd></div>
                    <div><dt>Terdaftar Sejak</dt><dd>{{ $joined }}</dd></div>
                    <div><dt>No. HP Siswa</dt><dd>{{ $val($child->phone) }}</dd></div>
                </dl>
            </section>

            <section class="card pf-card">
                <h3><x-icon name="book-open" /> Program & Paket Les</h3>
                <dl class="pf-grid">
                    <div class="full"><dt>Program</dt><dd>{{ $val($child->program) }}</dd></div>
                    <div><dt>Paket</dt><dd>{{ $val($child->package) }}</dd></div>
                    <div><dt>Durasi per Sesi</dt><dd>{{ $child->duration }} Menit</dd></div>
                    <div><dt>Skema Tagihan</dt><dd>{{ $child->billing_scheme === 'per_session' ? 'Per Sesi' : 'Bulanan' }}</dd></div>
                    <div><dt>Biaya</dt><dd>{{ $child->price ? \App\Support\Fmt::rupiah($child->price) : '-' }}</dd></div>
                    <div class="full"><dt>Tujuan Belajar</dt><dd class="plain">{{ $val($child->goals) }}</dd></div>
                </dl>
            </section>

            <section class="card pf-card">
                <h3><x-icon name="map-pin" /> Wali & Lokasi Les</h3>
                <dl class="pf-grid">
                    <div><dt>Nama Wali</dt><dd>{{ $val($child->guardian_name) }}</dd></div>
                    <div><dt>Hubungan</dt><dd>{{ $val($child->guardian_relation) }}</dd></div>
                    <div><dt>No. HP Wali</dt><dd>{{ $val($child->guardian_phone) }}</dd></div>
                    <div><dt>Wilayah</dt><dd>{{ $val($child->area) }}</dd></div>
                    <div class="full"><dt>Alamat</dt><dd class="plain">{{ $val($child->address) }}</dd></div>
                    @if (filled($child->address_note))
                        <div class="full"><dt>Catatan Alamat</dt><dd class="plain">{{ $child->address_note }}</dd></div>
                    @endif
                </dl>
                <div class="pf-note">
                    <span>Ada data yang perlu diperbarui? Perubahan data dilakukan oleh admin cabang.</span>
                    <a href="{{ $cabang['wa'] }}" target="_blank" rel="noopener" class="btn btn-primary"><x-icon name="message" /> Ajukan Perubahan Data</a>
                </div>
            </section>
        </div>

        <aside class="side-col">
            <section class="card mini">
                <div class="row"><span>Sesi Terlaksana</span><span class="ico blue" style="width:34px;height:34px;border-radius:10px;display:grid;place-items:center"><x-icon name="calendar-check" /></span></div>
                <div class="big">{{ $stat['selesai'] }} Sesi <small>total</small></div>
            </section>

            <section class="card mini">
                <div class="row"><span>Tingkat Kehadiran</span><span class="ico green" style="width:34px;height:34px;border-radius:10px;display:grid;place-items:center"><x-icon name="user-check" /></span></div>
                <div class="big">{{ $stat['pct'] }}%</div>
                <span class="tot" style="margin-top:-24px">{{ $stat['hadir'] }} dari {{ $stat['total'] }} Sesi</span>
                <div class="bar"><i style="width:{{ $stat['pct'] }}%"></i></div>
            </section>

            <section class="card pkt">
                <div class="hd"><h3>Tutor Pendamping</h3><x-icon name="graduation" /></div>
                <div style="margin-top:14px">
                    @forelse ($tutors as $t)
                        <div class="pt">
                            <span class="ph">
                                @if (!empty($t->photo_url))
                                    <img src="{{ $t->photo_url }}" alt="">
                                @else
                                    {{ $inisial($t->name) }}
                                @endif
                            </span>
                            <div><b>{{ $t->name }}</b><small>{{ $t->headline ?: 'Tutor Pengajar' }}</small></div>
                            <a href="{{ \App\Support\PortalContext::wa($t->phone, 'Halo ' . $t->name . ', saya wali ' . $child->name . '.') }}" target="_blank" rel="noopener" class="wa-btn" aria-label="Chat {{ $t->name }}"><x-icon name="message" /></a>
                        </div>
                    @empty
                        <p style="color:var(--muted);font-size:13px">Belum ada tutor yang ditugaskan.</p>
                    @endforelse
                </div>
            </section>

            <section class="help">
                <div class="hd">
                    <span class="ic"><x-icon name="headset" /></span>
                    <div><b>Layanan Bantuan Cabang</b><small>{{ $cabang['nama'] }}</small></div>
                </div>
                <p>Butuh bantuan terkait data siswa, paket, atau jadwal? Tim kami siap membantu.</p>
                <a href="{{ $cabang['wa'] }}" target="_blank" rel="noopener" class="cs">
                    <span class="ic"><x-icon name="headset" /></span>
                    <span><b>{{ $cabang['cs'] }}</b><small>{{ $cabang['cs_peran'] }}</small></span>
                    <x-icon name="arrow-up-right" />
                </a>
                <div class="jam"><span>{{ $cabang['jam'] }}</span><b class="{{ $cabang['online'] ? '' : 'off' }}">● {{ $cabang['online'] ? 'Online' : 'Offline' }}</b></div>
            </section>
        </aside>
    </div>
@endsection
