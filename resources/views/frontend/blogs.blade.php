@extends('layouts.frontend.app')

@section('content')
<!--=================================
    Header Inner -->
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
<section class="space-ptb">
    <div class="container">
        <div class="row">
            @if($blogs)
                @foreach($blogs as $blg)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="blog-post">
                            <div class="blog-post-image">
                                <img class="img-fluid blog-img" src="{{asset($blg->image)}}" alt="">
                            </div>
                            <div class="blog-post-content">
                                <div class="blog-post-info">
                                <!-- blog-post-date -->
                                    <div class="">
                                        <a href="#">{{ date('M d, Y', strtotime($blg->created_at)) }}</a>
                                    </div>
                                </div>
                                <div class="blog-post-details">
                                    <h5 class="blog-post-title">
                                        <a href="{{ route('blog-details',['id' => $blg->slug]) }}">{{$blg->title}}</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="row mt-4 mt-md-5">
            <div class="col-12 text-center">
            {{ $blogs->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
</section>
<!--=================================
 
    History -->
<style>
.blog-img{
    height: 270px;
    width: 100%;
}
</style>
@endsection

@push('footer')

@endpush