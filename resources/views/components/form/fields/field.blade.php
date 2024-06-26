@props([
    'type' => 'text',
    'name',
    'label',
    'value' => null,
    'desc' => null,
    'placeholder' => '',
    'autocomplete' => '',
    'required' => false,
    'readonly' => false,
    'showLabel' => true,
    'wrapper' => true,
])
@php($hasErrors = $errors->has($name))
@php($wrapperClass = $wrapper ? 'pb-2' : '')
@php($extraClasses = $hasErrors ? 'text-red-900 ring-red-300 placeholder:text-red-300 focus:ring-red-500' : 'text-gray-900 ring-gray-300 placeholder:text-gray-400 focus:ring-indigo-600')
<div>
    @if($showLabel)
    {!! Form::label(
        $name, $label . (!empty($required) ? ' *' : ''),  [
            'class' => 'block text-sm font-medium leading-6 text-gray-900'
        ]) !!}
    @endif
    <div class="relative mt-2 {{ $wrapperClass }}">
        {{ $slot }}
        @error($name)
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
            <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
            </svg>
        </div>
        @enderror
    </div>
    @if($desc)
        <p class="mt-2 text-sm text-gray-500" id="email-description">{{ $desc }}</p>
    @endif
    @error($name)
    <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
    @enderror
</div>
