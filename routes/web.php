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

//start holiday
Route::resource('/holiday','HolidayController');
//end holiday



//DESIGNATION
Route::resource('/designation','DesignationController');

//EMPLOYEE
Route::resource('/employee','EmployeeController');


//Attendance Routes
Route::resource('/attendance','AttendanceController');
Route::post('/get_employee_data','AttendanceController@get_employee_data');
//End of Attendance Route

//For RECRUITMENT Routes
Route::resource('/vacancies','VacanciesController');
Route::resource('/applications','ApplicationsController');
//End Of RECRUITMENT Routes



//For Task Route

Route::resource('/task','TaskController');

//End Of Task Route

//Notice Board
Route::resource('/notice','NoticeBoardController');
Route::post('/personal_details','NoticeBoardController@personal_details');

//Payslip
Route::resource('/payslip','PayslipController');

Route::get('/preview/{id}','PayslipController@preview');
Route::post('/department_employee','PayslipController@employee');

Route::post('/get_holiday','HolidayController@get_holiday');
Route::post('/get_employee_data','LeaveController@get_employee_data');

Route::resource('/award','AwardController');


//settings
Route::resource('/settings','SettingsController');


