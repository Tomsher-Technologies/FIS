<div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1>Create Service</h1>
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
                                <input name="" class="form-control" wire:model="name"
                                    wire:change="changeSeoUrl($event.target.value)" />
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">SEO URL<span class="text-danger">*</span></label>
                                <input name="" class="form-control" wire:model="slug" />
                                @error('slug')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Title</label>
                                <input name="" class="form-control" wire:model="sub_title" />
                                @error('sub_title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description<span class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <textarea name="" id="content" cols="30" rows="10" class="form-control" wire:model="content"></textarea>
                                </div>
                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image <span class="text-danger">*</span></label>
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
                                <label for="exampleInputEmail1">Status</label>
                                <select wire:model="status" name="status" class="form-control select2-single mb-3">
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

                            @include('admin.common.seo')

                            <button type="submit" class="btn btn-primary mb-0">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('header')
        <x-admin.tiny-mce node='#content' dataObj='content' />
        <script>
            window.addEventListener('clear', function(e) {
                tinymce.activeEditor.setContent('');
                $('.custom-file-label').html('Choose file');
            });
        </script>
    @endpush
</div>
