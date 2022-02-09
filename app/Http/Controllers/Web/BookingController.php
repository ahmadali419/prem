<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\TimeSlot;
use Illuminate\Http\Request;
use App\Models\WhyChooseUs;
use App\Models\Testimonial;
use App\Models\Member;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Toastr;

class BookingController extends Controller
{
    public function bookingForm() {


        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dev.premiumblindsuk.com/api/category/list",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
            return $err ;
        }

        $zipcurl = curl_init();
        curl_setopt_array($zipcurl, array(
            CURLOPT_URL => "https://dev.orderfulfillment.premiumblindsuk.com/public/api/zip-code/list",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $responsezip = curl_exec($zipcurl);
        $errzip = curl_error($zipcurl);
        curl_close($zipcurl);

        if ($err) {
            echo "cURL Error #:" . $errzip;
            return $errzip ;
        }

        $responsezipInfo=json_decode($responsezip);
        $responseInfo=json_decode($response);
        $categories=$responseInfo->categories;

        $data['url']=$responseInfo->url;
        $data['categories']=$categories;
        $data['allZipInfo']=$responsezipInfo->zipcodes;
        /*$timeSlotDetail = TimeSlot::where('status', 'active')->get();
        $timeSlotHtml = View::make('web.template.booking-slots', $dt)->render();
        $data['timeSlotHtml'] = $timeSlotHtml;
        $data['timeSlotHtml'] = $timeSlotHtml;
        */
        return view('web.booking', $data);
    }

    public function saveBooking(Request $request) {
        $booking = new Booking();
        $booking->category_id = $request->category_id;
        $booking->date = $request->date_slot;
        $booking->time_slot = $request->time_slot;
        $booking->first_name = $request->first_name;
        $booking->last_name = $request->last_name;
        $booking->email = $request->email;
        $booking->phone_number = $request->phone_number;
        $booking->address = $request->address;
        $booking->message = $request->message;
        $booking->save();
        $return = [
            'status' => 'success',
            'message' => 'You booking is added successfully we will contact you soon',
        ];
        return response()->json($return);
    }

    public function updateBooking(Request $request) {
        $id = $request->booking_id;
        $booking = Booking::find($id);
        $booking->date = $request->date_slot;
        $booking->time_slot = $request->time_slot;
        $booking->save();
        $return = [
            'status' => 'success',
            'message' => 'You booking is updated successfully',
        ];
        Toastr::success('You booking is updated successfully' ,'Success');
        return response()->json($return);
    }

}
