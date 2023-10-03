@extends('layouts.frontend.app')

@section('content')
<!--=================================
    header -->

<!--=================================
    Header Inner -->
@php $banner = Storage::url('pages/'. $pageSettings['banner_image']) ; @endphp
<section class="header-inner bg-overlay-black-50" style="background-image: url({{ asset($banner) }});">
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
    Header Inner -->

<!--=================================
    Client Logo -->
<section class="space-pt our-client bg-light pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-title text-center">
                    <h4> {{ $pageSettings['heading'] ?? '' }} </h4>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            @if($brands)
                @foreach($brands as $brd)
                    <div class="col-lg-2 col-md-4 col-sm-6 text-center">
                        <img class="img-fluid grayscale mx-auto p-4" src="{{ asset($brd->image) }}" alt="">
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
<!--=================================
    Client Logo -->
<!--=================================
    Recent work -->
<section class="space-pt pb-5">
    <div class="container">
        <div class="row mb-5 mb-md-4">
            <div class="col-xl-10">
                <div class="section-title">
                    <h2> {{ $pageSettings['sub_heading'] ?? '' }}</h2>
            
                </div>
            </div>
          
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel text-start" data-nav-dots="true" data-items="5" data-md-items="4"
                    data-sm-items="3" data-xs-items="1" data-xx-items="1">
                    @if($brands)
                        @foreach($brands as $bd)
                            <div class="items">
                                <div class="case-study case-study-style-02 mt-5">
                                    <div class="case-study-img case-study-lg"
                                        style="background-image: url({{ asset($bd->product_image) }});">
                                    </div>
                                    <div class="case-study-info">
                                        <a class="case-study-title fw-bold" href="#">{{ $bd->title }}</a>
                                        
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
<!--=================================
    Recent work -->

@endsection

@push('footer')
<script src="{{ asset('js/horizontal-timeline/horizontal-timeline.js') }}"></script>
@endpush