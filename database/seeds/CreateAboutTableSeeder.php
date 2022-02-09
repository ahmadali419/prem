<?php

use App\Models\About;
use Illuminate\Database\Seeder;

class CreateAboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('abouts')->delete();
        
        $about = About::create([

            'title'=>'About Us',
            'slug'=>'about-us',
            'description'=>'This script is specially made for Architecture Firm, Interior Design, Exterior Design Service provider company and agency. If your company or design firm provides this kind of creative services like Interior Design, Dining Room Design, Exterior Design, Kitchen Design, Living Room Design, Bedroom Design, Cottage Design, Architecture design, Landscape design, Home Decoration, Office Decoration Design, Corporate Architecture etc. If you are a Freelancer or thinking for a Startup? And you are looking for a dynamic website to branding your business services, showcase your portfolios, projects, And get orders from customers then this script is best for you.',
            'image_path'=>'about.png',
            'mission_title'=>'Our Mission',
            'mission_desc'=>'Our Mission for the explorer of the truth, master who builder of human happiness one but because those who do know.....',
            'vision_title'=>'Our Vision',
            'vision_desc'=>'Our Mission for the explorer of the truth, master who builder of human happiness one but because those who do know.....',
            'status'=>'1'
            
        ]);
    }
}
