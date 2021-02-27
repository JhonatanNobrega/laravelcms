<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Page;
use App\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        | MENU
        */
        $frontMenu = [
            '/' => 'Home'
        ];
        $pages = Page::all();
        foreach( $pages as $p ) {
            $frontMenu[ $p['slug'] ] = $p['title'];
        }
        View::share('front_menu', $frontMenu);
        /*
        | CONFIGURAÇÕES
        */
        $config = [];
        $settings = Setting::all();
        foreach( $settings as $s) {
            $config[ $s['name'] ] = $s['content'];
        }
        View::share('front_config', $config);
    }
}
