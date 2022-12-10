@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Users'])
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
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <x-input name="heading" text="Heading" :model=$banner />
                            <x-input name="content" text="Content" required="0" :model=$banner />
                            <x-input name="btn_text" text="Button text" required="0" :model=$banner />
                            <x-input name="btn_link" text="Button link" required="0" :model=$banner />

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="form-control select2-single mb-3">
                                    <option {{ old('status', $banner->status) == 1 ? 'selected' : '' }} value="1">
                                        Enabled
                                    </option>
                                    <option {{ old('status', $banner->status) == 0 ? 'selected' : '' }} value="0">
                                        Disabled
                                    </option>
                                </select>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            @if ($banner->image)
                                <img src="{{ $banner->getImage() }}" alt="" class="w-100">
                            @endif

                            <label for="exampleInputEmail1">Image</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" accept=".jpg,.png,.jpeg,.gif,.webp" class="custom-file-input"
                                        name="image_file" id="inputGroupFile02">
                                    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                </div>
                            </div>
                            @error('image_file')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="btn btn-primary mb-0">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('header')
@endpush
