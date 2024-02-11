<x-layouts.admin page-title="Listings" title="Listings">
    <form action="" method="get">
        <x-cards.table>
            <x-slot:buttons>
                <x-buttons.a-secondary target="_blank" href="{{ route('admin.listings.export') }}">Export Listings (.xlsx)</x-buttons.a-secondary>
                <x-buttons.a-primary href="{{ route('admin.listings.create') }}">Add Listing</x-buttons.a-primary>
            </x-slot:buttons>

            <x-slot:filters>
                <x-form.fields.filter-accounts />
                <x-form.fields.filter-statuses />
                <x-form.fields.filter-crm />
                <x-form.fields.search />
            </x-slot:filters>

            <x-admin.partials.listing-table :listings="$listings" />

            <div class="px-4 lg:px-0">
                {{ $listings->render() }}
            </div>
        </x-cards.table>
    </form>
</x-layouts.admin>
