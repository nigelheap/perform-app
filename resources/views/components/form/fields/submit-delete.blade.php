@props([
    'submitType' => 'normal',
    'submitButtonText' => 'Submit',
    'deleteLink' => null,
])
@if($return = request('return', false))
    <input type="hidden" name="return" value="{{ $return }}">
@endif
<div class="flex justify-between items-center">
    <div class="flex gap-4">
        @if(!empty($goBackLink) && empty($deleteLink))
            <x-buttons.a-secondary :href="url($goBackLink)">Cancel</x-buttons.a-secondary>
        @endif
        @if(!empty($deleteLink))
            <x-buttons.a-secondary :href="url($deleteLink)">
                <x-heroicon-o-trash class="w-4 h-4" />
            </x-buttons.a-secondary>
        @endif
        @if(!empty($deactivateLink))
            <x-buttons.a-secondary
                :href="url($deactivateLink)"
                title="Archive">
                <x-heroicon-o-archive-box-arrow-down class="w-4 h-4" />
            </x-buttons.a-secondary>
        @endif
    </div>
    <div class="flex gap-4 items-center">
        @if(!empty($goBackLink) && !empty($deleteLink))
            <a href="{{ url($goBackLink) }}">
                Cancel Edit
            </a>
        @endif

        @if(!empty($submitNewButtonText))
            <x-buttons.button-standard name="add_new" type="submit">{{ $submitNewButtonText }}</x-buttons.button-standard>
        @endif

        @if($submitType === 'danger')
            <x-buttons.button-danger type="submit">{{ $submitButtonText }}</x-buttons.button-danger>
        @else
            <x-buttons.button-primary type="submit">{{ $submitButtonText }}</x-buttons.button-primary>
        @endif
    </div>
</div>
