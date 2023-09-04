<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Pages\Pages;
use App\Models\Product;
use App\Models\AwardDetails;
use App\Models\HistoryDetails;
use App\Models\Teams;
use App\Models\Gallery;
use App\Models\PackageSteps;
use App\Models\Faqs;
use App\Models\Career;
use App\Models\BusinessSettings;
use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
use DB;
use App;

class ProductsController extends Controller
{
    protected  $options = [];

    public function __construct()
    {
        if (App::environment('local')) {
            $this->options = ['verify'=>false];
        }
    }

    public function index()
    {
        $response =  Http::withOptions($this->options)->withHeaders(['accessToken' => env('API_ACCESS_TOKEN')])
                            ->get(env('API_BASE_URL').'get-category');

        $result = $response->getBody()->getContents();
        $result = json_decode($result, true);
          
        echo '<pre>';
        print_r($result);
        die;
    }

    public function getProductsList(Request $request){
        $pageSettings = '';

        $data['category'] = $request->category;
        $data['attributes'] = [];
        $data['brands'] = [];
        $data['discountRange'] = '';
        $data['limit'] = '24';
        $data['offset'] = '1';
        $data['priceRange'] = '';
        $data['searchKey'] = '';
        $data['sortBy'] = '5';

        $result = $this->getCategoryProducts($data);

        return view('frontend.products')
                    ->with([
                        'result' => $result
                    ]);
    }

    public function getCategoryProducts($data)
    {
        //  echo '<pre>'; print_r($data); die;
        $response =  Http::withOptions($this->options)->withHeaders(['accessToken' => env('API_ACCESS_TOKEN')])
                            ->post(env('API_BASE_URL').'search?limit='.$data['limit'].'&offset='.$data['offset'],[
                                'category' => $data['category'],
                                'attributes' => $data['attributes'],
                                'brands' => $data['brands'],
                                'discountRange' => $data['discountRange'],
                                'limit' => $data['limit'],
                                'offset' => $data['offset'],
                                'priceRange' => $data['priceRange'],
                                'searchKey' => $data['searchKey'],
                                'sortBy' => $data['sortBy'],
                            ]);

        $result = $response->getBody()->getContents();
        $result = json_decode($result, true);
        $result = (isset($result['data'][0])) ? $result['data'][0] : [];
          
        return $result;
    }

    public function loadMoreProducts(Request $request){
        $pageSettings = '';
        // echo '<pre>'; print_r($request->all()); 
       
        $data['category'] = $request->category ?? "";
        $data['attributes'] = $request->attrbts ?? [];
        $data['brands'] = $request->brands ?? [];
        $data['discountRange'] = $request->discountRange ?? "";
        $data['limit'] = $request->limit;
        $data['offset'] = $request->offset;
        $data['priceRange'] = $request->priceRange ?? "";
        $data['searchKey'] = '';
        $data['sortBy'] = $request->sortBy;

        // echo '<pre>';
        // print_r($data['attributes']);

        $result = $this->getCategoryProducts($data);
        // print_r($result);
        //  die;
        $details['result'] = $result;
        $details['html'] = view('frontend.ajax-products', compact('result'))->render();
        // return view('frontend.products')
        //             ->with([
        //                 'result' => $result
        //             ]);

        return json_encode($details);
    }

    public function getProductDetails(Request $request){
        $pageSettings = '';
        $sku = $request->sku;
        $slug = $request->slug;

        $response =  Http::withOptions($this->options)->withHeaders(['accessToken' => env('API_ACCESS_TOKEN')])
                                ->post(env('API_BASE_URL').'products',[
                                    'id' => $sku
                                ]);

        $result = $response->getBody()->getContents();
        $result = json_decode($result, true);
//         echo '<pre>';
//         print_r($result);
// die;

        $result = $result['data'];
        $this->loadProductSEO($result['seo']);
        
        return view('frontend.product_details')
                    ->with([
                        'result' => $result
                    ]);
    }

    public function loadProductSEO($data)
    {
       
        SEOTools::setTitle($data['meta_title']);
        OpenGraph::setTitle($data['meta_title']);
        TwitterCard::setTitle($data['meta_title']);
        SEOMeta::setTitle($data['meta_title']);
        SEOMeta::setDescription($data['meta_description']);
        SEOMeta::addKeyword($data['meta_keywords']);

        OpenGraph::setTitle($data['og_title']);
        OpenGraph::setDescription($data['og_description']);
        OpenGraph::setUrl($data['og_url']);
        OpenGraph::addProperty('locale', 'en_US');
        // image

        TwitterCard::setTitle($data['twitter_title']);
        TwitterCard::setSite("@DmuDubai");
        TwitterCard::setDescription($data['twitter_description']);
    }
}
