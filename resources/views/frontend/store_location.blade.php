@extends('layouts.frontend.app')

@section('content')
<!--=================================
    header -->

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

    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <div class="elfsight-app-89b80bcc-f449-4fd4-9e2c-0c436e2e70a7"></div>

@endsection

@push('footer')
<script src="{{ asset('js/horizontal-timeline/horizontal-timeline.js') }}"></script>
@endpush