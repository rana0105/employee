<?php

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::group( ['middleware' => ['auth']], function() {
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('posts', 'PostController');
    Route::resource('permissions', 'Backend\PermissionController');
    Route::resource('employees', 'Backend\EmployeeController');
    Route::get('officeStaff', 'Backend\EmployeeController@officeStaff')->name('officeStaff');
    Route::get('floorStaff', 'Backend\EmployeeController@floorStaff')->name('floorStaff');
    Route::get('worker', 'Backend\EmployeeController@worker')->name('worker');
    Route::resource('category', 'Backend\ProductCategoryController');
    Route::resource('size', 'Backend\SizeController');
    Route::resource('stores', 'Backend\ProductController');
    Route::post('deliveryDate', 'Backend\ProductController@deliveryDate')->name('deliveryDate');
    Route::resource('supply', 'Backend\SupplyController');
    Route::post('supply-date', 'Backend\SupplyController@supplyDate')->name('supply-date');
    Route::resource('leave', 'Backend\LeaveController');
    Route::get('officeLeaves', 'Backend\LeaveController@officeLeaves')->name('officeLeaves');
    Route::get('floorLeaves', 'Backend\LeaveController@floorLeaves')->name('floorLeaves');
    Route::get('workerLeaves', 'Backend\LeaveController@workerLeaves')->name('workerLeaves');
    Route::resource('salary', 'Backend\SalaryController');
    Route::get('officeSalary', 'Backend\SalaryController@officeSalary')->name('officeSalary');
    Route::get('floorSalary', 'Backend\SalaryController@floorSalary')->name('floorSalary');
    Route::get('workerSalary', 'Backend\SalaryController@workerSalary')->name('workerSalary');
    Route::get('/employeeId', 'Backend\SalaryController@employeeId');
    Route::post('report-show', 'Backend\SalaryController@reportShow')->name('report.show');

    Route::get('printTest', function(){
        $pdf = \PDF::loadHTML('<h3>First test print to PDF!</h3>');

        return $pdf->stream();
    });

});

