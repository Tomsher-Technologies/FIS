<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Pages\Pages;
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

        $pages = Cache::rememberForever('url_pages', function () {
            return Pages::all();
        });

        try {
            $page = $pages->where('slug', $uriSegments[0])->firstOrFail();

            $functionName = $page->getFunctionName();

            if (!method_exists(FrontendController::class, $functionName)) {
                abort(404);
            }

            $view = $this->$functionName($page, $uriSegments[1] ?? null);
            return $view;
        } catch (\Exception $exception) {
            abort(404);
        }
        abort(404);
    }

    public function home()
    {
        $page = Pages::where('page_id_name', 'home')->firstOrFail();
        $page->load(['seo']);
        $this->loadSEO($page);

        return view('frontend.home')
            ->with(
                ['page' => $page]
            );
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
