@props(['icon', 'message', 'title' => '', 'colour' => 'zinc', 'classes' => ''])

<div {{ $attributes->class('flex p-4 shadow sm:rounded-lg bg-stone-700')->merge(['class' => '']) }}>
    <x-messages.parts.icon class="text-zinc-400">
        {{ $icon }}
    </x-messages.parts.icon>
    <x-messages.parts.wrapper>
        @if(!empty($title))
            <x-messages.parts.title class="text-white">{{ $title }}</x-messages.parts.title>
        @endif
        <x-messages.parts.text class="text-stone-50">
            {{ $message }}
        </x-messages.parts.text>
    </x-messages.parts.wrapper>
</div>
