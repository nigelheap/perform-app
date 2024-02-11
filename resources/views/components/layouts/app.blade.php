@props([
    'pageTitle' => null,
    'active' => '',
    'hideMenu' => false,
    'headerContainerClass' => '',
    'mainContainerClass' => '',
    'isWizard' => false,
    'steps' => []
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="/images/favicon.png" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ ($pageTitle ? $pageTitle . ' - ' : '') . config('app.name', 'Console') }}</title>

        <!-- Fonts -->
{{--        <link rel="stylesheet" type="text/css" href="{{ mix('dist/app.css') }}">--}}

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <!-- Scripts -->
    </head>
    <body class="{{ request()->segment(2, 'home') }}-{{ request()->segment(3, 'index') }}-page font-sans antialiased">

    <div class="min-h-screen layout flex flex-wrap flex-col pb-12 app-layout">
            <!-- Page Content -->

            <main id="app">
                @include('partials.head', [
                    'title' => $pageTitle,
                    'active' => $active,
                    'hideMenu' => $hideMenu,
                    'headerContainerClass' => $headerContainerClass,
                    'mainContainerClass' => $mainContainerClass,
                    'isWizard' => $isWizard,
                    'showSteps' => !empty($steps)
                ])
                {{ $slot }}
            </main>
        </div>
        @include('partials.foot')
    </body>
</html>
