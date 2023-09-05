@extends('layouts.frontend.app')

@section('content')
    <!--=================================
            Header Inner -->
            @php $banner = Storage::url('pages/'. $pageSettings['banner_image']) ; @endphp
    <section class="header-inner header-inner-menu bg-overlay-black-50"
        style="background-image: url({{ asset($banner) }});">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center position-relative">
                <div class="col-md-8">
                    <div class="header-inner-title text-center">
                        <h1 class="text-white fw-normal">{{ $pageSettings['banner_text'] ?? '' }}</h1>
                        <p class="text-white mb-0">{{ $pageSettings['banner_content'] ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-inner-nav">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link " href="{{ getSEOUrl('about_us') }}">About Us</a></li>
                            <li class="nav-item"><a class="nav-link active" href="{{ getSEOUrl('history') }}">History and Evolution</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('mission_vision') }}">Vision & Mission</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('awards') }}">Awards & Accolades</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('directors') }}">Board of Directors</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ getSEOUrl('management') }}">Management</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
              Header Inne -->

    <!--=================================
              History -->
    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="section-title text-center">
                        <h2>{{ $pageSettings['heading'] ?? '' }}</h2>
                        <p class="px-xl-5">{!! $pageSettings['content'] ?? '' !!}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="cd-horizontal-timeline">
                        <div class="timeline">
                            <div class="events-wrapper">
                                <div class="events">
                                    <ul>
                                        @foreach($history as $key=>$hisYear)
                                            @if($key == 0)
                                            <li><a href="#0" data-date="01/01/{{$hisYear->year}}" class="selected">{{$hisYear->year}}</a></li>
                                            @else
                                            <li><a href="#0" data-date="01/01/{{$hisYear->year}}">{{$hisYear->year}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    <span class="filling-line" aria-hidden="true"></span>
                                </div>
                                <!-- .events -->
                            </div>
                            <!-- .events-wrapper -->
                            <ul class="cd-timeline-navigation">
                                <li><a href="#0" class="prev inactive"></a></li>
                                <li><a href="#0" class="next"></a></li>
                            </ul>
                            <!-- .cd-timeline-navigation -->
                        </div>
                        <!-- .timeline -->
                        <div class="events-content">
                            <ul>
                                @foreach($history as $key=>$hisYear)
                                    
                                    <li @if($key == 0) class="selected" @endif data-date="01/01/{{$hisYear->year}}">
                                        <div class="row">
                                            <div class="col-md-4 position-relative">
                                                <h1 class="year">{{$hisYear->year}}</h1>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="timeline-text">
                                                    <h6 class="text-dark"> {{$hisYear->heading}}</h6>
                                                    <p class="border-start ps-3 font-italic">{{$hisYear->sub_heading}}</p>
                                                    <p class="mb-0">{{$hisYear->content}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    
                                @endforeach
                                
                               
                            </ul>
                        </div>
                        <!-- .events-content -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
              History -->
@endsection

@push('footer')
    <script src="{{ asset('js/horizontal-timeline/horizontal-timeline.js') }}"></script>
@endpush
