<button {{ $attributes->merge([
    'class' => 'inline-flex rounded-md py-2 px-3 text-center text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 bg-region-gold hover:bg-region-gold-dark focus-visible:outline-region-forest'
]) }} class="">{{ $slot }}</button>
