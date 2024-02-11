@if(!is_null($listing->archived_at))
    <span class="inline-flex items-center rounded border border-amber-800 bg-amber-50 text-amber-800 px-1 font-sans">
        Archived
    </span>
@elseif($listing->active)
    <span class="inline-flex items-center rounded border
    {{ $listing->status === \App\Enums\ListingStatuses::PUBLISHED->value ? 'border-emerald-700 bg-emerald-50 text-emerald-700' : 'border-yellow-800 bg-yellow-50 text-yellow-800' }}
    px-1 font-sans text-gray-500">
        {{ $listing->status }}
    </span>
@else
    <span class="inline-flex items-center rounded border border-red-800 px-1 font-sans bg-red-50 text-red-500">
        Inactive
    </span>
@endif
