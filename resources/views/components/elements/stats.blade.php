@props([
    'title' => 'Stats',
    'listClasses' => 'mt-4 grid grid-cols-1 gap-5 sm:grid-cols-3',
])
<div {{ $attributes->merge(['class' => '']) }}>
    <h3 class="text-base font-semibold leading-6 text-gray-900">{{ $title }}</h3>
    <dl class="{{ $listClasses }}">
        {{ $slot }}
    </dl>
</div>
