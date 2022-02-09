<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\LiveChat;
use App\Models\Setting;
use App\Models\Article;
use App\Models\Social;
use App\Models\Page;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);


        // Share view for Common Data
        $setting = Setting::where('status', '1')->first();
        $social = Social::where('status', '1')->first();
        $livechat = LiveChat::where('status', '1')->first();
        $pages = Page::where('status', '1')->get();
        $recents = Article::where('status', '1')
                            ->orderBy('id', 'desc')
                            ->take(3)
                            ->get();
        View::share(['setting' => $setting, 'social' => $social, 'livechat' => $livechat, 'pages' => $pages, 'recents' => $recents]);

    }
}
