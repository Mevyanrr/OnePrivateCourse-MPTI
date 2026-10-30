{{-- Pemakaian: <x-icon name="grid" /> | <x-icon name="star" class="x" /> --}}
@props(['name', 'fill' => false])

<svg {{ $attributes->merge(['class' => 'i']) }} viewBox="0 0 24 24" aria-hidden="true" @if($fill) style="fill:currentColor" @endif>
@switch($name)
    @case('grid')<rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/>@break
    @case('calendar')<rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>@break
    @case('calendar-check')<rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18M9 16l2 2 4-4"/>@break
    @case('columns')<rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 3v18M15 3v18"/>@break
    @case('users')<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>@break
    @case('briefcase')<rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>@break
    @case('clipboard')<rect x="8" y="2" width="8" height="4" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2M9 12h6M9 16h6"/>@break
    @case('receipt')<path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1z"/><path d="M8 8h8M8 12h8M8 16h5"/>@break
    @case('check-circle')<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>@break
    @case('check')<path d="m5 12 5 5L20 7"/>@break
    @case('bell')<path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/>@break
    @case('user')<circle cx="12" cy="8" r="4"/><path d="M4 21v-1a6 6 0 0 1 6-6h4a6 6 0 0 1 6 6v1"/>@break
    @case('user-check')<circle cx="9" cy="7" r="4"/><path d="M3 21v-2a4 4 0 0 1 4-4h4M16 19l2 2 4-4"/>@break
    @case('user-square')<rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="12" cy="10" r="3"/><path d="M7 20v-1a5 5 0 0 1 10 0v1"/>@break
    @case('user-cog')<circle cx="9" cy="7" r="4"/><path d="M3 21v-2a4 4 0 0 1 4-4h3"/><circle cx="18" cy="17" r="2.5"/><path d="M18 12.5v2M18 19.5v2M14.1 14.8l1.7 1M20.2 18.2l1.7 1M14.1 19.2l1.7-1M20.2 15.8l1.7-1"/>@break
    @case('plus')<path d="M12 5v14M5 12h14"/>@break
    @case('plus-circle')<circle cx="12" cy="12" r="10"/><path d="M12 8v8M8 12h8"/>@break
    @case('headset')<path d="M3 14v-2a9 9 0 0 1 18 0v2"/><path d="M21 15a2 2 0 0 1-2 2h-1v-6h1a2 2 0 0 1 2 2zM3 15a2 2 0 0 0 2 2h1v-6H5a2 2 0 0 0-2 2z"/>@break
    @case('arrow-right')<path d="M5 12h14M12 5l7 7-7 7"/>@break
    @case('arrow-up-right')<path d="M7 17 17 7M7 7h10v10"/>@break
    @case('trend')<path d="m22 7-8.5 8.5-5-5L2 17"/><path d="M16 7h6v6"/>@break
    @case('map-pin')<path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/>@break
    @case('video')<rect x="2" y="6" width="14" height="12" rx="2"/><path d="m22 8-6 4 6 4z"/>@break
    @case('printer')<path d="M6 9V2h12v7M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/>@break
    @case('download')<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M7 10l5 5 5-5M12 15V3"/>@break
    @case('book-open')<path d="M2 4h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 4h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>@break
    @case('message')<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>@break
    @case('chevron-down')<path d="m6 9 6 6 6-6"/>@break
    @case('graduation')<path d="M22 10 12 5 2 10l10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>@break
    @case('clock')<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>@break
    @case('star')<path d="m12 2 3.1 6.3 6.9 1-5 4.9 1.2 6.8L12 17.8 5.8 21l1.2-6.8-5-4.9 6.9-1z"/>@break
    @case('calc')<rect x="4" y="2" width="16" height="20" rx="2"/><path d="M8 6h8M8 10h2M14 10h2M8 14h2M14 14h2M8 18h8"/>@break
    @case('flask')<path d="M9 2h6M10 2v7L4 20a1 1 0 0 0 1 2h14a1 1 0 0 0 1-2l-6-11V2"/>@break
    @case('languages')<path d="m5 8 6 6M4 14l6-6 2-3M2 5h12M7 2h1M22 22l-5-10-5 10M14 18h6"/>@break
    @case('refresh')<path d="M21 12a9 9 0 1 1-3-6.7L21 8M21 3v5h-5"/>@break
    @case('shield-check')<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/>@break
    @case('request')<path d="M12 22a10 10 0 1 1 10-10"/><path d="m9 12 2 2 4-4M18 16v6M15 19h6"/>@break
    @default<circle cx="12" cy="12" r="9"/>
@endswitch
</svg>
