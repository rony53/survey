<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
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



Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => 'role:admin'], function () {

        Route::get('/user/list', [SurveyController::class, 'userList'])->name('userList');
    });

    Route::group(['middleware' => 'role:regular'], function () {

    });
    Route::get('/dashboard', [SurveyController::class, 'dashboard'])->name('dashboard');
    Route::get('/add-survey', [SurveyController::class, 'index'])->name('index');
    Route::get('/survey/list', [SurveyController::class, 'surveyList'])->name('surveyList');
    Route::post('/store', [SurveyController::class, 'store'])->name('store');
    Route::get('/survey/details/{id}', [SurveyController::class, 'details'])->name('details');

});
