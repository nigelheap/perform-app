@props([
    'head' => false,
])
<div {{ $attributes->merge(['class' => "max-w-full overflow-x-auto shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg"]) }}>
    <table class="min-w-full divide-y divide-stone-300 overflow-hidden">
        @if(!empty($head))
            <thead class="bg-stone-200">
                {{ $head }}
            </thead>
        @endif
        <tbody class="divide-y divide-stone-200 bg-white">
            {{ $slot }}
        </tbody>
    </table>
</div>
