@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Clients'])
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1>Clients</h1>
                <div class="text-zero top-right-button-container">
                    <a href="{{ route('admin.clients.create') }}" class="btn btn-primary btn-lg top-right-button mr-1">ADD NEW
                        CLIENT</a>
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
                        <livewire:admin.clients.client-listing />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

