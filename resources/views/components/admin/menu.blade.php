@props([
    'stacked' => true,
])

<x-buttons.menu-item-sidebar
    href="{{ route('admin.dashboard') }}"
    icon="o-home"
    :stacked="$stacked"
    :active="request()->routeIs('admin.dashboard')">
    Home
</x-buttons.menu-item-sidebar>

<x-buttons.menu-item-sidebar
    href="{{ route('admin.cursos.index') }}"
    :stacked="$stacked"
    icon="o-swatch"
    :active="request()->routeIs('admin.cursos*')">
    Cursos
</x-buttons.menu-item-sidebar>

<x-buttons.menu-item-sidebar
    href="{{ route('admin.users.index') }}"
    :stacked="$stacked"
    icon="o-user-group"
    :active="request()->routeIs('admin.users*')">
    Users
</x-buttons.menu-item-sidebar>



@if(false)
    <x-buttons.menu-item-sidebar
        href="{{ route('admin.settings.general') }}"
        :stacked="$stacked"
        icon="o-cog-6-tooth">
        Settings
    </x-buttons.menu-item-sidebar>
@endif
