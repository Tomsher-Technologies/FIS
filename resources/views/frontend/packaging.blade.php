@extends('layouts.frontend.app')

@section('content')
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
    About -->
<section class="space-ptb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="section-title text-center">
                    <h2>{{ $pageSettings['heading'] ?? '' }}</h2>
                    <p class="mb-4">  {!! $pageSettings['content'] ?? '' !!}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 mb-4 mb-sm-0">
                <img class="img-fluid border-radius" src="{{ asset(Storage::url('pages/'. $pageSettings['image1'])) }}" alt="">
            </div>
            <div class="col-sm-6">
                <img class="img-fluid border-radius" src="{{ asset(Storage::url('pages/'. $pageSettings['image2'])) }}" alt="">
            </div>
        </div>
</section>
<!--=================================
    About -->

<!--=================================
    History -->
<section class="space-pb">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="section-title is-sticky">
                    <h2>{!! $pageSettings['heading2'] ?? ''!!} </h2>
                    <p class="mb-4 mb-md-5">{!! $pageSettings['content2'] ?? ''!!}</p>
                    <a href="#" class="btn btn-light-round btn-round">Let's Start Project<i
                            class="fas fa-arrow-right ps-3"></i></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="feature-info feature-info-style-08">
                    <div class="feature-info-inner">
                        @if($steps)
                            @foreach($steps as $key=>$stp)
                                <div class="feature-info-item">
                                    <div class="feature-info-number"><span>{{$key + 1}}</span></div>
                                    <div class="feature-info-content">
                                        <h5 class="mb-3 feature-info-title">{{ $stp->title }}</h5>
                                        <p class="mb-0">{{ $stp->content }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
    History -->
@endsection

@push('footer')

@endpush