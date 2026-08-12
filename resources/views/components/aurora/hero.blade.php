@props(['section'])

@php
    $title = $section?->meta('title') ?? 'Semua layanan TIK pemerintah, lebih mudah diakses';
    $subtitle = $section?->meta('subtitle') ?? 'Rakaca adalah etalase digital Bidang Aplikasi Informatika (Aptika), Dinas Komunikasi, Informatika, dan Statistik — menghubungkan perangkat daerah dengan layanan infrastruktur, aplikasi, dan pemerintahan elektronik yang tersedia.';
    $badge = $section?->meta('custom.organization_name') ?? 'RAKACA · ETALASE LAYANAN TIK';
    $buttons = $section?->buttons() ?? [];
@endphp

<section class="hero">
    <div class="hero-inner">

        {{-- Eyebrow badge --}}
        <p class="eyebrow">{{ $badge }}</p>

        {{-- Main heading --}}
        <h1>
            {!! nl2br(e($title)) !!}
        </h1>

        {{-- Description --}}
        <p class="hero-desc">
            {{ $subtitle }}
        </p>

        {{-- CTA buttons --}}
        <div class="hero-cta">
            @if(!empty($buttons))
                @foreach($buttons as $button)
                    @if($button['show'] ?? false)
                        @php
                            $isPrimary = $loop->first;
                            $class = $isPrimary ? 'btn btn-primary' : 'btn btn-outline';
                        @endphp
                        <a href="{{ $button['url'] ?: '#' }}" class="{{ $class }}">
                            @if(!empty($button['icon']))
                                <x-umpak::icon :name="$button['icon']" class="w-4 h-4" />
                            @endif
                            {{ $button['label'] }}
                        </a>
                    @endif
                @endforeach
            @else
                <a href="#layanan" class="btn btn-primary">Jelajahi Layanan</a>
                <a href="#kontak" class="btn btn-outline">Hubungi Kami</a>
            @endif
        </div>

        {{-- Stats meta row --}}
        <div class="hero-meta">
            <div>
                <span class="num">3</span>
                <span class="lbl">Kategori layanan</span>
            </div>
            <div>
                <span class="num">5+</span>
                <span class="lbl">Layanan aktif</span>
            </div>
            <div>
                <span class="num">Senin–Jumat</span>
                <span class="lbl">Jam layanan</span>
            </div>
        </div>
    </div>
</section>