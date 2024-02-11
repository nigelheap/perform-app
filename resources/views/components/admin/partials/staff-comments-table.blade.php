@props([
    'staffComments' => [],
    'showListing' => false,
])
@php($authors = app(\App\Services\WordpressApi::class)->get('authors'))
<x-elements.table class="mb-4">
    <x-slot:head>
        <tr class="table-row">
            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-stone-900">Content</th>
            @if($showListing)
                <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-stone-900 hidden xl:table-cell">Listing</th>
            @endif
            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-stone-900 hidden xl:table-cell">Tags</th>
            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-stone-900 hidden xl:table-cell">Author</th>
            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-stone-900 hidden xl:table-cell">Date</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                <span class="sr-only">Edit</span>
            </th>
        </tr>
    </x-slot:head>
    @foreach($staffComments as $staffComment)
        <tr>
            <td class="whitespace-nowrap p-4 font-medium text-stone-900 sm:pl-6">
                <div class="flex flex-col items-start gap-1">
                    <a href="{{ route('admin.staff-comments.edit', [
                        'staff_comment' => $staffComment,
                        'return' => request()->path(),
                    ]) }}"
                       class="underline hover:text-stone-500 truncate">
                        {!! Str::words($staffComment->comment, 5) !!}
                    </a>
                    <span class="inline-flex items-center rounded border border-gray-200 px-1 font-sans text-xs text-gray-400 bg-white">
                        {{ Str::ucfirst($staffComment->status) }}
                    </span>
                </div>
            </td>
            @if($showListing)
            <td class="whitespace-nowrap p-4 text-sm text-stone-500 hidden xl:table-cell">
                    @if($staffComment->listing)
                        <a href="{{ route('admin.listings.show', $staffComment->listing) }}"
                           class="underline hover:text-stone-500 truncate">
                            {{ $staffComment->listing->title }}
                        </a>
                    @else
                        [No Listing]
                    @endif
            </td>
            @endif
            <td class="whitespace-nowrap p-4 text-sm text-stone-500 hidden xl:table-cell">
                <div class="flex flex-wrap gap-2">
                    @if($staffComment->tags)
                        @foreach($staffComment->tags as $tag)
                            <span class="inline-flex items-center rounded border border-gray-200 px-1 font-sans text-xs text-gray-400 bg-white">
                                {{ $tag }}
                            </span>
                        @endforeach
                    @else
                        [No Tags]
                    @endif
                </div>
            </td>
            <td class="whitespace-nowrap p-4 text-sm text-gray-500 hidden xl:table-cell">
                @if($staffComment->author_id)
                    @php($author = collect($authors)->firstWhere('id', $staffComment->author_id))
                    {{ data_get($author, 'name') }}
                @else
                    {{ $staffComment->author_id }}
                @endif
            </td>
            <td class="whitespace-nowrap p-4 text-sm font-medium text-stone-900 hidden xl:table-cell">
                {{ $staffComment->created_at?->toDayDateTimeString() }}
                ({{ $staffComment->created_at?->diffForHumans() }})
            </td>
            <td class="relative whitespace-nowrap p-4 text-right text-sm font-medium">
                <div class="flex items-center gap-2 justify-end">
                    <x-buttons.a-secondary href="{{ route('admin.staff-comments.edit', [
                        'staff_comment' => $staffComment,
                        'return' => request()->path(),
                    ]) }}">Edit</x-buttons.a-secondary>
                </div>
            </td>
        </tr>
    @endforeach
</x-elements.table>
