
@if($hasMessages)
    <div {!! $attributes->merge([]) !!}>
        @foreach ($messages as $type => $type_messages)
            <x-messages.list :messages="$type_messages" />
        @endforeach
    </div>
@endif
