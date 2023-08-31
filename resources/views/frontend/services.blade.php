@extends('layouts.frontend.app')

@section('content')
<!--=================================
    header -->

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

<!--=================================
    Service details -->
<section class="space-ptb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="service-details">
                    <h4 class="fw-bold">{{ $pageSettings['heading'] ?? '' }}</h4>
                    <p class="mb-4 mb-md-5">
                        {!! $pageSettings['content'] ?? '' !!}
                    </p>
                    <img class="img-fluid border-radius mb-4 mb-md-5" src="{{ Storage::url('pages/'. $pageSettings['image1']) }}" alt="">
                    <p class="mb-4 mb-md-5">
                    {!! $pageSettings['block_content'] ?? '' !!}
                    </p>
                   
                    <div class="row mb-4 mb-md-5">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <img class="img-fluid border-radius" src="{{ Storage::url('pages/'. $pageSettings['image3']) }}" alt="">
                        </div>
                        <div class="col-md-6">
                            <h4 class="fw-bold">{!! $pageSettings['heading2'] ?? '' !!}</h4>
                            <p class="mb-4"></p>
                            
                            <p class="mb-0">
                            {!! $pageSettings['content2'] ?? '' !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
    Service details -->
@endsection

@push('footer')

@endpush