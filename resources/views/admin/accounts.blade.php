<x-layouts.admin>
    <form action="" method="get">
        <x-cards.table>
            <x-slot:filters>
                <x-form.fields.search />
            </x-slot:filters>
            <x-slot:buttons>
                <x-buttons.a-primary href="{{ route('admin.accounts.create') }}">Add Account</x-buttons.a-primary>
            </x-slot:buttons>
            <x-elements.table class="mb-4">
                <x-slot:head>
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Title</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 hidden lg:table-cell">Approver Email</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </x-slot:head>
                @foreach($accounts as $account)
                    <tr>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                            <div class="flex flex-col gap-1">
                                <span class="truncate w-48">{!! $account->name !!}</span>
                                <span class="text-xs text-neutral-700">
                                    <span class="inline-flex items-center rounded border border-gray-200 px-1 font-sans text-xs text-gray-400">
                                        {{ $account->users_count }} {{ Str::plural('user', $account->users_count) }}
                                    </span>
                                    <span class="inline-flex items-center rounded border border-gray-200 px-1 font-sans text-xs text-gray-400">
                                        {{ $account->listings_count }} {{ Str::plural('listing', $account->listings_count) }}
                                    </span>
                                </span>

                            </div>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 hidden lg:table-cell">
                            {{ $account->approver_email }}
                        </td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <x-buttons.a-secondary href="{{ route('admin.accounts.edit', $account) }}" :sr-title="$account->name">Edit</x-buttons.a-secondary>
                            <x-buttons.a-secondary href="{{ route('admin.listings.create', ['account_id' => $account]) }}" :sr-title="$account->name">Create Listing</x-buttons.a-secondary>
                            <x-buttons.a-primary href="{{ route('admin.accounts.show', $account) }}" :sr-title="$account->name">Show</x-buttons.a-primary>
                        </td>
                    </tr>
                @endforeach
            </x-elements.table>

            <div class="px-4 lg:px-0">
                {{ $accounts->render() }}
            </div>
        </x-cards.table>
    </form>
</x-layouts.admin>
