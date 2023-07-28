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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/photo', 'PhotoController@index')->name('photo.index');
    Route::get('/photo/{post}/show', 'PhotoController@show')->name('photo.show');
    Route::get('/place', 'PlaceController@index')->name('place.index');
    Route::get('/place/{post}/show', 'PlaceController@show')->name('place.show');
    
    

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

        
    });

    Route::group(['middleware' => ['auth']], function() {

        /**
        * Verification Routes
        */
        Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
        Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');
        
        
        Route::group(['middleware' => ['verified']], function() {
            /**
             * Dashboard Routes
             */
            Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
            Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

            Route::get('/uploadphoto', 'UploadPhotoController@index')->name('uploadphoto.index');
            Route::get('/uploadphoto/create', 'UploadPhotoController@create')->name('uploadphoto.create');
            Route::post('/uploadphoto/create', 'UploadPhotoController@store')->name('uploadphoto.store');
            Route::get('/uploadphoto/{post}/edit', 'UploadPhotoController@edit')->name('uploadphoto.edit');
            Route::get('/uploadphoto/{post}/show', 'UploadPhotoController@show')->name('uploadphoto.show');
            Route::patch('/uploadphoto/{post}/update', 'UploadPhotoController@update')->name('uploadphoto.update');
            Route::delete('/uploadphoto/{post}/delete', 'UploadPhotoController@destroy')->name('uploadphoto.destroy');
            
            Route::get('uploadplace/', 'UploadPlaceController@index')->name('uploadplace.index');
            Route::get('uploadplace/create', 'UploadPlaceController@create')->name('uploadplace.create');
            Route::post('uploadplace/create', 'PostsController@store')->name('uploadplace.store');
            Route::get('uploadplace/{post}/show', 'UploadPlaceController@show')->name('uploadplace.show');
            Route::get('uploadplace/{post}/edit', 'UploadPlaceController@edit')->name('uploadplace.edit');
            Route::patch('uploadplace/{post}/update', 'UploadPlaceController@update')->name('uploadplace.update');
            Route::delete('uploadplace/{post}/delete', 'UploadPlaceController@destroy')->name('uploadplace.destroy');

            Route::get('profile', 'UserProfileController@index')->name('profile.index');
            // Route::get('profile', 'UserProfileController@showpost')->name('profile.showpost');
            Route::get('profile/edit', 'UserProfileController@edit')->name('profile.edit');
            Route::post('profile/edit', 'UserProfileController@update')->name('profile.update');
    });
    });


    Route::group(['middleware' => ['auth', 'permission', 'verified']], function() {

        /**
         * User Routes
         */
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'UsersController@index')->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        });

        

        /**
         * Post Routes
         */
        Route::group(['prefix' => 'posts'], function() {
            Route::get('/', 'PostsController@index')->name('posts.index');
            Route::get('/create', 'PostsController@create')->name('posts.create');
            Route::post('/create', 'PostsController@store')->name('posts.store');
            Route::get('/{post}/show', 'PostsController@show')->name('posts.show');
            Route::get('/{post}/edit', 'PostsController@edit')->name('posts.edit');
            Route::patch('/{post}/update', 'PostsController@update')->name('posts.update');
            Route::delete('/{post}/delete', 'PostsController@destroy')->name('posts.destroy');
        });



        Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
    });
});
