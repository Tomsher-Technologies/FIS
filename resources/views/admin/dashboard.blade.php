@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Dashboard'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Dashboard</h1>
                <div class="separator mb-5"></div>
            </div>
            <div class="col-lg-12 col-xl-12">
                <div class="icon-cards-row mb-4">
                    <div class="dashboard-numbers">
                        <div class="row no-gutters">

                            <div class="col-lg-3">
                                <a href="#" class="card">
                                    <div class="card-body text-center">
                                        <i class="iconsminds-newspaper"></i>
                                        <p class="card-text mb-0">News & Events</p>
                                        <p class="lead text-center">{{ $countNews }}</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3">
                                <a href="#" class="card">
                                    <div class="card-body text-center">
                                        <i class="iconsminds-mail-send"></i>
                                        <p class="card-text mb-0">Enquires</p>
                                        <p class="lead text-center">{{ $countEnquiry }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@push('header')
@endpush
