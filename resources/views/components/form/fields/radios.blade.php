@props([
    'label',
    'name',
    'required' => false,
    'items' => [],
])
@php
    if(isset($empty) && $items instanceof \Illuminate\Database\Eloquent\Collection){
        $items->prepend($empty, 0);
    } elseif(isset($empty) && is_array($items)){
        $items = [0 => $empty] + $items;
    }
@endphp
@php($hasErrors = $errors->has($attributes->get($name)))
@php($extraClasses = $hasErrors ? 'text-red-900 ring-red-300 placeholder:text-red-300 focus:ring-red-500' : 'text-stone-900 ring-stone-300 placeholder:text-stone-400 focus:ring-region-forest')
<x-form.fields.field {{ $attributes }} :name="$name" :label="$label">
    @foreach($items as $key => $label)
    <div class="checkbox">
        <label class="flex items-center gap-2">
            {!! Form::radio($name, $key, null, [
                'class' => 'h-4 w-4 rounded-full border-gray-300 text-region-forest focus:ring-region-forest'
            ]) !!}
            {{ $label }}
        </label>
    </div>
    @endforeach
</x-form.fields.field>
