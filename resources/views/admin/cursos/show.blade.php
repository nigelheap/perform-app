<x-layouts.admin>
    <x-slot:title>
        {{ $curso->name }}
    </x-slot:title>

    <x-slot:actions>
        <x-buttons.a-primary href="{{ route('admin.cursos.edit', $curso) }}">
            Editar
        </x-buttons.a-primary>
    </x-slot:actions>

    <x-elements.stats class="mb-4" title="">
        <x-elements.stat title="Users" size="small">
            {{ $curso->users()->count() }}
        </x-elements.stat>


    </x-elements.stats>

    <x-cards.table>
    </x-cards.table>

</x-layouts.admin>
