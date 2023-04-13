<div x-data="pgToggleable({
            id: '{{ $row->{$primaryKey} }}',
            tableName: '{{ $tableName }}',
            field: '{{ $column->field }}',
            toggle: {{ (int) $row->{$column->field} }},
            trueValue: '{{ $column->toggleable['default'][0] }}',
            falseValue:  '{{ $column->toggleable['default'][1] }}'
         })">
    @if($column->toggleable['enabled'])
        <div class="custom-switch custom-switch-secondary mb-2">
            <input x-on:click="save()"
                        {{ $row->{$column->field} === 1 ? 'checked' : "" }}
                       class="form-check-input custom-switch-input"
                       {{-- :checked="toggle === 1" --}}
                       id="checkboxTogg{{ $row->{$primaryKey} }}"
                       type="checkbox">
            <label class="custom-switch-btn" for="checkboxTogg{{ $row->{$primaryKey} }}"></label>
        </div>
    @else
        <div class="text-center">
            @if($row->{$column->field} == 0)
                <div  x-text="falseValue"
                      style="padding-top: 0.1em; padding-bottom: 0.1rem"
                     class="badge bg-danger">
                </div>
            @else
                <div x-text="trueValue"
                     style="padding-top: 0.1em; padding-bottom: 0.1rem"
                     class="badge bg-success">
                </div>
            @endif
        </div>
    @endif
</div>

