<?php

use Illuminate\Database\Seeder;

class CreateSectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->delete();

        $sections = [
            ['id' => 1, 'title' => 'Blog', 'slug' => 'blog', 'description' => ''],
            ['id' => 2, 'title' => 'Portfolio', 'slug' => 'portfolio', 'description' => ''],
            ['id' => 3, 'title' => 'Services', 'slug' => 'services', 'description' => ''],
            ['id' => 4, 'title' => 'Pricing', 'slug' => 'pricing', 'description' => ''],
            ['id' => 5, 'title' => 'Our Team', 'slug' => 'team', 'description' => ''],
            ['id' => 6, 'title' => 'FAQs', 'slug' => 'faqs', 'description' => ''],
            ['id' => 7, 'title' => 'Testimonials', 'slug' => 'testimonials', 'description' => ''],
            ['id' => 8, 'title' => 'Work Process', 'slug' => 'process', 'description' => ''],
            ['id' => 9, 'title' => 'Why Choose Us', 'slug' => 'why-us', 'description' => ''],
            ['id' => 10, 'title' => 'Get in Touch', 'slug' => 'contact', 'description' => ''],
            ['id' => 11, 'title' => 'Our Partners', 'slug' => 'clients', 'description' => ''],
        ];

        DB::table('sections')->insert($sections);
    }
}
