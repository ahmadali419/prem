<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyChooseUs;
use App\Models\Testimonial;
use App\Models\Member;
use App\Models\Client;
use App\Models\About;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // About
        $data['about'] = About::where('status', '1')
                            ->first();

        // Chooses
        $data['chooses'] = WhyChooseUs::where('status', '1')
                            ->orderBy('id', 'asc')
                            ->get();

        // Members                                
        $data['members'] = Member::where('status', '1')
                            ->orderBy('id', 'asc')
                            ->get();

        // Testimonials                                
        $data['testimonials'] = Testimonial::where('status', '1')
                            ->orderBy('id', 'desc')
                            ->get();

        // Clients
        $data['clients'] = Client::where('status', '1')
                            ->orderBy('id', 'desc')
                            ->get();

        return view('web.about', $data);
    }
}
