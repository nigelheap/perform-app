<x-layouts.admin>
    <x-slot:title>
        Delete: {{ $account->name }}
    </x-slot:title>

    {{ Form::open(['route' => ['admin.accounts.destroy', $account->id], 'method' => 'delete']) }}
    <x-cards.basic>
        <div class="space-y-8 divide-y divide-gray-200">
            <div>
                <div>
                    <h3 class="text-base font-semibold leading-6 text-gray-900">
                        Delete <strong>{{ $account->name }}</strong>
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">Are you sure?</p>
                </div>
            </div>
        </div>
        <x-slot:footer>
            <x-form.fields.submit-delete
                :go-back-link="route('admin.accounts.edit', $account)"
                submit-button-text="Delete"
                submit-type="danger"
            />
        </x-slot:footer>
    </x-cards.basic>
    {{ Form::close() }}
</x-layouts.admin>
