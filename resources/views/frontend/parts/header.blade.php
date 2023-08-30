  <!--=================================
    header -->
  <header class="header header-style-02">
      <div class="topbar">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="d-flex">
                          <a class="navbar-brand" href="{{ route('home') }}">
                              <img class="img-fluid" src="{{ asset('images/logo.svg') }}" alt="logo" />
                          </a>
                          <div class="contact-info ms-auto align-items-center d-none d-lg-flex col-md-8">
                              <ul>
                                  <li>
                                      <i class="flaticon-pin"></i>
                                      <span>
                                          <label class="d-block">
                                              {!! getValueFromSetting($settings, 'address') !!}
                                          </label>
                                      </span>
                                  </li>

                                  <li>
                                      <i class="flaticon-phone"></i>
                                      <span>
                                          <label class="d-block">
                                              <a
                                                  href="tel:{{ str_replace(' ', '', getValueFromSetting($settings, 'phone')) }}">
                                                  {{ getValueFromSetting($settings, 'phone') }}
                                              </a>
                                          </label>
                                          <label class="d-block">
                                              {{ getValueFromSetting($settings, 'working_time') }}
                                          </label>
                                      </span>
                                  </li>
                                  <li>
                                      <i class="flaticon-envelope"></i>
                                      <span>
                                          <label class="d-block">
                                              <a href="mailto:{{ getValueFromSetting($settings, 'email') }}">
                                                  {{ getValueFromSetting($settings, 'email') }}
                                              </a>
                                          </label>
                                      </span>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      @php   
        $aboutContent = getValueFromSetting($settings, 'about_content');
      @endphp
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm-12 position-relative">
                  <nav class="navbar navbar-static-top navbar-expand-lg">
                      <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                          data-bs-target=".navbar-collapse">
                          <i class="fas fa-align-left"></i>
                      </button>
                      <div class="navbar-collapse collapse">
                          <ul class="nav navbar-nav">
                              <li class="nav-item active">
                                  <a href="{{ route('home') }}" class="nav-link">
                                      Home
                                  </a>
                              </li>
                              <li class="dropdown nav-item mega-menu">
                                  <a href="#" class="nav-link" data-bs-toggle="dropdown">
                                      About us</a>
                                  <ul class="dropdown-menu megamenu">
                                      <li>
                                          <div class="row justify-content-between">
                                              <div class="col-sm-6 col-lg-4">
                                                  <h6 class="mb-3 nav-title text-primary">
                                                      About FAROOK
                                                  </h6>
                                                  <p>
                                                  {{ $aboutContent }}
                                                  </p>

                                                  <a class="btn btn-dark btn-round text-white"
                                                      href="{{ getSEOUrl('about_us') }}">Explore About
                                                      Farook
                                                      <i class="fas fa-arrow-right ps-3"></i>
                                                  </a>
                                              </div>
                                              <div class="col-sm-6 col-lg-2">
                                                  <h6 class="mb-3 nav-title text-primary">
                                                      Our Profile
                                                  </h6>
                                                  <ul class="list-unstyled mt-lg-3">
                                                      <li>
                                                          <a href="{{ getSEOUrl('history') }}">History and
                                                              Evolution
                                                          </a>
                                                      </li>
                                                  </ul>

                                                  <h6 class="mb-3 nav-title text-primary">
                                                      Our values
                                                  </h6>
                                                  <ul class="list-unstyled mt-lg-3">
                                                      <li>
                                                          <a href="{{ getSEOUrl('mission_vision') }}">Vision &
                                                              Mission
                                                          </a>
                                                      </li>
                                                      <li>
                                                          <a href="{{ getSEOUrl('awards') }}">Awards &
                                                              Accolades
                                                          </a>
                                                      </li>
                                                  </ul>
                                              </div>
                                              <div class="col-sm-6 col-lg-2">
                                                  <h6 class="mb-3 nav-title text-primary">
                                                      Leadership
                                                  </h6>
                                                  <ul class="list-unstyled mt-lg-3">
                                                      <li>
                                                          <a href="{{ getSEOUrl('directors') }}">Board of
                                                              Directors
                                                          </a>
                                                      </li>
                                                      <li>
                                                          <a href="{{ getSEOUrl('management') }}">Management
                                                          </a>
                                                      </li>
                                                  </ul>
                                              </div>
                                              <div class="col-sm-6 col-lg-3">
                                                  <div class="shop_now_img position-relative">
                                                      <img src="images/shop_img.webp"
                                                          class="img-fluid position-relative" alt="" />
                                                      <a class="btn btn-dark btn-round text-white px-4 font-sm"
                                                          href="https://www.farookonline.com/" target="_blank">
                                                          SHOP NOW ONLINE
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>
                                      </li>
                                  </ul>
                              </li>
                              <li class="dropdown nav-item mega-menu">
                                  <a href="#" class="nav-link" data-bs-toggle="dropdown">Services
                                  </a>
                                  <ul class="dropdown-menu megamenu">
                                      <li>
                                          <div class="row justify-content-between">
                                              <div class="col-sm-6 col-lg-3">
                                                  <h6 class="mb-3 nav-title text-primary">
                                                      About FAROOK
                                                  </h6>
                                                  <p>
                                                  {{ $aboutContent }}
                                                  </p>

                                                  <a class="btn btn-dark btn-round text-white"
                                                      href="{{ getSEOUrl('about_us') }}">Explore About Farook
                                                      <i class="fas fa-arrow-right ps-3"></i>
                                                  </a>
                                              </div>
                                              <div class="col-sm-6 col-lg-3">
                                                  <h6 class="mb-3 nav-title text-primary">
                                                      Our Services
                                                  </h6>
                                                  <ul class="list-unstyled mt-lg-3">
                                                    @php 
                                                    $services = getAllServices();
                                                    @endphp
                                                    @foreach ($services as $service)
                                                      <li>
                                                          <a href="{{ getSEOUrl($service->type) }}">{{$service->title}}
                                                          </a>
                                                      </li>
                                                    @endforeach
                                                  </ul>
                                              </div>
                                              <div class="col-sm-6 col-lg-5">
                                                  <div class="shop_now_img position-relative">
                                                      <img src="images/shop_img1.webp"
                                                          class="img-fluid position-relative" alt="" />
                                                      <a class="btn btn-dark btn-round text-white px-4 font-sm"
                                                          href="https://www.farookonline.com/" target="_blank">
                                                          SHOP NOW ONLINE
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>
                                      </li>
                                  </ul>
                              </li>
                              <li class="dropdown nav-item mega-menu">
                                  <a href="#" class="nav-link" data-bs-toggle="dropdown">Businesses</a>
                                  <ul class="dropdown-menu megamenu">
                                      <li>
                                          <div class="row justify-content-between">
                                              <div class="col-sm-6 col-lg-4">
                                                  <h6 class="mb-3 nav-title text-primary">
                                                      About FAROOK
                                                  </h6>
                                                  <p>
                                                  {{ $aboutContent }}
                                                  </p>

                                                  <a class="btn btn-dark btn-round text-white"
                                                      href="{{ getSEOUrl('about_us') }}" target="_blank">Explore
                                                      About
                                                      Farook
                                                      <i class="fas fa-arrow-right ps-3"></i>
                                                  </a>
                                              </div>
                                              <div class="col-sm-6 col-lg-2">
                                                  <h6 class="mb-3 nav-title text-primary">
                                                      Businesses
                                                  </h6>
                                                  <ul class="list-unstyled mt-lg-3">
                                                      <li>
                                                          <a href="{{ getSEOUrl('agencies') }}">Agencies
                                                          </a>
                                                      </li>
                                                      <li>
                                                          <a href="{{ getSEOUrl('product_catalogue') }}">Products
                                                              Catalogues
                                                          </a>
                                                      </li>
                                                      <li>
                                                          <a href="{{ getSEOUrl('agencies_catalogue') }}">Agencies Catalogue
                                                          </a>
                                                      </li>
                                                  </ul>

                                                  <h6 class="mb-3 nav-title text-primary">
                                                      Production
                                                  </h6>
                                                  <ul class="list-unstyled mt-lg-3">
                                                      <li>
                                                          <a href="{{ getSEOUrl('materials') }}">Materials</a>
                                                      </li>
                                                      <li>
                                                          <a href="{{ getSEOUrl('packaging') }}">Packaging
                                                          </a>
                                                      </li>
                                                  </ul>
                                              </div>
                                              <div class="col-sm-6 col-lg-2">
                                                  <h6 class="mb-3 nav-title text-primary">
                                                      Businesses
                                                  </h6>
                                                  <ul class="list-unstyled mt-lg-3">
                                                      <li>
                                                          <a href="{{ getSEOUrl('brands') }}">Brands
                                                          </a>
                                                      </li>
                                                      <li>
                                                          <a href="{{ getSEOUrl('store_location') }}">Store
                                                              Location
                                                          </a>
                                                      </li>
                                                      <li>
                                                          <a href="https://www.farookonline.com/" target="_blank">Shop
                                                              Online
                                                          </a>
                                                      </li>
                                                  </ul>
                                              </div>
                                              <div class="col-sm-6 col-lg-3">
                                                  <div class="shop_now_img position-relative">
                                                      <img src="images/shop_img2.webp"
                                                          class="img-fluid position-relative" alt="" />
                                                      <a class="btn btn-dark btn-round text-white px-4 font-sm"
                                                          href="https://www.farookonline.com/" target="_blank">
                                                          SHOP NOW ONLINE
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>
                                      </li>
                                  </ul>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ getSEOUrl('media_center') }}" class="nav-link">Media center</a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ getSEOUrl('contact') }}" class="nav-link">Contact Us</a>
                              </li>
                          </ul>
                          {{-- <div class="d-none d-lg-flex ms-md-auto">
                              <a class="btn btn-dark btn-round text-white" href="#">Enquiry</a>
                          </div> --}}
                      </div>
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!--=================================
header -->
