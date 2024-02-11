<div class="col-md-{{ isset($size) ? $size : 12 }}">
    <div class="row">
        <div class="col-md-12">
            @if(isset($title))
            <h4>{{ $title }}</h4>
            @endif
            <location-distance-limits
                name="{!! $name !!}"></location-distance-limits>
        </div>
    </div>
    @if(isset($help))
        <p class="help-block">{{ $help }}</p>
    @endif
</div>
@push('script-data')
        storage.{!! $name !!} = {};
        storage.{!! $name !!}.attractions = {!! '' . json_encode($attractions) . '' !!};
        storage.{!! $name !!}.value = {!! '' . json_encode((isset($value) ? $value : []), JSON_NUMERIC_CHECK) . '' !!};
@endpush
