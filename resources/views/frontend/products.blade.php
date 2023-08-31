@extends('layouts.frontend.app')
@section('content')
<!--=================================
    product -->
<section class="space-ptb">
    <div class="container">
        <div class="row mb-4 mb-lg-5 mb-md-4 align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="d-flex">
                    <a class="ms-3 text-secondary filter-btn" href="#" data-bs-toggle="offcanvas"
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
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Price</h5>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label form-label" for="customCheck2">500 AED to 700
                                        AED</label>
                                    <span>(8)</span>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label form-label" for="customCheck3">700 AED to
                                        1000 AED</label>
                                    <span>(2)</span>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                                    <label class="custom-control-label form-label" for="customCheck4">200 AED to 300
                                        AED</label>
                                    <span>(22)</span>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                                    <label class="custom-control-label form-label" for="customCheck5">300 AED to 500
                                        AED</label>
                                    <span>(16)</span>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck6">
                                    <label class="custom-control-label form-label" for="customCheck6">50 AED to 100
                                        AED</label>
                                    <span>(1)</span>
                                </div>
                                <div class="custom-control form-check custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck7">
                                    <label class="custom-control-label form-label" for="customCheck7">100 AED to 200
                                        AED</label>
                                    <span>(3)</span>
                                </div>
                            </div>
                            <div class="widget">
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
                            </div>
                            <div class="widget">
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
                            </div>
                        </div>
                    </div>
                </div>
                <!--=================================
              cart menu -->
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-md-end">
                <div class="select-border">
                    <select class="form-control basic-select">
                        <option value="1" selected="selected">Default sorting</option>
                        <option value="2">Sort by popularity</option>
                        <option value="3">Sort by average rating</option>
                        <option value="4">Sort by latest</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-3 col-md-6">
                <div class="product">
                    <div class="product-image thumbnail-bg">
                        <a href="{{ route('product-details',['sku' => 'SKU123', 'slug' => '11-Pieces-FIS-Executive-Desk-Set-Italian-PU-Dark-Brown-Office-Desk-Organizer-FSDS182DBR']) }}"> <img class="img-fluid" src="images/Products/gallery01.webp"
                                alt="image"></a>
                        <div class="custom-icon">
                            <ul class="list-unstyled">
                                <li class="discount">20% OFF</li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="product-info">
                            <div class="product-title">
                                <h4><a href="{{ route('product-details',['sku' => 'SKU123', 'slug' => '11-Pieces-FIS-Executive-Desk-Set-Italian-PU-Dark-Brown-Office-Desk-Organizer-FSDS182DBR']) }}"> 11 Pieces FIS Executive Desk Set Italian PU, Dark
                                        Brown - Office Desk Organizer - FSDS182DBR
                                    </a></h4>
                            </div>
                        </div>
                        <div class="product-prize">
                            <p><span class="me-2">AED 499.00</span>AED 399.20</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="product">
                    <div class="product-image thumbnail-bg">
                        <a href="shop-single.html"> <img class="img-fluid" src="images/Products/gallery04.webp"
                                alt="image"></a>
                        <div class="custom-icon">
                            <ul class="list-unstyled">
                                <li class="discount">20% OFF</li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="product-info">
                            <div class="product-title">
                                <h4><a href="shop-single.html"> 11 Pieces FIS Executive Desk Set Italian PU, Dark
                                        Brown - Office Desk Organizer - FSDS182DBR
                                    </a></h4>
                            </div>
                        </div>
                        <div class="product-prize">
                            <p><span class="me-2">AED 499.00</span>AED 399.20</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="product">
                    <div class="product-image thumbnail-bg">
                        <a href="shop-single.html"> <img class="img-fluid" src="images/Products/gallery03.webp"
                                alt="image"></a>
                        <div class="custom-icon">
                            <ul class="list-unstyled">
                                <li class="discount">20% OFF</li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="product-info">
                            <div class="product-title">
                                <h4><a href="shop-single.html"> 11 Pieces FIS Executive Desk Set Italian PU, Dark
                                        Brown - Office Desk Organizer - FSDS182DBR
                                    </a></h4>
                            </div>
                        </div>
                        <div class="product-prize">
                            <p><span class="me-2">AED 499.00</span>AED 399.20</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="product">
                    <div class="product-image thumbnail-bg">
                        <a href="shop-single.html"> <img class="img-fluid" src="images/Products/gallery04.webp"
                                alt="image"></a>
                        <div class="custom-icon">
                            <ul class="list-unstyled">
                                <li class="discount">20% OFF</li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="product-info">
                            <div class="product-title">
                                <h4><a href="shop-single.html"> 11 Pieces FIS Executive Desk Set Italian PU, Dark
                                        Brown - Office Desk Organizer - FSDS182DBR
                                    </a></h4>
                            </div>
                        </div>
                        <div class="product-prize">
                            <p><span class="me-2">AED 499.00</span>AED 399.20</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="product">
                    <div class="product-image thumbnail-bg">
                        <a href="shop-single.html"> <img class="img-fluid" src="images/Products/gallery05.webp"
                                alt="image"></a>
                        <div class="custom-icon">
                            <ul class="list-unstyled">
                                <li class="discount">20% OFF</li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="product-info">
                            <div class="product-title">
                                <h4><a href="shop-single.html"> 11 Pieces FIS Executive Desk Set Italian PU, Dark
                                        Brown - Office Desk Organizer - FSDS182DBR
                                    </a></h4>
                            </div>
                        </div>
                        <div class="product-prize">
                            <p><span class="me-2">AED 499.00</span>AED 399.20</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="product">
                    <div class="product-image thumbnail-bg">
                        <a href="shop-single.html"> <img class="img-fluid" src="images/Products/gallery06.webp"
                                alt="image"></a>
                        <div class="custom-icon">
                            <ul class="list-unstyled">
                                <li class="discount">20% OFF</li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="product-info">
                            <div class="product-title">
                                <h4><a href="shop-single.html"> 11 Pieces FIS Executive Desk Set Italian PU, Dark
                                        Brown - Office Desk Organizer - FSDS182DBR
                                    </a></h4>
                            </div>
                        </div>
                        <div class="product-prize">
                            <p><span class="me-2">AED 499.00</span>AED 399.20</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="product">
                    <div class="product-image thumbnail-bg">
                        <a href="shop-single.html"> <img class="img-fluid" src="images/Products/gallery07.webp"
                                alt="image"></a>
                    </div>
                    <div class="product-content">
                        <div class="product-info">
                            <div class="product-title">
                                <h4><a href="shop-single.html"> 11 Pieces FIS Executive Desk Set Italian PU, Dark
                                        Brown - Office Desk Organizer - FSDS182DBR
                                    </a></h4>
                            </div>
                        </div>
                        <div class="product-prize">
                            <p><span class="me-2">AED 499.00</span>AED 399.20</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="product">
                    <div class="product-image thumbnail-bg">
                        <a href="shop-single.html"> <img class="img-fluid" src="images/Products/gallery08.webp"
                                alt="image"></a>
                    </div>
                    <div class="product-content">
                        <div class="product-info">
                            <div class="product-title">
                                <h4><a href="shop-single.html"> 11 Pieces FIS Executive Desk Set Italian PU, Dark
                                        Brown - Office Desk Organizer - FSDS182DBR
                                    </a></h4>
                            </div>
                        </div>
                        <div class="product-prize">
                            <p><span class="me-2">AED 499.00</span>AED 399.20</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="product">
                    <div class="product-image thumbnail-bg">
                        <a href="shop-single.html"> <img class="img-fluid" src="images/Products/gallery09.webp"
                                alt="image"></a>
                    </div>
                    <div class="product-content">
                        <div class="product-info">
                            <div class="product-title">
                                <h4><a href="shop-single.html"> 11 Pieces FIS Executive Desk Set Italian PU, Dark
                                        Brown - Office Desk Organizer - FSDS182DBR
                                    </a></h4>
                            </div>
                        </div>
                        <div class="product-prize">
                            <p><span class="me-2">AED 499.00</span>AED 399.20</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="product">
                    <div class="product-image thumbnail-bg">
                        <a href="shop-single.html"> <img class="img-fluid" src="images/Products/gallery10.webp"
                                alt="image"></a>
                    </div>
                    <div class="product-content">
                        <div class="product-info">
                            <div class="product-title">
                                <h4><a href="shop-single.html"> 11 Pieces FIS Executive Desk Set Italian PU, Dark
                                        Brown - Office Desk Organizer - FSDS182DBR
                                    </a></h4>
                            </div>
                        </div>
                        <div class="product-prize">
                            <p><span class="me-2">AED 499.00</span>AED 399.20</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12 text-center mt-4">
                <ul class="pagination mb-0">
                    <li class="page-item active" aria-current="page"><span class="page-link">1 </span> <span
                            class="sr-only">(current)</span></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--=================================
      product -->
@endsection

@push('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
@endpush

@push('footer')

@endpush