<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Create Agency/Catelogue/Material</h1>
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
                                <label for="exampleInputEmail1">Type<span class="text-danger">*</span></label>
                                <select wire:model="btype" name="" class="form-control  mb-3">
                                    <option {{ old('type') == "agency" ? 'selected' : '' }} value="agency">
                                        Agency
                                    </option>
                                    <option {{ old('type') == "catelogue" ? 'selected' : '' }} value="catelogue">
                                        Catelogue
                                    </option>
                                    <option {{ old('type') == "material" ? 'selected' : '' }} value="material">
                                        Material
                                    </option>
                                </select>
                                @error('type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Title<span class="text-danger">*</span></label>
                                <input name="" class="form-control" wire:model="title" />
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Link<span class="text-danger">*</span></label>
                                <input type="url" class="form-control" wire:model="link" />
                                @error('link')
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
                                <label for="exampleInputEmail1">Image Alt</label>
                                <input name="" class="form-control" wire:model="image_alt" />
                                @error('image_alt')
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

                            <button type="submit" class="btn btn-primary mb-0">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('header')
        <script>
            window.addEventListener('clear', function(e) {
                $('.custom-file-label').html('Choose file');
            });
        </script>
    @endpush

</div>
