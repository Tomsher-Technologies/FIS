<div class="form-group">
    <label for="exampleInputEmail1">{{ $text }}</label>
    <input type="{{ $type }}" name="{{ $model }}" class="form-control" wire:model='{{ $model }}'>
    @error('{{ $model }}')
        <span class="error">{{ $message }}</span>
    @enderror
</div>
