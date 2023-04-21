@extends('layouts.frontend.app')

@section('content')
    <!--=================================
            Header Inner -->
    <section class="header-inner header-inner-menu bg-overlay-black-50"
        style="background-image: url('images/header-inner/01.jpg');">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center position-relative">
                <div class="col-md-8">
                    <div class="header-inner-title text-center">
                        <h1 class="text-white fw-normal">History And Evolution</h1>
                        <p class="text-white mb-0">Our Expertise. Know more about what we do</p>
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
                            <li class="nav-item"><a class="nav-link active" href="#">History and Evolution</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('mission_vision') }}">Vision &
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
              Header Inne -->

    <!--=================================
              History -->
    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="section-title text-center">
                        <h2>Established 2010 in Farook has been offering world-class information technology.</h2>
                        <p class="px-xl-5">Positive pleasure-oriented goals are much more powerful motivators than negative
                            fear-based ones. Although each is successful separately, the right combination of both is the
                            most powerful motivational force known to humankind.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="cd-horizontal-timeline">
                        <div class="timeline">
                            <div class="events-wrapper">
                                <div class="events">
                                    <ul>
                                        <li><a href="#0" data-date="01/01/2010" class="selected">2010</a></li>
                                        <li><a href="#0" data-date="01/01/2012">2012</a></li>
                                        <li><a href="#0" data-date="01/01/2014">2014</a></li>
                                        <li><a href="#0" data-date="01/01/2016">2016</a></li>
                                        <li><a href="#0" data-date="01/01/2018">2018</a></li>
                                        <li><a href="#0" data-date="01/01/2020">2020</a></li>
                                    </ul>
                                    <span class="filling-line" aria-hidden="true"></span>
                                </div>
                                <!-- .events -->
                            </div>
                            <!-- .events-wrapper -->
                            <ul class="cd-timeline-navigation">
                                <li><a href="#0" class="prev inactive"></a></li>
                                <li><a href="#0" class="next"></a></li>
                            </ul>
                            <!-- .cd-timeline-navigation -->
                        </div>
                        <!-- .timeline -->
                        <div class="events-content">
                            <ul>
                                <li class="selected" data-date="01/01/2010">
                                    <div class="row">
                                        <div class="col-md-4 position-relative">
                                            <h1 class="year">2010</h1>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="timeline-text">
                                                <h6 class="text-dark"> They often mean leaving the perception of security in
                                                    order to discover your personal freedom. These are the changes that will
                                                    bring happiness and satisfaction into your life. Just go there now.</h6>
                                                <p class="border-start ps-3 font-italic">10 years out… having made a decade
                                                    of changes. Imagine living the life you want to live.</p>
                                                <p class="mb-0">The best way is to develop and follow a plan. Start with
                                                    your goals in mind and then work backwards to develop the plan. What
                                                    steps are required to get you to the goals? Make the plan as detailed as
                                                    possible. Try to visualize and then plan for, every possible setback.
                                                    Commit the plan to paper and then keep it with you at all times. Review
                                                    it regularly and ensure that every step takes you closer to your Vision
                                                    and Goals.</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li data-date="01/01/2012">
                                    <div class="row">
                                        <div class="col-md-4 position-relative">
                                            <h1 class="year">2012</h1>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="timeline-text">
                                                <h6 class="text-dark">What is the exact sequence of events that will take
                                                    you to where you want to be? Have a think consciously of what you need
                                                    to do. Every outcome begins with the first step.</h6>
                                                <p class="border-start ps-3 font-italic">When you decide you want to have a
                                                    romantic meal for two, there are many steps that you need to perform in
                                                    order for that to happen.</p>
                                                <p class="mb-0">This is the beginning of creating the life that you want
                                                    to live. Know what the future holds for you as a result of the choice
                                                    you can make today.</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li data-date="01/01/2014">
                                    <div class="row">
                                        <div class="col-md-4 position-relative">
                                            <h1 class="year">2014</h1>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="timeline-text">
                                                <h6 class="text-dark">Have some fun and hypnotize yourself to be your very
                                                    own “Ghost of Christmas future” and see what the future holds for you.
                                                    Success is something of which we all want more. Most people believe that
                                                    success is difficult.</h6>
                                                <p class="border-start ps-3 font-italic">Get the oars in the water and start
                                                    rowing. Execution is the single biggest factor in achievement.</p>
                                                <p class="mb-0">The price is something not necessarily defined as
                                                    financial. It could be time, effort, sacrifice, money or perhaps,
                                                    something else. The point is that we must be fully aware of the price
                                                    and be willing to pay it</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li data-date="01/01/2016">
                                    <div class="row">
                                        <div class="col-md-4 position-relative">
                                            <h1 class="year">2016</h1>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="timeline-text">
                                                <h6 class="text-dark">He sells his farm and hikes off over the horizon,
                                                    never to be heard from again. Rumors say that years later he died
                                                    destitute, never having found the diamonds he spent his life seeking.
                                                </h6>
                                                <p class="border-start ps-3 font-italic">I don’t think the deciding factor
                                                    was the desire. Lots of people come here to Japan, but never quite find
                                                    out how to stay. </p>
                                                <p class="mb-0">Instead, it seems to be more a matter of what they can
                                                    allow themselves to have. Some people call this a sense of deserving.
                                                    Others call it a sense of entitlement. No matter what term you use, it’s
                                                    basically the same thing.</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li data-date="01/01/2018">
                                    <div class="row">
                                        <div class="col-md-4 position-relative">
                                            <h1 class="year">2018</h1>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="timeline-text">
                                                <h6 class="text-dark">Introspection is the trick. Understand what you want,
                                                    why you want it and what it will do for you. This is a critical factor,
                                                    and as such, is probably the most difficult step. For this reason, most
                                                    people never complete this aspect – then wonder why life is so
                                                    difficult!</h6>
                                                <p class="border-start ps-3 font-italic">“Nothing changes until something
                                                    moves” – this is the battle cry of author and journalist Robert Ringer.
                                                    And he is absolutely correct</p>
                                                <p class="mb-0">Without clarity, you send a very garbled message out to
                                                    the Universe. We know that the Law of Attraction says that we will
                                                    attract what we focus on, so if we don’t have clarity, we will attract
                                                    confusion.</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li data-date="01/01/2020">
                                    <div class="row">
                                        <div class="col-md-4 position-relative">
                                            <h1 class="year">2020</h1>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="timeline-text">
                                                <h6 class="text-dark">Make no mistake, the new owner already had money, or
                                                    he could not have bought the land. There’s nothing in this story to make
                                                    us think he was dreaming about riches, vast or otherwise. No burning
                                                    desire. But he got the goodies.</h6>
                                                <p class="border-start ps-3 font-italic">Once you have a clear
                                                    understanding of what you want, it is critical that you engage in goal
                                                    setting – specifically setting SMART goals.</p>
                                                <p class="mb-0">Focus is having the unwavering attention to complete what
                                                    you set out to do. There are a million distractions in every facet of
                                                    our lives.</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- .events-content -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
              History -->
@endsection

@push('footer')
    <script src="{{ asset('js/horizontal-timeline/horizontal-timeline.js') }}"></script>
@endpush
