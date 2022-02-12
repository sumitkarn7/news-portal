<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Schema;
use App\Models\Social;
use App\Models\Promotion;
use App\Models\News;
use App\Models\Category;
use App\Models\Theme;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);

        View::composer(['layouts.*'],function($view){
            $view->with('social_site',Social::first());
        });

        View::composer(['front.contact*'],function($view){
            $view->with('social_site',Social::first());
        });

        View::composer(['layouts.*'],function($view){
            $view->with('theme',Theme::first());
        });

        View::composer(['front.*'],function($view){
            $view->with('social_site',Social::first());
        });

        View::composer(['layouts.*'],function($view){
            $view->with('promo',Promotion::first());
        });

        View::composer(['layouts.*'],function($view){
            $view->with('latest_news',News::where('status','active')->get());
        });

        View::composer(['front.*'],function($view){
            $view->with('category',Category::where('parent_id','!=',null)->get());
        });

        View::composer(['layouts.*'],function($view){
            // $view->with('category',Category::where('parent_id','!=',null)->get());
            $view->with('category',Category::whereNull('parent_id')->get());
        });


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
