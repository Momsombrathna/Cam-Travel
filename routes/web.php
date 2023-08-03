<?php

use App\Http\Controllers\PhotoController;
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



    Route::get('/place', 'PlaceShowController@index')->name('place.index');
    Route::get('/place/{place}/show', 'PlaceShowController@show')->name('place.show');




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

        // forgot password routes
        Route::get('/forgot-password', 'ForgotPasswordController@showForgotPasswordForm')->name('forgot.password.get');
        Route::post('forgot-password/send-reset-email', 'ForgotPasswordController@sendResetEmail')->name('forgot-password.send-reset-email');
        Route::get('password/reset/{token}', 'ForgotPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'ForgotPasswordController@reset')->name('password.update');





    });

    // User routes
    Route::group(['middleware' => ['auth']], function() {

        /**
        * Verification Routes
        */
        Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
        Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');

        // User verification routes
        Route::group(['middleware' => ['verified']], function() {
            /**
             * Dashboard Routes
             */
            Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
            Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

            // Upload posts routes
            Route::get('/uploadphoto', 'UploadPhotoController@index')->name('uploadphoto.index');
            Route::get('/uploadphoto/create', 'UploadPhotoController@create')->name('uploadphoto.create');
            Route::post('/uploadphoto/create', 'UploadPhotoController@store')->name('uploadphoto.store');
            Route::get('/uploadphoto/{post}/edit', 'UploadPhotoController@edit')->name('uploadphoto.edit');
            Route::get('/uploadphoto/{post}/show', 'UploadPhotoController@show')->name('uploadphoto.show');
            Route::patch('/uploadphoto/{post}/update', 'UploadPhotoController@update')->name('uploadphoto.update');
            Route::delete('/uploadphoto/{post}/delete', 'UploadPhotoController@destroy')->name('uploadphoto.destroy');

            // Upload place routes
            Route::get('/uploadplace', 'UploadPlaceController@index')->name('uploadplace.index');
            Route::get('/uploadplace/create', 'UploadPlaceController@create')->name('uploadplace.create');
            Route::post('/uploadplace/create', 'UploadPlaceController@store')->name('uploadplace.store');
            Route::get('/uploadplace/{place}/edit', 'UploadPlaceController@edit')->name('uploadplace.edit');
            Route::get('/uploadplace/{place}/show', 'UploadPlaceController@show')->name('uploadplace.show');
            Route::patch('/uploadplace/{place}/update', 'UploadPlaceController@update')->name('uploadplace.update');
            Route::delete('/uploadplace/{place}/delete', 'UploadPlaceController@destroy')->name('uploadplace.destroy');

            // Profile routes
            Route::get('/profile', 'UserProfileController@index')->name('profile.index');
            Route::get('/profile/{id}/show', 'ProfileController@show')->name('profile.show');
            Route::get('/profile/{post}/showitem', 'ProfileController@showitem')->name('profile.showitem');
            Route::get('/profile/{place}/showitemplace', 'ProfileController@showitemplace')->name('profile.showitemplace');
            Route::get('/profile/edit', 'UserProfileController@edit')->name('profile.edit');
            Route::post('/profile/update', 'UserProfileController@update')->name('profile.update');

            // Search routes
            Route::get('/search', 'SearchController@index')->name('search.index');


            // share buuton to social media
            Route::get('/uploadphoto/{post}/show', 'ProfileController@share')->name('uploadphoto.show');
            Route::get('/uploadplace/{post}/show', 'PlaceController@shareplacebtn')->name('uploadplace.show');

    });
    });


    // Admin routes
    Route::group(['middleware' => ['auth', 'permission', 'verified']], function() {
        /**
         * Logout Routes
         */

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
         * Posts Routes
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

        /**
         *Places Routes
         */
        Route::group(['prefix' => 'places'], function() {
            Route::get('/', 'PlaceController@index')->name('places.index');
            Route::get('/create', 'PlaceController@create')->name('places.create');
            Route::post('/create', 'PlaceController@store')->name('places.store');
            Route::get('/{place}/show', 'PlaceController@show')->name('places.show');
            Route::get('/{place}/edit', 'PlaceController@edit')->name('places.edit');
            Route::patch('/{place}/update', 'PlaceController@update')->name('places.update');
            Route::delete('/{place}/delete', 'PlaceController@destroy')->name('places.destroy');
        });



        Route::get('/uploadplace', 'UploadPlaceController@index')->name('uploadplace.index');
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');


        Route::get('/search/user', 'SearchController@search_user')->name('search.user');
        Route::get('/search/post', 'SearchController@search_post')->name('search.post');
        Route::get('/search/place', 'SearchController@search_place')->name('search.place');

        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
    });
});
