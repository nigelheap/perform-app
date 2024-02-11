{!! Form::open([
    'route' => ['admin.settings.' . $group . '.save'],
    'method' => 'POST',
]) !!}
    <x-cards.basic>
        <div class="space-y-8 divide-y divide-gray-200">
            <x-form.section
                title="General"
                desc=""
                class="pt-8 w-full"
                inner-classes="sm:grid-cols-1">
                <x-form.fields.link-list
                    :wrapper="false"
                    name="console_menu"
                    label="Console Menu"
                    :items="old('console_menu', $console_menu)" />
            </x-form.section>
        </div>

        <x-slot:footer>
            <x-form.fields.submit-delete
                :submit-button-text="$submitButtonText"
                :delete-link="(isset($deleteLink) ? $deleteLink : null)"
            />
        </x-slot:footer>
    </x-cards.basic>
{!! Form::close() !!}
