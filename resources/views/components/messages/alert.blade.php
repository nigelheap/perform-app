@props(['title' => '', 'message' => $slot])

<div {{ $attributes->class('flex p-4 shadow sm:rounded-lg bg-pink-700 my-2')->merge(['class' => '']) }}>
    <x-messages.parts.icon class="text-pink-400">
        <x-heroicon-s-exclamation-triangle />
    </x-messages.parts.icon>
    <x-messages.parts.wrapper>
        @if(!empty($title))
            <x-messages.parts.title class="text-white">{{ $title }}</x-messages.parts.title>
        @endif
        <x-messages.parts.text class="text-pink-50">
            {{ $message }}
        </x-messages.parts.text>
    </x-messages.parts.wrapper>
</div>
