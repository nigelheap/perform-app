@props([
    'checked' => false,
    'label',
    'name',
    'value' => 1,
    'required' => false,
])
@php($hasErrors = $errors->has($attributes->get($name)))
@php($extraClasses = $hasErrors ? 'text-red-900 ring-red-300 placeholder:text-red-300 focus:ring-red-500' : 'text-stone-900 ring-stone-300 placeholder:text-stone-400 focus:ring-region-forest')
<x-form.fields.field {{ $attributes }} :name="$name" :show-label="false">
    <div class="checkbox">
        <label class="flex items-center gap-2">
            {!! Form::checkbox($name, $value, $checked, [
                'class' => 'h-4 w-4 rounded border-gray-300 text-region-forest focus:ring-region-forest'
            ]) !!}
            {{ $label . (!empty($required) ? ' *' : '') }}
        </label>
    </div>
</x-form.fields.field>
