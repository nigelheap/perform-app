<div class="sm:flex gap-4">
    <label for="status" class="block text-sm font-medium leading-6 text-gray-900 sr-only">Status</label>
    <div class="relative flex items-center">
        <select
            name="status"
            id="status"
            class="block w-full md:w-32 rounded-md border-0 py-1.5 pr-14 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-region-forest sm:text-sm sm:leading-6"
        >
            <option value="">-- status --</option>
            @foreach(\App\Enums\ListingStatuses::cases() as $status)
                <option value="{{ $status->value }}" {{ request()->get('status') == $status->value ? 'selected' : '' }}>{{ ucfirst($status->value) }}</option>
            @endforeach
        </select>
    </div>
</div>
