@props([
    'items' => [],
])
@php($hasErrors = $errors->has($attributes->get('name')))
@php($name = $attributes->get('name'))
@php($extraClasses = $hasErrors ? 'text-red-900 ring-red-300 placeholder:text-red-300 focus:ring-red-500' : 'text-gray-900 ring-gray-300 placeholder:text-gray-400 focus:ring-indigo-600')
<x-form.fields.field {{ $attributes }}>

    <link-list-field
        name="{{ $name }}"></link-list-field>
</x-form.fields.field>
@push('script-data')
    window.storage.{{ $name }} = {};
    window.storage.{{ $name }}.options = {!! '' . json_encode($items) . '' !!};
@endpush
