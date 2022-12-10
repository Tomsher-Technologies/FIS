<div class="form-group">
    <label for="{{ $name }}">{{ $text }} 
        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    <input {{ $required ? 'required' : '' }} {{ $editable ? 'readonly' : '' }} class="form-control" type="text"
        id="{{ $name }}" name="{{ $name }}"
        value="{{ $model != '' ? old($name, $model->$name) : old($name) }}">
    @error($name)
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
