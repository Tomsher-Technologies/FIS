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
        <div class="row justify-content-center ">
            @if($agencies)
                @foreach($agencies as $agnt)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="#" class="p-4 border text-center border-radius mb-4 d-block">
                            <img class="img-fluid" src="{{ asset($agnt->image) }}" alt="{{ $agnt->image_alt }}">
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