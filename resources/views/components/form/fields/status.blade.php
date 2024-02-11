<?php
    if(!isset($current)){
        $current = config('statuses.default');
    }
?>
<div class="col-md-12">
    <div class="form-group">
        {!! Form::label('status', 'Status' . (!empty($required) ? ' *' : '')) !!}
        <div>
        @if(isset($statuses))
            @foreach($statuses as $status => $label)
                <label class="radio-inline">
                    {!! Form::radio('status', $status, ($current == $status)) !!} {{ $label }}
                </label>
            @endforeach
        @endif
        </div>
        @if(isset($help))
            <p class="help-block">{{ $help }}</p>
        @endif
    </div>
</div>