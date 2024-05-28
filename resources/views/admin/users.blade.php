<x-layouts.admin>
    <form action="" method="get">
        <x-cards.table>
            <x-slot:filters>
                <x-form.fields.search />
            </x-slot:filters>
            <x-slot:buttons>
                <x-buttons.a-primary href="{{ route('admin.users.create') }}">Agregar usuario</x-buttons.a-primary>
            </x-slot:buttons>
            <x-elements.table class="mb-4">
                <x-slot:head>
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Nombre</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 hidden lg:table-cell">Email</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 hidden lg:table-cell">Role</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </x-slot:head>
                @foreach($users as $user)
                    <tr>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                            <div class="flex flex-col gap-1">
                                <span><a href="{{ route('admin.users.show', $user) }}">{!! $user->name !!}</a></span>
                                <span class="text-xs text-neutral-700">
                                    <span class="inline-flex items-center rounded border border-gray-200 px-1 font-sans text-xs text-gray-400">
                                        {{ $user->cursos_count }} {{ Str::plural('curso', $user->cursos_count) }}
                                    </span>
                                </span>
                            </div>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 hidden lg:table-cell">
                            {{ $user->email }}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 hidden lg:table-cell">
                            <span class="inline-flex items-center rounded border border-gray-200 px-1 font-sans text-gray-400">
                                {{ $user->role }}
                            </span>
                        </td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <div class="flex gap-2">
                                <x-buttons.a-secondary
                                    href="{{ route('admin.users.edit', $user) }}"
                                    :sr-title="$user->name">Editar</x-buttons.a-secondary>
                                <x-buttons.a-primary
                                    href="{{ route('admin.users.show', $user) }}"
                                    :sr-title="$user->name">Mostrar</x-buttons.a-primary>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-elements.table>

            <div class="px-4 lg:px-0">
                {{ $users->links() }}
            </div>
        </x-cards.table>
    </form>
</x-layouts.admin>
