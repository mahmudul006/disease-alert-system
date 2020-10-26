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

Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard','AdminDashboardController@index')->name('dashboard');

    Route::resource('doctors','DoctorController');
    Route::resource('patients','PatientController');
    Route::resource('diseases','DiseaseController');
    Route::resource('season','SeasonController');
    Route::resource('location','LocationController');
    Route::resource('patientdisease','PatientDiseaseController');

    route::get('location/country/create','LocationController@createCountry')->name('country.create');
    route::post('location/country','LocationController@storeCountry')->name('country.store');

    route::get('location/state/create','LocationController@createState')->name('state.create');
    route::post('location/state','LocationController@storeState')->name('state.store');

    route::get('location/city/create','LocationController@createCity')->name('city.create');
    route::post('location/city','LocationController@storeCity')->name('city.store');

    Route::resource('patientdisease','PatientDiseaseController');


    Route::get('/home', 'HomeController@index')->name('home');
});



