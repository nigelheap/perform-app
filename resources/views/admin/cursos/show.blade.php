<x-layouts.admin>
    <x-slot:title>
        {{ $user->name }}
    </x-slot:title>

    <x-slot:actions>
        <x-buttons.a-primary href="{{ route('admin.users.edit', $user) }}">
            Edit
        </x-buttons.a-primary>
    </x-slot:actions>

    <x-elements.stats class="mb-4" title="">
        <x-elements.stat title="Email address" size="small">
            {{ $user->email }}
        </x-elements.stat>

        <x-elements.stat size="small">
            <x-slot:title>
                {{ Str::plural('Account', $user->accounts->count()) }}
                <span class="inline-flex items-center rounded border border-gray-200 px-1 font-sans text-xs text-gray-400">
                    {{ $user->accounts->count() }}
                </span>
            </x-slot:title>
            @foreach($user->accounts as $account)
                <div class="mt-1 flex items-center text-sm text-gray-900">
                    <span class="min-w-0 flex-1">
                        <p class="truncate text-sm font-medium text-gray-900">{{ $account->name }}</p>
                        <p class="truncate text-sm text-gray-500"></p>
                    </span>
                    <span>
                        <a href="{{ route('admin.accounts.show', $account) }}"
                           class="inline-flex items-center rounded-full bg-white px-2.5 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">View</a>
                    </span>
                </div>
            @endforeach
        </x-elements.stat>

        <x-elements.stat title="Listings">
            {{ $user->listings->count() }}
        </x-elements.stat>
    </x-elements.stats>

    <x-cards.table>
        <x-admin.partials.listing-table :listings="$user->listings" />
    </x-cards.table>

</x-layouts.admin>
