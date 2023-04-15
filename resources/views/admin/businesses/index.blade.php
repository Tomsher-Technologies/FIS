@extends('layouts.admin.app', ['body_class' => '', 'title' => ' Agencies/Catelogues/Materials'])
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1> Agencies/Catelogues/Materials</h1>
                <div class="text-zero top-right-button-container">
                    <a href="{{ route('admin.businesses.create') }}" class="btn btn-primary btn-lg top-right-button mr-1">ADD NEW
                        AGENCY/CATELOGUE/MATERIAL</a>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <livewire:admin.businesses.businesses />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('header')
@endpush
