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
    Career Opportunities -->
<section class="space-ptb">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9">
                <div class="accordion" id="career-opportunities">
                    @if($careers)
                        @foreach($careers as $key=>$crs)
                            @php 
                                if($key == 0){
                                    $class="show";
                                    $collapse = "";
                                }else{
                                    $class="hide";
                                    $collapse = "collapsed";
                                }
                            @endphp
                            <div class="card">
                                <div class="accordion-icon card-header" id="heading_{{$crs->id}}">
                                    <h4 class="mb-0">
                                        <button class="btn {{$collapse}}" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#security-manager_{{$crs->id}}" aria-expanded="true"
                                            aria-controls="security-manager_{{$crs->id}}">{{ $crs->title }}</button>
                                    </h4>
                                </div>
                                <div id="security-manager_{{$crs->id}}" class="collapse {{$class}}" aria-labelledby="heading_{{$crs->id}}"
                                    data-bs-parent="#career-opportunities">
                                    <div class="card-body">
                                        <p class="mb-4">{!! $crs->description !!}</p>
                                        
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
    Career Opportunities -->
@endsection

@push('footer')

@endpush