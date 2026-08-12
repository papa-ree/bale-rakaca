<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- set title from controller livewire --}}
    <title>{{ $title ?? 'Rakaca' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&amp;family=Inter:wght@400;500;600;700&amp;family=JetBrains+Mono:wght@400;500&amp;display=swap"
        rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" sizes="48x48">

    @vite(['resources/css/app.css', 'resources/css/aurora.css', 'resources/js/app.js', 'resources/js/aurora.js'])
    <x-umpak::analytics />

    <script>
        ( function ()
        {
            var prefersDark = window.matchMedia( '(prefers-color-scheme: dark)' ).matches;
            document.documentElement.setAttribute( 'data-theme', prefersDark ? 'dark' : 'light' );
        } )();
    </script>

    @livewireStyles
</head>

<body
    class="antialiased bg-white dark:bg-slate-900 transition-colors duration-300 scrollbar-gutter-stable scrollbar-thin scrollbar-track-slate-200 dark:scrollbar-track-slate-800 scrollbar-thumb-indigo-500 dark:scrollbar-thumb-indigo-600 hover:scrollbar-thumb-indigo-600 dark:hover:scrollbar-thumb-indigo-500 scrollbar-thumb-rounded-full scrollbar-track-rounded-full overscroll-none">

    {{-- Aurora wave background (page-wide canvas) --}}
    <canvas id="bg-canvas" aria-hidden="true"></canvas>

    <div class="page-content">
        {{ $slot }}
    </div>

    {{-- Three.js CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

    {{-- Stack for page-specific scripts if any --}}
    @stack('scripts')

    @livewireScripts
</body>

</html>