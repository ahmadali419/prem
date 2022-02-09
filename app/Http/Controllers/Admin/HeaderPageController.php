<?php

namespace App\Http\Controllers\Admin;

use App\HeaderPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageCategoryAttachment;
use App\Models\Slider;
use Illuminate\Support\Str;
use League\Flysystem\File;
use Illuminate\Support\Carbon;
use App\PageCategory;
use Illuminate\Support\Facades\DB;
use Toastr;

class HeaderPageController extends Controller
{
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('dashboard.module_header_pages', 1);
        $this->route = 'admin.header-page';
        $this->view = 'admin.header-page';
        $this->path = 'header-page';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        //  echo "<pre>"; print_r($data);exit;
        $data['rows'] = Page::orderBy('id', 'asc')->get();


        return view($this->view . '.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;

        return view($this->view . '.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //    echo "<pre>"; print_r($request->all());exit;


        // Field Validation
        $request->validate([
            'page_title' => 'required|max:191|unique:pages,title',
            'page_description' => 'required',
            'slider_image[]' => 'nullable|image',
            'meta_title' => 'required|max:70|unique:pages,meta_title',
            'meta_description' => 'required|max:170|unique:pages,meta_description',
        ]);

        $content = $request->input('page_description');
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->encoding = 'utf-8';
        $dom->loadHtml(utf8_decode($content), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $headerPage =  new Page();
        if ($request->page_form == 'on') {
            $headerPage->page_form = 1;
        }
        if (!empty($request->page_type_title)) {
            $headerPage->page_type_title = $request->page_type_title;
        }
        $headerPage->title = $request->page_title;
        $headerPage->meta_title = $request->meta_title;
        $headerPage->meta_description = $request->meta_description;
        $headerPage->keywords = $request->keywords;
        $headerPage->secondary_keywords = $request->secondary_keywords;
        $headerPage->slug = Str::slug($request->page_title, '-');
        $headerPage->description = $dom->saveHTML();
        if ($headerPage->save()) {
            $pageId =  $headerPage->id;
            $pageTitle =  $headerPage->title; {
                if (!empty($pageId)) {
                    $page_slider_images = $request->slider_image;
                    if (!empty($page_slider_images)) {
                        $dt = [];
                        foreach ($page_slider_images as $key => $img) {
                            $file_path       = 'uploads/header-page/';
                            $destinationPath = public_path($file_path);
                            $filePrefix      = 'header_' . time();
                            $extension       = $img->getClientOriginalExtension();
                            $fileName        = $filePrefix . '.' . $extension;
                            $thumbName       = $filePrefix . '_thumbnail.jpg';
                            $upload_success  = $img->move($destinationPath, $fileName);
                            if ($upload_success) {
                                $dt[] = [
                                    'page_id' => $pageId,
                                    'image_path' => $fileName,
                                    'created_at' => carbon::now()->format('Y-m-d')

                                ];
                            }
                        }
                        Slider::insert($dt);
                        $cat_title  = $request->pag_cat_title;
                        $cat_status  = $request->cat_status;
                       
                        $cat_description  = $request->page_cat_description;
                        $cat_images  = $request->pag_cat_image;
                        $catContent = $request->input('page_cat_description');
                        if (isset($cat_title[0]) && $cat_title[0] != '') {
                            foreach ($cat_title as $key => $catObj) {
                                $dom = new \DomDocument();
                                libxml_use_internal_errors(true);
                                $dom->encoding = 'utf-8';
                                $dom->loadHtml(utf8_decode($catContent[$key]), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                                $pageCategory = new PageCategory;
                                $pageCategory->page_id = $pageId;
                                $pageCategory->status = $cat_status[$key];
                                $pageCategory->title = $catObj;
                                $pageCategory->description =  $dom->saveHTML();
                                $pageCategory->save();
                                $pageCatId  = $pageCategory->id;
                                if (!empty($pageCatId)) {
                                    if (!empty($cat_images)) {
                                        $cat_img = [];
                                        foreach ($cat_images[$key] as $catKey => $catImgObj) {
                                            $file_path = 'uploads/header-page/category';
                                            $catDestinationPath = public_path($file_path);
                                            $filePrefix      = 'page_cat_' . microtime();
                                            $extension       = $catImgObj->getClientOriginalExtension();
                                            $catFileName     = $filePrefix . '.' . $extension;
                                            $thumbName       = $filePrefix . '_thumbnail.jpg';
                                            $upload_cat  = $catImgObj->move($catDestinationPath, $catFileName);
                                            if ($upload_cat) {
                                                $cat_img[] = [
                                                    'page_category_id' => $pageCatId,
                                                    'image_path' => $catFileName,
                                                    'created_at' => carbon::now()->format('Y-m-d')
                                                ];
                                            }
                                        }
                                        $pageAttachmentId  = PageCategoryAttachment::insert($cat_img);
                                    }
                                }
                            }
                            if (!empty($pageAttachmentId)) {
                                Toastr::success(__('dashboard.created_successfully'), __('dashboard.success'));
                                return redirect()->route($this->route . '.index');
                            }
                            }
                            else {
                                Toastr::success(__('dashboard.created_successfully'), __('dashboard.success'));
                                return redirect()->route($this->route . '.index');
                            }
                        } 
                    }
                }
            }
        }
    
    
    /**
     * Display the specified resource.
     *
     * @param  \App\HeaderPage  $headerPage
     * @return \Illuminate\Http\Response
     */
    public function show(HeaderPage $headerPage)
    {
        // echo "<pre>"; print_r($_POST);exit;

        // echo $headerPage->id;exit;
        $sliderImages = Slider::where('page_id', $headerPage->id)->get();
        $pageCategory = Page::with(['Categories' => function ($query) {
            $query->with('pageCategoryAttachments');
        }])->where('pages.id', $headerPage->id)
            ->where('pages.status', '1')
            ->first();
        //  echo "<pre>";   print_r($pageCategory);exit;
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['headerPage'] = $headerPage;
        $data['sliderImages'] = $sliderImages;
        $data['pageCategory'] = $pageCategory;
        return view($this->view . '.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HeaderPage  $headerPage
     * @return \Illuminate\Http\Response
     */
    public function edit(HeaderPage $headerPage)
    {
        //
        $sliderImages = Slider::where(['page_id' => $headerPage->id, 'status' => 1])->get();
        $pageCategory = Page::with(['Categories' => function ($query) {
            $query->with('pageCategoryAttachments');
        }])->where('pages.id', $headerPage->id)
            ->where('pages.status', '1')
            ->firstOrFail();

        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;

        $data['row'] = $headerPage;
        $data['sliderImages'] = $sliderImages;
        $data['pageCategory'] = $pageCategory;
        return view($this->view . '.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HeaderPage  $headerPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HeaderPage $headerPage)
    {
       
        $request->validate([
            'page_title' => 'required|max:191|unique:pages,title,' . $headerPage->id,
            'page_description' => 'required',
            'slider_image[]' => 'nullable|image',
            
        ]);
        // image upload, fit and store inside public folder
        $content = $request->input('page_description');
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->encoding = 'utf-8';
        $dom->loadHtml(utf8_decode($content), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        if ($headerPage->id != '') {
            $headerPage =  Page::where('id', $headerPage->id)->first();
            $headerPage->updated_at = Carbon::now()->format('Y-m-d');
        } else {
            $headerPage = new Page;
        }
        $headerPage->title = $request->page_title;
        if ($request->page_form == 'on') {
            $headerPage->page_form = 1;
        }
        else{
            $headerPage->page_form = 0;
        }
        $headerPage->meta_title = $request->meta_title;
        $headerPage->meta_description = $request->meta_description;
        $headerPage->keywords = $request->keywords;
        $headerPage->secondary_keywords = $request->secondary_keywords;
        $headerPage->status = $request->page_status;
        $headerPage->slug = Str::slug($request->page_title, '-');
        $headerPage->description = $dom->saveHTML();
        if ($headerPage->save()) {
            $pageId =  $headerPage->id;
            $pageTitle =  $headerPage->title;
            {
                if (!empty($pageId)) {
                    $page_slider_images = $request->slider_image;
                    if (!empty($page_slider_images)) {
                        if (!empty($headerPage->id)) {
                            Slider::where('page_id', $headerPage->id)->delete();
                        }
                        $dt = [];
                        foreach ($page_slider_images as $key => $img) {
                            $file_path       = 'uploads/header-page/';
                            $destinationPath = public_path($file_path);
                            $filePrefix      = 'header_' . time();
                            $extension       = $img->getClientOriginalExtension();
                            $fileName        = $filePrefix . '.' . $extension;
                            $thumbName       = $filePrefix . '_thumbnail.jpg';
                            $upload_success  = $img->move($destinationPath, $fileName);
                            if ($upload_success) {
                                $dt[] = [
                                    'page_id' => $pageId,
                                    'image_path' => $fileName,
                                    'updated_at' => carbon::now()->format('Y-m-d')
                                ];
                            }
                        }
                        Slider::insert($dt);
                    }
                        $cat_title  = $request->pag_cat_title;
                        $page_cat_id  = $request->page_cat_id;
                       
                        // print_r($catContent);exit;
                        $cat_status  = $request->cat_status;
                        $cat_images  = $request->pag_cat_image;
                        $old_page_cat_images  = $request->old_page_cat_image;
                        $catContent = $request->input('page_cat_description');
                        if (isset($cat_title[0]) && $cat_title[0] != '') {
                            foreach ($cat_title as $key => $catObj) {
                                // print_r($catContent);exit;
                                if (!empty($page_cat_id[$key])) {
                                    // print_r($page_cat_id[$key]);exit;
                                    PageCategory::where('id', $page_cat_id[$key])->delete();
                                }
                                // else{
                                    $pageCategory = new PageCategory;
                                // }
                            //    echo "<pre>"; print_r($catContent);exit;
                                if(!empty($catContent[$key]))
                                {             
                                    $catDom = new \DomDocument();
                                    libxml_use_internal_errors(true);
                                    $catDom->encoding = 'utf-8';
                                    $catDom->loadHtml(utf8_decode($catContent[$key]), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                                    print_r($catDom->saveHTML());
                                    $pageCategory->description = $catDom->saveHTML();
                                }
                                $pageCategory->status = $cat_status[$key];
                                $pageCategory->page_id = $pageId;
                                $pageCategory->title = $catObj;
                                $pageCategory->save();
                                $pageCatId  = $pageCategory->id;
                                if (!empty($pageCatId)) {
                                    PageCategoryAttachment::where('page_category_id',$page_cat_id[$key])->update(['page_category_id'=>$pageCatId]);
                                    if (!empty($cat_images[$key])) {
                                        $cat_img = [];
                                        if (isset($old_page_cat_images[$key])) {
                                            $oldImg = $old_page_cat_images[$key];
                                            unlink(public_path('uploads/header-page/category'.$oldImg));
                                            $pageCatAttachment = PageCategoryAttachment::where('page_category_id', $page_cat_id[$key])->delete();
                                        }
                                        foreach ($cat_images[$key] as $catKey => $catImgObj) {
                                            if (!empty($pageCatId)) {
                                                $pageCatAttachment = PageCategoryAttachment::where('page_category_id', $page_cat_id[$key])->delete();
                                            }
                                            $file_path = 'uploads/header-page/category';
                                            $catDestinationPath = public_path($file_path);
                                            $filePrefix      = 'page_cat_' . time();
                                            $extension       = $catImgObj->getClientOriginalExtension();
                                            $catFileName     = $filePrefix . '.' . $extension;
                                            $thumbName       = $filePrefix . '_thumbnail.jpg';
                                            $upload_cat  = $catImgObj->move($catDestinationPath, $catFileName);
                                            if ($upload_cat) {
                                                $cat_img[] = [
                                                    'page_category_id' => $pageCatId,
                                                    'image_path' => $catFileName,
                                                    'created_at' => carbon::now()->format('Y-m-d')
                                                ];
                                            }
                                        }
                                        $pageAttachmentId  = PageCategoryAttachment::insert($cat_img);
                                    }
                                    else{
                                        Toastr::success(__('dashboard.created_successfully'), __('dashboard.success'));
                                        return redirect()->route($this->route . '.index');  
                                    }
                                }
                            }
                            if (!empty($pageAttachmentId)) {
                                Toastr::success(__('dashboard.created_successfully'), __('dashboard.success'));
                                return redirect()->route($this->route . '.index');
                            }
                        } else {
                            Toastr::success(__('dashboard.created_successfully'), __('dashboard.success'));
                            return redirect()->route($this->route . '.index');
                        }
                    
                }
            }
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HeaderPage  $headerPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(HeaderPage $headerPage)
    {
        // $image_path = public_path('uploads/'.$this->path.'/'.$page->image_path);
        // if(File::isFile($image_path)){
        //     File::delete($image_path);
        // }

        $headerPage->delete();
        PageCategory::where('page_id', $headerPage->id)->delete();
        Slider::where('page_id', $headerPage->id)->delete();
        Toastr::success(__('dashboard.deleted_successfully'), __('dashboard.success'));

        return redirect()->back();
    }
}
