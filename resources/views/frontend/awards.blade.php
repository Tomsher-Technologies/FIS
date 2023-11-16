@extends('layouts.frontend.app')

@section('content')
    <!--=================================
        Header Inner -->
        @php $banner = Storage::url('pages/'. $pageSettings['banner_image']) ; @endphp
    <section class="header-inner header-inner-menu bg-overlay-black-50"
        style="background-image: url({{ asset($banner) }})">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center position-relative">
                <div class="col-md-8">
                    <div class="header-inner-title text-center">
                        <h1 class="text-white fw-normal">
                        {{ $pageSettings['banner_text'] ?? '' }}
                        </h1>
                        <p class="text-white mb-0">
                        {{ $pageSettings['banner_content'] ?? '' }}
                        </p>
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
                            <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('mission_vision') }}">Our Mission & Vision</a></li>
                            <!-- <li class="nav-item"><a class="nav-link active" href="{{ getSEOUrl('awards') }}">Awards & Accolades</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('directors') }}">Board of Directors</a>
                            </li> -->
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
    Feature -->
    <section class="space-ptb">
        <div class="container">
            <div class="row">
                @foreach($awards as $ard)
                    <div class="col-md-4 mb-4 mb-md-0 pt-3">
                        <div class="feature-info feature-info-style-05 text-center position-relative">
                            <div class="feature-info-icon">
                                <i class="flaticon-diamond"></i>
                            </div>
                            <div class="feature-info-content">
                                <h5 class="mb-3 feature-info-title">{{$ard->title}}</h5>
                                <p class="mb-0 px-lg-5">
                                {{$ard->content}}
                                </p>
                            </div>
                        </div>
                    </div>
               @endforeach
            </div>

            <!-- <div class="row mt-2 mt-md-5">
                <div class="col-12 d-md-flex justify-content-center align-items-center text-center">
                    <p class="mb-3 mb-md-0 mx-0 mx-md-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.
                    </p>
                    <a href="#" class="btn btn-primary-round btn-round mx-0 mx-md-3">Let’s Get Started<i
                            class="fas fa-arrow-right ps-3"></i></a>
                </div>
            </div> -->
        </div>
    </section>
    <!--=================================
    Feature -->
@endsection
