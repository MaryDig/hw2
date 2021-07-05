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
    return redirect('home');
});

Route::get('login','LoginController@login');

Route::post('login','LoginController@checkLogin');

Route::get('home','HomeController@home');                                                                                                                                                                                                                                                                  

Route::get('logout','LoginController@logout');

Route::get('sign-in','SigninController@index');

Route::post('sign-in','SigninController@create');

Route::post('sign-in/email','SigninController@checkEmail');

Route::get('studentArea','StudentAreaController@index');

Route::get('studentArea/uploadExams','StudentAreaController@uploadExams');

Route::get('studentArea/createReservation/{exam_id}','StudentAreaController@createReservation');

Route::get('studentArea/removeReservation/{exam_id}','StudentAreaController@removeReservation');

Route::get('studentArea/uploadBookedExams','StudentAreaController@uploadBookedExams');

Route::get('book','ControllerApi@indexBook');

Route::get('video','ControllerApi@indexVideo');

Route::get('book/serch/{query}','ControllerApi@serchBooks');

Route::get('book/addBookFavorites/{title}/{book_id}/{img}','ControllerApi@addBookFavorites');

Route::get('book/removeBookFavorites/{title}/{book_id}/{img}','ControllerApi@removeBookFavorites');

Route::get('favouriteLibrary','ControllerApi@indexFavouriteLibrary');

Route::get('favouriteLibrary/uploadFavouriteBooks','ControllerApi@uploadFavouriteBooks');

Route::get('video/serchVideo','ControllerApi@serchVideo');