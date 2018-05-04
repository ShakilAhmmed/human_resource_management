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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin','HomeController@index');


Route::resource('/department','DepartmentController');
//start expense
Route::resource('/expense','ExpenseController');
//end expense

//start leavetype
Route::resource('/leave_type','LeaveTypeController');
//end leavetype

//start leave
Route::resource('/leave','LeaveController');
//end leave