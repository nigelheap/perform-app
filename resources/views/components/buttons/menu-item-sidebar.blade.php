@props([
    'active' => false,
    'icon' => 'o-home',
    'stacked' => true,
])
@php($stackClass = $stacked ? 'flex-col text-center text-xs' : 'gap-3 text-sm')
<a {{ $attributes->merge([
    'class' => 'hover:text-white group flex w-full items-center rounded-md p-3 font-medium ' . $stackClass . ' ' . ($active ? 'text-white bg-region-gold' : 'text-white hover:bg-region-night-dark')
 ]) }}>
    <x-dynamic-component :component="'heroicon-' . $icon" class="{{ $active ? 'text-white' : 'text-region-sage' }} group-hover:text-white h-6 w-6"></x-dynamic-component>
    <span>{{ $slot }}</span>
</a>
