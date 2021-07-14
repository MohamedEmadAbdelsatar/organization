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
    return redirect('/home');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

//Governorate Routes
Route::get('/governorates', 'GovCityController@governorates')->name('governorates');
Route::post('/governorate/save', 'GovCityController@governorate_save')->name('governorate.save');
Route::post('/governorates/cities', 'GovCityController@get_cities')->name('governorate.cities');
Route::get('/governorate/{id}/edit', 'GovCityController@governorate_edit')->name('governorate.edit');
Route::post('/governorate/update/{id}', 'GovCityController@governorate_update')->name('governorate.update');
Route::delete('/governorate/destroy/{id}', 'GovCityController@governorate_destroy')->name('governorate.destroy');

//City Routes
Route::get('/cities', 'GovCityController@cities')->name('cities');
Route::post('/city/save', 'GovCityController@city_save')->name('city.save');
Route::get('/city/{id}/edit', 'GovCityController@city_edit')->name('city.edit');
Route::post('/city/update/{id}', 'GovCityController@city_update')->name('city.update');
Route::delete('/city/destroy/{id}', 'GovCityController@city_destroy')->name('city.destroy');

//Supplier Routes
Route::get('/suppliers', 'SupplierController@index')->name('suppliers');
Route::post('/supplier/save', 'SupplierController@supplier_save')->name('supplier.save');
Route::post('/supplier/imports', 'SupplierController@imports')->name('supplier.imports');
Route::get('/supplier/{id}/show', 'SupplierController@supplier_show')->name('supplier.show');
Route::get('/supplier/{id}/edit', 'SupplierController@supplier_edit')->name('supplier.edit');
Route::post('/supplier/update/{id}', 'SupplierController@supplier_update')->name('supplier.update');
Route::delete('/supplier/destroy/{id}', 'SupplierController@supplier_destroy')->name('supplier.destroy');

//Borrower Routes
Route::get('/borrowers', 'BorrowerController@index')->name('borrowers');
Route::post('/borrower/save', 'BorrowerController@borrower_save')->name('borrower.save');
Route::post('/borrower/loans', 'BorrowerController@loans')->name('borrower.loans');
Route::get('/borrower/{id}/show', 'BorrowerController@borrower_show')->name('borrower.show');
Route::get('/borrower/{id}/edit', 'BorrowerController@borrower_edit')->name('borrower.edit');
Route::post('/borrower/update/{id}', 'BorrowerController@borrower_update')->name('borrower.update');
Route::delete('/borrower/destroy/{id}', 'BorrowerController@borrower_destroy')->name('borrower.destroy');


//Loan Routes
Route::get('/loans', 'LoanController@index')->name('loans');
Route::post('/loan/save', 'LoanController@loan_save')->name('loan.save');
Route::get('/loan/pay', 'LoanController@loan_pay')->name('loan.pay');
Route::post('/loan/save_payment', 'LoanController@save_payment')->name('loan.save_payment');
Route::post('/loan/months', 'LoanController@get_months')->name('loan.months');
Route::get('/loan/{id}/show', 'LoanController@loan_show')->name('loan.show');
Route::delete('/loan/destroy/{id}', 'LoanController@loan_destroy')->name('loan.destroy');
Route::get('/loan/select', 'LoanController@loan_select')->name('loan.select');
Route::post('/loan/settle', 'LoanController@loan_settle')->name('loan.settle');

//import Routes
Route::get('/imports', 'ImportController@index')->name('imports');
Route::post('/import/save', 'ImportController@import_save')->name('import.save');
Route::get('/import/pay', 'ImportController@import_pay')->name('import.pay');
Route::post('/import/save_payment', 'ImportController@save_payment')->name('import.save_payment');
Route::post('/import/batches', 'ImportController@get_batches')->name('import.batches');
Route::get('/import/{id}/show', 'ImportController@import_show')->name('import.show');
Route::delete('/import/destroy/{id}', 'ImportController@import_destroy')->name('import.destroy');


//Print Routes
Route::get('/print', 'PrintController@index')->name('print');
Route::post('/print/pay', 'PrintController@pay')->name('print.pay');
Route::post('/print/late', 'PrintController@late')->name('print.late');


//Account Routes
Route::get('/accounts', 'AccountController@index')->name('accounr');
Route::post('/account/save', 'AccountController@account_save')->name('account.save');
