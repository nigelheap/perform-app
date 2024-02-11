<div class="sm:flex gap-4">
    <label for="status" class="block text-sm font-medium leading-6 text-gray-900 sr-only">CRM Status</label>
    <div class="relative flex items-center">
        <select
            name="crm"
            id="crm"
            class="block w-full md:w-48 rounded-md border-0 py-1.5 pr-14 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-region-forest sm:text-sm sm:leading-6"
        >
            <option value="">-- crm status --</option>
            <option value="connected" {{ request()->get('crm') == 'connected' ? 'selected' : '' }}>Connected</option>
            <option value="disconnected" {{ request()->get('crm') == 'disconnected' ? 'selected' : '' }}>Disconnected</option>
        </select>
    </div>
</div>
