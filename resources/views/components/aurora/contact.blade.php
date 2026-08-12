@props(['section'])

@php
    $title     = $section?->meta('title')                ?? 'Kami Siap Membantu';
    $subtitle  = $section?->meta('subtitle')             ?? 'Butuh layanan, konsultasi teknis, atau informasi lebih lanjut? Tim kami siap membantu pada jam kerja.';
    $badge     = $section?->meta('custom.badge')         ?? 'KONTAK';
    $ctaTitle  = $section?->meta('custom.cta_title')    ?? 'Ajukan layanan atau konsultasi';
    $ctaSub    = $section?->meta('custom.cta_subtitle') ?? 'Sampaikan kebutuhan infrastruktur, aplikasi, atau layanan e-Gov Anda — tim Aptika akan menindaklanjuti melalui kanal resmi.';
    $buttons   = $section?->buttons() ?? [];
    $items     = $section?->items     ?? [];
@endphp

<section class="section" id="kontak">
    <div class="container">

        {{-- Section header --}}
        <div class="section-head">
            <p class="eyebrow">{{ strtoupper($badge) }}</p>
            <h2>{!! nl2br(e($title)) !!}</h2>
            <p>{{ $subtitle }}</p>
        </div>

        {{-- Contact panel --}}
        <div class="contact-panel">

            {{-- Left: contact list --}}
            <div class="contact-list">
                @forelse($items as $item)
                    @php
                        $itemIcon = is_array($item['icon'] ?? null)        ? ($item['icon'][0]        ?? 'info') : ($item['icon']        ?? 'info');
                        $itemName = is_array($item['name'] ?? null)        ? ($item['name'][0]        ?? '')     : ($item['name']        ?? '');
                        $itemDesc = is_array($item['description'] ?? null) ? ($item['description'][0] ?? '')     : ($item['description'] ?? '');
                    @endphp
                    <div class="contact-item">
                        <div class="ic" aria-hidden="true">
                            <x-umpak::icon :name="$itemIcon" class="w-[19px] h-[19px] text-[var(--primary)]" />
                        </div>
                        <div>
                            <p class="lbl">{{ $itemName }}</p>
                            <p class="val">{{ $itemDesc }}</p>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>

            {{-- Right: CTA card --}}
            <div class="contact-cta">
                <h3>{{ $ctaTitle }}</h3>
                <p>{{ $ctaSub }}</p>

                @if(!empty($buttons))
                    @foreach($buttons as $button)
                        @php
                            $btnClass = $loop->first ? 'btn btn-primary' : 'btn btn-outline';
                        @endphp
                        <a href="{{ $button['url'] ?: '#' }}" class="{{ $btnClass }}">
                            @if(!empty($button['icon']))
                                <x-umpak::icon :name="$button['icon']" class="w-4 h-4 shrink-0" />
                            @endif
                            {{ $button['label'] }}
                        </a>
                    @endforeach
                @else
                    <a href="mailto:kominfo@ponorogo.go.id" class="btn btn-primary">
                        <x-umpak::icon name="mail" class="w-4 h-4 shrink-0" />
                        Kirim Email
                    </a>
                    <a href="https://rakaca.ponorogo.go.id/bantuan"
                       target="_blank" rel="noopener noreferrer"
                       class="btn btn-outline">
                        <x-umpak::icon name="messages-square" class="w-4 h-4 shrink-0" />
                        Bantuan
                    </a>
                @endif
            </div>{{-- /.contact-cta --}}

        </div>{{-- /.contact-panel --}}
    </div>{{-- /.container --}}
</section>