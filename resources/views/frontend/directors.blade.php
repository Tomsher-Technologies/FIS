@extends('layouts.frontend.app')

@section('content')
    <!--=================================
            Header Inner -->
    <section class="header-inner header-inner-menu bg-overlay-black-50"
        style="background-image: url('images/header-inner/15.jpg');">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="header-inner-title text-center position-relative">
                        <h1 class="text-white fw-normal">Board Of Directors</h1>
                        <p class="text-white mb-0">Let success motivate you. Find a picture of what epitomizes success to you
                            and then pull it out when you are in need of motivation.</p>
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
                            <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('history') }}">History and
                                    Evolution</a>
                            </li>
                            <li class="nav-item"><a class="nav-link " href="{{ getSEOUrl('mission_vision') }}">Vision &
                                    Mission</a></li>
                            <li class="nav-item"><a class="nav-link " href="{{ getSEOUrl('awards') }}">Awards & Accolades</a>
                            </li>
                            <li class="nav-item"><a class="nav-link active" href="#">Board of
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
              team -->
    <section class="space-ptb overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="section-title text-center">
                        <h2>Meet Our Directors</h2>
                        <p class="lead">Our team is friendly, talkative, and fully reliable.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                    <div class="team">
                        <div class="team-bg"></div>
                        <div class="team-img">
                            <img class="img-fluid" src="images/team/01.jpg" alt="">
                        </div>
                        <div class="team-info">
                            <a href="#" class="team-name">Aaron Sharp</a>
                            <p>Chief People Officer</p>

                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                    <div class="team">
                        <div class="team-bg"></div>
                        <div class="team-img">
                            <img class="img-fluid" src="images/team/02.jpg" alt="">
                        </div>
                        <div class="team-info">
                            <a href="#" class="team-name">Homer Reyes</a>
                            <p>Vice President</p>

                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                    <div class="team">
                        <div class="team-bg"></div>
                        <div class="team-img">
                            <img class="img-fluid" src="images/team/03.jpg" alt="">
                        </div>
                        <div class="team-info">
                            <a href="#" class="team-name">Felica Queen</a>
                            <p>Team Leader</p>

                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                    <div class="team">
                        <div class="team-bg"></div>
                        <div class="team-img">
                            <img class="img-fluid" src="images/team/04.jpg" alt="">
                        </div>
                        <div class="team-info">
                            <a href="#" class="team-name">Sara Lisbon</a>
                            <p>Production Manager</p>

                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                    <div class="team">
                        <div class="team-bg"></div>
                        <div class="team-img">
                            <img class="img-fluid" src="images/team/05.jpg" alt="">
                        </div>
                        <div class="team-info">
                            <a href="#" class="team-name">Michael Bean</a>
                            <p>Quality control</p>

                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                    <div class="team">
                        <div class="team-bg"></div>
                        <div class="team-img">
                            <img class="img-fluid" src="images/team/06.jpg" alt="">
                        </div>
                        <div class="team-info">
                            <a href="#" class="team-name">Alice Williams </a>
                            <p>Marketing manager</p>

                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                    <div class="team">
                        <div class="team-bg"></div>
                        <div class="team-img">
                            <img class="img-fluid" src="images/team/07.jpg" alt="">
                        </div>
                        <div class="team-info">
                            <a href="#" class="team-name">Paul Flavius</a>
                            <p>Human resources</p>

                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                    <div class="team">
                        <div class="team-bg"></div>
                        <div class="team-img">
                            <img class="img-fluid" src="images/team/08.jpg" alt="">
                        </div>
                        <div class="team-info">
                            <a href="#" class="team-name">Anne Smith</a>
                            <p>Sales and Marketing</p>

                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                    <div class="team">
                        <div class="team-bg"></div>
                        <div class="team-img">
                            <img class="img-fluid" src="images/team/09.jpg" alt="">
                        </div>
                        <div class="team-info">
                            <a href="#" class="team-name">Mellissa Doe</a>
                            <p>Marketing Expert</p>

                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                    <div class="team">
                        <div class="team-bg"></div>
                        <div class="team-img">
                            <img class="img-fluid" src="images/team/10.jpg" alt="">
                        </div>
                        <div class="team-info">
                            <a href="#" class="team-name">Ben Aguilar</a>
                            <p>Community</p>

                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                    <div class="team">
                        <div class="team-bg"></div>
                        <div class="team-img">
                            <img class="img-fluid" src="images/team/11.jpg" alt="">
                        </div>
                        <div class="team-info">
                            <a href="#" class="team-name">Kim Hamilton</a>
                            <p>Developer</p>

                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                    <div class="team apply-position">
                        <div class="team-icon">
                            <i class="far fa-user-circle"></i>
                        </div>
                        <div class="team-info">
                            <a href="#" class="btn btn-link">Apply for Possition<i
                                    class="fas fa-arrow-right text-dark ps-1"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
              team -->

    <!--=================================
              Client Logo -->
    <section class="space-pb our-clients">
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
    </section>
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
                            <p>Walkout 10 years into your future and feel how it feels to carry on doing the same thing.</p>
                            <a href="careers.html" class="btn btn-primary-round btn-round text-white">View Positions<i
                                    class="fas fa-arrow-right ps-3"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="feature-info feature-info-style-04">
                        <div class="feature-info-content">
                            <h4 class="mb-3 fw-normal feature-info-title">Latest News</h4>
                            <p>This path is just like today, with one difference: you have 10 fewer years remaining in your
                                life.</p>
                            <a href="blog.html" class="btn btn-primary-round btn-round text-white">Read Articles<i
                                    class="fas fa-arrow-right ps-3"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-info feature-info-style-04">
                        <div class="feature-info-content">
                            <h4 class="mb-3 fw-normal feature-info-title">Contact</h4>
                            <p>I want you to think about how you will feel in 10 years if you continue doing the exact same
                                things.</p>
                            <a href="contact.html" class="btn btn-primary-round btn-round text-white">Get in Touch<i
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
