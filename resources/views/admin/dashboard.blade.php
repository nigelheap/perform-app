<x-layouts.admin>
    <x-elements.stats class="mb-8">
        <x-elements.stat title="Total Cursos">
            {{ number_format(\App\Models\Curso::count()) }}
        </x-elements.stat>

        <x-elements.stat title="Total Usarios">
            {{ number_format(\App\Models\User::count()) }}
        </x-elements.stat>

    </x-elements.stats>

    <x-cards.table>
        <x-slot:title>
            Pending Members
            <span class="inline-flex items-center rounded border border-gray-200 px-1 font-sans text-xs text-stone-400">
                {{ $pendingUsers->count() }}
            </span>
        </x-slot:title>
        <x-elements.table>
            @foreach($pendingUsers as $pendingUser)
                <tr>
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                        <div class="flex flex-col gap-1">
                            <span>{!! $pendingUser->name !!}</span>
                        </div>
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">

                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        <span class="inline-flex items-center rounded bg-brand-blue border border-region-night-dark px-1 font-sans text-white">
                            {{ $pendingUser->role }}
                        </span>
                    </td>
                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right justify-end text-sm flex gap-2 font-medium sm:pr-6">
                        <x-buttons.a-primary href="{{ route('admin.users.accept', $pendingUser) }}" :sr-title="$pendingUser->name">Aceptar</x-buttons.a-primary>
                        <x-buttons.a-secondary href="{{ route('admin.users.reject', $pendingUser) }}" :sr-title="$pendingUser->name">Rechazar</x-buttons.a-secondary>
                    </td>
                </tr>
            @endforeach
        </x-elements.table>
    </x-cards.table>

</x-layouts.admin>
