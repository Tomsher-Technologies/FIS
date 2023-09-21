@extends('layouts.frontend.app')

@section('content')
<!--=================================
            Header Inner -->
            @php $banner = Storage::url('pages/'. $pageSettings['banner_image']) ; @endphp
<section class="header-inner header-inner-menu bg-overlay-black-50"
    style="background-image: url({{ asset($banner) }});">
    <div class="container position-relative">
        <div class="row d-flex justify-content-center position-relative">
            <div class="col-md-8">
                <div class="header-inner-title text-center">
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
                        <li class="nav-item"><a class="nav-link active" href="{{ getSEOUrl('about_us') }}">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('history') }}">Our History</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('mission_vision') }}">Our Mission & Visionn</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('awards') }}">Awards & Accolades</a>
                        </li> -->
                        <!-- <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('directors') }}">Board of Directors</a>
                        </li> -->
                        <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('management') }}">Leadership</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=================================
              Header Inne -->

<!--=================================
    About -->
<section class="space-pt">
    <div class="container">
        <div class="row justify-content-center mb-4 mb-md-5">
            <div class="col-lg-6 pb-4 pb-lg-0">
                <div class="section-title mb-3">
                    <h2>{{ $pageSettings['heading'] ?? '' }}</h2>
                </div>
                <h6>{{ $pageSettings['sub_heading'] ?? '' }}</h6>
                <p>{!! $pageSettings['content'] ?? '' !!}
                </p>
                <blockquote class="blockquote">
                    {!! $pageSettings['block_content'] ?? ''!!}
                </blockquote>

            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <img class="img-fluid border-radius mb-3" src="{{ asset(Storage::url('pages/'. $pageSettings['image1'])) }}" alt="">
                        <img class="img-fluid border-radius mb-3 mb-sm-0" src="{{ asset(Storage::url('pages/'. $pageSettings['image3'])) }}" alt="">
                    </div>
                    <div class="col-sm-6">
                        <img class="img-fluid border-radius mb-3" src="{{ asset(Storage::url('pages/'. $pageSettings['image2'])) }}" alt="">
                        <div class="counter counter-03 py-5">
                            <div class="counter-content h-100">
                                <label>Established In UAE</label>
                                <span class="timer text-stroke-white mb-0" data-to="{{ $general[0]['established'] }}" data-speed="10000">{{ $general[0]['established'] }}</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
    About -->

<!--=================================
    History -->
<section class="space-ptb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>{!! $pageSettings['heading2'] ?? ''!!} </h2>
                    <p class="px-xl-5">

                    {!! $pageSettings['content2'] ?? ''!!}

                    </p> 
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
    History -->


<!--=================================
    Counter -->
<section class="py-4 bg-transparant border">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="counter counter-02">
                    <div class="counter-icon align-self-center">
                        <i class="flaticon-emoji"></i>
                    </div>
                    <div class="counter-content align-self-center">
                        <span class="timer float-left" data-to="{{ $general[0]['happy_clients'] }}" data-speed="10000">{{ $general[0]['happy_clients'] }} </span><span class="symbol">+</span>
                        <label>Products</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="counter counter-02">
                    <div class="counter-icon">
                        <i class="flaticon-trophy"></i>
                    </div>
                    <div class="counter-content">
                        <span class="timer float-left"  data-to="{{ $general[0]['skilled_experts'] }}" data-speed="10000">{{ $general[0]['skilled_experts'] }} </span><span class="symbol">+</span>
                        <label>Years of experience</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="counter counter-02">
                    <div class="counter-icon">
                        <i class="flaticon-strong"></i>
                    </div>
                    <div class="counter-content">
                        <span class="timer" data-to="{{ $general[0]['finished_projects'] }}" data-speed="10000">{{ $general[0]['finished_projects'] }}</span>
                        <label>Showrooms</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="counter counter-02">
                    <div class="counter-icon">
                        <i class="flaticon-icon-149196"></i>
                    </div>
                    <div class="counter-content">
                        <span class="timer" data-to="{{ $general[0]['media_posts'] }}" data-speed="10000">{{ $general[0]['media_posts'] }}</span>
                        <label>Factories</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
    Counter -->

<br>
<br>

<!--=================================
    Client Logo -->
<section class="space-pb our-clients">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-3 col-lg-4 col-md-4 mb-4 mb-md-0">
                <h5 class="text-primary mb-0">Our Brands</h5>
            </div>
            <div class="col-xl-9 col-md-8">
                @if($brands)
                    <div class="owl-carousel" data-nav-arrow="false" data-items="4" data-md-items="4" data-sm-items="4"
                        data-xs-items="3" data-xx-items="2" data-space="40" data-autoheight="true">
                        @foreach($brands as $brd)
                        <div class="item">
                            <img class="img-fluid w-75 grayscale" src="{{ asset($brd->image) }}" alt="{{$brd->image_alt}}">
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!--=================================
    Client Logo -->
@endsection

@push('header')
<style>
.symbol{
    color: #0d4ea2;
    font-size: 25px;
    line-height: 36px;
    font-weight: 700;
    /* font-family: "Archivo", sans-serif; */
    /* color: #ffffff; */
    margin-bottom: 10px;
    display: block;
}
.float-left{
    float : left !important;
}
</style>
@endpush

@push('footer')
<script src="{{ asset('js/horizontal-timeline/horizontal-timeline.js') }}"></script>
@endpush