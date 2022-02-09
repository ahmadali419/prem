<?php

use Illuminate\Database\Seeder;

class CreateTemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('email_templates')->delete();

        $templates = [

            ['id' => 1, 'title' => 'Subscription', 'slug' => 'subscription', 'description' => ''],
        ];

        DB::table('email_templates')->insert($templates);
    }
}
