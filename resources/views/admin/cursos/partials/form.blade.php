<x-cards.basic>
    <div class="space-y-8 divide-y divide-gray-200">
        <x-form.section
            title="Personal Information"
            desc="Simple details">

            <x-form.fields.text
                name="first_name"
                label="First Name"
                autocomplete="off"
                :required="true"
            />

            <x-form.fields.text
                name="last_name"
                label="Last Name"
                autocomplete="off"
                :required="true"
            />

            <x-form.fields.email
                name="email"
                label="Email"
                autocomplete="off"
                :required="true"
            />
        </x-form.section>

        <x-form.section
            title="Access"
            desc="Pick a secure password"
            class="pt-8">

            <x-form.fields.password
                name="password"
                label="Password"
                autocomplete="off"
                :required="false"
            />

            <x-form.fields.password
                name="password_confirmation"
                label="Password Confirm"
                autocomplete="off"
                :required="false"
            />
        </x-form.section>

        <x-form.section title="Settings" desc="" class="pt-8" inner-classes="sm:grid-cols-1">
            <x-form.fields.selector
                name="cursos"
                label="Cursos"
                :current="old('cursos', isset($user) && $user?->cursos ? $user?->cursos->pluck('id') : [])"
                :items="\App\Utilities\SelectValues::cursos()" />

            @super
            <x-form.fields.field name="role" label="Role">
                @foreach(\App\Enumeration\UserRoles::cases() as $role)
                    <div class="radio">
                        <label>
                            {!! Form::radio('role', $role->value, [], [
                                'checked' => (isset($user) && $user->hasRole($role->value) ? true : false)
                            ]); !!}
                            {!! $role->value !!}
                        </label>
                    </div>
                @endforeach
            </x-form.fields.field>
            @endsuper
        </x-form.section>
    </div>
    <x-slot:footer>
        <x-form.fields.submit-delete
            :submit-button-text="$submitButtonText"
            :delete-link="(isset($deleteLink) ? $deleteLink : null)"
        />
    </x-slot:footer>
</x-cards.basic>
