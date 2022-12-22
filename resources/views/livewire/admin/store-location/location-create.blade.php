<div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1>Create Location</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-body">
                        <form wire:submit.prevent="save()" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name<span class="text-danger">*</span></label>
                                <input name="" class="form-control" wire:model="name" />
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Location<span class="text-danger">*</span></label>
                                <input name="" class="form-control" wire:model="location" />
                                @error('location')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Map Iframe<span class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <textarea name="" id="iframe" cols="30" rows="10" class="form-control" wire:model="iframe"></textarea>
                                </div>
                                @error('iframe')
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
</div>
