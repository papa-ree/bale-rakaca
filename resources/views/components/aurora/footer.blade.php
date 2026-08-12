{{--
Rakaca Aurora Footer Component
Usage: <x-rakaca::aurora.footer />

Renders a minimal footer with brand mark + copyright.
--}}
<footer>
    <div class="container footer-inner">

        {{-- Brand --}}
        <div class="footer-brand">
            {{--
            SVG logo in footer — reuses the same gradient definition.
            Note: The linearGradient id "rakacaLogoGrad" is defined in brand-mark.blade.php
            which is rendered in the nav. The footer SVG references it.
            If the footer is rendered standalone (without nav), you must include the defs.
            --}}
            <svg viewBox="0 0 32 32" fill="none" aria-hidden="true" width="20" height="20">
                <defs>
                    <linearGradient id="rakacaFooterGrad" x1="0" y1="0" x2="32" y2="32" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#3B5BFF" />
                        <stop offset="0.55" stop-color="#8B5CF6" />
                        <stop offset="1" stop-color="#2DD4E8" />
                    </linearGradient>
                </defs>
                <rect x="6" y="6" width="8.5" height="8.5" rx="2" fill="url(#rakacaFooterGrad)" />
                <rect x="17.5" y="6" width="8.5" height="8.5" rx="2" fill="url(#rakacaFooterGrad)" opacity="0.55" />
                <rect x="6" y="17.5" width="8.5" height="8.5" rx="2" fill="url(#rakacaFooterGrad)" opacity="0.55" />
                <rect x="17.5" y="17.5" width="8.5" height="8.5" rx="2" fill="url(#rakacaFooterGrad)" />
            </svg>
            Rakaca
        </div>

        {{-- Copyright --}}
        <p>&copy; {{ date('Y') }} Dibuat dengan BALé CMS di Bidang Aptika &middot; Dinas Komunikasi, Informatika, dan
            Statistik. Etalase Layanan TIK.</p>

    </div>
</footer>