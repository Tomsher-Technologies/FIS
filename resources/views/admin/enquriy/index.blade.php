@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Enquiries'])
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1>Enquiries</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <livewire:admin.enquiry-list />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('header')
    <style>
        .power-grid-table td{
            white-space:normal !important
        }
    </style>
@endpush