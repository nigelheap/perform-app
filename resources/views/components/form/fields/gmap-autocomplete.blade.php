<?php
    if(isset($autocomplete)){
        $attr['autocomplete'] = $autocomplete;
    }

    if(isset($placeholder)){
        $attr['placeholder'] = $placeholder;
    }
    $attr = array_merge([
        'class' => 'form-control',
        'data-lpignore' => 'true',
    ], (isset($attr) ? $attr : []));
?>
<div class="col-md-{{ isset($size) ? $size : 6 }}">
    <div class="form-group">
        {!! Form::label($name, $label . (!empty($required) ? ' *' : '')) !!}
        <googlemap-picker
                name="location"
                value="{{ old($name, $value) }}"
                latlng="{{ old($name . '_latlng', $location_latlng) }}"
        ></googlemap-picker>
    </div>
</div>

