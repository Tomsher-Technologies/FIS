<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Pages\Pages;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\URL;

class FrontendController extends Controller
{
    public function catchAll(Request $request)
    {
        $view = "";
        $uriSegments = explode("/", parse_url($request->path(), PHP_URL_PATH));

        // $pages = Cache::rememberForever('url_pages', function () {
        //     return Pages::all();
        // });

        $pages = Pages::all();


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
        $page->load(['seo']);
        $this->loadSEO($page);

        $banners = Cache::rememberForever('banners', function () {
            return Banner::whereStatus(1)->latest()->get();
        });

        $blogs = Cache::rememberForever('blogs', function () {
            return Blog::whereStatus(1)->latest()->limit(3)->get();
        });

        $blog_first = $blogs->slice(0, 1)->first();
        $blog_second = $blogs->slice(1, 2)->all();

        $products = Cache::rememberForever('products', function () {
            return Product::whereStatus(1)->latest()->limit(10)->get();
        });

        return view('frontend.home')
            ->with([
                'page' => $page,
                'banners' => $banners,
                'blog_first' => $blog_first,
                'blog_second' => $blog_second,
                'products' => $products,
            ]);
    }

    public function contact($page)
    {
        $page->load(['seo']);
        $this->loadSEO($page);

        return view('frontend.contact-us')
            ->with([
                'page' => $page,
            ]);
    }

    public function mediaCenter($page)
    {
        $page->load(['seo']);
        $this->loadSEO($page);

        return view('frontend.media-center')
            ->with([
                'page' => $page,
            ]);
    }

    public function history($page)
    {
        $page->load(['seo']);
        $this->loadSEO($page);

        return view('frontend.history')
            ->with([
                'page' => $page,
            ]);
    }

    public function missionVision($page)
    {
        $page->load(['seo']);
        $this->loadSEO($page);

        return view('frontend.mission')
            ->with([
                'page' => $page,
            ]);
    }

    public function awards($page)
    {
        $page->load(['seo']);
        $this->loadSEO($page);

        return view('frontend.awards')
            ->with([
                'page' => $page,
            ]);
    }

    public function directors($page)
    {
        $page->load(['seo']);
        $this->loadSEO($page);

        return view('frontend.directors')
            ->with([
                'page' => $page,
            ]);
    }

    public function management($page)
    {
        $page->load(['seo']);
        $this->loadSEO($page);

        return view('frontend.management')
            ->with([
                'page' => $page,
            ]);
    }

    public function loadSEO($model)
    {
        // Load Defaults
        SEOTools::setTitle($model->page_name);
        OpenGraph::setTitle($model->page_name);
        TwitterCard::setTitle($model->page_name);

        if ($model->seo) {
            SEOMeta::setTitle($model->seo->title);
            SEOMeta::setDescription($model->seo->description);
            SEOMeta::addKeyword($model->seo->keywords);

            OpenGraph::setTitle($model->seo->og_title);
            OpenGraph::setDescription($model->seo->og_description);
            OpenGraph::setUrl(URL::full());
            OpenGraph::addProperty('locale', 'en_US');
            // image

            JsonLd::setTitle($model->seo->title);
            JsonLd::setDescription($model->seo->description);
            JsonLd::setType('Page');

            TwitterCard::setTitle($model->seo->twitter_title);
            TwitterCard::setSite("@DmuDubai");
            TwitterCard::setDescription($model->seo->twitter_description);

            if ($model->featuredImage) {
                SEOTools::jsonLd()->addImage(URL::to($model->featuredImage->url));
            } else if ($model->media) {
                SEOTools::jsonLd()->addImage(URL::to($model->media->url));
            } else {
                SEOTools::jsonLd()->addImage(URL::to(asset('favicon.ico')));
            }

            SEOMeta::addKeyword($model->seo->keywords);
        }
    }
}
