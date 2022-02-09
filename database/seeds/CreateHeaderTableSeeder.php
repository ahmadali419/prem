<?php

use Illuminate\Database\Seeder;

class CreateHeaderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('headers')->delete();

        $headers = [
            ['id' => 1, 'title' => 'Home', 'slug' => 'home'],
            ['id' => 2, 'title' => 'About Us', 'slug' => 'about'],
            ['id' => 3, 'title' => 'Services', 'slug' => 'services'],
            ['id' => 4, 'title' => 'Service Details', 'slug' => 'service-single'],
            ['id' => 5, 'title' => 'Portfolios', 'slug' => 'portfolios'],
            ['id' => 6, 'title' => 'Portfolio Details', 'slug' => 'portfolio-single'],
            ['id' => 7, 'title' => 'Pricing', 'slug' => 'pricing'],
            ['id' => 8, 'title' => 'Blog', 'slug' => 'blog'],
            ['id' => 9, 'title' => 'Blog Details', 'slug' => 'blog-single'],
            ['id' => 10, 'title' => 'FAQs', 'slug' => 'faqs'],
            ['id' => 11, 'title' => 'Contact Us', 'slug' => 'contact'],
            ['id' => 12, 'title' => 'Error 404', 'slug' => 'error'],
        ];

        DB::table('headers')->insert($headers);
    }
}
