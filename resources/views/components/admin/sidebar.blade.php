<!-- Narrow sidebar overflow-y-auto -->
<div class="hidden w-28 bg-brand-blue md:block relative">
    <div class="flex w-full flex-col items-center py-6 sticky top-0">
        <div class="flex flex-shrink-0 items-center">
            <img class="h-12 w-auto text-white" src="/images/logo.svg" alt="logo">
        </div>
        <div class="mt-6 w-full flex-1 space-y-1 px-2">
            <x-admin.menu :stacked="true"></x-admin.menu>
        </div>
    </div>
</div>
