<x-cards.basic>
    <div class="space-y-8 divide-y divide-gray-200">

        <x-form.section
            title="Connection"
            class="pt-8 w-full"
            inner-classes="sm:grid-cols-1">

            @php($connected = \Illuminate\Support\Arr::has($token, 'access_token'))

            @if($connected)
            <pre class="font-mono p-4 bg-stone-100">{{ json_encode($token, JSON_PRETTY_PRINT) }}</pre>
            @endif

            <div>
                <x-buttons.a-primary href="{{ route('admin.settings.zoho.connect') }}">
                    {{ $connected ? 'Reconnect' : 'Connect' }} to ZohoCRM
                </x-buttons.a-primary>

                @if($connected)
                <x-buttons.a-secondary href="{{ route('admin.settings.zoho.disconnect') }}">
                    Disconnect
                </x-buttons.a-secondary>
                @endif
            </div>

        </x-form.section>


    </div>

</x-cards.basic>
