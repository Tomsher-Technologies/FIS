@extends('layouts.frontend.app')
@section('content')
<!--=================================
      product single -->
<section class="space-ptb shop-single">
    <div class="row">
        <div class="col-md-12" style="padding-left:4%;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    @foreach($result['breadCrumbs'] as $breadCrumbs)
                    @if($breadCrumbs['current'] != 1)
                    <li class="breadcrumb-item">
                        <a
                            href="{{ route('products',['category' => $breadCrumbs['slug']]) }}">{{ $breadCrumbs['title'] }}</a>
                    </li>
                    @endif
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-5 mb-4 mb-lg-0">
                        <div class="slider-slick">
                            <div class="slider slider-for detail-big-car-gallery">
                                @foreach($result['gallery'] as $gallery)
                                <div class="bg-light"><img class="img-fluid"
                                        src="{{ asset(env('API_IMAGE_URL').$gallery['zoom']) }}" alt=""></div>
                                @endforeach
                            </div>
                            <div class="slider slider-nav mt-2">
                                @foreach($result['gallery'] as $gallery)
                                <div class="bg-light">
                                    <img class="img-fluid" src="{{ asset(env('API_IMAGE_URL').$gallery['small']) }}"
                                        alt="">
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="product-detail">
                          
                            <h2 class="mb-4">{{ $result['name'] }}
                            </h2>
                            <div class="no-stock row">
                                <p class="pd-no col-sm-4">SKU.<span>{{ $result['sku'] }}</span></p>
                                
                            </div>
                            <div class="product-price-rating">
                               
                            </div>

                            @if($result['productAttributes'])
                            @foreach($result['productAttributes'] as $prodAttr)
                            <p class="pb-3 mb-0">
                                <label class="prodAttr">{{ $prodAttr['attributeName'] }} : </label>
                                <span> {{ $prodAttr['attributeItems'][0]['attributesValue'] ?? '' }}</span>
                            </p>
                            @endforeach
                            @endif

                            <hr class="hr-dark">
                            <div class="justify-content-start align-items-center d-flex flex-wrap add-to-cart-input">
                                <div class="widget block block-static-block">
                                    <a class="btn btn-info"
                                        style="background-color: #084B85; color: #FFFFFF;border: 1px solid #084B85;"
                                        alt="Make an Enquiry" title="Make an Enquiry" data-toggle="modal"
                                        id="getEnquiryModal">
                                        Make an Enquiry
                                    </a>

                                    <a class="btn btn-primary"
                                        href="{{ env('SITE_LINK').'product/'.$result['sku'].'/'.$result['slug'] }}"
                                        target="_blank"> <span> Buy Online </span> </a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-lg-5 mt-3">
            <div class="col-lg-12">
                <div class="nav-tabs-02">
                    <nav>
                        <ul class="nav nav-tabs mb-4 justify-content-center" id="myTab2" role="tablist">
                            <li class="nav-item" role="presentation"> <a class="nav-link active"
                                    id="nav-description-tab" data-bs-toggle="tab" href="#nav-description" role="tab"
                                    aria-controls="nav-description" aria-selected="true">OVERVIEW</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="nav-custom-tab" data-bs-toggle="tab" href="#nav-custom"
                                    role="tab" aria-controls="nav-custom" aria-selected="false">SPECIFICATION</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-description" role="tabpanel"
                            aria-labelledby="nav-description-tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-4">
                                        <p class="mb-0">
                                            {!! $result['overview'] !!}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-custom" role="tabpanel" aria-labelledby="nav-custom-tab">
                            <div class="row">
                                @if($result['specifications'])
                                @foreach($result['specifications'] as $spec)
                                <div class="col-sm-6">
                                    <label class="prodAttr">{{ $spec['key'] }} :</label>
                                    <span>{{ $spec['value'] }} </span>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" data-role="title"> Make an Enquiry </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 d-flex" style="height: 125px;">
                        <div class="col-sm-2 text-center">
                            <img class="img-fluid h-100" src="{{ asset(env('API_IMAGE_URL').$result['image']) }}"
                                        alt="">
                        </div>
                        <div class="col-sm-10 product-name ml-20" >
                            {{ $result['name'] }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 ">
                        <span class="ajax-response"></span>
                        <form class="" id="contact-form-new" action="#" method="POST" autocomplete="off">
                            <div class="form-group">
                                <label for="name" class="form-label">Name<span class="required">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label mt-1">Email<span class="required">*</span></label>
                                <input type="text" class="form-control" id="email" name="email" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="form-label mt-1">Phone Number<span class="required">*</span></label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="company" class="form-label mt-1">Company Name</label>
                                <input type="text" class="form-control" id="company" name="company">
                            </div>
                            <div class="form-group">
                                <label for="message" class="form-label mt-1">Message <span class="required">*</span></label>
                                <textarea class="form-control" rows="5" id="message" name="message"></textarea>
                                
                            </div>
                            <div class="form-group mt-3 text-center">
                                <button type="submit" class="btn btn-primary"  id="contact-button">Send Massage</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                            </div>   
                            
                        </form>
                        <input type="hidden" name="sku" id="sku" value="{{ $result['sku'] }}">
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
               
            </div> -->
        </div>
    </div>
</div>


<!--=================================
  product single -->
@endsection

@push('header')
<link rel="stylesheet" href="{{ asset('css/slick/slick-theme.css') }}" />
<style>
.space-ptb {
    padding: 15px 0;
}
textarea.form-control {
    min-height: 100px;
}
.modal-body{
    padding: 0px 30px 14px !important
}
.form-control{
    background: #ffffff;
    border: 1px solid #d4d4d4;
}
.product-name{
    font-size: 14px;
    color: #0d5dab;
    font-weight: 700;
    margin: auto;
}
</style>
@endpush

@push('footer')

<script src="{{ asset('js/slick/slick.min.js') }}"></script>
<script src="{{ getAdminAsset('js/vendor/jquery.validate/jquery.validate.min.js') }}"></script>
<script src="{{ getAdminAsset('js/vendor/jquery.validate/additional-methods.min.js') }}"></script>

<script>
    $(document).on('click', '#getEnquiryModal', function() {
        $("#contact-form-new")[0].reset();
        $('label.error').remove();
        $(".ajax-response").html("");
        $('#enquiryModal').modal('show');
    });

    $("#contact-form-new").validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
                email:true
            },  
            phone: {
                required: true
            },  
            message: {
                required: true
            },     
        },
        
        submitHandler: function(e) {
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#submit').html('Please Wait...');
            $("#submit"). attr("disabled", true);
            $.ajax({
                url: "{{ route('enquiry-save')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "name": $('#name').val(),
                    "sku": $('#sku').val(),
                    "email": $('#email').val(),
                    "phone": $('#phone').val(),
                    "company": $('#company').val(),
                    "message": $('#message').val()
                },
                success: function(response) {
                    $("#contact-form-new")[0].reset();
                    $(".ajax-response").html("<div class='alert alert-success'>THANK YOU FOR GETTING IN TOUCH. OUR TEAM WILL CONTACT YOU SHORTLY.</div>");
                }
            });
        }
    })
</script>
@endpush