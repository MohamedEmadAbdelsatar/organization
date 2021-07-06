<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', 'HomeController@index')->name('home');

//Governorate Routes
Route::get('/governorates', 'GovCityController@governorates')->name('governorates');
Route::post('/governorate/save', 'GovCityController@governorate_save')->name('governorate.save');

//City Routes
Route::get('/cities', 'GovCityController@cities')->name('cities');
Route::post('/city/save', 'GovCityController@city_save')->name('city.save');

//Supplier Routes
Route::get('/suppliers', 'SupplierController@index')->name('suppliers');
Route::post('/suppliers/save', 'SupplierController@supplier_save')->name('supplier.save');

//Borrower Routes
Route::get('/borrowers', 'BorrowerController@index')->name('borrowers');
Route::post('/borrowers/save', 'BorrowerController@borrower_save')->name('borrower.save');
