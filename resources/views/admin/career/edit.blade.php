@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Edit Career'])
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1>Edit Careers</h1>
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
                        <livewire:admin.career.edit :career="$career" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('header')
    <script src="{{ getAdminAsset('tinymce/tinymce.min.js') }}"></script>
@endpush
