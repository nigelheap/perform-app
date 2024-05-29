<x-layouts.admin>
    <x-slot:title>
        Editar: <a href="{{ route('admin.cursos.show', $curso->id) }}">{{ $curso->name }}</a>
    </x-slot:title>

    {!! Form::model($curso, [
        'route' => ['admin.cursos.update', $curso->id],
        'method' => 'PATCH',
        'files' => true,
        'autocomplete' => 'off'
    ]) !!}

    @include('admin.cursos.partials.form', [
        'submitButtonText' => 'Guarda curso',
        'deleteLink' => route('admin.cursos.delete', $curso->id)
    ])

    {!! Form::close() !!}
</x-layouts.admin>
