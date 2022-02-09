<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\TimeSlot;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TimeSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTimeSlotByDate(Request $request)
    {
         $date = $request->date;
         $timeSlotDetail = TimeSlot::where('status','active')->get();
         if(!($timeSlotDetail->isEmpty())) {
             $dt = [
                 'date' => $date,
                 'timeSlotDetail' => $timeSlotDetail
             ];
             $timeSlotHtml = View::make('web.template.booking-slots', $dt)->render();
             $return = [
                 'status' => 'success',
                 'timeSlotHtml' => $timeSlotHtml
             ];
         } else {
            $return = [
                'status' => 'error',
                'message' => 'No time slots found against ' . $date];
         }
         return  response()->json($return);

    }

    public function index()
    {
        //
    }

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
        //
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
    public function update(Request $request, TimeSlot $timeSlot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TimeSlot  $timeSlot
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeSlot $timeSlot)
    {
        //
    }
}
