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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware'=>'auth'],function(){
        Route::get('/@@@admin','HomeController@index');
 
   
   
    Route::get('/home','HomeController@index');
     
     Route::group(['middleware'=>'permission:ROLE MANAGE'],function(){
          Route::resource('/admin','AdminController');
          Route::resource('/create_role','RoleController');
          Route::resource('/create_permission','CreatePermissionController');
          Route::resource('/user_access','UserAccessController');
          Route::resource('/admin','AdminController');
          Route::resource('/role_permission','RolePermission');
          Route::put('/extra_operation/{delete_id}','RolePermission@delete_role_current_role');


        }); 
    
     Route::group(['middleware'=>'permission:DEPARTMENT'],function(){
          Route::resource('/department','DepartmentController');

       });

     Route::group(['middleware'=>'permission:DESIGNATION'],function(){
        //DESIGNATION
         Route::resource('/designation','DesignationController');

       });

     Route::group(['middleware'=>'permission:EMPLOYEE'],function(){

      //EMPLOYEE
        Route::resource('/employee','EmployeeController');

       });

     Route::group(['middleware'=>'permission:RECRUITMENT'],function(){
        //For RECRUITMENT Routes
           Route::resource('/vacancies','VacanciesController');
           Route::resource('/applications','ApplicationsController');
        //End Of RECRUITMENT Routes
       });

     Route::group(['middleware'=>'permission:ATTENDACNE'],function(){

           Route::post('/attendance_data','AttendanceController@attendance_data');
   
          //Attendance Routes
           Route::resource('/attendance','AttendanceController');
           Route::post('/attendance_employee_data','AttendanceController@attendance_employee_data');
       
        //End of Attendance Route
      });

     Route::group(['middleware'=>'permission:LEAVE'],function(){
          //start leavetype
            Route::resource('/leave_type','LeaveTypeController');
         //end leavetype
         //start leave
           Route::resource('/leave','LeaveController');
            Route::post('/get_employee_data','LeaveController@get_employee_data');
        //end leave
      });

     Route::group(['middleware'=>'permission:PAYROLL'],function(){
        //Payslip
            Route::resource('/payslip','PayslipController');
            Route::get('/preview/{id}','PayslipController@preview');
            Route::post('/department_employee','PayslipController@employee');
      });
     Route::group(['middleware'=>'permission:HOLIDAY'],function(){

           Route::post('/get_holiday','HolidayController@get_holiday');
       });
     Route::group(['middleware'=>'permission:TASK'],function(){
        //For Task Route
          Route::resource('/task','TaskController');
        //End Of Task Route

     });

     Route::group(['middleware'=>'permission:AWARD'],function(){
         Route::resource('/award','AwardController');
     });

     Route::group(['middleware'=>'permission:EXPENSE'],function(){
 //start expense
        Route::resource('/expense','ExpenseController');
    //end expense

     });

     Route::group(['middleware'=>'permission:NOTICE BOARD'],function(){
          //Notice Board
         Route::resource('/notice','NoticeBoardController');
         Route::post('/personal_details','NoticeBoardController@personal_details');
      });
     Route::group(['middleware'=>'permission:MESSAGE'],function(){
    
        Route::resource('/message','Messenging');
        Route::post('/online_user','Messenging@online_user');
        Route::post('/get_message_user','Messenging@get_message_user');
      });
     Route::group(['middleware'=>'permission:SETTINGS'],function(){
         //settings
           Route::resource('/settings','SettingsController');
      });

});




Auth::routes();


