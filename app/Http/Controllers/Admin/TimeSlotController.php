<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\TimeSlot;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Toastr;
use DB;
class TimeSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // Module Data
        $this->title = 'Time Slot';
        $this->route = 'admin.timeslot';
        $this->view = 'admin.time-slot';
        $this->path = 'time-slot';
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $data['rows'] = TimeSlot::where(['status'=>'active'])->orderBy('id', 'asc')->get();
        // echo "<pre>"; print_r($data);exit;
//        echo $data['route'];exit;

        return view($this->view.'.index', $data);
    }

//    public function create()
//    {
//        //
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'slot_limit' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $timeslot = TimeSlot::updateOrCreate(
            ['booking_from_time' =>Carbon::parse($request->start_time)->format('H:i:s'),'booking_to_time' => Carbon::parse($request->end_time)->format('H:i:s')],
            ['booking_from_time'=>Carbon::parse($request->start_time)->format('H:i:s'),'booking_to_time' => Carbon::parse($request->end_time)->format('H:i:s'),'status'=>'active','slot_limit'=> $request->slot_limit]
        );
        Toastr::success(__('dashboard.created_successfully'), __('dashboard.success'));

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TimeSlot  $timeSlot
     * @return \Illuminate\Http\Response
     */
    public function show(TimeSlot $timeSlot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TimeSlot  $timeSlot
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeSlot $timeSlot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TimeSlot  $timeSlot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $timeslot =  TimeSlot::find($id);
        $timeslot->booking_from_time = Carbon::parse($request->start_time)->format('H:i:s');
        $timeslot->booking_to_time = Carbon::parse($request->end_time)->format('H:i:s');
        $timeslot->slot_limit = $request->slot_limit;
        $timeslot->save();

        Toastr::success(__('dashboard.updated_successfully'), __('dashboard.success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TimeSlot  $timeSlot
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timeslot =  TimeSlot::find($id);
        $timeslot->status ='inactive';
        $timeslot->save();
        Toastr::success(__('dashboard.deleted_successfully'), __('dashboard.success'));

        return redirect()->back();
    }
}
