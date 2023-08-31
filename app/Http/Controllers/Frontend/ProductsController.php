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

    public function getProductsList(){
        $pageSettings = '';
        return view('frontend.products')
                    ->with([
                        'pageSettings' => $pageSettings
                    ]);
    }

    public function getProductDetails(Request $request){
        $pageSettings = '';
        $sku = $request->sku;
        $slug = $request->slug;
        
        return view('frontend.product_details')
                    ->with([
                        'pageSettings' => $pageSettings
                    ]);
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
}
