@extends('layouts.admin.app', ['body_class' => 'nav-md'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>View User</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" disabled autocomplete="name" class="form-control"
                                value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" disabled class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Status</label>
                            <input type="text" name="status" disabled class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ $user->status ? "Enabled":"Disabled" }}">
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection


@push('header')
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/select2-bootstrap.min.css') }}" />
@endpush
@push('footer')
    <script src="{{ getAdminAsset('js/vendor/select2.full.js') }}"></script>
@endpush
