<x-layouts.admin>
    <x-slot:title>
        Edit: <a href="{{ route('admin.accounts.show', $account) }}">{{ $account->name }}</a>
    </x-slot:title>


    {!! Form::model($account, [
        'route' => ['admin.accounts.update', $account],
        'method' => 'PATCH',
        'files' => true,
        'autocomplete' => 'off'
    ]) !!}

    @include('admin.accounts.partials.form', [
       'submitButtonText' => 'Save account',
       'deleteLink' => route('admin.accounts.delete', $account)
   ])

    {!! Form::close() !!}
</x-layouts.admin>
