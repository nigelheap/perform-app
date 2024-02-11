@php($hasErrors = $errors->has($attributes->get('name')))
@php($extraClasses = $hasErrors ? 'text-red-900 ring-red-300 placeholder:text-red-300 focus:ring-red-500 pr-10 sm:leading-6' : 'text-gray-900 ring-gray-300 placeholder:text-gray-400 focus:ring-region-forest')
<x-form.fields.field {{ $attributes }}>
    {!! Form::input($attributes->get('type', 'text'), $attributes->get('name'), $attributes->get('value'), [
        'class' => 'block w-full rounded-md border-0 py-2 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm ' . $extraClasses,
        'required' => $attributes->get('required', false),
        'readonly' => $attributes->get('readonly'),
        'autocomplete' => $attributes->get('autocomplete'),
        'placeholder' => $attributes->get('placeholder'),
        'aria-invalid' => $hasErrors ? 'true' : 'false',
        'aria-describedby' => $attributes->get('name') . ($hasErrors ? '-error' : '-description'),
    ]) !!}
</x-form.fields.field>
