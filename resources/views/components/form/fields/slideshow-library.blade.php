<?php
    $attr = array_merge(['class' => 'form-control'], (isset($attr) ? $attr : []));
?>
<div class="col-md-{{ isset($size) ? $size : 12 }}">
    <div class="form-group">
        {!! Form::label($name, $label . (!empty($required) ? ' *' : '')) !!}
        <slideshow-library
                url="/upload"
                token="{{ csrf_token() }}"
                id="{{ $value }}"></slideshow-library>
    </div>
</div>