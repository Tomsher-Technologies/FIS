<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages\Pages;
use App\Models\Pages\Modules;
use App\Models\Pages\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use DB;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }
    public function store(Request $request)
    {
        $seo_url = $this->checkSEOUrlExist($request->get("seo_url"),$request->get('type'));
        $page = Pages::updateOrCreate([
                    'page_id_name'   => $request->get('type'),
                ],[
                    'page_name' => $request->get('title'),
                    'seo_url'    => $seo_url
                ]);
              
        $module = Modules::updateOrCreate([
                    'pages_id'   => $page->id,
                ],[
                    'name' => $request->get('title'),
                    'heading'    => $request->get("title"),
                    'sub_heading'    => $request->get("sub_title"),
                    'content'    => $request->get("description"),
                    'seo_title'    => $request->get("seotitle"),
                    'og_title'    => $request->get("ogtitle"),
                    'twitter_title'    => $request->get("twtitle"),
                    'seo_description'    => $request->get("seodescription"),
                    'og_description'    => $request->get("og_description"),
                    'twitter_description'    => $request->get("twitter_description"),
                    'keywords'    => $request->get("seokeywords")
                ]);
    }

    public function getData(Request $request){
        $type = $request->type;
        $result = Pages::leftJoin('modules', 'modules.pages_id', '=', 'pages.id')
        ->where('pages.page_id_name','=',"$type")
        ->get();
        return json_encode( $result);
    }
    function checkSEOUrlExist($url, $type){
        $result = Pages::where('seo_url','LIKE',"$url")->where('page_id_name','!=',$type)->get();
        if(!empty($result[0])){
            return $url.'-'.strtolower(Str::random(2));
        }else{
            return $url;
        }
    }
    public function faq()
    {
        $faqs = Faq::get();
        return view('admin.pages.faq_list')->with('faqs', $faqs);
    }

    public function createFaq()
    {
         return view('admin.pages.faq_create')->with('faq', array());
    }

    public function storeFaq(Request $request)
    {
        $page = Faq::updateOrCreate([
            'id'   => $request->get('faq_id'),
        ],[
            'title' => $request->get('title'),
            'description'    => $request->description,
            'status'    => $request->status,
        ]);
    }
    public function editFaq($id)
    {
        $faqs = Faq::find($id);
         return view('admin.pages.faq_create')->with('faq', $faqs);
    }
    public function deleteFaq(Request $request){
        $faq = Faq::find($request->id);
        $faq->delete();
    }
   
}
