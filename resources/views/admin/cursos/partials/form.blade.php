<x-cards.basic>
    <div class="space-y-8 divide-y divide-gray-200">
        <x-form.section
            title="Information"
            desc="Simple details">

            <x-form.fields.text
                name="name"
                label="Nombre"
                autocomplete="off"
                :required="true"
            />

            <x-form.fields.datepicker
                name="expire_at"
                label="Fecha de entrega"
                :value="old('expire_at', isset($curso) ? $curso->expire_at->format('Y-m-d') : '')"
                autocomplete="off"
                :required="false"
            />

        </x-form.section>


    </div>
    <x-slot:footer>
        <x-form.fields.submit-delete
            :submit-button-text="$submitButtonText"
            :delete-link="(isset($deleteLink) ? $deleteLink : null)"
        />
    </x-slot:footer>
</x-cards.basic>
