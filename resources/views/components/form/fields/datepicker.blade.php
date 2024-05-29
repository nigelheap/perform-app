<?php
    if(isset($autocomplete)){
        $attr['autocomplete'] = $autocomplete;
    }
    $attr = array_merge(['class' => 'form-control'], (isset($attr) ? $attr : []));
    $value = $value ?? '';
?>
<div class="col-md-{{ isset($size) ? $size : 6 }}">
    <div class="form-group">
        {!! Form::label($name, $label . (!empty($required) ? ' *' : '')) !!}
        <date-picker name="{{ $name }}" value="{{ old($name, Form::getValueAttribute($name, $value)) }}"></date-picker>
        @if(isset($help))
            <p class="help-block">{!! $help !!}</p>
        @endif
    </div>
</div>
