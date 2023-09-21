<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Create Agency/Catalogue</h1>
                <div class="text-zero top-right-button-container">
                    <a href="{{ route('admin.businesses.index') }}" class="btn btn-primary btn-lg top-right-button mr-1">Go Back To List</a>
                </div>
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

                        <form wire:submit.prevent="save()"  enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Type<span class="text-danger">*</span></label>
                                <select wire:model="btype" name="" class="form-control  mb-3">
                                    <option {{ old('btype') == "agency" ? 'selected' : '' }} value="agency">
                                        Agency
                                    </option>
                                    <option {{ old('btype') == "product_catalogue" ? 'selected' : '' }} value="product_catalogue">
                                        Product Catalogue
                                    </option>
                                    <option {{ old('btype') == "agencies_catalogue" ? 'selected' : '' }} value="agencies_catalogue">
                                        Agencies Catalogue
                                    </option>
                                    <!-- <option {{ old('btype') == "material" ? 'selected' : '' }} value="material">
                                        Material
                                    </option> -->
                                </select>
                                @error('type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            @if($btype != "agency")
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
                            @endif

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="custom-file" wire:ignore>
                                        <input wire:model="photo" type="file" accept="image/*"
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
        <style>
            .invalid-tooltip, .valid-tooltip, div.error{
                margin-top: 5rem !important;
            }
            </style>
    @endpush

</div>
