<button {{ $attributes->merge([
    'class' => 'inline-flex rounded-md py-2 px-3 text-center text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 bg-brand-blue hover:bg-brand-blue/80 focus-visible:outline-brand-orange'
]) }} class="">{{ $slot }}</button>
