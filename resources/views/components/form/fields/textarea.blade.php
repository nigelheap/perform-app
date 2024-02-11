@php($hasErrors = $errors->has($attributes->get('name')))
@php($extraClasses = $hasErrors ? 'text-red-900 ring-red-300 placeholder:text-red-300 focus:ring-red-500' : 'text-stone-900 ring-stone-300 placeholder:text-stone-400 focus:ring-region-forest')
<x-form.fields.field {{ $attributes }}>
    {!! Form::textarea($attributes->get('name'), $attributes->get('value'), [
        'class' => 'block w-full rounded-md border-0 py-1.5 pr-10 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 ' . $extraClasses,
        'required' => $attributes->get('required', false),
        'readonly' => $attributes->get('readonly'),
        'autocomplete' => $attributes->get('autocomplete'),
        'aria-invalid' => $hasErrors ? 'true' : 'false',
        'aria-describedby' => $attributes->get('name') . ($hasErrors ? '-error' : '-description'),
    ]) !!}
</x-form.fields.field>
