@extends('layouts.frontend.app')

@section('content')
    <!--=================================
                                                                                banner -->

    @if ($banners->count())
        <section class="banner slider-02">
            <div class="swiper-container">
                <div class="swiper-wrapper h-700 h-sm-500">

                    @foreach ($banners as $banner)
                        <div class="swiper-slide align-items-center d-flex responsive-overlap-md bg-overlay-black-30"
                            style="
                    background-image: url('{{  asset($banner->getImage()) }}');
                    background-size: cover;
                    background-position: center center;
                ">
                            <div class="swipeinner container">
                                <div class="row justify-content-center">
                                    <div class="col-xl-7 col-md-9 text-center">
                                        <h1 data-swiper-animation="fadeInUp" data-duration="1s" data-delay="0.25s">
                                            {{ $banner->heading }}
                                        </h1>
                                        <h6 data-swiper-animation="fadeInUp" data-duration="1s" data-delay="0.5s">
                                            {{ $banner->content }}
                                        </h6>
                                        @if($banner->btn_link != '')
                                            <a class="btn btn-dark btn-round text-white" data-swiper-animation="fadeInUp"
                                            data-duration="1s" data-delay="0.75s"
                                            href="{{ $banner->btn_link }}">{{ $banner->btn_text }}<i
                                                class="fas fa-arrow-right ps-3"></i></a>
                                        @else
                                            <a class="btn btn-dark btn-round text-white fadeInUp animated" data-swiper-animation="fadeInUp" data-duration="1s" data-delay="0.75s" href="{{ getSEOUrl('about_us') }}" style="visibility: visible; animation-duration: 1s; animation-delay: 0.75s;">{{ $banner->btn_text }}<i class="fas fa-arrow-right ps-3"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="swiper-button-prev">
                    <i class="fas fa-arrow-left icon-btn"></i>
                </div>
                <div class="swiper-button-next">
                    <i class="fas fa-arrow-right icon-btn"></i>
                </div>
            </div>
        </section>
    @endif
    <!--=================================
                                                                            banner -->
    @if ($about[0])

    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center mb-4 mb-md-5">
                <div class="col-lg-6 pb-4 pb-lg-0">
                    <div class="section-title mb-3">
                        <h2>{!! $about[0]->heading !!}</h2>
                    </div>
                    <h6>{!! $about[0]->sub_heading !!}</h6>
                    <p> {!! $about[0]->content !!} </p>
                    <blockquote class="blockquote">
                        {!! $about[0]->block_content !!}
                    </blockquote>
                    <a class="btn btn-dark btn-round text-white mt-4" href="{{ getSEOUrl('about_us') }}">
                        View More<i class="fas fa-arrow-right ps-3"></i>
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <img class="img-fluid border-radius mb-3" src="{{ asset(Storage::url('pages/'. $about[0]->image1)) }}"
                                alt="">
                            <img class="img-fluid border-radius mb-3 mb-sm-0" src="{{ asset(Storage::url('pages/'. $about[0]->image3)) }}" alt="">
                        </div>
                        <div class="col-sm-6">
                            <img class="img-fluid border-radius mb-3" src="{{ asset(Storage::url('pages/'. $about[0]->image2)) }}"  alt="">
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
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-info feature-info-style-03 bg_blue shadow-lg">
                        <div class="feature-info-content">
                            <h4 class="mb-3 fw-normal feature-info-title text-white">{{ $general[0]['mission_vision']['value'] }}</h4>
                            <p class="mb-0 text-white">{{ $general[0]['mission_vision']['content'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-info feature-info-style-03 bg_red shadow-lg">
                        <div class="feature-info-content">
                            <h4 class="mb-3 fw-normal feature-info-title text-white">{{ $general[0]['challenges']['value'] }}</h4>
                            <p class="mb-0 text-white">{{ $general[0]['challenges']['content'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-info feature-info-style-03 bg_blue shadow-lg">
                        <div class="feature-info-content">
                            <h4 class="mb-3 fw-normal feature-info-title text-white">{{ $general[0]['our_team']['value'] }}</h4>
                            <p class="mb-0 text-white">{{ $general[0]['our_team']['content'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!--=================================
                                                            Category -->
    <section class="space-pb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10">
                    <div class="section-title text-center">
                        <h2>{{ $pageSettings['home']['heading'] }}</h2>
                        <p>
                        {{ $pageSettings['home']['content'] }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @php 
                    $services = getAllServices();
                @endphp
                @foreach ($services as $service)
                    @php 
                        $homeIcon = $image1 = '';
                        $serviceName = $service->title;
                        $serviceType = $service->type;
                        if(isset($pageSettings[$serviceType]['home_icon']) && $pageSettings[$serviceType]['home_icon'] != ''){
                            $homeIcon = Storage::url('pages/'. $pageSettings[$serviceType]['home_icon']);
                        }
                        if(isset($pageSettings[$serviceType]['image1']) && $pageSettings[$serviceType]['image1'] != ''){
                            $image1 = Storage::url('pages/'. $pageSettings[$serviceType]['image1']);
                        }
                        $home_content = $pageSettings[$serviceType]['home_content'] ?? '';
                    @endphp
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="feature-info feature-info-style-02 h-100">
                            <div class="feature-info-icon">
                                @if($homeIcon != '')
                                    <img src="{{ asset($homeIcon) }}" class="w-25" alt="" />
                                @endif
                                <h5 class="mb-0 feature-info-title mt-3"> {{$serviceName}} </h5>
                            </div>
                            <div class="feature-info-content">
                                <p class="mb-0"> {!! $home_content !!} </p>
                                <a href="{{ getSEOUrl($serviceType) }}" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                            <div class="feature-info-bg-img" style="background-image: url('{{ asset($image1) }}'); ">
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!--=================================
                                                            Category -->


    <!--=================================
                                            Client Logo -->
    <section class="space-pb our-client mb-0 mb-lg-n5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="offset-lg-4 col-lg-7">
                    @if($brands)
                        <div class="owl-carousel testimonial-center owl-nav-bottom-center" data-nav-arrow="false"
                            data-items="4" data-md-items="5" data-sm-items="3" data-xs-items="3" data-xx-items="2"
                            data-space="40" data-autoheight="true">
                            @foreach($brands as $brd)
                                <div class="item">
                                    <img class="img-fluid grayscale" src="{{ asset($brd->image) }}" alt="{{$brd->image_alt}}">
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



    <!--=================================
                                        Our Portfolio -->
    <section class="space-pb bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mt-5 mt-lg-n7">
                        <div class="bg-primary px-5 py-4 py-lg-4 text-center">
                            <h2 class="text-white m-0">Our Brands</h2>
                        </div>
                        <!-- owl carousel -->
                        <div class="owl-carousel text-start" data-nav-dots="false" data-items="1" data-md-items="1"
                            data-sm-items="1" data-xs-items="1" data-xx-items="1">
                            @if($brands)
                                @foreach($brands as $brd)
                                <div class="items">
                                    <div class="case-study case-study-style-01 mb-0">
                                        <div class="case-study-img case-study-lg bg-holder border-radius-0"
                                            style="background-image: url({{ asset($brd->product_image) }});">
                                        </div>
                                        <div class="case-study-info">
                                            <span class="case-study-title fw-bold" >{{ $brd->title }}</span>
                                            <!-- <a class="case-study-services" href="#">Sports</a> -->
                                            <p class="mt-2">{!! $brd->description !!}</p>
                                            <!-- <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a> -->
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mt-5">
                    <div class="row mb-5 mb-lg-0">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <h4 class="text-white mb-2">{{ $pageSettings['home']['heading2'] }}</h4>
                            <span class="d-block display-1 text-stroke-white ">{{ $pageSettings['home']['title2'] }}</span>

                            <p class="text-white">{{ $pageSettings['home']['content2'] }}</p>
                            
                        </div>
                        <div class="col-md-6" style="margin:auto;">
                            <div class="text-center">
                                <div class="badge-round mt-2">
                                    <h4 class="text-white"><span class="d-block font-lg">{{ $pageSettings['home']['title3'] }}+</span> Products</h4>
                                </div>
                                <p class="mt-3 text-white font-lg">
                                    <!-- Quality and value assured, <br>
                                    superb prices -->
                                </p>
                                <a class="btn btn-dark btn-round text-white" href="{{ env('SITE_LINK') }}"
                                    target="_blank"> Shop Our Products <i class="fas fa-arrow-right ps-3"></i></a>

                                <!-- <ul class="list-unstyled list-number mb-0 text-start ps-5 mt-4">
                                    <li class="mb-2 text-white"><span>01</span> </li>
                                    <li class="mb-2 text-white"><span>02</span> </li>
                                    <li class="mb-2 text-white"><span>03</span> </li>
                                    <li class="mb-2 text-white"><span>04</span> </li>
                                    <li class="text-white"><span>05</span> </li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-8 mb-4 mb-md-0">
                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
                                          Our Portfolio -->

    <!--=================================
                                          Case Study -->
    <section class="space-pt">
        <div class="container">
            <div class="row d-lg-flex align-items-center justify-content-center pb-4 pb-md-5">
                <div class="col-lg-6">
                    <h2 class="mb-3 mb-lg-0">Our Latest <br> Products</h2>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <a href="{{ env('SITE_LINK') }}" target="_blank"
                        class="btn btn-dark text-white btn-round w-space">Shop Online<i
                            class="fas fa-arrow-right ps-3"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- owl carousel -->
                    <div class="owl-carousel text-start" data-nav-dots="true" data-items="3" data-md-items="3"
                        data-sm-items="2" data-xs-items="1" data-xx-items="1">

                        @foreach ($products as $product)
                            <div class="items">
                                <div class="case-study case-study-style-02">
                                    <div class="case-study-img case-study-lg"
                                        style="background-image: url('{{  asset($product->getImage()) }}');">
                                    </div>
                                    <div class="case-study-info">
                                        <p class="mt-2">
                                            {{ $product->title }}
                                        </p>
                                        <a href="{{ $product->link }}" target="_blank" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
                                          Case Study -->




    <!--=================================
                                          Articles -->
    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="section-title text-center">
                        <h2>Latest news and inspirational stories</h2>
                        <p>Check out our latest News posts, articles, client success stories and essential announcement.</p>
                    </div>
                </div>
            </div>
            <div class="row">

                @if ($blog_first)
                    <div class="col-md-7 col-lg-8 mb-4">
                        <div class="blog-post blog-post-sticky">
                            <div class="blog-post-image shadow-sm">
                                <a href="{{ route('blog-details',['id' => $blog_first->slug]) }}"><img class="img-fluid blog-image-first" src="{{ asset($blog_first->getImage()) }}"
                                    alt="{{ $blog_first->image_alt }}"></a>
                            </div>
                            <div class="blog-post-content">
                                <div class="blog-post-info justify-content-between">
                                    {{-- <div class="blog-post-author">
                                        <a href="#" class="btn btn-light-round text-white bg-primary"></a>
                                    </div> --}}
                                    <div class="blog-post-date p-0">
                                        <a href="{{ route('blog-details',['id' => $blog_first->slug]) }}">
                                            {{ $blog_first->created_at->format('M m Y') }}
                                        </a>
                                    </div>
                                </div>
                                <div class="blog-post-details">
                                    <h5 class="blog-post-title">
                                        <a href="{{ route('blog-details',['id' => $blog_first->slug]) }}">
                                            {{ $blog_first->title }}
                                        </a>
                                    </h5>
                                    <p class="mb-0">
                                        {{ mb_strimwidth(strip_tags($blog_first->description), 0, 600, '...') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($blog_second)
                    <div class="col-md-5 col-lg-4">
                        @foreach ($blog_second as $item)
                            <div class="blog-post mb-4">
                                <div class="blog-post-image shadow-sm">
                                    <a href="{{ route('blog-details',['id' => $blog_first->slug]) }}"><img class="img-fluid blog-image-second" src="{{ asset($item->getImage()) }}" alt="{{ $item->image_alt }}"></a>
                                </div>
                                <div class="blog-post-content">
                                    <div class="blog-post-info justify-content-between">
                                        {{-- <div class="blog-post-author">
                                        <a href="#" class="btn btn-light-round text-white bg-primary">Events</a>
                                    </div> --}}
                                        <div class="blog-post-date p-0">
                                            <a href="{{ route('blog-details',['id' => $item->slug]) }}">
                                                {{ $item->created_at->format('M m Y') }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blog-post-details">
                                        <h5 class="blog-post-title">
                                            <a href="{{ route('blog-details',['id' => $item->slug]) }}"> {{ $item->title }} </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif



            </div>
            <hr class="m-0 mt-4">
            <div class="row mt-4 mt-md-5">
                <div class="col-12 d-md-flex justify-content-center align-items-center text-center">
                    <p class="mb-3 mb-md-0 mx-0 mx-md-3 text-light">We have articles on a range of topics</p>
                    <a class="btn btn-dark btn-round text-white" href="{{ getSEOUrl('blogs') }}"> View all news <i
                            class="fas fa-arrow-right ps-3"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
                                          Articles -->


@endsection
