@props([
    'labelBy' => 'name',
    'trackBy' => 'id',
    'items' => [],
    'current' => [],
    'multiple' => true,
    'required' => false,
])
@php
    if(isset($empty)){
        if($items instanceof \Illuminate\Support\Collection){
            if(is_array($empty)){
                $items->prepend($empty);
            } else {
                $items->prepend($empty, 0);
            }
        }
    } elseif(isset($empty) && is_array($items)){
        $items = [0 => $empty] + $items;
    }

    $multiple = $multiple ? 'true' : 'false';
    $required = $required ? 'true' : 'false';
@endphp
@php($hasErrors = $errors->has($attributes->get('name')))
@php($name = $attributes->get('name'))
@php($extraClasses = $hasErrors ? 'text-red-900 ring-red-300 placeholder:text-red-300 focus:ring-red-500' : 'text-gray-900 ring-gray-300 placeholder:text-gray-400 focus:ring-indigo-600')
<x-form.fields.field {{ $attributes }}>
    <selector
        name="{{ $name }}"
        label="{{ $labelBy }}"
        track-by="{{ $trackBy }}"
        :multiple="{{ $multiple }}"
        :required="{{ $required }}"></selector>
</x-form.fields.field>
@push('script-data')
    window.storage.{{ $name }} = {};
    window.storage.{{ $name }}.options = {!! '' . json_encode($items) . '' !!};
    window.storage.{{ $name }}.current = {!! '' . json_encode((isset($current) ? $current : []), JSON_NUMERIC_CHECK) . '' !!};
@endpush
