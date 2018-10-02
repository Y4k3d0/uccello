<?php $isError = form_errors($form->{$field->name}) ?? false; ?>
<div class="col-md-6">
    <div class="form-group form-switch">
        {{-- Label --}}
        {!! form_label($form->{$field->name}) !!}

        <div class="input-field">
            {{-- Icon if defined --}}
            @if($field->icon ?? false)
            <i class="material-icons prefix">{{ $field->icon }}</i>
            @endif

            {{-- Field --}}
            <div class="switch" style="padding-top: 10px; padding-bottom: 5px;">
                <label class="switch-label">
                    {{ uctrans('no', $module) }}
                    {!! form_widget($form->{$field->name}) !!}
                    <span class="lever switch-col-primary"></span>
                    {{ uctrans('yes', $module) }}
                </label>
            </div>
        </div>

        @if($isError)
        <div class="help-info">
            {!! form_errors($form->{$field->name}) !!}
        </div>
        @endif
    </div>
</div>