<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class CreateSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();
        
        $setting = Setting::create([

            'title'=>'HiTech - Multipurpose Business',
            'description'=>'This script is specially made for Architecture Firm, Interior Design, Exterior Design Service provider company and agency. If your company or design firm provides this kind of creative services like Interior Design, Dining Room Design, Exterior Design, Kitchen Design, Living Room Design, Bedroom Design, Cottage Design, Architecture design, Landscape design, Home Decoration, Office Decoration Design, Corporate Architecture etc. If you are a Freelancer or thinking for a Startup? And you are looking for a dynamic website to branding your business services, showcase your portfolios, projects, And get orders from customers then this script is best for you.',
            'keywords'=>'building construction, architect, architecture, construction, interior, interior design, property, architecture design, architecture portfolio, exterior design, interior designer, exterior, home decoration, landscape design, construction company',
            'logo_path'=>'logo.png',
            'favicon_path'=>'favicon.png',
            'phone_one'=>'+880123456789',
            'email_one'=>'example@mail.com',
            'contact_address'=>'Mirpur, Dhaka',
            'contact_mail'=>'example@mail.com',
            'office_hours'=>' Monday to Friday 9:00am - 6:00pm',
            'footer_text'=>'2020 - HiTech - Multipurpose Business',
            'custom_css'=>' /** theme customize css **/ ',
            'status'=>'1'
            
        ]);
    }
}
