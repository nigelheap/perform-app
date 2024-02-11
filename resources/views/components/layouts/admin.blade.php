@props([
    'column' => false,
    'title' => '',
    'pageTitle' => '',
    'label' => '',
    'actions' => '',
    'titleClasses' => 'flex flex-col md:flex-row justify-between items-start md:items-center mb-5 gap-2',
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class=" bg-stone-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="/images/favicon.png" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $pageTitle ? $pageTitle . ' - ' : '' . config('app.name', 'Console Admin') }}</title>

        @vite(['resources/sass/admin.scss', 'resources/js/admin.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="flex h-full" id="app">
            <x-admin.sidebar />
            <x-admin.mobile-menu />

            <!-- Content area -->
            <div class="flex flex-1 flex-col overflow-x-hidden min-h-screen">
                <x-admin.header />

                <!-- Main content -->
                <div class="flex flex-1 items-stretch">

                    @if(!empty($column))
                        <aside class="hidden w-64 overflow-y-auto border-l border-gray-200 bg-white lg:block">
                            {{ $column }}
                        </aside>
                    @endif

                    <main class="flex-1 w-full">
                        <!-- Primary column -->
                        <section aria-labelledby="primary-heading" class="px-2 lg:px-8 flex h-full min-w-0 flex-1 flex-col lg:order-last py-8 mb-12">
                            <div class="{{ $titleClasses }}">
                                @if(!empty($title))
                                    <h1  id="primary-heading"
                                         class="text-3xl font-bold leading-tight tracking-tight text-stone-800 flex items-center gap-4">{{ $title }}</h1>
                                @else
                                    <h1 id="primary-heading"
                                        class="sr-only text-stone-800 flex items-center gap-4">{{ $label }}</h1>
                                @endif

                                @if($actions)
                                    {{ $actions }}
                                @endif
                            </div>

                            <x-messages.messages @class([
                                'my-4' => !empty($title),
                                'mb-4' => empty($title),
                            ]) />
                            <!-- Your content -->
                            {{ $slot }}

                        </section>
                    </main>


                </div>
            </div>
        </div>
        @include('admin.partials.foot')
    </body>
</html>
