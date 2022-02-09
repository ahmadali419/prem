<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\PageCategoryAttachment;
use App\PageCategory;
use App\Models\Header;
use Illuminate\Support\Facades\DB;

class HeaderController extends Controller
{
    //
    public function show(Request $request)
    {

        // print_r($request->all());
        // $data['menu_title'] = Header::where('slug',$request->slug)->first();
    //    echo "<pre>"; print_r($data);exit;
        $data['title'] = str_replace("-", " ", $request->slug);
        $data['header'] =  DB::select(DB::raw("SELECT a.`id`, a.`title` ,b.`slug` as slug_title, b.id as sub_id, b.title as sub_title ,c.`slug` as slug_c_title,c.id as sub_c_id,c.`image_path` as c_image , c.title as sub_c_title FROM `headers` a LEFT JOIN `headers` b on a.id = b.parent_header_id LEFT JOIN `headers` c on b.id = c.parent_header_id WHERE  a.`status` = 1 and b.`slug`='$request->slug'
    "));
        if (!empty($data['header'][1])) {
            return view('web.sub-menus', $data);
        } else {
            echo "0";
            exit;
        }
    }

    public function headerSubMenu($slug)
    {
        $data['title'] = str_replace("-", " ", $slug);
        $data['header'] =   DB::select(DB::raw("SELECT a.`id`,a.`slug`, a.`title`,b.`image_path` as b_image ,b.`slug` as slug_title, b.id as sub_id, b.title as sub_title FROM `headers` a LEFT JOIN `headers` b on a.id = b.parent_header_id  WHERE  a.`status` = 1 and a.`slug`='$slug'"));
        if (!empty($data['header'])) {
            return view('web.menus', $data);
        }
    }
    public function showServices($slug)
    {
         if($slug == 'privacy-policy' || $slug == 'terms-conditions')
        {
            $data['page'] = Page::where('slug', $slug)->where('status', 1)->firstOrFail();
            return view('web.page-single', $data);

        }
        $data['header']  = Page::where('slug',$slug)->first();
    //  echo "<pre>"; print_r($data);exit;
        $data['title'] = str_replace("-", " ", $slug);
        $data['service'] = Page::with('sliders')->get();
        $data['service'] = Page::with('sliders')->where('pages.slug', $slug)
            ->where('pages.status', '1')
            ->firstOrFail();
        $data['category_list'] = Page::with(['Categories' => function ($query) {
            $query->with('pageCategoryAttachments');
        }])->where('pages.slug', $slug)
            ->where('pages.status', '1')
            ->firstOrFail();
        return view('web.blinds', $data);
    }
    public function getMenu(Request $request)
    {
        $data['title'] = str_replace("-", " ", $request->slug);
        $data['header'] =  DB::select(DB::raw("SELECT a.`id`, a.`title` ,b.`slug` as slug_title, b.id as sub_id, b.title as sub_title ,c.`slug` as slug_c_title,c.id as sub_c_id,c.`image_path` as c_image , c.title as sub_c_title FROM `headers` a LEFT JOIN `headers` b on a.id = b.parent_header_id LEFT JOIN `headers` c on b.id = c.parent_header_id WHERE  a.`status` = 1 or b.`title` Like '$request->menu_name'
    "));
       return view('web.blinds', $data);
    }
    public function getSliderImages(Request $request)
    {
    $pageCategoryAttachment  = PageCategoryAttachment::join('page_categories as pc','pc.id','=','page_category_attachments.page_category_id')->where('page_category_id',$request->catId)->select('pc.title','pc.description','page_category_attachments.*')->first();
    if(!empty($pageCategoryAttachment))
    {
        return view('web.blinds.slider_modal',compact('pageCategoryAttachment'));
    }
    }
}
