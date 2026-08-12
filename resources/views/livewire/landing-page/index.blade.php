<div>
    {{--
    Rakaca Aurora — Landing Page Home
    Livewire view for: Paparee\Rakaca\Livewire\LandingPages\Home (aurora variant)

    Layout : rakaca::layouts.guest (Aurora — CSS variables, Three.js background)
    Sections: nav · hero · services · contact · footer

    Component aliases registered via RakacaServiceProvider:
    x-rakaca::navbar
    x-rakaca::aurora.hero
    x-rakaca::aurora.services
    x-rakaca::aurora.contact
    x-rakaca::aurora.footer
    --}}
    {{-- <x-rakaca::layouts.guest title="Rakaca — Etalase Layanan TIK Bidang Aptika"
        description="Rakaca, etalase digital layanan TIK Bidang Aptika Dinas Komunikasi, Informatika, dan Statistik: infrastruktur, aplikasi, dan pemerintahan elektronik dalam satu jendela akses.">
        --}}
        {{-- Sticky navigation --}}
        <x-bale-rakaca::navbar />

        {{-- Hero: full-viewport, gradient text, CTA, stats --}}
        <x-bale-rakaca::aurora.hero :section="$heroSection" />

        {{-- Services: 3-column glassmorphism cards --}}
        <x-bale-rakaca::aurora.services :section="$serviceSection" />

        {{-- Contact: info list + email/WhatsApp CTA --}}
        <x-bale-rakaca::aurora.contact :section="$contactSection" />

        {{-- Footer --}}
        <x-bale-rakaca::aurora.footer />
        {{-- </x-rakaca::layouts.guest> --}}
</div>