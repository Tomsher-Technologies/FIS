@extends('layouts.frontend.app')

@section('content')
    <!--=================================
                Header Inner -->
    <section class="header-inner header-inner-menu bg-overlay-black-30"
        style="background-image: url('images/header-inner/14.jpg');">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="header-inner-title text-center position-relative">
                        <h1 class="text-white fw-normal">Our Mission & Vision</h1>
                        <p class="text-white mb-0">Success isn’t really that difficult. There is a significant portion of the
                            population here in North America, that actually want and need success</p>
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
                            <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('history') }}">History and Evolution</a>
                            </li>
                            <li class="nav-item"><a class="nav-link active" href="#">Vision &
                                    Mission</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('awards') }}">Awards & Accolades</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('directors') }}">Board of
                                    Directors</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('management') }}">Management</a>
                            </li>
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
                        <h2>We enable constant enterprise transformation at speed and scale.</h2>
                        <p>We are a creative company, who works with passion and love. We provide the best services you
                            need. We help you to get better, We take pride in helping our clients deliver marvelous results
                            when it comes to their projects. From data to performance, we’ve got you covered.</p>
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
                            <p class="mb-0">To make these virtues a habit, himself on his daily actions. In a journal he
                                drew a table with a row for every virtue and a column for every day of the week.</p>
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
                            <p class="mb-0">We also know those epic stories, those modern-day legends surrounding the
                                early failures of such supremely successful folks as Michael Jordan and Bill Gates.</p>
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
                    <img class="img-fluid" src="images/bg/07.png" alt="">
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
                <div class="col-lg-6">
                    <h2 class="mb-3 mb-lg-0">Three reasons why you should choose our service</h2>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <a href="#" class="btn btn-light-round btn-round w-space">Let’s Get Started<i
                            class="fas fa-arrow-right ps-3"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="feature-info feature-info-style-07">
                        <div class="feature-info-img">
                            <img class="img-fluid" src="images/blog/01.jpg" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h4 class="feature-info-title">Mission and vision</h4>
                            <p>Our Vision & Mission are both helping our team to achieve the goal. We identify the clients'
                                requirements and provide the best solutions.</p>
                            <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="feature-info feature-info-style-07">
                        <div class="feature-info-img">
                            <img class="img-fluid" src="images/blog/02.jpg" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h4 class="feature-info-title">Our challenges</h4>
                            <p>We take pride in helping our clients deliver marvelous results when it comes to their
                                projects. From data to performance, we’ve got you covered.</p>
                            <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-info feature-info-style-07">
                        <div class="feature-info-img">
                            <img class="img-fluid" src="images/blog/03.jpg" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h4 class="feature-info-title">Meet the our team</h4>
                            <p>Meet our institute leaders and the hard-working personalities who deliver innovative concepts
                                to corporations like yours.</p>
                            <a href="#" class="icon-btn"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
              About -->
@endsection
