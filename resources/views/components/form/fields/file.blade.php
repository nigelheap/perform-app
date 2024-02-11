<?php
    $attr = array_merge(['class' => 'form-control'], (isset($attr) ? $attr : []));
?>
<div class="col-md-{{ isset($size) ? $size : 6 }}">
    <div class="form-group">
        {!! Form::label($name, $label . (!empty($required) ? ' *' : '')) !!}
        {!! Form::file($name, $attr) !!}
        @if(isset($help))
            <p class="help-block">{!! $help !!}</p>
        @endif
        @if($file)
            <p class="help-block">
                Current file:
                <a href="{{ url('files/'.$file->name) }}">{{ $file->name }}</a>
            </p>
        @endif
    </div>
</div>