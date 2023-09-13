@extends('layouts.admin.app', ['body_class' => 'nav-md'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Edit User</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />
                <x-errors />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                            @csrf
                            @method('PATCH')

                            <input type="hidden" name="id" value="{{ $user->id }}">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" autocomplete="name" class="form-control"
                                    value="{{ old('name', $user->name) }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ old('email', $user->email) }}">
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <div class="form-group">
                                    <input type="radio" name="status" id="status" class="radio" value="1" {{ old('status', $user->status) == '1' ? 'checked' : '' }}> <span class="ml-1 float-left">Enabled</span>
                                    <input type="radio" name="status" id="status0" class="radio ml-2" value="0" {{ old('status', $user->status) == '0' ? 'checked' : '' }}> <span class="ml-1">Disabled</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">New Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary mb-0">Submit</button>
                            <button type="button" id="deleteBtn" class="btn btn-dark mb-0 float-right">Delete
                                User</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <form id="deleteForm" action="{{ route('admin.users.destroy', $user) }}" method="POST">
        @csrf
        @method('DELETE')
    </form>
@endsection


@push('header')
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/select2-bootstrap.min.css') }}" />
    <style>
    .radio{
        width: 1.2rem;
        /* font-size: 39px; */
        height: 1.2rem;
        float: left;
    }
    </style>
@endpush
@push('footer')
    <script src="{{ getAdminAsset('js/vendor/select2.full.js') }}"></script>
    <script>
        $('#deleteBtn').on('click', function() {
            $confirm = confirm("Do you want to delete this user?");
            if ($confirm) {
                $('#deleteForm').submit();
            }
        });
    </script>
@endpush
