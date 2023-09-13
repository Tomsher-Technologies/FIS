@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Edit Banner'])
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1>Edit Banner</h1>
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
                <x-status />
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.banner.update', $banner) }}"
                            enctype="multipart/form-data" id="bannerUpdate">
                            @csrf
                            @method('PATCH')

                            <x-input name="heading" text="Heading" :model=$banner />
                            <x-input name="content" text="Content" required="0" :model=$banner />
                            <x-input name="btn_text" text="Button text" required="0" :model=$banner />
                            <x-input name="btn_link" text="Button link" required="0" :model=$banner />

                            

                            @if ($banner->image)
                                <img src="{{ asset($banner->getImage()) }}" alt="" class="w-100">
                            @endif
                            <div class="form-group mt-2">
                                <label for="exampleInputEmail1">Image</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" accept=".jpg,.png,.jpeg,.gif,.webp" class="custom-file-input"
                                            name="image_file" id="inputGroupFile02">
                                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            @error('image_file')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label for="status">Status</label>
                                <div class="form-group">
                                    <input type="radio" name="status" id="status" class="radio" value="1" {{ ( $banner->status) == 1 ? 'checked' : '' }}> <span class="ml-1 float-left">Enabled</span>
                                    <input type="radio" name="status" id="status0" class="radio ml-2" value="0" {{ ($banner->status) == 0 ? 'checked' : '' }}> <span class="ml-1">Disabled</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="" class="btn btn-primary mb-0">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('header')
<style>
.radio{
    width: 1.2rem;
    /* font-size: 39px; */
    height: 1.2rem;
    float: left;
}
</style>
@endpush
