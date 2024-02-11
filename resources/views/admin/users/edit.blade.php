<x-layouts.admin>
    <x-slot:title>
        Edit: <a href="{{ route('admin.users.show', $user->id) }}">{{ $user->name }}</a>
    </x-slot:title>

    {!! Form::model($user, [
        'route' => ['admin.users.update', $user->id],
        'method' => 'PATCH',
        'files' => true,
        'autocomplete' => 'off'
    ]) !!}

    @include('admin.users.partials.form', [
        'submitButtonText' => 'Save User',
        'deleteLink' => route('admin.users.delete', $user->id)
    ])

    {!! Form::close() !!}
</x-layouts.admin>
