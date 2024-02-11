<x-layouts.admin>
    <x-slot:title>
        Staff comments
    </x-slot:title>
    <form action="" method="get">
        <x-cards.table>
            <x-slot:filters>
                <x-form.fields.search />
            </x-slot:filters>
            <x-slot:buttons>
                <x-buttons.a-primary href="{{ route('admin.staff-comments.create') }}">Add staff comment</x-buttons.a-primary>
            </x-slot:buttons>

            <x-admin.partials.staff-comments-table
                :show-listing="true"
                :staff-comments="$staffComments" />

            <div class="px-4 lg:px-0">
                {{ $staffComments->render() }}
            </div>
        </x-cards.table>
    </form>
</x-layouts.admin>
