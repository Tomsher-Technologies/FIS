@extends('layouts.frontend.app')

@section('content')
    <!--=================================
                Header Inner -->
    @php $banner = Storage::url('pages/'. $pageSettings['banner_image']) ; @endphp
    <section class="header-inner header-inner-menu bg-overlay-black-30"
        style="background-image: url({{ asset($banner) }});">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="header-inner-title text-center position-relative">
                        <h1 class="text-white fw-normal">{{ $pageSettings['banner_text'] ?? '' }}</h1>
                        <p class="text-white mb-0">{{ $pageSettings['banner_content'] ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-inner-nav">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('about_us') }}">About Us</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('history') }}">Our History</a></li>
                            <li class="nav-item"><a class="nav-link active" href="{{ getSEOUrl('mission_vision') }}">Our Mission & Vision</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('awards') }}">Awards & Accolades</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('directors') }}">Board of Directors</a>
                            </li> -->
                            <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('management') }}">Leadership</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
                  Header Inner -->

    <!--=================================
                  About -->
    <section class="space-pt">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="section-title text-center">
                        <h2>{{ $pageSettings['heading'] ?? '' }}</h2>
                        <p>{!! $pageSettings['content'] ?? '' !!}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-6 mb-4 mb-sm-0">
                    <div class="feature-info feature-info-style-02 bg-dark text-white">
                        <div class="feature-info-icon">
                            <i class="flaticon-eye text-white"></i>
                            <h4 class="mb-0 feature-info-title text-white">Our Vision</h4>
                        </div>
                        <div class="feature-info-content">
                            <p class="mb-0">{{ $general[0]['vision']['content'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="feature-info feature-info-style-02 bg-primary text-white">
                        <div class="feature-info-icon">
                            <i class="flaticon-target text-white"></i>
                            <h4 class="mb-0 feature-info-title text-white">Our Mission</h4>
                        </div>
                        <div class="feature-info-content">
                            <p class="mb-0">{{ $general[0]['mission']['content'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
                  About -->


    <!--=================================
            About -->
    <section>
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-sm-12">
                    <img class="img-fluid" src="{{ asset(Storage::url('pages/'. $pageSettings['image'])) }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!--=================================
              About -->

    <!--=================================
              About -->
    <section class="space-ptb">
        <div class="container">
            <div class="row d-lg-flex align-items-center justify-content-center pb-4 pb-md-5">
                <div class="col-lg-12">
                    <h2 class="mb-3 mb-lg-0">{!! $pageSettings['heading2'] ?? '' !!}</h2>
                </div>
                <!-- <div class="col-lg-6 text-lg-end">
                    <a href="#" class="btn btn-light-round btn-round w-space">Let’s Get Started<i
                            class="fas fa-arrow-right ps-3"></i></a>
                </div> -->
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="feature-info feature-info-style-07">
                        <div class="feature-info-img">
                            <img class="img-fluid" src="{{ asset($general[0]['mission_vision']['image']) }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h4 class="feature-info-title">{{ $general[0]['mission_vision']['value'] }}</h4>
                            <p>{{ $general[0]['mission_vision']['content'] }}</p>
                            <!-- <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="feature-info feature-info-style-07">
                        <div class="feature-info-img">
                            <img class="img-fluid" src="{{ asset($general[0]['challenges']['image']) }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h4 class="feature-info-title">{{ $general[0]['challenges']['value'] }}</h4>
                            <p>{{ $general[0]['challenges']['content'] }}</p>
                            <!-- <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-info feature-info-style-07">
                        <div class="feature-info-img">
                            <img class="img-fluid" src="{{ asset($general[0]['our_team']['image']) }}" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h4 class="feature-info-title">{{ $general[0]['our_team']['value'] }}</h4>
                            <p>{{ $general[0]['our_team']['content'] }}</p>
                            <!-- <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
              About -->
@endsection
