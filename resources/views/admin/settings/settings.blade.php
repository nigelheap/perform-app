<x-layouts.admin>
    <x-slot:title>
        {{ ucfirst($group) }} settings
    </x-slot:title>

    <x-slot:column>
        <nav class="flex flex-1 flex-col m-4" aria-label="Sidebar">
            <ul role="list" class="-mx-2 space-y-1">
                <li>
                    <a href="{{ route('admin.settings.general') }}"
                        @class([
                            'group flex justify-between rounded-md p-2 text-sm leading-6 font-semibold',
                            'bg-gray-50 text-indigo-600' => request()->routeIs('admin.settings.general'),
                            'text-gray-700 hover:text-indigo-600 hover:bg-gray-50' => !request()->routeIs('admin.settings.general'),
                        ])>
                        General
                        <x-heroicon-o-chevron-right class="h-6 w-6 text-gray-400 group-hover:text-indigo-600" />
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.settings.wizard') }}"
                        @class([
                            'group flex justify-between rounded-md p-2 text-sm leading-6 font-semibold',
                            'bg-gray-50 text-indigo-600' => request()->routeIs('admin.settings.wizard'),
                            'text-gray-700 hover:text-indigo-600 hover:bg-gray-50' => !request()->routeIs('admin.settings.wizard'),
                        ])>
                        Wizard
                        <x-heroicon-o-chevron-right class="h-6 w-6 text-gray-400 group-hover:text-indigo-600" />
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.settings.zoho') }}"
                        @class([
                            'group flex justify-between rounded-md p-2 text-sm leading-6 font-semibold',
                            'bg-gray-50 text-indigo-600' => request()->routeIs('admin.settings.zoho'),
                            'text-gray-700 hover:text-indigo-600 hover:bg-gray-50' => !request()->routeIs('admin.settings.zoho'),
                        ])>
                        Zoho
                        <x-heroicon-o-chevron-right class="h-6 w-6 text-gray-400 group-hover:text-indigo-600" />
                    </a>
                </li>
            </ul>
        </nav>
    </x-slot:column>

    @include('admin.settings.forms.'  . $group, [
        'group' => $group,
        'submitButtonText' => 'Save settings',
   ])
</x-layouts.admin>
