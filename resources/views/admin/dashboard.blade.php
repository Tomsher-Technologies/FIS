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
                                <a href="{{ route('admin.product-enquiries') }}" class="card">
                                    <div class="card-body text-center">
                                        <i class="iconsminds-shopping-cart"></i>
                                        <p class="card-text mb-0">Product Enquires</p>
                                        <p class="lead text-center">{{ $productEnquiries }}</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3">
                                <a href="{{ route('admin.enquiries') }}" class="card">
                                    <div class="card-body text-center">
                                        <i class="iconsminds-mail-send"></i>
                                        <p class="card-text mb-0">Contact Enquires</p>
                                        <p class="lead text-center">{{ $contactEnquiries }}</p>
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
