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
use App\Models\Enquiries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\URL;
use DB;

class FrontendController extends Controller
{
    public function catchAll(Request $request)
    {
        $view = "";
        $uriSegments = explode("/", parse_url($request->path(), PHP_URL_PATH));

        // $pages = Cache::rememberForever('url_pages', function () {
        //     return Pages::all();
        // });

        $pages = Pages::with(['moudels'])->get();


        // try {
        $page = $pages->where('seo_url', $uriSegments[0])->firstOrFail();

        $functionName = $page->getFunctionName();
        // dd($functionName);

        if (!method_exists(FrontendController::class, $functionName)) {
            abort(404);
        }

        $view = $this->$functionName($page, $uriSegments[1] ?? null);
        return $view;
        // } catch (\Exception $exception) {
        //     abort(404);
        // }
        abort(404);
    }

    public function home()
    {
        $page = Pages::where('page_id_name', 'home')->firstOrFail();
        // $page->load(['seo']);
        $this->loadSEO($page);

        // $banners = Cache::rememberForever('banners', function () {
        //     return Banner::whereStatus(1)->latest()->get();
        // });
        $banners = Banner::whereStatus(1)->latest()->get();
        $blogs = Blog::whereStatus(1)->latest()->limit(3)->get();

        $brands = Brand::whereStatus(1)->latest()->get();

        $blog_first = $blogs->slice(0, 1)->first();
        $blog_second = $blogs->slice(1, 2)->all();

        // $products = Cache::rememberForever('products', function () {
        //     return Product::whereStatus(1)->latest()->limit(10)->get();
        // });
        $products = Product::whereStatus(1)->latest()->limit(10)->get();
        
        $about =  Pages::leftJoin('modules', 'modules.pages_id', '=', 'pages.id')
            ->where('pages.page_id_name','=','about_us')
            ->get();
        
        $pageSettings = getPageSettings();

        $general = getGeneralSettings();
        return view('frontend.home')
            ->with([
                'page' => $page,
                'banners' => $banners,
                'brands' => $brands,
                'blog_first' => $blog_first,
                'blog_second' => $blog_second,
                'products' => $products,
                'about' => $about,
                'general' => $general,
                'pageSettings' => $pageSettings
            ]);
    }

    
    public function mediaCenter($page)
    {
        // $page->load(['seo']);
        $this->loadSEO($page);

        $pageSettings = getPageDetails('media_center');
        $pageSettings = $pageSettings[0] ?? [];
        $media = Gallery::get();
       
        return view('frontend.media-center')->with([
                'page' => $page,
                'pageSettings' => $pageSettings,
                'media' => $media
            ]);
    }

    public function history($page)
    {
        // $page->load(['seo']);
        $this->loadSEO($page);
        $pageSettings = getPageDetails('history');
        $pageSettings = $pageSettings[0] ?? [];
        $history = HistoryDetails::orderBy('year','ASC')->get();
        //  echo '<pre>';
        // print_r($history);
        // die;
        return view('frontend.history')
            ->with([
                'page' => $page,
                'pageSettings' => $pageSettings,
                'history' => $history
            ]);
    }

    public function aboutUs($page)
    {
        // $page->load(['seo']);
        $this->loadSEO($page);

        $pageSettings = getPageDetails('about_us');
        $pageSettings = $pageSettings[0] ?? [];
        $general = getGeneralSettings();
        $brands = Brand::whereStatus(1)->latest()->get();
        return view('frontend.about_us')
            ->with([
                'page' => $page,
                'general' => $general,
                'pageSettings' => $pageSettings,
                'brands' => $brands
            ]);
    }

    public function csrActivities($page)
    {
        // $page->load(['seo']);
        $this->loadSEO($page);

        $pageSettings = getPageDetails('csr_activities');
        $pageSettings = $pageSettings[0] ?? [];
        // echo '<pre>';
        // print_r($pageSettings);
        // die;
        return view('frontend.services')
            ->with([
                'page' => $page,
                'pageSettings' => $pageSettings,
            ]);
    }

    public function wholesaler($page)
    {
        // $page->load(['seo']);
        $this->loadSEO($page);

        $pageSettings = getPageDetails('wholesaler');
        $pageSettings = $pageSettings[0] ?? [];
        // echo '<pre>';
        // print_r($pageSettings);
        // die;
        return view('frontend.services')
            ->with([
                'page' => $page,
                'pageSettings' => $pageSettings,
            ]);
    }

    public function importExports($page){
        // $page->load(['seo']);
        $this->loadSEO($page);

        $pageSettings = getPageDetails('import_exports');
        $pageSettings = $pageSettings[0] ?? [];
        return view('frontend.services')
            ->with([
                'page' => $page,
                'pageSettings' => $pageSettings,
            ]);
    }

    public function manufacturer($page){
        // $page->load(['seo']);
        $this->loadSEO($page);

        $pageSettings = getPageDetails('manufacturer');
        $pageSettings = $pageSettings[0] ?? [];
        return view('frontend.services')
            ->with([
                'page' => $page,
                'pageSettings' => $pageSettings,
            ]);
    }
    public function officeStationery($page){
        // $page->load(['seo']);
        $this->loadSEO($page);

        $pageSettings = getPageDetails('office_stationery');
        $pageSettings = $pageSettings[0] ?? [];
        return view('frontend.services')
            ->with([
                'page' => $page,
                'pageSettings' => $pageSettings,
            ]);
    }
    public function missionVision($page)
    {
        // $page->load(['seo']);
        $this->loadSEO($page);

        $pageSettings = getPageDetails('mission_vision');
        $pageSettings = $pageSettings[0] ?? [];
        $general = getGeneralSettings();
        return view('frontend.mission')
            ->with([
                'page' => $page,
                'general' => $general,
                'pageSettings' => $pageSettings,
            ]);
    }

    public function awards($page)
    {
        // $page->load(['seo']);
        $this->loadSEO($page);

        $pageSettings = getPageDetails('awards');
        $pageSettings = $pageSettings[0] ?? [];
        $awards = AwardDetails::orderBy('id','ASC')->get();
        return view('frontend.awards')
            ->with([
                'page' => $page,
                'pageSettings' => $pageSettings,
                'awards' => $awards
            ]);
    }

    public function directors($page)
    {
        // $page->load(['seo']);
        $this->loadSEO($page);
        $pageSettings = getPageDetails('directors');
        $pageSettings = $pageSettings[0] ?? [];
        $directors = Teams::where('type','director')->orderBy('id','ASC')->get();
        $general = getGeneralSettings();
        return view('frontend.directors')
            ->with([
                'page' => $page,
                'pageSettings' => $pageSettings,
                'directors' => $directors,
                'general' => $general,
            ]);
    }

    public function management($page)
    {
        // $page->load(['seo']);
        $this->loadSEO($page);
        $pageSettings = getPageDetails('management');
        $pageSettings = $pageSettings[0] ?? [];
        $teams = Teams::where('type','management')->orderBy('id','ASC')->get();
        $general = getGeneralSettings();
        return view('frontend.management')
            ->with([
                'page' => $page,
                'pageSettings' => $pageSettings,
                'teams' => $teams,
                'general' => $general,
            ]);
    }

    public function loadSEO($model)
    {
        // echo '<pre>';
        // print_r($model->moudels[0]);
        // die;
        // Load Defaults
        SEOTools::setTitle($model->page_name);
        OpenGraph::setTitle($model->page_name);
        TwitterCard::setTitle($model->page_name);

        if (isset($model->moudels[0])) {
            SEOMeta::setTitle($model->moudels[0]->seo_title);
            SEOMeta::setDescription($model->moudels[0]->seo_description);
            SEOMeta::addKeyword($model->moudels[0]->keywords);

            OpenGraph::setTitle($model->moudels[0]->og_title);
            OpenGraph::setDescription($model->moudels[0]->og_description);
            OpenGraph::setUrl(URL::full());
            OpenGraph::addProperty('locale', 'en_US');
            // image

            JsonLd::setTitle($model->moudels[0]->seo_title);
            JsonLd::setDescription($model->moudels[0]->seo_description);
            JsonLd::setType('Page');

            TwitterCard::setTitle($model->moudels[0]->twitter_title);
            TwitterCard::setSite("@DmuDubai");
            TwitterCard::setDescription($model->moudels[0]->twitter_description);

            if ($model->featuredImage) {
                SEOTools::jsonLd()->addImage(URL::to($model->featuredImage->url));
            } else if ($model->media) {
                SEOTools::jsonLd()->addImage(URL::to($model->media->url));
            } else {
                SEOTools::jsonLd()->addImage(URL::to(asset('favicon.ico')));
            }

            SEOMeta::addKeyword($model->moudels[0]->keywords);
        }
    }

    public function productCatalogue($page){
        // $page->load(['seo']);
        $this->loadSEO($page);
        $pageSettings = getPageDetails('product_catalogue');
        $pageSettings = $pageSettings[0] ?? [];
        $catalogues = BusinessSettings::where('type','product_catalogue')->where('status',1)->orderBy('id','ASC')->get();
        return view('frontend.product_catalogue')
                    ->with([
                        'page' => $page,
                        'pageSettings' => $pageSettings,
                        'catalogues' => $catalogues
                    ]);
    }

    public function agenciesCatalogue($page){
        // $page->load(['seo']);
        $this->loadSEO($page);
        $pageSettings = getPageDetails('agencies_catalogue');
        $pageSettings = $pageSettings[0] ?? [];
        $catalogues = BusinessSettings::where('type','agencies_catalogue')->where('status',1)->orderBy('id','ASC')->get();
        return view('frontend.product_catalogue')
                    ->with([
                        'page' => $page,
                        'pageSettings' => $pageSettings,
                        'catalogues' => $catalogues
                    ]);
    }

    public function agencies($page){
        // $page->load(['seo']);
        $this->loadSEO($page);
        $pageSettings = getPageDetails('agencies');
        $pageSettings = $pageSettings[0] ?? [];
        $agencies = BusinessSettings::where('type','agency')->where('status',1)->orderBy('id','ASC')->get();
        return view('frontend.agencies')
                    ->with([
                        'page' => $page,
                        'pageSettings' => $pageSettings,
                        'agencies' => $agencies
                    ]);
    }

    public function materials($page){
        // $page->load(['seo']);
        $this->loadSEO($page);
        $pageSettings = getPageDetails('materials');
        $pageSettings = $pageSettings[0] ?? [];
        $material = BusinessSettings::where('type','material')->where('status',1)->orderBy('id','ASC')->get();
        return view('frontend.material')
                    ->with([
                        'page' => $page,
                        'pageSettings' => $pageSettings,
                        'material' => $material
                    ]);
    }

    public function packaging($page){
        // $page->load(['seo']);
        $this->loadSEO($page);
        $pageSettings = getPageDetails('packaging');
        $pageSettings = $pageSettings[0] ?? [];
        $steps = PackageSteps::orderBy('id','ASC')->get();
        return view('frontend.packaging')
                    ->with([
                        'page' => $page,
                        'pageSettings' => $pageSettings,
                        'steps' => $steps
                    ]);
    }

    public function brands($page){
        // $page->load(['seo']);
        $this->loadSEO($page);
        $pageSettings = getPageDetails('brands');
        $pageSettings = $pageSettings[0] ?? [];
        $brands = Brand::whereStatus(1)->latest()->get();
        return view('frontend.brands')
                    ->with([
                        'page' => $page,
                        'pageSettings' => $pageSettings,
                        'brands' => $brands
                    ]);
    }

    public function storeLocation($page){
        // $page->load(['seo']);
        $this->loadSEO($page);
        $pageSettings = getPageDetails('store_location');
        $pageSettings = $pageSettings[0] ?? [];
        
        return view('frontend.store_location')
                    ->with([
                        'page' => $page,
                        'pageSettings' => $pageSettings,
                    ]);
    }

    public function privacy($page){
        // $page->load(['seo']);
        $this->loadSEO($page);
        $pageSettings = getPageDetails('privacy');
        $pageSettings = $pageSettings[0] ?? [];
        
        return view('frontend.privacy_terms')
                    ->with([
                        'page' => $page,
                        'pageSettings' => $pageSettings,
                    ]);
    }

    public function terms($page){
        // $page->load(['seo']);
        $this->loadSEO($page);
        $pageSettings = getPageDetails('terms');
        $pageSettings = $pageSettings[0] ?? [];
        
        return view('frontend.privacy_terms')
                    ->with([
                        'page' => $page,
                        'pageSettings' => $pageSettings,
                    ]);
    }

    public function faq($page){
        // $page->load(['seo']);
        $this->loadSEO($page);
        $pageSettings = getPageDetails('faq');
        $pageSettings = $pageSettings[0] ?? [];
        $faqs = Faqs::where('status',1)->orderBy('id','desc')->get();
        return view('frontend.faq')
                    ->with([
                        'page' => $page,
                        'pageSettings' => $pageSettings,
                        'faqs' => $faqs
                    ]);
    }

    public function careers($page){
        // $page->load(['seo']);
        $this->loadSEO($page);
        $pageSettings = getPageDetails('careers');
        $pageSettings = $pageSettings[0] ?? [];
        $careers = Career::where('status',1)->orderBy('id','desc')->get();
        return view('frontend.careers')
                    ->with([
                        'page' => $page,
                        'pageSettings' => $pageSettings,
                        'careers' => $careers
                    ]);
    }

    public function blogs($page){
        // $page->load(['seo']);
        $this->loadSEO($page);
        $pageSettings = getPageDetails('blogs');
        $pageSettings = $pageSettings[0] ?? [];
        $blogs = Blog::where('status',1)->orderBy('id','desc')->paginate(15);
        return view('frontend.blogs')
                    ->with([
                        'page' => $page,
                        'pageSettings' => $pageSettings,
                        'blogs' => $blogs
                    ]);
    }

    public function contact($page){
        // $page->load(['seo']);
        $this->loadSEO($page);
        $pageSettings = getPageDetails('contact');
        $pageSettings = $pageSettings[0] ?? [];
        
        return view('frontend.contact-us')
                    ->with([
                        'page' => $page,
                        'pageSettings' => $pageSettings
                    ]);
    }

    public function postContact(Request $request){
        $con = new Contacts;
        $con->name = $request->name;
        $con->email = $request->email;
        $con->phone = $request->phone;
        $con->subject = $request->subject;
        $con->message = $request->message;
        $con->save();
    }

    public function blog_details($id){
        // $page->load(['seo']);
        $blog = Blog::where('slug',$id)->get();
        if(isset($blog[0])){
            $this->loadBlogSEO($blog[0]);
        }
        
        $pageSettings = getPageDetails('blogs');
        $pageSettings = $pageSettings[0] ?? [];
        
        return view('frontend.blog_details')
                    ->with([
                        'pageSettings' => $pageSettings,
                        'blog' => $blog
                    ]);
    }

    public function loadBlogSEO($model)
    {
       
        SEOTools::setTitle($model->title);
        OpenGraph::setTitle($model->title);
        TwitterCard::setTitle($model->title);
        SEOMeta::setTitle($model->seo_title);
        SEOMeta::setDescription($model->seo_description);
        SEOMeta::addKeyword($model->keywords);

        OpenGraph::setTitle($model->og_title);
        OpenGraph::setDescription($model->og_description);
        OpenGraph::setUrl(URL::full());
        OpenGraph::addProperty('locale', 'en_US');
        // image

        JsonLd::setTitle($model->seo_title);
        JsonLd::setDescription($model->seo_description);
        JsonLd::setType('Page');

        TwitterCard::setTitle($model->twitter_title);
        TwitterCard::setSite("@DmuDubai");
        TwitterCard::setDescription($model->twitter_description);
    }

    public function postEnquiry(Request $request){
        $con = new Enquiries;
        $con->name = $request->name;
        $con->product_sku = $request->sku;
        $con->email = $request->email;
        $con->phone = $request->phone;
        $con->company = $request->company;
        $con->content = $request->message;
        $con->save();
    }
}
