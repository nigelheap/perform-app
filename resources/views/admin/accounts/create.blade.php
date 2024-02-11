<x-layouts.admin>
    <x-slot:title>
        Add account
    </x-slot:title>
    {!! Form::open([
            'route' => 'admin.accounts.store',
            'files' => true,
        ]) !!}
    @include('admin.accounts.partials.form', ['submitButtonText' => 'Create account'])
    {!! Form::close() !!}
</x-layouts.admin>
