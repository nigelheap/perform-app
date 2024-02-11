@props([
    'listings' => []
])
<x-elements.table class="mb-4">
    <x-slot:head>
        <tr class="flex flex-col lg:table-row">
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                @sortablelink('title', 'Title')
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 hidden 2xl:table-cell">
                @sortablelink('account.name', 'Account')
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 hidden xl:table-cell">
                @sortablelink('status', 'Status')
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 hidden xl:table-cell">
                @sortablelink('updated', 'Last Updated')
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 hidden xl:table-cell">
                @sortablelink('published', 'Last Published')
            </th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                <span class="sr-only">Edit</span>
            </th>
        </tr>
    </x-slot:head>
    @foreach($listings as $listing)
        <tr class="flex flex-col lg:table-row">
            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                <div class="flex flex-col items-start gap-1">
                    <a href="{{ route('admin.listings.show', $listing) }}" class="underline hover:text-stone-500">
                        {!! $listing->title !!}
                    </a>
                    <span class="text-xs text-neutral-700 inline-flex gap-2">
                        <span class="inline-flex items-center rounded border border-gray-200 px-1 font-sans text-xs text-gray-400">
                            v{{ $listing->current_version }}
                        </span>
                        <a href="#"
                           @click.prevent="loadPreview('{{ $listing->id }}', $event)"
                           class="rounded border border-gray-200 px-1 hover:bg-stone-200">Preview</a>

                        @if(!empty($listing->zohocrm_id))
                            <a target="_blank"
                               class="rounded border bg-blue-200 border-blue-800 px-1 hover:bg-blue-400"
                               href="{{ config('services.zoho.frontend') . 'tab/Accounts/' . $listing->zohocrm_id }}">
                               CRM
                            </a>
                        @endif
                    </span>
                </div>
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 hidden 2xl:table-cell">
                <div class="flex flex-col">
                    @if($listing->account)
                        <a href="{{ route('admin.accounts.show', $listing->account) }}" class="hover:underline">
                            {{ $listing->account->name }}
                        </a>
                        @if($listing->users_count)
                            <span class="text-xs text-neutral-700">
                                <span class="inline-flex items-center rounded border border-gray-200 px-1 font-sans text-xs text-gray-400">
                                    {{ Str::plural('User', $listing->users_count) }} {{ $listing->users_count }}
                                </span>
                            </span>
                        @endif
                    @else
                        [No Account]
                    @endif
                </div>
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 hidden xl:table-cell">
                <x-admin.listings.status :listing="$listing" />
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 hidden xl:table-cell">
                @if($updated_at = $listing->version?->updated_at)
                    {{ $updated_at->format('d/m/Y \a\t h:i a') }}
                    ({{ $updated_at->longRelativeToNowDiffForHumans() }})
                @endif
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 hidden xl:table-cell">
                @if($published_at = $listing->version?->published_at)
                    {{ $published_at->format('d/m/Y \a\t h:i a') }}
                    ({{ $published_at->longRelativeToNowDiffForHumans() }})
                @endif
            </td>
            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                <div class="flex items-center gap-2 justify-end">
                    <x-buttons.a-primary
                        href="{{ route('admin.listings.staff-comments', $listing) }}">
                        <div class="inline-flex whitespace-nowrap items-center gap-2">
                            <x-heroicon-o-chat-bubble-bottom-center-text class="w-5 w-5" />
                        </div>
                    </x-buttons.a-primary>
                    <x-buttons.a-secondary
                        target="_blank"
                        target="Preview {{ $listing->title }}"
                        href="{{ str_replace('[listing_id]' , $listing->id, config('services.customer.preview_endpoint')) }}"
                        :sr-title="$listing->title">
                        <div class="inline-flex whitespace-nowrap items-center gap-2">
                            <x-heroicon-o-viewfinder-circle class="w-5 w-5" />
                        </div>
                    </x-buttons.a-secondary>
                    <x-buttons.a-primary
                        target="_blank"
                        href="{{ route('listings.edit', $listing) }}"
                        :sr-title="$listing->title">
                        Console
                    </x-buttons.a-primary>
                    <x-buttons.a-secondary href="{{ route('admin.listings.edit', $listing) }}" :sr-title="$listing->title">Administer</x-buttons.a-secondary>
                    <x-buttons.a-secondary href="{{ route('admin.listings.content', $listing) }}" :sr-title="$listing->title">Edit Content</x-buttons.a-secondary>

                </div>
            </td>
        </tr>
    @endforeach
</x-elements.table>
