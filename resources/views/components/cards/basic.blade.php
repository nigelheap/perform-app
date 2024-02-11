@props([
    'buttons' => '',
    'title' => false,
    'desc' => false,
    'footer' => null,
    'class' => 'bg-white'
])

<div {{ $attributes->class($class)->merge(['class' => 'divide-y divide-black/20 rounded-lg shadow']) }}>
    @if(!empty($title) || !empty($buttons))
    <div class="px-4 py-5 sm:px-6">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                @if(!empty($title))
                    <h2 class="text-base font-semibold leading-6 text-gray-900">{{ $title }}</h2>
                @endif
                @if(!empty($desc))
                    <p class="mt-2 text-sm text-gray-700">{{ $desc }}</p>
                @endif
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 flex gap-2">
                {{ $buttons }}
            </div>
        </div>
    </div>
    @endif
    <div class="px-4 py-5 sm:p-6">
        {{ $slot }}
    </div>

    @if(!empty($footer))
    <div class="px-4 py-4 sm:px-6 bg-black/10 rounded-b-lg">
        {{ $footer }}
    </div>
    @endif
</div>
