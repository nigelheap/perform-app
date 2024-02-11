<x-cards.basic>
    <div class="space-y-8 divide-y divide-gray-200">
        <x-form.section
            title="Personal Information"
            desc="Details"
            class="w-full md:w-1/2"
            inner-classes="sm:grid-cols-1">
            <x-form.fields.text
                name="name"
                label="Name"
                autocomplete="off"
                :required="true"
            />

            <x-form.fields.text
                name="zohocrm_id"
                label="ZohoCRM ID"
                autocomplete="off"
                :required="false"
            />

            <x-form.fields.email
                name="approver_email"
                label="Approver Email"
                autocomplete="off"
                :required="false"
            />
        </x-form.section>

        <x-form.section title="Settings" desc="" class="pt-8" inner-classes="sm:grid-cols-1">
            <x-form.fields.selector
                name="users"
                label="Users"
                :current="old('users', isset($account) ? $account->users->pluck('id') : [])"
                :items="\App\Utilities\SelectValues::users()" />

        </x-form.section>


    </div>

    <x-slot:footer>
        <x-form.fields.submit-delete
            :submit-button-text="$submitButtonText"
            :delete-link="(isset($deleteLink) ? $deleteLink : null)"
        />

    </x-slot:footer>
</x-cards.basic>
