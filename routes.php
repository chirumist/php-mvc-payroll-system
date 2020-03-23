<?php 

Route::get('/', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

Route::get('/welcome', 'WelcomeController@index');

/* Department Feature */
Route::get('/department-list', 'DepartmentController@index');
Route::get('/department-form', 'DepartmentController@create');
Route::post('/department-store', 'DepartmentController@store');
Route::post('/department-update', 'DepartmentController@update');
Route::get('/department-delete', 'DepartmentController@delete');

/* Employee Feature */
Route::get('/employee-list', 'EmployeeController@index');
Route::get('/employee-form', 'EmployeeController@create');
Route::post('/employee-store', 'EmployeeController@store');
Route::post('/employee-update', 'EmployeeController@update');
Route::get('/employee-delete', 'EmployeeController@delete');

/* Employee Feature */
Route::get('/leave-list', 'LeaveController@index');
Route::get('/leave-form', 'LeaveController@create');
Route::post('/leave-store', 'LeaveController@store');
Route::post('/leave-update', 'LeaveController@update');
Route::get('/leave/delete', 'LeaveController@delete');

/* Salary Feature*/
Route::get('/pay_salary-create','EmployeeController@salaryCreate');
Route::get('/pay_salary-generate','EmployeeController@salaryGenerate');

Route::get('/ajaxList','WelcomeController@ajaxList');

Route::get('/error-404', 'ErrorController@pageNotFound');


//Route::any('*', 'ErrorController@notFoud');
