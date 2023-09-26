        <!--=================================
    footer-->
        <footer class="footer space-pt">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-contact-info">
                            <a href="{{ route('home') }}"><img class="img-fluid mb-4" src="{{ asset('images/logo_f.png') }}" alt="logo" /></a>
                            <p class="mb-2 mb-sm-4">
                               {{ getValueFromSetting($settings, 'footer_content') }} 
                            </p>

                            <ul class="list-unstyled mb-0 social-icon">
                                <li>
                                    <a href="{!! getValueFromSetting($settings, 'facebook') !!}"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="{!! getValueFromSetting($settings, 'instagram') !!}"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="{!! getValueFromSetting($settings, 'twitter') !!}"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="{!! getValueFromSetting($settings, 'linkedin') !!}"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li>
                                    <a href="{!! getValueFromSetting($settings, 'youtube') !!}"><i class="fab fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-4 mt-md-0 ps-lg-5">
                        <h5 class="text-primary mb-2 mb-sm-4">Company</h5>
                        <div class="footer-link">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="{{ getSEOUrl('about_us') }}">About Company </a>
                                </li>
                                <li><a href="{{ getSEOUrl('history') }}">Our History</a></li>
                                <li>
                                    <a href="{{ getSEOUrl('mission_vision') }}">Our Mission & Vision</a>
                                </li>
                                <!-- <li>
                                    <a href="{{ getSEOUrl('directors') }}">Board of Directors</a>
                                </li> -->
                                <li>
                                    <a href="{{ getSEOUrl('management') }}">Leadership</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                        <h5 class="text-primary mb-2 mb-sm-4">Businesses</h5>
                        <div class="footer-link">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="{{ getSEOUrl('product_catalogue') }}">Product Catalogue</a>
                                </li>
                                <li><a href="{{ getSEOUrl('agencies') }}">Agencies </a></li>
                                <li>
                                    <a href="{{ getSEOUrl('agencies_catalogue') }}">Agencies Catalogue</a>
                                </li>
                                <li>
                                    <a href="{{ getSEOUrl('store_location') }}">Store Location</a>
                                </li>
                                <li>
                                    <a href="{{ env('SITE_LINK') }}" target="_blank">Shop Online</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                        <h5 class="text-primary mb-2 mb-sm-4">Resources</h5>
                        <div class="footer-link">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="{{ getSEOUrl('privacy') }}">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="{{ getSEOUrl('terms') }}">Terms & Conditions</a>
                                </li>
                                <li><a href="{{ getSEOUrl('faq') }}">Help & FAQ</a></li>
                                <li><a href="{{ getSEOUrl('contact') }}">Contact Us</a></li>
                                <li><a href="{{ getSEOUrl('careers') }}">Careers</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom bg-dark mt-3 mt-md-5 py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <p class="mb-0 text-white">
                                © <script>document.write(new Date().getFullYear())</script> Farook, All Rights Reserved. Design By
                                <a target="_blank" href="https://www.tomsher.com/">Tomsher</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--=================================
footer-->
