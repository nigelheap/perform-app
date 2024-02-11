<div class="col-md-6">
    <div class="form-group">
        {!! Form::label($name, $label . (!empty($required) ? ' *' : '')) !!}
        {!! Form::select($name . '[]', $items, $selected, [
            'class' => 'form-control',
            'multiple' => true,
        ]) !!}
        @if(isset($help))
            <p class="help-block">{{ $help }}</p>
        @endif
    </div>
</div>