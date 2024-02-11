<div class="col-md-{{ isset($size) ? $size : 6 }}">
    <div class="form-group">
        <label>{{ $label . (!empty($required) ? ' *' : '') }}</label>
        @foreach($options as $value => $labelName)
        <div class="checkbox">
            <label>
                {!! Form::checkbox($name, $value) !!}
                {{ $labelName }}
            </label>
        </div>
        @endforeach
        @if(isset($help))
            <p class="help-block">{!! $help !!}</p>
        @endif
    </div>
</div>