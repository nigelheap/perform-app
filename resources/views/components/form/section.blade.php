@props([
    'title' => null,
    'desc' => null,
    'innerClasses' => 'mt-6 sm:grid-cols-3 2xl:grid-cols-5'
])
<div {{ $attributes }}>
    @if($title || $desc)
        <div>
            @if($title)
            <h3 class="text-base font-semibold leading-6 text-gray-900">{{ $title }}</h3>
            @endif
            @if($desc)
                <p class="mt-1 text-sm text-gray-500">{{ $desc }}</p>
            @endif
        </div>
    @endif
    <div class="grid grid-cols-1 gap-y-4 gap-x-4 {{ $innerClasses }}">
        {{ $slot }}
    </div>
</div>
