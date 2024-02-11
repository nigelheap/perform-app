{{ Form::open(['route' => ['admin.listings.restore.confirm', $listing->id]]) }}
<x-cards.basic class="bg-amber-50">
    <div class="space-y-8 divide-y divide-gray-200">
        <div>
            <div>
                <h3 class="text-base font-semibold leading-6 text-gray-900">
                    <strong>{{ $listing->title }}</strong> is currently archived
                </h3>
                @if($listing->archived_at)
                <p class="mt-1 text-sm text-gray-500">It was archived {{ $listing->archived_at->diffForHumans() }}</p>
                @endif
                <p class="mt-1 text-sm text-gray-500">Clicking restore will re-initialise the listing on the consumer site</p>
            </div>

            <p></p>
        </div>
    </div>
    <x-slot:footer>
        <x-form.fields.submit-delete
            submit-button-text="Restore"
        />
    </x-slot:footer>
</x-cards.basic>
{{ Form::close() }}
