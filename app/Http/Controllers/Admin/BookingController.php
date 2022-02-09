<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Booking;
use Toastr;

class BookingController
{
    public function __construct()
    {
        // Module Data
        $this->title = trans_choice('dashboard.module_booking', 1);
        $this->route = 'admin.booking';
        $this->view = 'admin.booking';
        $this->path = 'booking';
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['view'] = $this->view;
        $data['path'] = $this->path;
        $booking = Booking::select('bookings.*', 'headers.title as category_name','time_slots.booking_from_time','time_slots.booking_to_time');
        $booking->join('headers', 'headers.id', '=', 'bookings.category_id');
        $booking->join('time_slots', 'time_slots.id', '=', 'bookings.time_slot');
        $booking->orderBy('bookings.id', 'desc');
        $bookings = $booking->get();
        $data['rows'] = $bookings;
        return view($this->view.'.index', $data);
    }

    public function create() {
        echo "<pre>";
        print_r("sdfsdfsdfsdf");
        echo "</pre>";
        die;
    }
}
