<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use App\Models\WorkProcess;
use App\Models\WhyChooseUs;
use App\Models\Testimonial;
use App\Models\Subscriber;
use App\Mail\Subscription;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Counter;
use App\Models\Pricing;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Client;
use App\Models\Page;
use App\Models\About;
use Mail;
use DB;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Sliders
        $data['sliders'] = Slider::where('status', '1')
                            ->orderBy('id', 'asc')
                            ->limit(3)
                            ->get();

        // Chooses
        $data['chooses'] = WhyChooseUs::where('status', '1')
                            ->orderBy('id', 'asc')
                            ->get();

        // Services
        $data['services'] = Service::where('status', '1')
                            ->orderBy('id', 'asc')
                            ->limit(3)
                            ->get();

        // Portfolios
        $data['portfolios'] = Portfolio::where('status', '1')->orderBy('id', 'desc')->take(10)->get();

        // Counters
        $data['counters'] = Counter::where('status', '1')
                            ->orderBy('id', 'asc')
                            ->get();

        // Pricings
        $data['pricings'] = Pricing::where('status', '1')
                            ->orderBy('id', 'asc')
                            ->get();

        // Processes
        $data['processes'] = WorkProcess::where('status', '1')
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
         $data['about'] = DB::table('abouts')->where('status', '1')
         ->first();
        //  About::where('status', '1')
        //                     ->first();
        return view('web.index', $data);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function subscribe(Request $request)
    {
        // Field Validation
        $request->validate([
            'email' => 'required|email',
        ]);

        $subscriber = Subscriber::where('email', $request->email)->first();

        if(!isset($subscriber)){
            Subscriber::create($request->all());
        }

        // Notify to User
        $template = EmailTemplate::where('slug', 'subscription')->first();
        $setting = Setting::where('status', '1')->first();

        if(isset($template) && isset($setting)){

            // Passing data to email template
            $data['email'] = $request->email;

            // Mail Information
            $data['subject'] = $template->title;
            $data['from'] = $setting->contact_mail;
            $data['message'] = $template->description;

            // Send Mail
            Mail::to($data['email'])->send(new Subscription($data));
        // return $data;exit;

        }

        return redirect()->back();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function page($slug)
    {
        // Page
        $data['header'] = Page::where('slug', $slug)->where('status', 1)->firstOrFail();
        $data['page'] = Page::where('slug', $slug)->where('status', 1)->firstOrFail();

        return view('web.page-single', $data);
    }
}
