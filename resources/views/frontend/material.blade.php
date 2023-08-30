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
<!--=================================
    Header Inner -->

<!--=================================
    About -->
<section class="space-ptb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @if($material)
                @foreach($material as $mat)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="{{ $mat->link }}" target="_blank" class="bg-light p-4 text-center border-radius mb-4 d-block">
                        <img class="img-fluid w-50" src="{{ asset($mat->image) }}" alt="{{ $mat->image_alt }}">
                        <h5 class="mt-4">{{ $mat->title }}</h5>
                    </a>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
<!--=================================
    About -->
@endsection

@push('footer')

@endpush