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
                    background-image: url('{{ $banner->getImage() }}');
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
                                        <a class="btn btn-dark btn-round text-white" data-swiper-animation="fadeInUp"
                                            data-duration="1s" data-delay="0.75s"
                                            href="{{ $banner->btn_link }}">{{ $banner->btn_text }}<i
                                                class="fas fa-arrow-right ps-3"></i></a>
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


    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center mb-4 mb-md-5">
                <div class="col-lg-6 pb-4 pb-lg-0">
                    <div class="section-title mb-3">
                        <h2>Who we are ?</h2>
                    </div>
                    <h6>Farook international stationery was established <br>
                        in dubai in 1980.</h6>
                    <p>Farook International Stationery Was Established In Dubai In 1980. Today FIS Is The Leading Stationers
                        Brand In U.A.E. With Strong 3 Manufacturing Factories, Plus 11 Showrooms In U.A.E. And One In Oman
                        Catering For Wholesale And Retail Sales.
                    </p>
                    <blockquote class="blockquote">
                        For those of you who are serious about having more, doing more, giving more and being more, success
                        is achievable with some understanding of what to do.
                        <cite class="d-block mt-3"> -CEO </cite>
                    </blockquote>
                    <a class="btn btn-dark btn-round text-white mt-4" href="case-study.html">
                        View Case Study<i class="fas fa-arrow-right ps-3"></i>
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <img class="img-fluid border-radius mb-3" src="{{ asset('images/who_img1.webp') }}"
                                alt="">
                            <img class="img-fluid border-radius mb-3 mb-sm-0" src="{{ asset('images/who_img3.webp') }}"
                                alt="">
                        </div>
                        <div class="col-sm-6">
                            <img class="img-fluid border-radius mb-3" src="{{ asset('images/who_img2.webp') }}"
                                alt="">
                            <div class="counter counter-03 py-5">
                                <div class="counter-content h-100">
                                    <label>Established In UAE</label>
                                    <span class="timer text-stroke-white mb-0" data-to="235" data-speed="10000">235</span>

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
                            <h4 class="mb-3 fw-normal feature-info-title text-white">Mission and Vision</h4>
                            <p class="mb-0 text-white">Our Vision &amp; Mission are both helping our team to achieve the
                                goal. We identify the clients' requirements and provide the best solutions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-info feature-info-style-03 bg_red shadow-lg">
                        <div class="feature-info-content">
                            <h4 class="mb-3 fw-normal feature-info-title text-white">Our Challenges</h4>
                            <p class="mb-0 text-white">We take pride in helping our clients deliver marvelous results when
                                it comes to their projects. From data to performance, we’ve got you covered.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-info feature-info-style-03 bg_blue shadow-lg">
                        <div class="feature-info-content">
                            <h4 class="mb-3 fw-normal feature-info-title text-white">Our Team</h4>
                            <p class="mb-0 text-white">Meet our institute leaders and the hard-working personalities who
                                deliver innovative concepts to corporations like yours.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
                                                            Category -->
    <section class="space-pb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10">
                    <div class="section-title text-center">
                        <h2>What we do?</h2>
                        <p>
                            Farook international stationery was established
                            in dubai in 1980.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-info feature-info-style-02 h-100">
                        <div class="feature-info-icon">
                            <img src="{{ asset('images/what_icon1.svg') }}" class="w-25" alt="" />
                            <h5 class="mb-0 feature-info-title mt-3">
                                Wholesaler and Retailer
                            </h5>
                        </div>
                        <div class="feature-info-content">
                            <p class="mb-0">
                                Farook International Stationery Was
                                Established In Dubai In 1980. Today FIS Is
                                The Leading Stationers Brand In U.A.E.
                            </p>
                            <a href="service-detail.html" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                        <div class="feature-info-bg-img"
                            style="
                                    background-image: url('{{ asset('images/feature-info/01.jpg') }}');
                                ">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-info feature-info-style-02 h-100">
                        <div class="feature-info-icon">
                            <img src="{{ asset('images/what_icon2.svg') }}" class="w-25" alt="" />
                            <h5 class="mb-0 feature-info-title mt-3">
                                Manufacturer
                            </h5>
                        </div>
                        <div class="feature-info-content">
                            <p class="mb-0">
                                Farook International Stationery Was
                                Established In Dubai In 1980. Today FIS Is
                                The Leading Stationers Brand In U.A.E.
                            </p>
                            <a href="service-detail.html" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                        <div class="feature-info-bg-img"
                            style="
                                    background-image: url('{{ asset('images/feature-info/02.jpg') }}');
                                ">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-info feature-info-style-02 h-100">
                        <div class="feature-info-icon">
                            <img src="{{ asset('images/what_icon3.svg') }}" class="w-25" alt="" />
                            <h5 class="mb-0 feature-info-title mt-3">
                                Office Stationery
                            </h5>
                        </div>
                        <div class="feature-info-content">
                            <p class="mb-0">
                                Farook International Stationery Was
                                Established In Dubai In 1980. Today FIS Is
                                The Leading Stationers Brand In U.A.E.
                            </p>
                            <a href="service-detail.html" class="icon-btn"><i
                                    class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                        <div class="feature-info-bg-img"
                            style="
                                    background-image: url('{{ asset('images/feature-info/03.jpg') }}');
                                ">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <div class="feature-info feature-info-style-02 h-100">
                        <div class="feature-info-icon">
                            <img src="{{ asset('images/what_icon1.svg') }}" class="w-25" alt="" />
                            <h5 class="mb-0 feature-info-title mt-3">
                                Information Technology
                            </h5>
                        </div>
                        <div class="feature-info-content">
                            <p class="mb-0">
                                Farook International Stationery Was
                                Established In Dubai In 1980. Today FIS Is
                                The Leading Stationers Brand In U.A.E.
                            </p>
                            <a href="service-detail.html" class="icon-btn"><i
                                    class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                        <div class="feature-info-bg-img"
                            style="
                                    background-image: url('{{ asset('images/feature-info/04.jpg') }}');
                                ">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <div class="feature-info feature-info-style-02 h-100">
                        <div class="feature-info-icon">
                            <img src="{{ asset('images/what_icon1.svg') }}" class="w-25" alt="" />
                            <h5 class="mb-0 feature-info-title mt-3">
                                Import & Exports
                            </h5>
                        </div>
                        <div class="feature-info-content">
                            <p class="mb-0">
                                Farook International Stationery Was
                                Established In Dubai In 1980. Today FIS Is
                                The Leading Stationers Brand In U.A.E.
                            </p>
                            <a href="service-detail.html" class="icon-btn"><i
                                    class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                        <div class="feature-info-bg-img"
                            style="
                                    background-image: url('{{ asset('images/feature-info/05.jpg') }}');
                                ">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-info feature-info-style-02 h-100">
                        <div class="feature-info-icon">
                            <img src="{{ asset('images/what_icon1.svg') }}" class="w-25" alt="" />
                            <h5 class="mb-0 feature-info-title mt-3">
                                CSR Activities
                            </h5>
                        </div>
                        <div class="feature-info-content">
                            <p class="mb-0">
                                Farook International Stationery Was
                                Established In Dubai In 1980. Today FIS Is
                                The Leading Stationers Brand In U.A.E.
                            </p>
                            <a href="service-detail.html" class="icon-btn"><i
                                    class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                        <div class="feature-info-bg-img"
                            style="
                                    background-image: url('{{ asset('images/feature-info/06.jpg') }}');
                                ">
                        </div>
                    </div>
                </div>
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
                    <div class="owl-carousel testimonial-center owl-nav-bottom-center" data-nav-arrow="false"
                        data-items="4" data-md-items="5" data-sm-items="3" data-xs-items="3" data-xx-items="2"
                        data-space="40" data-autoheight="true">
                        <div class="item">
                            <img class="img-fluid grayscale" src="images/brand_img1.webp" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid grayscale" src="images/brand_img2.webp" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid grayscale" src="images/brand_img3.webp" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid grayscale" src="images/brand_img4.webp" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid grayscale" src="images/brand_img5.webp" alt="">
                        </div>
                    </div>
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
                            <div class="items">
                                <div class="case-study case-study-style-01 mb-0">
                                    <div class="case-study-img case-study-lg bg-holder border-radius-0"
                                        style="background-image: url('images/project/03.jpg');">
                                    </div>
                                    <div class="case-study-info">
                                        <a class="case-study-title fw-bold" href="#">The Sports Space</a>
                                        <a class="case-study-services" href="#">Sports</a>
                                        <p class="mt-2">From its founding in 1990 in Cambridge in the UK, it has grown to
                                            become a …</p>
                                        <a href="#" class="icon-btn"><i
                                                class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="case-study case-study-style-01 mb-0">
                                    <div class="case-study-img case-study-lg bg-holder border-radius-0"
                                        style="background-image: url('images/project/04.jpg');">
                                    </div>
                                    <div class="case-study-info">
                                        <a class="case-study-title fw-bold" href="#">Educatgenix</a>
                                        <a class="case-study-services" href="#">Education</a>
                                        <p class="mt-2">We all carry a lot of baggage, thanks to our upbringing...</p>
                                        <a href="#" class="icon-btn"><i
                                                class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="case-study case-study-style-01 mb-0">
                                    <div class="case-study-img case-study-lg bg-holder border-radius-0"
                                        style="background-image: url('images/project/05.jpg');">
                                    </div>
                                    <div class="case-study-info">
                                        <a class="case-study-title fw-bold" href="#">Financeoont</a>
                                        <a class="case-study-services" href="#">Finance</a>
                                        <p class="mt-2">It is truly amazing the damage that we, as parents, can inflict
                                            on our children...</p>
                                        <a href="#" class="icon-btn"><i
                                                class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mt-5">
                    <div class="row mb-5 mb-lg-0">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <h4 class="text-white mb-2">We have been building our experience effectively since</h4>
                            <span class="d-block display-1 text-stroke-white ">1980</span>

                            <p class="text-white">Farook international stationery was established in
                                dubai in 1980. today fis is the leading stationers brand
                                in u.a.e. with strong 3 manufacturing factories</p>
                            <p class="text-white mb-0">Farook international stationery was established in dubai in 1980.
                                today fis is the leading stationers brand in u.a.e. with strong 3 manufacturing factories,
                                plus 11 showrooms in u.a.e. and one in oman catering for wholesale and retail sales.
                        </div>
                        <div class="col-md-6">
                            <div class="text-center">
                                <div class="badge-round mt-2">
                                    <h4 class="text-white"><span class="d-block font-lg">1000+</span> Products</h4>
                                </div>
                                <p class="mt-3 text-white font-lg">Quality and value assured, <br>
                                    superb prices</p>
                                <a class="btn btn-dark btn-round text-white" href="https://www.farookonline.com/"
                                    target="_blank"> Shop Our Products <i class="fas fa-arrow-right ps-3"></i></a>

                                <ul class="list-unstyled list-number mb-0 text-start ps-5 mt-4">
                                    <li class="mb-2 text-white"><span>01</span> Technical analysis</li>
                                    <li class="mb-2 text-white"><span>02</span> Planning and Idea</li>
                                    <li class="mb-2 text-white"><span>03</span> Design and Copywriting</li>
                                    <li class="mb-2 text-white"><span>04</span> Front- & Back-End Coding</li>
                                    <li class="text-white"><span>05</span> Testing and Launch</li>
                                </ul>
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
                    <a href="https://www.farookonline.com/" target="_blank"
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
                                        style="background-image: url('{{ $product->getImage() }}');">
                                    </div>
                                    <div class="case-study-info">
                                        <p class="mt-2">
                                            {{ $product->title }}
                                        </p>
                                        <a href="{{ $product->link }}" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
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
                                <img class="img-fluid" src="{{ $blog_first->getImage() }}"
                                    alt="{{ $blog_first->image_alt }}">
                            </div>
                            <div class="blog-post-content">
                                <div class="blog-post-info justify-content-between">
                                    {{-- <div class="blog-post-author">
                                        <a href="#" class="btn btn-light-round text-white bg-primary"></a>
                                    </div> --}}
                                    <div class="blog-post-date">
                                        <a href="#">
                                            {{ $blog_first->created_at->format('M m Y') }}
                                        </a>
                                    </div>
                                </div>
                                <div class="blog-post-details">
                                    <h5 class="blog-post-title">
                                        <a href="#">
                                            {{ $blog_first->title }}
                                        </a>
                                    </h5>
                                    <p class="mb-0">
                                        {{ mb_strimwidth(strip_tags($blog_first->description), 0, 170, '...') }}</p>
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
                                    <img class="img-fluid" src="{{ $item->getImage() }}" alt="{{ $item->image_alt }}">
                                </div>
                                <div class="blog-post-content">
                                    <div class="blog-post-info justify-content-between">
                                        {{-- <div class="blog-post-author">
                                        <a href="#" class="btn btn-light-round text-white bg-primary">Events</a>
                                    </div> --}}
                                        <div class="blog-post-date">
                                            <a href="#">
                                                {{ $item->created_at->format('M m Y') }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blog-post-details">
                                        <h5 class="blog-post-title">
                                            <a href="#"> {{ $item->title }} </a>
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
                    <a class="btn btn-dark btn-round text-white" href="blog.html"> View all news <i
                            class="fas fa-arrow-right ps-3"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
                                          Articles -->


@endsection
