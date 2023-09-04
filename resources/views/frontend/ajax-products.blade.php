
    @if(!empty($result['products']))
    <!-- <input type="text" name="offset" id="limit" value="{{ $result['limit'] }}"> -->
        @foreach($result['products'] as $prod)
            <div class="col-lg-3 col-md-6">
                <div class="product">
                    <div class="product-image thumbnail-bg">
                        <a href="{{ route('product-details',['sku' => $prod['sku'], 'slug' => $prod['slug']]) }}"> <img class="img-fluid" src="{{ env('API_IMAGE_URL').$prod['image'] }}"
                                alt="image"></a>
                        <div class="custom-icon">
                            <ul class="list-unstyled">
                                <li class="discount">@if($prod['offerPercentage'] != '' || $prod['offerPercentage'] != 0) {{ $prod['offerPercentage'] }}% OFF @endif</li>
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
  
        @if($result['totalCount'] >= $result['limit'])
            <div class="col-12 text-center mt-4" id="loadButton">
                <div class="text-center">
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
    @endif