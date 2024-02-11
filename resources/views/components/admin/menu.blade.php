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
    href="{{ route('admin.listings.index') }}"
    :stacked="$stacked"
    icon="o-squares-2x2"
    :active="request()->routeIs('admin.listings*')">
    Listings
</x-buttons.menu-item-sidebar>

<x-buttons.menu-item-sidebar
    href="{{ route('admin.staff-comments.index') }}"
    :stacked="$stacked"
    icon="o-chat-bubble-bottom-center-text"
    :active="request()->routeIs('admin.staff-comments*')">
    Staff comments
</x-buttons.menu-item-sidebar>

<x-buttons.menu-item-sidebar
    href="{{ route('admin.accounts.index') }}"
    :stacked="$stacked"
    icon="o-building-storefront"
    :active="request()->routeIs('admin.accounts*')">
    Accounts
</x-buttons.menu-item-sidebar>

<x-buttons.menu-item-sidebar
    href="{{ route('admin.users.index') }}"
    :stacked="$stacked"
    icon="o-user-group"
    :active="request()->routeIs('admin.users*')">
    Users
</x-buttons.menu-item-sidebar>

<x-buttons.menu-item-sidebar
    href="{{ route('admin.settings.general') }}"
    :stacked="$stacked"
    icon="o-cog-6-tooth">
    Settings
</x-buttons.menu-item-sidebar>

@if(false)
    <x-buttons.menu-item-sidebar
        href="{{ route('admin.dashboard') }}"
        :stacked="$stacked"
        icon="o-cog-6-tooth">
        Settings
    </x-buttons.menu-item-sidebar>
@endif
