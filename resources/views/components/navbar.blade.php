{{--
Rakaca Navbar — merged Aurora design + Umpak capabilities
- Struktur logika: umpakNav(), wire:navigate, dropdown, honeypot
- Desain visual : Aurora CSS classes (nav, nav-inner, brand, nav-links, ...)
- Theme toggle : data-theme attribute (Aurora system) + Alpine x-data untuk fallback
Usage: <x-bale-rakaca::navbar />
--}}
<nav class="nav" x-data="umpakNav()">

    <div class="nav-inner">

        {{-- Brand --}}
        <a href="{{ route('index') }}" wire:navigate.hover class="brand">
            <x-bale-rakaca::aurora.brand-mark class="brand-mark" />
            Rakaca
        </a>

        {{-- Desktop links --}}
        <div class="nav-links" role="navigation" aria-label="Menu utama">
            @foreach ($umpakNav as $i => $item)
                @php
                    $isInternal = str_starts_with($item->resolvedUrl, '/') || str_contains($item->resolvedUrl, config('app.url'));
                    $isAnchor = str_contains($item->resolvedUrl, '#');
                    $useNavigate = $isInternal && !$isAnchor;
                @endphp

                @if ($item->hasChildren())
                    {{-- Dropdown item --}}
                    <div class="nav-dropdown" @click="isDropdownOpen({{ $i }}) ? closeDropdown() : openDropdown({{ $i }})"
                        @click.outside="isDropdownOpen({{ $i }}) ? closeDropdown() : null">
                        <button type="button" class="nav-dropdown-trigger" :class="isDropdownOpen({{ $i }}) ? 'active' : ''">
                            {{ $item->name }}
                            <svg class="nav-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                aria-hidden="true" :class="isDropdownOpen({{ $i }}) ? 'rotated' : ''">
                                <path d="M6 9l6 6 6-6" />
                            </svg>
                        </button>

                        <div x-show="isDropdownOpen({{ $i }})" x-cloak x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0" class="nav-dropdown-panel">
                            @foreach ($item->children as $child)
                                @php
                                    $childInternal = str_starts_with($child->resolvedUrl, '/') || str_contains($child->resolvedUrl, config('app.url'));
                                    $childAnchor = str_contains($child->resolvedUrl, '#');
                                    $childNavigate = $childInternal && !$childAnchor;
                                @endphp
                                <a href="{{ $child->resolvedUrl }}" @if($childNavigate) wire:navigate.hover @endif
                                    class="nav-dropdown-item">
                                    {{ $child->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ $item->resolvedUrl }}" @if($useNavigate) wire:navigate.hover @endif @class([
                        'nav-link',
                        'active' => request()->url() == $item->resolvedUrl || (request()->is('/') && $item->slug == 'beranda'),
                    ])>
                        {{ $item->name }}
                    </a>
                @endif
            @endforeach
        </div>

        {{-- Actions --}}
        <div class="nav-actions">
            <button wire:click="login" class="btn btn-primary"
                style="padding: 8px 18px; font-size: 0.88rem; text-decoration: none;">
                Masuk
            </button>

            {{-- Theme toggle (Aurora system: data-theme attr) --}}
            <button class="theme-toggle" id="themeToggle" type="button" aria-label="Ubah tema terang/gelap">
                <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    aria-hidden="true">
                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z" />
                </svg>
                <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    aria-hidden="true">
                    <circle cx="12" cy="12" r="4" />
                    <path
                        d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41" />
                </svg>
            </button>

            {{-- Hamburger (mobile) --}}
            <button class="hamburger" id="menuToggle" type="button" aria-label="Buka menu" aria-expanded="false"
                aria-controls="mobileMenu">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M4 7h16M4 12h16M4 17h16" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile menu (Aurora CSS: max-height & accordion) --}}
    <div class="mobile-menu" id="mobileMenu" role="navigation" aria-label="Menu mobile">
        <div class="mobile-menu-inner">
            @foreach ($umpakNav as $i => $item)
                @php
                    $isInternal = str_starts_with($item->resolvedUrl, '/') || str_contains($item->resolvedUrl, config('app.url'));
                    $isAnchor = str_contains($item->resolvedUrl, '#');
                    $useNavigate = $isInternal && !$isAnchor;
                @endphp

                @if ($item->hasChildren())
                    <div class="mobile-dropdown">
                        <button type="button" class="mobile-dropdown-trigger"
                            @click="isDropdownOpen('mobile-{{ $i }}') ? closeDropdown() : openDropdown('mobile-{{ $i }}')">
                            {{ $item->name }}
                            <svg class="nav-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                :class="isDropdownOpen('mobile-{{ $i }}') ? 'rotated' : ''">
                                <path d="M6 9l6 6 6-6" />
                            </svg>
                        </button>
                        <div x-show="isDropdownOpen('mobile-{{ $i }}')" x-cloak class="mobile-dropdown-children"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0">
                            @foreach ($item->children as $child)
                                @php
                                    $childInternal = str_starts_with($child->resolvedUrl, '/') || str_contains($child->resolvedUrl, config('app.url'));
                                    $childAnchor = str_contains($child->resolvedUrl, '#');
                                    $childNavigate = $childInternal && !$childAnchor;
                                @endphp
                                <a href="{{ $child->resolvedUrl }}" @if($childNavigate) wire:navigate.hover @endif
                                    @click="onLinkClick()">
                                    {{ $child->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ $item->resolvedUrl }}" @if($useNavigate) wire:navigate.hover @endif @click="onLinkClick()"
                        @class(['nav-link', 'active' => request()->url() == $item->resolvedUrl])>
                        {{ $item->name }}
                    </a>
                @endif
            @endforeach

            <div
                style="margin-top: 12px; padding-top: 12px; border-top: 1px solid var(--border, rgba(255,255,255,0.1));">
                <button wire:click="login" class="btn btn-primary"
                    style="width: 100%; justify-content: center; text-decoration: none;">
                    Masuk
                </button>
            </div>
        </div>
    </div>
</nav>