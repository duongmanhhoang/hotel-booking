<?php

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
Route::get('/', 'Client\HomeController@index')->name('index');

Route::get('/language/{id}', 'LanguageController@change')->name('changeLanguage');

Auth::routes();

Route::get('login', 'Auth\LoginController@form')->name('login_form');
Route::post('login', 'Auth\LoginController@authenticate')->name('login');
Route::post('register', 'Auth\LoginController@register')->name('register');

Route::prefix('rooms')->name('rooms.')->group(function () {
    $roomController = 'Client\RoomController@';
    Route::get('/', $roomController . 'index')->name('index');
    Route::get('/{location_id}', $roomController . 'location')->name('location');
    Route::get('/detail/{id}', $roomController . 'detail')->name('detail');
    Route::post('/detail/comment', $roomController . 'comment')->name('comment');
});

Route::prefix('booking')->name('booking.')->middleware('checkUserLogin')->group(function () {
    $bookingController = 'Client\BookingController@';
    Route::get('/', $bookingController . 'index')->name('index');
    Route::post('/submit', $bookingController . 'submit')->name('submit');
    Route::post('/checkout', $bookingController . 'checkout')->name('checkout');
});
Route::prefix('blog')->group(function(){
	Route::get('/list/{cate_id}', 'Client\PostController@index');
	Route::get('/', 'Client\PostController@category');
});

Route::prefix('users')->name('users.')->middleware('checkUserLogin')->group(function(){
    $userController = 'Client\UserController@';
    Route::get('/{id}', $userController . 'profile')->name('profile');
    Route::post('/update/{id}', $userController . 'update')->name('update');
    Route::post('/changepassword', $userController . 'changePassword')->name('changepassword');
});
