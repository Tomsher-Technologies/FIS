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
                            <!-- <div class="widget">
                                <div class="widget-title">
                                    <h5>Discount</h5>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label form-label" for="customCheck2">10%-20%</label>
                                    <span>(52)</span>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck7">
                                    <label class="custom-control-label form-label" for="customCheck7">15%-25%</label>
                                    <span>(23)</span>
                                </div>
                            </div> -->
                            <!-- <div class="widget">
                                <div class="widget-title">
                                    <h5>Filter by color</h5>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label form-label" for="customCheck2">Black,
                                        brown</label>
                                    <span>(2)</span>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label form-label" for="customCheck3">Blue</label>
                                    <span>(1)</span>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                                    <label class="custom-control-label form-label" for="customCheck4">Dark
                                        grey</label>
                                    <span>(2)</span>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                                    <label class="custom-control-label form-label" for="customCheck5">Pink</label>
                                    <span>(3)</span>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck6">
                                    <label class="custom-control-label form-label" for="customCheck6">Green</label>
                                    <span>(1)</span>
                                </div>
                            </div>
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Filter by Type
                                    </h5>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label form-label" for="customCheck2">Desk
                                        Sets</label>
                                    <span>(2)</span>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label form-label" for="customCheck3">11 Pieces
                                        Executive Desk Set</label>
                                    <span>(1)</span>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                                    <label class="custom-control-label form-label" for="customCheck4">11-Piece FIS
                                        Executive Desk Set</label>
                                    <span>(2)</span>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                                    <label class="custom-control-label form-label" for="customCheck5">Desk
                                        Set</label>
                                    <span>(3)</span>
                                </div>
                            </div>
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Filter by Items Included
                                    </h5>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label form-label" for="customCheck2">Desk
                                        Blotter</label>
                                    <span>(2)</span>
                                </div>
                            </div>
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Filter by Material
                                    </h5>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label form-label" for="customCheck2">Bonded Leather
                                    </label>
                                    <span>(2)</span>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label form-label" for="customCheck3">Aluminium &
                                        Wood</label>
                                    <span>(1)</span>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                                    <label class="custom-control-label form-label" for="customCheck4">Italian
                                        PU</label>
                                    <span>(2)</span>
                                </div>
                            </div>
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Filter by Number of items
                                    </h5>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label form-label" for="customCheck2">9 PIECES SET
                                    </label>
                                    <span>(2)</span>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label form-label" for="customCheck3">8 PIECES SET
                                    </label>
                                    <span>(1)</span>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                                    <label class="custom-control-label form-label" for="customCheck4">2 PIECES
                                        SET</label>
                                    <span>(2)</span>
                                </div>
                            </div> -->
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
                                    <ul class="list-unstyled">
                                    @if($prod['offerPercentage'] != '' || $prod['offerPercentage'] != 0) 
                                    <li class="discount">{{ $prod['offerPercentage'] }}% OFF </li>
                                    @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-info">
                                    <div class="product-title">
                                        <h4><a title="{{ $prod['name'] }}" href="{{ route('product-details',['sku' => $prod['sku'], 'slug' => $prod['slug']]) }}"> {{ $prod['name'] }}
                                            </a></h4>
                                    </div>
                                </div>
                                <div class="product-prize">
                                    <p><span class="me-2">{{ $prod['originalPrice'] }}</span>{{ $prod['offerPrice'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach  
        </div>
        <div class="row">
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
       
        @endif
    </div>
</section>
<!--=================================
      product -->
@endsection

@push('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
@endpush

@push('footer')
<script>
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
                    if (resData.html == '') {
                        $('#loadMoreDiv').html("<img src='{{ asset('images/no-product.png')}}' alt=''><h4>No products Found</h4>");
                    }
                }
                
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
    }
</script>
@endpush