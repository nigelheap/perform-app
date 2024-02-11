<div {{ $attributes }}>
    @if($errors->any())
        <x-messages.warning>
            <x-slot name="message">
                <ul class="space-y-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-slot>
        </x-messages.warning>
    @endif
</div>
