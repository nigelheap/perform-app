<date-range-filter
    name="{!! $name !!}"
></date-range-filter>
@push('script-data')
    window.storage.{!! $name !!} = {};
    window.storage.{!! $name !!}.data = {!! json_encode([
        'type' => Request::get($name, ''),
        'start_date' => Request::get($name . "_start_date", ''),
        'end_date' => Request::get($name . "_end_date", ''),
    ]) !!};
@endpush
