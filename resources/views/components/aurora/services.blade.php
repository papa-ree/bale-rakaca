@props(['section'])

@php
    $title = $section?->meta('title') ?? 'Jelajahi layanan TIK';
    $subtitle = $section?->meta('subtitle') ?? 'Dari pusat data hingga aplikasi pelayanan publik — berikut layanan yang dikelola dan difasilitasi Bidang Aptika untuk perangkat daerah.';
    $badge = $section?->meta('custom.badge') ?? 'KATEGORI LAYANAN';
    $items = $section?->items ?? [];
@endphp

<section class="section" id="layanan">
    <div class="container">

        {{-- Section header --}}
        <div class="section-head">
            <p class="eyebrow">{{ strtoupper($badge) }}</p>
            <h2>{{ $title }}</h2>
            <p>{{ $subtitle }}</p>
        </div>

        {{-- Services grid --}}
        <div class="services-grid">
            @if(!empty($items))
                @foreach($items as $item)
                    @php
                        // In DB: "title": ["Infrastruktur"], "subtitle": ["..."], "icon": ["server"], "item": ["Data center...", "VPN..."]
                        // Let's safely extract values since they are arrays in the database json structure
                        $itemTitle = is_array($item['title'] ?? null) ? ($item['title'][0] ?? '') : ($item['title'] ?? '');
                        $itemSubtitle = is_array($item['subtitle'] ?? null) ? ($item['subtitle'][0] ?? '') : ($item['subtitle'] ?? '');
                        $itemIcon = is_array($item['icon'] ?? null) ? ($item['icon'][0] ?? 'server') : ($item['icon'] ?? 'server');
                        $subItems = is_array($item['item'] ?? null) ? $item['item'] : [];
                    @endphp
                    <article class="service-card" id="{{ strtolower($itemTitle) }}" tabindex="0">
                        <div class="card-icon" aria-hidden="true">
                            <x-umpak::icon :name="$itemIcon" class="w-6 h-6 text-white" />
                        </div>
                        <h3>{{ $itemTitle }}</h3>
                        <p class="card-desc">{{ $itemSubtitle }}</p>
                        @if(!empty($subItems))
                            <ul class="card-list">
                                @foreach($subItems as $subItem)
                                    <li>
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"
                                            aria-hidden="true">
                                            <path d="M20 6 9 17l-5-5" />
                                        </svg>
                                        {{ $subItem }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </article>
                @endforeach
            @endif
        </div>
    </div>
</section>