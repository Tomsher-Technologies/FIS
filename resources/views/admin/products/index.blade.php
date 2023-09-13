@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Products'])
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1>Products</h1>
                <div class="text-zero top-right-button-container">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-lg top-right-button mr-1">ADD NEW
                        PRODUCT</a>
                </div>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="rpw">
            <div class="col-12">
                <x-status />

                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <livewire:admin.products.product-listing />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('header')
@endpush
