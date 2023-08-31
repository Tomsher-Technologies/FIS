@extends('layouts.frontend.app')

@section('content')
    <!--=================================
            Header Inner -->
    @php $banner = Storage::url('pages/'. $pageSettings['banner_image']) ; @endphp
    <section class="header-inner header-inner-menu bg-overlay-black-50"
        style="background-image: url({{ $banner }});">
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
                            <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('history') }}">History and Evolution</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('mission_vision') }}">Vision & Mission</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('awards') }}">Awards & Accolades</a>
                            </li>
                            <li class="nav-item"><a class="nav-link active" href="{{ getSEOUrl('directors') }}">Board of Directors</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('management') }}">Management</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
              Header Inner -->


    <!--=================================
              team -->
    <section class="space-ptb overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="section-title text-center">
                        <h2>{{ $pageSettings['heading'] ?? '' }}</h2>
                        <p class="lead">{!! $pageSettings['sub_heading'] ?? '' !!}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @if($directors)
                    @foreach($directors as $dir)
                        <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                            <div class="team">
                                <div class="team-bg"></div>
                                <div class="team-img">
                                    <img class="img-fluid" src="{{ asset( Storage::url('teams/'. $dir->image)) }}" alt="">
                                </div>
                                <div class="team-info">
                                    <a href="#" class="team-name">{{ $dir->name }}</a>
                                    <p>{{ $dir->designation }}</p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!--=================================
              team -->

    <!--=================================
              Client Logo -->
    <!-- <section class="space-pb our-clients">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-4 mb-4 mb-md-0">
                    <h5 class="text-primary mb-0">Awards and Nominees</h5>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-8">
                    <div class="owl-carousel testimonial-center owl-nav-bottom-center" data-nav-arrow="false"
                        data-items="5" data-md-items="4" data-sm-items="4" data-xs-items="3" data-xx-items="2"
                        data-space="40" data-autoheight="true">
                        <div class="item">
                            <img class="img-fluid grayscale" src="images/award-logo/01.svg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid grayscale" src="images/award-logo/02.svg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid grayscale" src="images/award-logo/03.svg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid grayscale" src="images/award-logo/04.svg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid grayscale" src="images/award-logo/05.svg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid grayscale" src="images/award-logo/06.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!--=================================
              Client Logo -->

    <!--=================================
              News -->
    <section class="space-pb">
        <div class="container">
            <div class="row dark-background">
                <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="feature-info feature-info-style-04">
                        <div class="feature-info-content">
                            <h4 class="mb-3 fw-normal feature-info-title">Careers</h4>
                            <p>{{ $general[0]['career_content']['content'] }}</p>
                            <a href="{{ getSEOUrl('careers') }}" class="btn btn-primary-round btn-round text-white">View Positions<i
                                    class="fas fa-arrow-right ps-3"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="feature-info feature-info-style-04">
                        <div class="feature-info-content">
                            <h4 class="mb-3 fw-normal feature-info-title">Latest News</h4>
                            <p>{{ $general[0]['latest_news']['content'] }}</p>
                            <a href="{{ getSEOUrl('blogs') }}" class="btn btn-primary-round btn-round text-white">Read Articles<i
                                    class="fas fa-arrow-right ps-3"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-info feature-info-style-04">
                        <div class="feature-info-content">
                            <h4 class="mb-3 fw-normal feature-info-title">Contact</h4>
                            <p>{{ $general[0]['contact_content']['content'] }}</p>
                            <a href="{{ getSEOUrl('contact') }}" class="btn btn-primary-round btn-round text-white">Get in Touch<i
                                    class="fas fa-arrow-right ps-3"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
              News -->
@endsection
