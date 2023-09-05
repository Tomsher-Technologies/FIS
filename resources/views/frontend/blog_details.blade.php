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
                    <h1 class="text-white fw-normal">{{ $blog[0]['title'] ?? '' }}</h1>
                   
                </div>
            </div>
        </div>
    </div>

</section>
<section class="space-ptb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="blog-detail">
                    <div class="blog-post mb-4 mb-md-5">
                        <div class="blog-post-image">
                            <img class="img-fluid blog-img" src="{{ asset($blog[0]['image'] ?? '') }}" alt="{{$blog[0]['image_alt'] ?? ''}}">
                        </div>
                        <div class="blog-post-content">
                            <div class="blog-post-info">
                                <div class="blog-post-date p-0">
                                    <a href="#">{{ date('M d, Y', strtotime($blog[0]['created_at'] ?? '')) }}</a>
                                </div>
                            </div>
                            <div class="blog-post-details">
                                <h5 class="blog-post-title">
                                {{ $blog[0]['title'] ?? '' }}
                                </h5>
                                <p class="mb-4">{!! $blog[0]['description'] ?? '' !!}</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
 
    History -->
<style>
.blog-img {
    height: 500px;
    width: 100%;
}
</style>
@endsection

@push('footer')

@endpush