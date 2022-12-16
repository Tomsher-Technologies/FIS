<div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1>Edit Blog</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="rpw">
            <div class="col-12">
                <x-status />
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-body">

                        <form wire:submit.prevent="save()" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title<span class="text-danger">*</span></label>
                                <input name="" class="form-control" wire:model="blog.title" />
                                @error('blog.title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description<span class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <textarea name="" id="description" cols="30" rows="10" class="form-control"
                                        wire:model="blog.description"></textarea>
                                </div>
                                @error('blog.description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            @if ($blog->image)
                                <div class="form-group mb-0">
                                    <label for="exampleInputEmail1">Current Image</label>
                                </div>
                                <img class="w-50 mb-3" src="{{ $blog->getImage() }}" alt="">
                            @endif

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <div class="input-group">
                                    <div class="custom-file" wire:ignore>
                                        <input wire:model="photo" type="file" accept=".jpg,.png,.jpeg,.gif,.webp"
                                            class="custom-file-input" name="image_file" id="inputGroupFile02">
                                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                    </div>
                                </div>
                                <div wire:loading wire:target="photo">Uploading...</div>
                                @error('photo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image Alt</label>
                                <input name="" class="form-control" wire:model="blog.image_alt" />
                                @error('blog.image_alt')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select wire:model="blog.status" name="status" class="form-control">
                                    <option value="1">
                                        Enabled
                                    </option>
                                    <option value="0">
                                        Disabled
                                    </option>
                                </select>
                                @error('blog.status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            @include('admin.common.seo')

                            <button type="submit" class="btn btn-primary mb-0">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('header')
        <script src="{{ getAdminAsset('tinymce/tinymce.min.js') }}"></script>
        <script>
            tinymceztinymce = tinymce.init({
                selector: '#description',
                forced_root_block: false,
                setup: function(editor) {
                    editor.on('init change', function() {
                        editor.save();
                    });
                    editor.on('change', function(e) {
                        @this.set('blog.description', editor.getContent());
                    });
                }
            });

            window.addEventListener('clear', function(e) {
                $('.custom-file-label').html('Choose file');
            });
        </script>
    @endpush

</div>
