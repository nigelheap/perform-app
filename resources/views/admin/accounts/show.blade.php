<x-layouts.admin>
    <x-slot:title>
        {{ $account->name }}
    </x-slot:title>

    <x-slot:actions>
        <x-buttons.a-primary href="{{ route('admin.accounts.edit', $account) }}">
            Edit
        </x-buttons.a-primary>
    </x-slot:actions>

    <x-elements.stats class="mb-4" title="">

        <x-elements.stat size="small">
            <x-slot:title>
                {{ Str::plural('User', $account->users->count()) }}
                <span class="inline-flex items-center rounded border border-gray-200 px-1 font-sans text-xs text-gray-400">
                    {{ $account->users->count() }}
                </span>
            </x-slot:title>
            @foreach($account->users as $user)
                <div class="mt-1 flex items-center text-sm text-gray-900">
                    <span class="min-w-0 flex-1">
                        <p class="truncate text-sm font-medium text-gray-900">{{ $user->name }}</p>
                        <p class="truncate text-sm text-gray-500"></p>
                    </span>
                    <span>
                        <a
                            class="inline-flex items-center rounded-full bg-white px-2.5 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                            href="{{ route('admin.users.impersonate', $user) }}"
                            sr-title="{{ $user->name }}">Impersonate</a>
                        <a href="{{ route('admin.users.show', $user) }}"
                           class="inline-flex items-center rounded-full bg-white px-2.5 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">View</a>
                    </span>
                </div>
            @endforeach
        </x-elements.stat>

        <x-elements.stat title="Listings">
            {{ $account->listings->count() }}
        </x-elements.stat>
    </x-elements.stats>

    <x-cards.table>
        <x-admin.partials.listing-table :listings="$account->listings" />
    </x-cards.table>

</x-layouts.admin>
