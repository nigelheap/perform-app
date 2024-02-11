@props(['title' => '',  'message' => $slot])

<div {{ $attributes->class('flex p-4 shadow rounded bg-emerald-700')->merge(['class' => '']) }}>
    <x-messages.parts.icon class="text-emerald-400">
        <x-heroicon-o-check-circle />
    </x-messages.parts.icon>
    <x-messages.parts.wrapper>
        @if(!empty($title))
            <x-messages.parts.title class="text-white">{{ $title }}</x-messages.parts.title>
        @endif
        <x-messages.parts.text class="text-emerald-50">
            {{ $message }}
        </x-messages.parts.text>
    </x-messages.parts.wrapper>
</div>
