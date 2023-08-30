@extends('layouts.frontend.app')

@section('content')
    <!--=================================
            inner banner -->
    @php $banner = Storage::url('pages/'. $pageSettings['banner_image']) ; @endphp
    <section class="header-inner bg-overlay-black-50" style="background-image: url({{ $banner }});">
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
    </section>
    <!--=================================
                inner banner -->

    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="section-title text-center">
                        <h2>{{ $pageSettings['heading'] ?? '' }}</h2>
                        <p>{!! $pageSettings['sub_heading'] ?? '' !!}</p>
                    </div>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-md-12">
                    <div class="my-shuffle-container columns-3 popup-gallery full-screen shuffle"
                        style="position: relative; overflow: hidden; height: 1116px; transition: height 700ms cubic-bezier(0.4, 0, 0.2, 1) 0s;">
                        @if($media)
                            @foreach($media as $md)
                                <div class="grid-item shuffle-item shuffle-item--visible"
                                    style="position: absolute; top: 0px; left: 0px; visibility: visible; will-change: transform; opacity: 1; transition-duration: 700ms; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-property: transform, opacity;">
                                    <div class="portfolio-item">
                                        <img class="img-fluid" src="{{ asset($md->image) }}" alt="{{ $md->image_alt }}">
                                        <div class="portfolio-overlay">
                                            <div class="portfolio-description">
                                                <div class="portfolio-info">
                                                    <h5>
                                                        <a href="#" class="portfolio-title text-primary">{{ $md->image_alt }}</a>
                                                    </h5>
                                                </div>
                                                <div class="portfolio-icon">
                                                    <a class="portfolio-img" href="{{ asset($md->image) }}">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                       @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
