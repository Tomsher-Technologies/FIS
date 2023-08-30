@extends('layouts.frontend.app')

@section('content')

<!--=================================
    Title -->
<section class="space-ptb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center mb-0">
                    <h1>{{ $pageSettings['heading'] ?? '' }}</h1>
                    <p>{{ $pageSettings['sub_heading'] ?? '' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
    Title -->

<!--=================================
    Terms-and-conditions -->
<section class="space-pb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>{!! $pageSettings['content'] ?? '' !!}</p>
            </div>
        </div>
    </div>
</section>
<!--=================================
    Terms-and-conditions -->
@endsection

@push('footer')
hideErrors();
    function hideErrors(){
        $('#name-error').css('display','none');
        $('#email-error').css('display','none');
        $('#phone-error').css('display','none');
        $('#message-error').css('display','none');
    }
@endpush