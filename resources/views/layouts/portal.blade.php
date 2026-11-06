<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Portal') - One Private Course</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
<style>
  html, body { margin: 0; padding: 0; font-family: 'Plus Jakarta Sans', sans-serif; }
  body { overscroll-behavior: none; }
  ::-webkit-scrollbar { display: none; }
</style>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script>
tailwind.config={darkMode:"class",theme:{extend:{colors:{"on-tertiary-fixed-variant":"#2f2ebe","on-error-container":"#93000a","on-secondary-fixed":"#00201d","tertiary-fixed":"#e1e0ff","surface-container-highest":"#dae2fd","surface-container-low":"#f2f3ff","secondary":"#006a61","inverse-surface":"#283044","error":"#ba1a1a","secondary-fixed-dim":"#6bd8cb","surface-bright":"#faf8ff","error-container":"#ffdad6","tertiary-container":"#585be6","on-primary":"#ffffff","on-secondary-fixed-variant":"#005049","on-error":"#ffffff","primary":"#004ac6","surface-container":"#eaedff","surface-variant":"#dae2fd","on-surface-variant":"#434655","outline":"#737686","tertiary":"#3e3fcc","surface-tint":"#0053db","background":"#faf8ff","on-tertiary":"#ffffff","surface-container-lowest":"#ffffff","secondary-fixed":"#89f5e7","primary-fixed-dim":"#b4c5ff","primary-container":"#2563eb","on-primary-fixed":"#00174b","outline-variant":"#c3c6d7","inverse-primary":"#b4c5ff","surface-dim":"#d2d9f4","on-primary-fixed-variant":"#003ea8","on-background":"#131b2e","primary-fixed":"#dbe1ff","on-primary-container":"#eeefff","on-tertiary-fixed":"#07006c","surface-container-high":"#e2e7ff","on-tertiary-container":"#f1eeff","inverse-on-surface":"#eef0ff","on-secondary":"#ffffff","tertiary-fixed-dim":"#c0c1ff","on-surface":"#131b2e","surface":"#faf8ff","secondary-container":"#86f2e4","on-secondary-container":"#006f66"},borderRadius:{DEFAULT:"0.25rem",lg:"0.5rem",xl:"0.75rem",full:"9999px"},spacing:{"space-sm":"0.5rem","space-md":"1rem","space-lg":"1.5rem","space-xl":"2rem","gutter-mobile":"1rem","margin-mobile":"1rem",gutter:"1.5rem","space-xs":"0.25rem",margin:"2rem"},fontFamily:{"headline-sm":["Plus Jakarta Sans"],"headline-md":["Plus Jakarta Sans"],"headline-xl":["Plus Jakarta Sans"],"body-lg":["Plus Jakarta Sans"],"body-md":["Plus Jakarta Sans"],"display-lg-mobile":["Plus Jakarta Sans"],"display-lg":["Plus Jakarta Sans"],"body-sm":["Plus Jakarta Sans"],"headline-xl-mobile":["Plus Jakarta Sans"],"headline-lg":["Plus Jakarta Sans"],"label-lg":["Plus Jakarta Sans"],"label-sm":["Plus Jakarta Sans"],"label-md":["Plus Jakarta Sans"]},fontSize:{"headline-sm":["18px",{lineHeight:"26px",fontWeight:"600"}],"headline-md":["20px",{lineHeight:"28px",fontWeight:"600"}],"headline-xl":["32px",{lineHeight:"40px",letterSpacing:"-0.015em",fontWeight:"700"}],"body-lg":["16px",{lineHeight:"24px",fontWeight:"400"}],"body-md":["14px",{lineHeight:"20px",fontWeight:"400"}],"display-lg-mobile":["30px",{lineHeight:"38px",letterSpacing:"-0.02em",fontWeight:"700"}],"display-lg":["40px",{lineHeight:"48px",letterSpacing:"-0.02em",fontWeight:"700"}],"body-sm":["13px",{lineHeight:"18px",fontWeight:"400"}],"headline-xl-mobile":["24px",{lineHeight:"32px",letterSpacing:"-0.015em",fontWeight:"700"}],"headline-lg":["24px",{lineHeight:"32px",letterSpacing:"-0.01em",fontWeight:"600"}],"label-lg":["14px",{lineHeight:"20px",letterSpacing:"0.01em",fontWeight:"600"}],"label-sm":["11px",{lineHeight:"14px",letterSpacing:"0.03em",fontWeight:"600"}],"label-md":["12px",{lineHeight:"16px",letterSpacing:"0.02em",fontWeight:"600"}]}}}};
</script>
</head>
<body class="bg-surface font-body-md text-body-md text-on-surface antialiased">
@php
    $active = $active ?? 'beranda';
    $menu = [
        ['beranda',  'Beranda',            'grid_view',    route('portal.beranda')],
        ['jadwal',   'Jadwal Les',         'calendar_today', route('portal.jadwal')],
        ['presensi', 'Presensi & Catatan', 'history_edu',  route('portal.presensi')],
        ['tagihan',  'Riwayat Tagihan',    'receipt_long', route('portal.tagihan')],
    ];
@endphp

<aside class="fixed left-0 top-0 h-full w-64 bg-surface-container-lowest shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-50 flex flex-col justify-between py-space-lg">
  <div class="flex flex-col gap-space-lg">
    <div class="px-space-lg flex items-center gap-space-sm">
      <div class="w-9 h-9 rounded-xl bg-primary flex items-center justify-center text-on-primary shadow-sm">
        <span class="material-symbols-outlined text-[22px]">auto_stories</span>
      </div>
      <div>
        <div class="font-headline-sm text-headline-sm text-primary tracking-tight">One Private</div>
        <div class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Portal Edukasi</div>
      </div>
    </div>
    <div class="px-space-md">
      <div class="px-space-sm py-space-xs mb-space-xs font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Menu Utama</div>
      <nav class="flex flex-col gap-1">
        @foreach($menu as [$key, $label, $icon, $url])
          @if($key === $active)
            <a href="{{ $url }}" class="flex items-center gap-3 px-space-md py-2.5 rounded-xl transition-all bg-primary-container text-on-primary-container font-semibold shadow-sm">
              <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">{{ $icon }}</span>
              <span class="font-label-lg text-label-lg">{{ $label }}</span>
            </a>
          @else
            <a href="{{ $url }}" class="flex items-center gap-3 px-space-md py-2.5 rounded-xl text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-all">
              <span class="material-symbols-outlined text-[20px]">{{ $icon }}</span>
              <span class="font-label-lg text-label-lg">{{ $label }}</span>
            </a>
          @endif
        @endforeach
      </nav>
    </div>
  </div>
  <div class="px-space-lg flex flex-col gap-space-sm">
    <div class="p-space-md bg-surface-container-low rounded-xl flex items-center gap-3">
      <span class="material-symbols-outlined text-secondary text-[22px]">support_agent</span>
      <div>
        <div class="font-label-md text-label-md text-on-surface">Bantuan Admin</div>
        <div class="font-body-sm text-body-sm text-on-surface-variant">WhatsApp Konsultasi</div>
      </div>
    </div>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="w-full flex items-center justify-center gap-2 px-space-md py-2.5 rounded-xl text-on-surface-variant hover:bg-surface-container-high transition-all font-label-lg text-label-lg">
        <span class="material-symbols-outlined text-[20px]">logout</span> Keluar
      </button>
    </form>
  </div>
</aside>

<div class="pl-64">
  <header class="fixed top-0 left-64 right-0 h-16 bg-surface/80 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-40">
    <div class="h-16 w-full px-8 flex items-center justify-between border-b border-surface-container-high/60">
      <div class="flex items-center gap-space-md">
        @hasSection('topbar')
          @yield('topbar')
        @else
          <div class="font-headline-sm text-headline-sm text-on-surface font-semibold tracking-tight">Portal Orang Tua &amp; Siswa</div>
        @endif
      </div>
      <div class="flex items-center gap-4">
        @yield('topbar-right')
      </div>
    </div>
  </header>

  <main class="relative w-full pt-16 bg-surface min-h-screen">
    @yield('content')
  </main>
</div>

<script src="{{ asset('js/opc.js') }}"></script>
@stack('scripts')
</body>
</html>