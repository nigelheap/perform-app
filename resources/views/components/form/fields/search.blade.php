<div class="flex flex-wrap flex-row gap-4">
    <label for="search" class="block text-sm font-medium leading-6 text-gray-900 sr-only">Quick search</label>
    <div class="relative flex items-center">
        <input type="text"
               name="search"
               id="search"
               placeholder="search..."
               class="block w-full rounded-md border-0 py-1.5 pr-14 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-region-forest sm:text-sm sm:leading-6"
               value="{{ request()->get('search') }}"
        >
    </div>
    <button
        type="submit"
        class="inline-flex items-center rounded-md border-gray-200 text-white bg-region-night-dark py-2 px-3 text-center text-sm font-semibold shadow-sm hover:bg-region-night-dark focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-region-forest transition ease-in-out duration-150">
        Search
    </button>
    <a
        href="{{ url()->current() }}"
        class="inline-flex items-center rounded-md border-gray-200 text-gray-400 bg-white py-2 px-3 text-center text-sm font-semibold shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-region-forest transition ease-in-out duration-150">
        Reset
    </a>
</div>
