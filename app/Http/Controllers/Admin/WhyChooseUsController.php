<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\WhyChooseUs;
use Toastr;
use Image;
use File;

class WhyChooseUsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('dashboard.module_feature', 1);
        $this->route = 'admin.why-choose-us';
        $this->view = 'admin.why-choose-us';
        $this->path = 'choose';
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
        
        $data['rows'] = WhyChooseUs::orderBy('id', 'asc')->get();

        return view($this->view.'.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:why_choose_us,title',
            'icon' => 'required|image',
        ]);


        // image upload, fit and store inside public folder 
        if($request->hasFile('icon')){
            //Upload New Image
            $filenameWithExt = $request->file('icon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('icon')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = public_path('uploads/'.$this->path.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            //Resize And Crop as Fit image here (64 width, 64 height)
            $thumbnailpath = $path.$fileNameToStore;
            $img = Image::make($request->file('icon')->getRealPath())->fit(64, 64, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);
        }
        else{
            $fileNameToStore = 'noimage.jpg'; // if no image selected this will be the default image
        }


        // Insert Data
        $whyChooseUs = new WhyChooseUs;
        $whyChooseUs->title = $request->title;
        $whyChooseUs->slug = Str::slug($request->title, '-');
        $whyChooseUs->description = $request->description;
        $whyChooseUs->icon = $fileNameToStore;
        $whyChooseUs->save();


        Toastr::success(__('dashboard.created_successfully'), __('dashboard.success'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:why_choose_us,title,'.$id,
            'icon' => 'nullable|image',
        ]);

        $whyChooseUs = WhyChooseUs::findOrFail($id);


        // image upload, fit and store inside public folder 
        if($request->hasFile('icon')){

            $file_path = public_path('uploads/'.$this->path.'/'.$whyChooseUs->icon);
            if(File::isFile($file_path)){
                File::delete($file_path);
            }

            //Upload New Image
            $filenameWithExt = $request->file('icon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('icon')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = public_path('uploads/'.$this->path.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            //Resize And Crop as Fit image here (64 width, 64 height)
            $thumbnailpath = $path.$fileNameToStore;
            $img = Image::make($request->file('icon')->getRealPath())->fit(64, 64, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);
        }
        else{

            $fileNameToStore = $whyChooseUs->icon; 
        }


        // Update Data
        $whyChooseUs->title = $request->title;
        $whyChooseUs->slug = Str::slug($request->title, '-');
        $whyChooseUs->description = $request->description;
        $whyChooseUs->icon = $fileNameToStore;
        $whyChooseUs->status = $request->status;
        $whyChooseUs->save();


        Toastr::success(__('dashboard.updated_successfully'), __('dashboard.success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete Data
        $whyChooseUs = WhyChooseUs::findOrFail($id);
        $image_path = public_path('uploads/'.$this->path.'/'.$whyChooseUs->icon);
        if(File::isFile($image_path)){
            File::delete($image_path);
        }
        
        $whyChooseUs->delete();

        Toastr::success(__('dashboard.deleted_successfully'), __('dashboard.success'));

        return redirect()->back();
    }
}
