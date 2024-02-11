@props([
    'items' => [],
    'current' => [],
    'multiple' => true,
    'required' => false,
])
@php
    $multiple = $multiple ? 'true' : 'false';
    $required = $required ? 'true' : 'false';
@endphp
@php($hasErrors = $errors->has($attributes->get('name')))
@php($name = $attributes->get('name'))
@php($extraClasses = $hasErrors ? 'text-red-900 ring-red-300 placeholder:text-red-300 focus:ring-red-500' : 'text-gray-900 ring-gray-300 placeholder:text-gray-400 focus:ring-indigo-600')
<x-form.fields.field {{ $attributes }}>
    <zoho-entity
        name="{{ $name }}"
        module="Accounts"
        field-display="Account_Name"
        :multiple="{{ $multiple }}"></zoho-entity>
</x-form.fields.field>
@push('script-data')
    window.storage.{{ $name }} = {};
    window.storage.{{ $name }}.options = @json($items);
    window.storage.{{ $name }}.current = {!! '' . json_encode((isset($current) ? $current : '')) . '' !!};
@endpush
