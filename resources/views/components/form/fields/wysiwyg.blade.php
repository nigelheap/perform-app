@php($hasErrors = $errors->has($attributes->get('name')))
@php($extraClasses = $hasErrors ? 'text-red-900 ring-red-300 placeholder:text-red-300 focus:ring-red-500 pr-10 sm:leading-6' : 'text-gray-900 ring-gray-300 placeholder:text-gray-400 focus:ring-region-forest')
<x-form.fields.field {{ $attributes }}>
    <wysiwyg
        name="{!! $name !!}"
        html="{{ old($name, $value) }}"
        label="{!! $label !!}"></wysiwyg>
</x-form.fields.field>
@push('script-data')
        storage.{!! $name !!} = {};
        storage.{!! $name !!} = {!! json_encode(['content' => old($name, $value)]) !!};
@endpush
