@props([
    'srTitle' => false
])
<a {{ $attributes->merge(['class' => 'inline-flex items-center rounded-md bg-white py-2 px-3 text-center text-sm font-semibold text-stone-600 border-stone-300 border shadow-sm hover:bg-stone-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-region-night transition ease-in-out duration-150']) }}>
    {{ $slot }}
    @if($srTitle)
        <span class="sr-only">, {!! $srTitle !!}</span>
    @endif
</a>
