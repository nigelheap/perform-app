@props(['messages' => []])

@foreach ($messages as $message)
    <x-dynamic-component
        component="{{ 'messages.' . $message['type']}}"
        message="{{$message['message']}}" />
@endforeach
