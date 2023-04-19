<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages\Pages;
use App\Models\Pages\Modules;
use App\Models\Pages\Faq;
use App\Models\GeneralSettings;
use App\Models\HistoryDetails;
use App\Models\AwardDetails;
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
        if(isset($result[0])){
            if($result[0]['banner_image'] != NULL){
                $result[0]['banner_image'] = Storage::url('pages/'. $result[0]['banner_image']);
            }
            if($result[0]['image1'] != NULL){
                $result[0]['image1'] = Storage::url('pages/'. $result[0]['image1']);
            }
            if($result[0]['image2'] != NULL){
                $result[0]['image2'] = Storage::url('pages/'. $result[0]['image2']);
            }
            if($result[0]['image3'] != NULL){
                $result[0]['image3'] = Storage::url('pages/'. $result[0]['image3']);
            }
            if($result[0]['image'] != NULL){
                $result[0]['image'] = Storage::url('pages/'. $result[0]['image']);
            }

            $settings = GeneralSettings::get();
            if($settings){
                foreach($settings as$value){
                    if(in_array($value['type'], array('mission_vision','challenges','our_team','mission','vision','career_content','latest_news','contact_content'))){
                        $result[0][$value['type']] = array('value' => $value['value'], 'content' => $value['content'],'image' =>  Storage::url('pages/'. $value['image']));
                    }else{
                        $result[0][$value['type']] = $value['value'];
                    }
                }
            }
            $result[0]['history'] = HistoryDetails::get();
            $result[0]['awards'] = AwardDetails::get();
        }
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
        $faqs = Faq::orderBy('id','desc')->get();
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

    public function changeFaqStatus(Request $request){
        $status = ($request->status == 1) ? 0 : 1;
        $faqs = Faq::find($request->id);
        $faqs->update(['status'=> $status]);
    }
   
    public function settingsFaq(){
        return view('admin.pages.faq_setting')->with('faq', array());
    }
    public function storeFaqSettings(Request $request)
    {
        $seo_url = $this->checkSEOUrlExist($request->get("seo_url"),'faq');
        $data = $request->all();
        $data['seo_url'] = $seo_url;

        $fileName = '';
        if ($request->has('image')) {

            $file = $request->file('image');
           
            $fileName = time().'.'. $file->extension();  
            $file->move(base_path() . '/storage/app/public/pages', $fileName);
            $data['banner_image'] = $fileName;
        }

       
        $data['has_image'] = 0;
        $data['has_btn'] = 0;
        $data['title'] = $data['banner_title'];
        $data['sub_title'] = $data['banner_sub_title'];
        $data['type'] = 'faq';
        $this->savePageSettings($data);
    }

    public function savePageSettings($data){
        $image_array = array();
        if(isset($data['banner_image'])){
            $updateData = array( 
                                'page_name' => isset($data['banner_title']) ? $data['banner_title'] : NULL,
                                'seo_url'    => isset($data['seo_url']) ? $data['seo_url'] : NULL,
                                'banner_text' => isset($data['banner_title']) ? $data['banner_title'] : NULL,
                                'banner_content' => isset($data['banner_sub_title']) ? $data['banner_sub_title'] : NULL,
                                'banner_image' =>  $data['banner_image'] 
                            );
        }else{
            $updateData = array( 
                'page_name' => isset($data['banner_title']) ? $data['banner_title'] : NULL,
                'seo_url'    => isset($data['seo_url']) ? $data['seo_url'] : NULL,
                'banner_text' => isset($data['banner_title']) ? $data['banner_title'] : NULL,
                'banner_content' => isset($data['banner_sub_title']) ? $data['banner_sub_title'] : NULL
            );
        }

        $page = Pages::updateOrCreate([
                    'page_id_name'   => $data['type'],
                ],$updateData);
            
        $normal_array = array('name' => isset($data['banner_title']) ? $data['banner_title'] : NULL,
                            'heading'    => isset($data["title"]) ? $data["title"] : NULL,
                            'sub_heading'    => isset($data["sub_title"]) ?  $data["sub_title"] : NULL,
                            'content'    => isset($data["description"]) ? $data["description"] : NULL,
                            'seo_title'    => isset($data["seotitle"]) ? $data["seotitle"] : NULL,
                            'og_title'    => isset($data["ogtitle"]) ? $data["ogtitle"] : NULL,
                            'twitter_title'    => isset($data["twtitle"]) ?  $data["twtitle"] : NULL,
                            'seo_description'    => isset($data["seodescription"]) ? $data["seodescription"] : NULL,
                            'og_description'    => isset($data["og_description"]) ? $data["og_description"] : NULL,
                            'twitter_description'    => isset($data["twitter_description"]) ? $data["twitter_description"] : NULL,
                            'keywords'    => isset($data["seokeywords"]) ? $data["seokeywords"] : NULL,
                            'has_image' => isset($data['has_image']) ? $data['has_image'] : 0,
                            'image' => isset($data['mid_image']) ? $data['mid_image'] : NULL,
                            'has_btn' => isset($data['has_btn']) ? $data['has_btn'] : 0,
                            'btn_text' => isset($data['btn_text']) ? $data['btn_text'] : NULL,
                            'btn_link' => isset($data['btn_link']) ? $data['btn_link'] : NULL,
                            'block_content' => isset($data['block_content']) ? $data['block_content'] : NULL,
                            'heading2' => isset($data['heading2']) ? $data['heading2'] : NULL,
                            'content2' => isset($data['content2']) ? $data['content2'] : NULL);
        if(isset($data['image1']) ){
            $image_array['image1'] = $data['image1'];
        }
        if(isset($data['image2']) ){
            $image_array['image2'] = $data['image2'];
        }
        if(isset($data['image3']) ){
            $image_array['image3'] = $data['image3'];
        }
        $result_array = array_merge( $normal_array,$image_array);

        $module = Modules::updateOrCreate([
                    'pages_id'   => $page->id,
                ],$result_array);
    }

    public function aboutUs()
    {
        return view('admin.pages.aboutus');
    }

    public function storeAboutSettings(Request $request)
    {
        $seo_url = $this->checkSEOUrlExist($request->get("seo_url"),'about_us');
        $data = $request->all();
        $data['seo_url'] = $seo_url;
        if ($request->has('image')) {
            $file = $request->file('image');
            $fileName = strtolower(Str::random(2)).time().'.'. $file->extension();  
            $file->move(base_path() . '/storage/app/public/pages', $fileName);
            $data['banner_image'] = $fileName;
        }

        if ($request->has('image1')) {
            $file1 = $request->file('image1');
            $fileName1 = strtolower(Str::random(2)).time().'.'. $file1->extension();  
            $file1->move(base_path() . '/storage/app/public/pages', $fileName1);
            $data['image1'] = $fileName1;
        }
        if ($request->has('image2')) {
            $file2 = $request->file('image2');
            $fileName2 = strtolower(Str::random(2)).time().'.'. $file2->extension();  
            $file2->move(base_path() . '/storage/app/public/pages', $fileName2);
            $data['image2'] = $fileName2;
        }
        if ($request->has('image3')) {
            $file3 = $request->file('image3');
            $fileName3 = strtolower(Str::random(2)).time().'.'. $file3->extension();  
            $file3->move(base_path() . '/storage/app/public/pages', $fileName3);
            $data['image3'] = $fileName3;
        }
        $data['type'] = 'about_us';
        $this->savePageSettings($data);

        $general['established'] = isset($data['established']) ? $data['established'] : 0;
        $general['happy_clients'] = isset($data['happy_clients']) ? $data['happy_clients'] : 0;
        $general['skilled_experts'] = isset($data['skilled_experts']) ? $data['skilled_experts'] : 0;
        $general['finished_projects'] = isset($data['finished_projects']) ? $data['finished_projects'] : 0 ;
        $general['media_posts'] = isset($data['media_posts']) ? $data['media_posts'] : 0;

        $this->saveGeneralSettings($general);
    }

    public function saveGeneralSettings($datas){
        foreach($datas as $key=>$value){
            $page = GeneralSettings::updateOrCreate([
                'type'   => $key,
            ],[
                'value' => $value
            ]);
        }
       
    }

    public function history()
    {
        return view('admin.pages.history');
    }
    public function storeHistorySettings(Request $request)
    {
        $seo_url = $this->checkSEOUrlExist($request->get("seo_url"),'history');
        $data = $request->all();
        $data['seo_url'] = $seo_url;
        if ($request->has('image')) {
            $file = $request->file('image');
            $fileName = strtolower(Str::random(2)).time().'.'. $file->extension();  
            $file->move(base_path() . '/storage/app/public/pages', $fileName);
            $data['banner_image'] = $fileName;
        }
        $data['type'] = 'history';
       
        $this->savePageSettings($data);

        $year = $request->year;
        $year_heading = $request->year_heading;
        $year_sub_heading = $request->year_sub_heading;
        $year_content = $request->year_content;
        for($count = 0; $count < count($year); $count++)
        {
            if($year[$count] != ''){
                $dataHis = array(
                    'year' => $year[$count],
                    'heading'  => $year_heading[$count],
                    'sub_heading'  => $year_sub_heading[$count],
                    'content'  => $year_content[$count],
                    'created_at' => now()
                );
                $insert_data[] = $dataHis; 
            }
        }
      
        HistoryDetails::truncate();
        HistoryDetails::insert($insert_data);
    }

    public function awards()
    {
        return view('admin.pages.awards');
    }

    public function storeAwardsSettings(Request $request)
    {
        $seo_url = $this->checkSEOUrlExist($request->get("seo_url"),'awards');
        $data = $request->all();
        $data['seo_url'] = $seo_url;
        if ($request->has('image')) {
            $file = $request->file('image');
            $fileName = strtolower(Str::random(2)).time().'.'. $file->extension();  
            $file->move(base_path() . '/storage/app/public/pages', $fileName);
            $data['banner_image'] = $fileName;
        }
        $data['type'] = 'awards';
       
        $this->savePageSettings($data);

        $award_title = $request->award_title;
        $award_content = $request->award_content;
        for($count = 0; $count < count($award_title); $count++)
        {
            if($award_title[$count] != ''){
                $dataHis = array(
                    'title' => $award_title[$count],
                    'content'  => $award_content[$count],
                    'created_at' => now()
                );
                $insert_data[] = $dataHis; 
            }
        }
      
        AwardDetails::truncate();
        AwardDetails::insert($insert_data);
    }

    public function missionAndVision()
    {
        return view('admin.pages.mission_vision');
    }
    public function storeMissionAndVision(Request $request)
    {
        $seo_url = $this->checkSEOUrlExist($request->get("seo_url"),'mission_vision');
        $data = $request->all();
        $data['seo_url'] = $seo_url;
        if ($request->has('image')) {
            $file = $request->file('image');
            $fileName = strtolower(Str::random(2)).time().'.'. $file->extension();  
            $file->move(base_path() . '/storage/app/public/pages', $fileName);
            $data['banner_image'] = $fileName;
        }

        if ($request->has('image1')) {
            $file1 = $request->file('image1');
            $fileName1 = strtolower(Str::random(2)).time().'.'. $file1->extension();  
            $file1->move(base_path() . '/storage/app/public/pages', $fileName1);
            $data['image1'] = $fileName1;
        }
        if ($request->has('image2')) {
            $file2 = $request->file('image2');
            $fileName2 = strtolower(Str::random(2)).time().'.'. $file2->extension();  
            $file2->move(base_path() . '/storage/app/public/pages', $fileName2);
            $data['image2'] = $fileName2;
        }
        if ($request->has('image3')) {
            $file3 = $request->file('image3');
            $fileName3 = strtolower(Str::random(2)).time().'.'. $file3->extension();  
            $file3->move(base_path() . '/storage/app/public/pages', $fileName3);
            $data['image3'] = $fileName3;
        }
        if ($request->has('mid_image')) {
            $mid_file = $request->file('mid_image');
            $mid_fileName = strtolower(Str::random(2)).time().'.'. $mid_file->extension();  
            $mid_file->move(base_path() . '/storage/app/public/pages', $mid_fileName);
            $data['mid_image'] = $mid_fileName;
        }
        $data['type'] = 'mission_vision';
        $this->savePageSettings($data);

        $general['mission_vision'] = array('value' => $data['title1'],'content' => $data['content1'],'image' => $data['image1']  );
        $general['challenges'] = array('value' => $data['title2'],'content' => $data['content2'],'image' => $data['image2']  );
        $general['our_team'] = array('value' => $data['title3'],'content' => $data['content3'],'image' => $data['image3']  );
        $general['mission'] = array('value' => NULL,'content' => $data['mission'],'image' => NULL );
        $general['vision'] = array('value' => NULL,'content' => $data['vision'],'image' => NULL );

        foreach($general as $key=>$value){
            $page = GeneralSettings::updateOrCreate([
                'type'   => $key,
            ],[
                'value' => $value['value'],
                'content' => $value['content'],
                'image' => $value['image'],
            ]);
        }
    }
    public function services()
    {
        return view('admin.pages.services');
    }

    public function storeServices(Request $request)
    {
        $seo_url = $this->checkSEOUrlExist($request->get("seo_url"),$request->get("type"));
        $data = $request->all();
        $data['seo_url'] = $seo_url;
        if ($request->has('image')) {
            $file = $request->file('image');
            $fileName = strtolower(Str::random(2)).time().'.'. $file->extension();  
            $file->move(base_path() . '/storage/app/public/pages', $fileName);
            $data['banner_image'] = $fileName;
        }

        if ($request->has('image1')) {
            $file1 = $request->file('image1');
            $fileName1 = strtolower(Str::random(2)).time().'.'. $file1->extension();  
            $file1->move(base_path() . '/storage/app/public/pages', $fileName1);
            $data['image1'] = $fileName1;
        }
        if ($request->has('image3')) {
            $file2 = $request->file('image3');
            $fileName2 = strtolower(Str::random(2)).time().'.'. $file2->extension();  
            $file2->move(base_path() . '/storage/app/public/pages', $fileName2);
            $data['image3'] = $fileName2;
        }
        $this->savePageSettings($data);
        return json_encode(array('type' => $request->get("type")));
    }
    public function directors()
    {
        return view('admin.pages.directors');
    }

    public function storeDirectors(Request $request)
    {
        $seo_url = $this->checkSEOUrlExist($request->get("seo_url"),$request->get("type"));
        $data = $request->all();
        $data['seo_url'] = $seo_url;
        if ($request->has('image')) {
            $file = $request->file('image');
            $fileName = strtolower(Str::random(2)).time().'.'. $file->extension();  
            $file->move(base_path() . '/storage/app/public/pages', $fileName);
            $data['banner_image'] = $fileName;
        }
        $this->savePageSettings($data);

        $general['career_content'] = array('value' => NULL,'content' => $data['careers'],'image' => NULL );
        $general['latest_news'] = array('value' => NULL,'content' => $data['latest_news'],'image' => NULL );
        $general['contact_content'] = array('value' => NULL,'content' => $data['contact_content'],'image' => NULL );

        foreach($general as $key=>$value){
            $page = GeneralSettings::updateOrCreate([
                'type'   => $key,
            ],[
                'value' => $value['value'],
                'content' => $value['content'],
                'image' => $value['image'],
            ]);
        }

        return json_encode(array('type' => $request->get("type")));
    }
}
