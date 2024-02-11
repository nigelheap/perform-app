@props([
    'buttons' => '',
    'filters' => '',
    'title' => '',
    'desc' => false,
])
<div {{ $attributes }}>
    <div class="sm:flex sm:flex-wrap sm:items-center">
        @if(!empty($title) && !empty($desc))
        <div class="sm:flex-auto">
            @if(!empty($title))
                <h2 class="text-base font-semibold text-gray-900">{{ $title }}</h2>
            @endif
            @if(!empty($desc))
            <p class="mt-2 text-sm text-gray-700">{{ $desc }}</p>
            @endif
        </div>
        @endif
        <div class="mt-4 sm:mt-0 flex gap-2 flex-col lg:flex-row justify-between w-full">
            <div class="flex gap-4 flex-col flex-wrap lg:flex-row">
                {{ $filters }}
            </div>
            <div class="sm:ml-16 flex gap-2 flex-col lg:flex-row items-end">
                {{ $buttons }}
            </div>
        </div>

    </div>
    <div class="mt-4 flow-root">
        <div class="overflow-x-auto max-w-full">
            <div class="min-w-full py-2 align-middle">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
