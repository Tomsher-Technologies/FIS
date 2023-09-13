<div>
    <form wire:submit.prevent="save()">
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input name="" class="form-control" wire:model="title" />
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <div wire:ignore>
                <textarea name="" id="description" cols="30" rows="10" class="form-control" wire:model="description"></textarea>
            </div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Status</label>
            <select wire:model="status" name="status" class="form-control mb-3">
                <option value="1">
                    Enabled
                </option>
                <option value="0">
                    Disabled
                </option>
            </select>
            @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mb-0">Update</button>
    </form>

    <script>
        tinymceztinymce = tinymce.init({
            selector: '#description',
            forced_root_block: false,
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.set('description', editor.getContent());
                });
            }
        });

        window.addEventListener('clear', function(e) {
            tinymce.activeEditor.setContent('')
        });
    </script>
</div>
