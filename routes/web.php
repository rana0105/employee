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
    Route::resource('category', 'Backend\ProductCategoryController');
    Route::resource('size', 'Backend\SizeController');
    Route::resource('product', 'Backend\ProductController');
    Route::resource('supply', 'Backend\SupplyController');
    Route::post('supply-date', 'Backend\SupplyController@supplyDate')->name('supply-date');
    Route::resource('leave', 'Backend\LeaveController');
    Route::resource('salary', 'Backend\SalaryController');
    Route::get('/employeeId', 'Backend\SalaryController@employeeId');
    Route::post('report-show', 'Backend\SalaryController@reportShow')->name('report.show');

    Route::get('printTest', function(){
        $pdf = \PDF::loadHTML('<h3>First test print to PDF!</h3>');

        return $pdf->stream();
    });

});

