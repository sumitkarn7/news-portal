<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //------------------------------------Frontend Routes Starts Here----------------------------------------------

        Route::group(['namespace'=>'App\Http\Controllers'],function(){

            Route::get('/','FrontendController@index')->name('homepage');

            Route::get('/news-detail/{slug}','FrontendController@newsDetail')->name('news-detail');

            Route::post('/add-review/{id}','FrontEndController@addReview')->name('add-review');

            Route::get('/category-list-product/{slug}','FrontendController@categoryNews')->name('category-detail');
            Route::get('/contact','FrontEndController@contact')->name('contact');

            Route::post('/customer-user/register','UserController@register')->name('customer.register');

            Route::post('/user/message','FrontEndController@saveMessage')->name('user-contact-message');

            Route::get('/about','FrontEndController@about')->name('about');

        
            
           
        });

    //------------------------------------Frontend Routes Ends Here----------------------------------------------





//---------------------------------------------------Backend Routes Starts Here-----------------------------------------


    Route::group(['namespace'=>'App\Http\Controllers','middleware'=>'auth'],function(){

        //------------------------------------------Admin Routes Starts Here------------------------------------------------

                Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
                    Route::get('/','HomeController@admin')->name('admin');

                    Route::resource('/user','UserController');
                    Route::get('/password','UserController@showPassword')->name('user.password');
                    Route::put('/user/update-password/{id}','UserController@updatePassword')->name('user.update-password');

                    Route::resource('/category','CategoryController');
                    Route::get('/category/update-status/{id}/{status}','CategoryController@updateStatus')->name('category.update-status');
                    Route::get('/category/{slug}/child','CategoryController@getChild')->name('category.child');

                    Route::resource('/news','NewsController');
                    Route::get('/news/update-status/{id}/{status}','NewsController@updateStatus')->name('news.update-status');


                    Route::post('ckeditor', 'CkeditorFileUploadController@store')->name('ckeditor.upload');

                    Route::get('/theme','ThemeController@index')->name('theme.index');
                    Route::post('/theme-update/{id}','ThemeController@update')->name('theme.update');

                    Route::get('/promo','PromotionController@index')->name('promo.index');
                    Route::post('/promo/update/{id}','PromotionController@update')->name('promo.update');

                    Route::get('/social','SocialController@index')->name('social.index');
                    Route::post('/social/update/{id}','SocialController@update')->name('social.update');

                    Route::resource('/about','AboutController');
                });


        //------------------------------------------Admin Routes Ends Here------------------------------------------------

        //------------------------------------------Reporter Routes Starts Here------------------------------------------------

                Route::group(['prefix'=>'reporter','middleware'=>'reporter'],function(){
                    Route::get('/','HomeController@reporter')->name('reporter');
                });

        //------------------------------------------Reporter Routes Ends Here------------------------------------------------


        //------------------------------------------Viewer Routes Starts Here------------------------------------------------

                Route::group(['prefix'=>'viewer','middleware'=>'viewer'],function(){
                    Route::get('/','HomeController@viewer')->name('viewer');
                });

        //------------------------------------------Viewer Routes Ends Here------------------------------------------------


        //--------------------------------------------Common Routes Starts Here-------------------------------------
                // Route::post('/customer-user/register','UserController@register')->name('customer.register');

        //--------------------------------------------Common Routes Ends Here-------------------------------------


    });



//---------------------------------------------------Backend Routes Ends Here------------------------------------------
