@props([
    'title' => 'Stat',
    'size' => 'large',
])
<div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
    <dt class="truncate text-sm font-medium text-stone-500">{{ $title }}</dt>
    @if($size === 'large')
        <dd class="mt-3 text-3xl font-semibold tracking-tight text-stone-900">
            {{ $slot }}
        </dd>
    @else
        <dd class="mt-3 text-stone-900">
            {{ $slot }}
        </dd>
    @endif
</div>
