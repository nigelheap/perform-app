<x-layouts.admin>
    <x-slot:title>
        Add user
    </x-slot:title>
    {!! Form::open([
            'route' => 'admin.users.store',
            'files' => true,
        ]) !!}
    @include('admin.users.partials.form', ['submitButtonText' => 'Create User'])
    {!! Form::close() !!}
</x-layouts.admin>
