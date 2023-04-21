@extends('layouts.frontend.app')

@section('content')
    <!--=================================
        contact Form -->
    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h1>{{ $page->page_name }}</h1>
                        <p>
                            {{ $page->banner_text }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-lg-around position-relative pt-5">
                <div class="col-lg-4 col-md-5 mb-4">
                    <div class="is-sticky">
                        <h4 class="mb-4">Let’s talk about what you want to accomplish and how we can make it happen.</h4>
                        <h5 class="text-light">This is the beginning of creating the life that you want to live.</h5>

                        <P>P.O. Box 2987 <br>
                            ASPECT Tower, Executive Towers <br>
                            Al Mustaqbal Street, Business Bay <br>
                            Dubai, U.A.E.

                            <br>
                            <br>

                            Call Us: +971 4 579 2000 / +971 4 2279898 <br>
                            Fax: +971 4 276 7037 / +971 4 2233423 <br> +971 4 276 7059 <br>

                            sales@farook.ae
                        </P>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 pe-lg-5">
                    <div class="p-4 p-md-5 bg-white shadow">
                        <h3>Need assistance? please fill the form</h3>
                        <form class="mt-4">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleInputName" placeholder="Name">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleInputLname" placeholder="Last Name">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleInputEmail"
                                    placeholder="Email Address">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleInputEnquiry"
                                    placeholder="Enquiry Type">
                            </div>
                            <div class="mb-4">
                                <textarea class="form-control" id="exampleInputEnquiry-Description" placeholder="Enquiry Description" rows="5"></textarea>
                            </div>
                            <div class="mb-4">
                                <div class="form-check ms-1">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        I agree to talk about my project with Farook
                                    </label>
                                </div>
                            </div>
                            <div class="mb-0">
                                <button type="submit" class="btn btn-primary">Send Massage<i
                                        class="fas fa-arrow-right ps-3"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="contact-bg-logo text-center">
                    <i class="fas fa-comment"></i>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
          contact Form  -->

    <!--=================================
          contact Form info -->
    <section>
        <div class="container-f">
            <div class="row justify-content-lg-around">
                <div class="col-lg-12 col-md-12 pe-lg-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14435.497763996687!2d55.325409699999994!3d25.24115365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sae!4v1667916311614!5m2!1sen!2sae"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
          contact Form info-->
@endsection
