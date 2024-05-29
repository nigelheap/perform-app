<x-layouts.admin>
    <x-slot:title>
        Crear curso
    </x-slot:title>
    {!! Form::open([
            'route' => 'admin.cursos.store',
            'files' => true,
        ]) !!}
    @include('admin.cursos.partials.form', ['submitButtonText' => 'Crear curso'])
    {!! Form::close() !!}
</x-layouts.admin>
