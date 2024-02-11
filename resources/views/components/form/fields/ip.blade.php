<div class="col-md-{{ isset($size) ? $size : 6 }}">
    <div class="form-group">
        {!! Form::label($name, $label . (!empty($required) ? ' *' : '')) !!}
        <div class="input-group">
            {!! Form::text($name, null, ['class' => 'form-control']) !!}
            <span class="input-group-btn">
                <button class="btn btn-default reload-ip" type="button">
                    <span class="fa fa-refresh"></span>
                </button>
            </span>
        </div>
        @if(isset($help))
            <p class="help-block">{!! $help !!}</p>
        @endif
    </div>
</div>