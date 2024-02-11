<a {{ $attributes->merge([
    'class' => 'inline-flex gap-2 items-center rounded-md bg-region-gold py-2 px-3 text-center text-sm font-semibold text-white shadow-sm hover:bg-region-night-dark focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-region-forest transition ease-in-out duration-150'
]) }} class="">{{ $slot }}</a>
