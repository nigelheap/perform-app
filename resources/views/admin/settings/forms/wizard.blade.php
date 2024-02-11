{!! Form::open([
    'route' => ['admin.settings.' . $group . '.save'],
    'method' => 'POST',
]) !!}
    <x-cards.basic>
        <div class="space-y-8 divide-y divide-gray-200">
            <x-form.section
                title="General"
                class="pt-8 w-full"
                inner-classes="sm:grid-cols-1">

                <x-form.fields.select
                    name="features"
                    :items="[
                        'all' => 'All tags',
                        'underscore' => 'Only underscore tags',
                        'exclude_underscore' => 'Exclude underscore tags',
                    ]"
                    label="Features"
                    :value="old('features', $features)" />

                <x-form.fields.checkbox
                    name="show_facilities"
                    label="Show Facilities"
                    :checked="old('show_facilities', $show_facilities)" />

                <x-form.fields.selector
                    :items="$show_only_options"
                    name="show_only"
                    track-by="value"
                    label-by="name"
                    desc="List of categories, tags or facilities, comma seperated, case insensative."
                    label="Show only"
                    :current="old('show_only', $show_only)" />

            </x-form.section>

            <x-form.section
                title="Facilities"
                class="pt-8 w-full"
                inner-classes="sm:grid-cols-1">

                <x-form.fields.text
                    name="facilities_heading"
                    label="Heading"
                    :value="old('facilities_heading', $facilities_heading)" />

                <x-form.fields.wysiwyg
                    name="facilities_description"
                    label="Content"
                    :value="old('facilities_description', $facilities_description)" />

            </x-form.section>

            <x-form.section
                title="Features"
                class="pt-8 w-full"
                inner-classes="sm:grid-cols-1">

                <x-form.fields.text
                    name="features_heading"
                    label="Heading"
                    :value="old('features_heading', $features_heading)" />

                <x-form.fields.wysiwyg
                    name="features_description"
                    label="Content"
                    :value="old('features_description', $features_description)" />

            </x-form.section>

            <x-form.section
                title="Thank you"
                class="pt-8 w-full"
                inner-classes="sm:grid-cols-1">

                <x-form.fields.text
                    name="thank_you_heading"
                    label="Heading"
                    :value="old('thank_you_heading', $thank_you_heading)" />

                <x-form.fields.wysiwyg
                    name="thank_you_page"
                    label="Content"
                    :value="old('thank_you_page', $thank_you_page)" />

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
