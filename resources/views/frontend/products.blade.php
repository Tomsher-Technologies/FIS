@extends('layouts.frontend.app')
@section('content')
<!--=================================
    product -->
<section class="space-ptb">
    <div class="container">
        <div class="row mb-4 mb-lg-5 mb-md-4 align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="d-flex">
                    <a class="text-secondary filter-btn" href="#" data-bs-toggle="offcanvas"
                        data-bs-target="#showsidebar" aria-controls="offcanvasRight">
                        <i class="fa-solid fa-bars"></i> Filter
                    </a>
                </div>
                <!--=================================
              cart menu -->
                <div class="cart-side-menu offcanvas offcanvas-end" tabindex="-1" id="showsidebar">
                    <div class="offcanvas-header">
                        <h3 class="mb-0">Filter</h3>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="shop-sidebar">

                            @if(!empty($result['categories']))
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Categories</h5>
                                </div>
                                @php $categories = $result['categories']; @endphp
                                <div class="custom-control form-check custom-checkbox">
                                    <label class="custom-control-label form-label ml-5px" for="customCheck2"><a href="{{ route('products',['category' => '']) }}">All</a></label>
                                </div>
                                @foreach($categories as $catg)
                                <div class="custom-control form-check custom-checkbox">
                                    <label class="custom-control-label form-label ml-5px" for="customCheck2"><a href="{{ route('products',['category' => $catg['slug']]) }}">{{ $catg['name'] }}</a></label>
                                </div>
                                @endforeach
                            </div>
                            @endif

                            @if(!empty($result['brands']))
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Brand</h5>
                                </div>
                                @php $brands = $result['brands']; @endphp
                                @foreach($brands as $brnd)
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input brandFilter" id="customCheck2" name="brands[]" value="{{ $brnd['id'] }}">
                                    <label class="custom-control-label form-label ml-5px" for="customCheck2">{{ $brnd['name'] }}</label>
                                </div>
                                @endforeach
                            </div>
                            @endif

                            @if(!empty($result['priceRange']))
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Price</h5>
                                </div>
                                @php $priceRange = $result['priceRange']; @endphp
                                @foreach($priceRange as $key=>$price)
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="radio" class="custom-control-input priceFilter" id="custompriceCheck{{$key}}" name="price" value="{{ $price['value'] }}">
                                    <label class="custom-control-label form-label ml-5px" for="custompriceCheck{{$key}}">{{ $price['text'] }}</label>
                                    <span>({{ $price['count'] }})</span>
                                </div>
                                @endforeach
                            </div>
                            @endif

                            @if(!empty($result['discountRange']))
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Discount</h5>
                                </div>
                                @php $discountRange = $result['discountRange']; @endphp
                                @foreach($discountRange as $key1=>$discount)
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="radio" class="custom-control-input discountFilter" id="customDisCheck{{$key1}}" name="discount" value="{{ $discount['value'] }}">
                                    <label class="custom-control-label form-label ml-5px" for="customDisCheck{{$key1}}">{{ $discount['text'] }}</label>
                                    <span>({{ $discount['count'] }})</span>
                                </div>
                                @endforeach
                            </div>
                            @endif

                            @if(!empty($result['attributes']))
                                @php $attributes = $result['attributes']; @endphp
                                @foreach($attributes as $a=>$attrs)
                                    @if(!empty($attrs['attributeItems']))
                                        <div class="widget">
                                            <div class="widget-title">
                                                <h5>{{ $attrs['attributeName'] }}</h5>
                                            </div>
                                            @php $attrList = $attrs['attributeItems']; @endphp
                                            @foreach($attrList as $b=>$attrS)
                                            <div class="custom-control form-check custom-checkbox">
                                                <input type="checkbox" class="custom-control-input attributeFilter" id="customCheckAttr{{$a}}{{$b}}" name="attributes[]" value="{{ $attrS['id'] }}">
                                                <label class="custom-control-label form-label ml-5px" for="customCheckAttr{{$a}}{{$b}}">{{ $attrS['attributesValue'] }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                          
                        </div>
                    </div>
                </div>
                <!--=================================
              cart menu -->
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-md-end">
                <div class="select-border">
                    <select class="form-select form-select-md sortBy" id="sortBy">
                        <option value="5" selected="selected">Sort By</option>
                        <option value="1">Price - Low to High</option>
                        <option value="2">Price - High to Low</option>
                        <option value="3">Alphabetical</option>
                        <option value="4">Discount %</option>
                    </select>
                </div>
            </div>
        </div>
        <input type="hidden" name="searchCategory" id="searchCategory" value="{{ $result['searchCategory'] }}">
        <input type="hidden" name="limit" id="limit" value="{{ $result['limit'] }}">
        @if(!empty($result['products']))
        <div class="row" id="productsList">
            
            <!-- <input type="text" name="offset" id="limit" value="{{ $result['limit'] }}"> -->
                @foreach($result['products'] as $prod)
                    <div class="col-lg-3 col-md-6">
                        <div class="product">
                            <div class="product-image thumbnail-bg">
                                <a href="{{ route('product-details',['sku' => $prod['sku'], 'slug' => $prod['slug']]) }}"> <img class="img-fluid" src="{{ env('API_IMAGE_URL').$prod['image'] }}"
                                        alt="image"></a>
                                <div class="custom-icon">
                                    
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-info">
                                    <div class="product-title">
                                        <h4><a title="{{ $prod['name'] }}" href="{{ route('product-details',['sku' => $prod['sku'], 'slug' => $prod['slug']]) }}"> {{ $prod['name'] }}
                                            </a></h4>
                                    </div>
                                </div>
                                <div class="product-prize pt-4">
                                    <div class="widget block block-static-block">
                                        <a class="btn btn-info custom-btn getEnquiryModal"
                                            style="background-color: #084B85; color: #FFFFFF;border: 1px solid #084B85;"
                                            alt="Make an Enquiry" title="Make an Enquiry" data-toggle="modal"
                                            id="" data-proname="{{ $prod['name'] }}"  data-img="{{ asset(env('API_IMAGE_URL').$prod['image']) }}" data-sku="{{ $prod['sku'] }}">
                                            Make an Enquiry
                                        </a>

                                        <a class="btn btn-primary custom-btn"
                                            href="{{ env('SITE_LINK').'product/'.$prod['sku'].'/'.$prod['slug'] }}"
                                            target="_blank"> <span> Buy Online </span> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach  
        </div>
        <div class="row">
            <div class="col-12 text-center mt-4" id="nodata">

            </div>
            @if($result['totalCount'] >= $result['limit'])
                <div class="col-12 text-center mt-4" id="loadButton">
                    <div class="text-center" id="loadMoreDiv">
                        <button type="button" class="btn btn-success load-more-data"  name="load_more_button" id="load_more_button"><i class="fa fa-refresh"></i> Load More...</button>
                    </div>
                
                    <!-- Data Loader -->
                    <div class="auto-load text-center" style="display: none;">
                        <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                            <path fill="#000"
                                d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                                    from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                            </path>
                        </svg>
                    </div>
                </div>
            @endif
        </div>
        @else
            <div class="row">
                <div class="col-12 text-center mt-4">
                    <img src="{{ asset('images/no-product.png')}}" alt=''><h4>No products Found</h4>
                </div>
            </div>
        @endif
    </div>

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
                            <img class="img-fluid h-100 " id="product_image" src=""
                                        alt="">
                        </div>
                        <div class="col-sm-10 product-name ml-20" id="product_name">
                           
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
                        <input type="hidden" name="sku" id="sku" value="">
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
               
            </div> -->
        </div>
    </div>
</div>


</section>
<!--=================================
      product -->
@endsection

@push('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
<style>
    .product-name{
        font-size: 14px;
        color: #0d5dab;
        font-weight: 700;
        margin: auto;
    }
</style>
@endpush

@push('footer')
<script src="{{ getAdminAsset('js/vendor/jquery.validate/jquery.validate.min.js') }}"></script>
<script>

    $(document).on('click', '.getEnquiryModal', function() {
        $("#contact-form-new")[0].reset();

        var image = $(this).attr('data-img');
        var proname = $(this).attr('data-proname');
        var sku = $(this).attr('data-sku');

        $('#product_image').attr('src',image);
        $('#product_name').html(proname);
        $('#sku').val(sku);

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


    let page = 1;
  
    $(document).on('click','.load-more-data',function(){
        page++;
        loadMore(page,1);
    });

    $(document).on('change','#sortBy', function(){
        page = 1;
        loadMore(page,0);
    });

    $(document).on('click','.brandFilter',function(){
        page = 1;
        loadMore(page,0);
    });

    $(document).on('click','.attributeFilter',function(){
        page = 1;
        loadMore(page,0);
    });

    $(document).on('click','.priceFilter',function(){
        page = 1;
        loadMore(page,0);
    });

    $(document).on('click','.discountFilter',function(){
        page = 1;
        loadMore(page,0);
    });

    function loadMore(page,type) {
        var brands = $('.brandFilter:checked').map(function() {
                        return $(this).val();
                    }).get();
        var price = $('input[name=price]:checked').val();
        var discount = $('input[name=discount]:checked').val();
        var attrbts = $('.attributeFilter:checked').map(function() {
                        return $(this).val();
                    }).get();
        
        $.ajax({
                url:"{{ route('loadmore-products') }}",
                // datatype: "html",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "limit": $('#limit').val(),
                    "offset": page,
                    "category":$('#searchCategory').val(),
                    "sortBy" : $('#sortBy').val(),
                    "brands":brands,
                    "priceRange": price,
                    "discountRange" : discount,
                    "attrbts" : attrbts
                },
                beforeSend: function () {
                   $('.auto-load').show();
                   $('#loadMoreDiv').html('');
                }
            })
            .done(function (response) {
                var resData = JSON.parse(response);
                $('.auto-load').remove();
                $('#load_more_button').remove();
                
                if(type == 1){
                    $("#productsList").append(resData.html);
                    if (resData.html == '') {
                        $('#loadMoreDiv').html("We don't have more data to display...");
                    }
                }else{
                    $("#productsList").html(resData.html);
                    $('#nodata').html("");
                    if (resData.html == '') {
                        $('#nodata').html("<img src='{{ asset('images/no-product.png')}}' alt=''><h4>No products Found</h4>");
                    }
                }
                
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
    }
</script>
@endpush