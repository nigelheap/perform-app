<?php
    if(isset($empty) && $items instanceof \Illuminate\Database\Eloquent\Collection){
        $items->prepend($empty, 0);
    } elseif(isset($empty) && is_array($items)){
        $items = [0 => $empty] + $items;
    }
?>
<div class="col-md-{{ isset($size) ? $size : 12 }}">
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                @if(isset($title))
                <h4>{{ $title }}</h4>
                @endif
                <tagger
                    name="{!! $name !!}"
                    label="{!! $label !!}"></tagger>
            </div>
        </div>
        @if(isset($help))
            <p class="help-block">{{ $help }}</p>
        @endif
    </div>
</div>
@push('script-data')
        storage.{!! $name !!} = {};
        storage.{!! $name !!}.options = {!! '' . json_encode($items) . '' !!};
        storage.{!! $name !!}.currentOptions = {!! '' . json_encode((isset($current) ? $current : [])) . '' !!};
@endpush
