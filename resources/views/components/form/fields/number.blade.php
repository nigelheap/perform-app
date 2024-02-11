<?php
$value = isset($value) ? $value : null;
?>
<div class="col-md-{{ isset($size) ? $size : 6 }}">
    <div class="form-group">
        {!! Form::label($name, $label . (!empty($required) ? ' *' : '')) !!}
        {!! Form::number($name, $value, [
            'class' => 'form-control',
            'type' => 'number',
            'step' => '1',
            'autocomplete' => 'off',
        ]) !!}
        @if(isset($help))
            <p class="help-block">{{ $help }}</p>
        @endif
    </div>
</div>
