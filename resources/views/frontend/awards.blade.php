@extends('layouts.frontend.app')

@section('content')
    <!--=================================
        Header Inner -->

    <section class="header-inner header-inner-menu bg-overlay-black-50"
        style="background-image: url('images/header-inner/05.jpg')">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center position-relative">
                <div class="col-md-8">
                    <div class="header-inner-title text-center">
                        <h1 class="text-white fw-normal">
                            Awards Accolades
                        </h1>
                        <p class="text-white mb-0">
                            Positive pleasure-oriented goals are much more
                            powerful motivators than negative fear-based
                            ones.
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
                            <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('history') }}">History and Evolution</a>
                            </li>
                            <li class="nav-item"><a class="nav-link " href="{{ getSEOUrl('mission_vision') }}">Vision &
                                    Mission</a></li>
                            <li class="nav-item"><a class="nav-link active" href="#">Awards & Accolades</a>
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
    Feature -->
    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-info feature-info-style-05 text-center position-relative">
                        <div class="feature-info-icon">
                            <i class="flaticon-diamond"></i>
                        </div>
                        <div class="feature-info-content">
                            <h5 class="mb-3 feature-info-title">Awards</h5>
                            <p class="mb-0 px-lg-5">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Sequi non debitis
                                cupiditate quo beatae similique expedita,
                                quisquam odio porro sed neque in sint
                                assumenda. Asperiores deserunt modi quia
                                repellat consectetur!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-info feature-info-style-05 text-center position-relative">
                        <div class="feature-info-icon">
                            <i class="flaticon-diamond"></i>
                        </div>
                        <div class="feature-info-content">
                            <h5 class="mb-3 feature-info-title">Awards</h5>
                            <p class="mb-0 px-lg-5">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Quis est officia
                                reprehenderit ducimus fugit laborum maiores
                                excepturi veritatis iure nam suscipit
                                corporis libero autem delectus aspernatur
                                molestiae accusamus, temporibus minima.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-info feature-info-style-05 text-center position-relative">
                        <div class="feature-info-icon">
                            <i class="flaticon-diamond"></i>
                        </div>
                        <div class="feature-info-content">
                            <h5 class="mb-3 feature-info-title">Awards</h5>
                            <p class="mb-0 px-lg-5">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Vero deleniti soluta
                                expedita cupiditate dicta, architecto
                                dolores, ut molestiae alias, quia autem.
                                Beatae nulla provident officia tenetur
                                doloribus cum fugiat adipisci?
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pt-5">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-info feature-info-style-05 text-center position-relative">
                        <div class="feature-info-icon">
                            <i class="flaticon-diamond"></i>
                        </div>
                        <div class="feature-info-content">
                            <h5 class="mb-3 feature-info-title">Awards</h5>
                            <p class="mb-0 px-lg-5">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Sequi non debitis
                                cupiditate quo beatae similique expedita,
                                quisquam odio porro sed neque in sint
                                assumenda. Asperiores deserunt modi quia
                                repellat consectetur!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-info feature-info-style-05 text-center position-relative">
                        <div class="feature-info-icon">
                            <i class="flaticon-diamond"></i>
                        </div>
                        <div class="feature-info-content">
                            <h5 class="mb-3 feature-info-title">Awards</h5>
                            <p class="mb-0 px-lg-5">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Quis est officia
                                reprehenderit ducimus fugit laborum maiores
                                excepturi veritatis iure nam suscipit
                                corporis libero autem delectus aspernatur
                                molestiae accusamus, temporibus minima.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-info feature-info-style-05 text-center position-relative">
                        <div class="feature-info-icon">
                            <i class="flaticon-diamond"></i>
                        </div>
                        <div class="feature-info-content">
                            <h5 class="mb-3 feature-info-title">Awards</h5>
                            <p class="mb-0 px-lg-5">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Vero deleniti soluta
                                expedita cupiditate dicta, architecto
                                dolores, ut molestiae alias, quia autem.
                                Beatae nulla provident officia tenetur
                                doloribus cum fugiat adipisci?
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2 mt-md-5">
                <div class="col-12 d-md-flex justify-content-center align-items-center text-center">
                    <p class="mb-3 mb-md-0 mx-0 mx-md-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.
                    </p>
                    <a href="#" class="btn btn-primary-round btn-round mx-0 mx-md-3">Let’s Get Started<i
                            class="fas fa-arrow-right ps-3"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    Feature -->
@endsection
