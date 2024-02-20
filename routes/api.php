<?php

declare(strict_types=1);

use App\Http\Controllers\Api\Posts\{PostsDestroyController, PostsIndexController, PostsShowController, PostsStoreController, PostsUpdateController};
use App\Http\Controllers\Api\Users\{ UsersDestroyController, UsersIndexController, UsersShowController, UsersUpdateController};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admins\AdminsIndexController;
use App\Http\Controllers\Api\Admins\AdminsShowController;
use App\Http\Controllers\Api\Employees\{EmployeesIndexController,EmployeesDestroyController, EmployeesShowController};
use App\Http\Controllers\Api\Employees\EmployeesStoreController;
use App\Http\Controllers\Api\Customers\{CustomersIndexController,CustomersStoreController,CustomersDestroyController};
use App\Http\Controllers\Api\Tasks\{TasksStoreController,TasksIndexController,TasksUpdateController};
use App\Http\Requests\Api\v1_0\AdminStoreRequest;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('users')->group(function () {
    Route::get('/', UsersIndexController::class)->name('users.index');
    Route::get('/{users}', UsersShowController::class)->name('users.show');
    Route::match(['put', 'patch'], '/{user}', UsersUpdateController::class)->name('users.update');
    Route::delete('/{user}', UsersDestroyController::class)->name('users.destroy');
  
});

Route::prefix('admins')->group(function() {
    Route::get('/', AdminsIndexController::class)->name('admin.index');
    Route::get('/{admins}',AdminsShowController::class)->name('admin.show');
    // Route::put('{/admins}' ,AdminStoreRequest::class )->name('admins.store');
    Route::post('{admin}/employees', EmployeesStoreController::class)->name('employees.store');
    Route::delete('/employees/{employeeId}', EmployeesDestroyController::class)->name('employees.destroy'); 
    Route::post('{admin}/customers', CustomersStoreController::class)->name('customers.store');
    Route::delete('/customers/{customerId}',CustomersDestroyController::class)->name('customers.delete');
    Route::get('{admin}/employees',EmployeesIndexController::class)->name('admin.employees.index');
    Route::get('{admin}/customers',CustomersIndexController::class)->name('admin.customers.index');
});
 
Route::prefix('employees')->group(function() {
        Route::get('/', EmployeesIndexController::class)->name('employees.index');
        Route::get('{employee}/tasks',TasksIndexController::class)->name('employee.tasks.index');
        Route::put('{employee}/tasks/{task}', TasksUpdateController::class)->name('employee.tasks.update');

});



Route::prefix('customers')->group(function() {
    Route::get('/', CustomersIndexController::class)->name('customers.index');
    Route::post('/{customer}/tasks',TasksStoreController::class)->name('tasks.store');
});

Route::prefix('tasks')->group(function() {
    Route::get('/', TasksIndexController::class)->name('tasks.index');
});

// Route::middleware(['auth:sanctum', 'cache.headers:public;max_age=60;etag', 'treblle'])->group(function () {
  

//     Route::prefix('posts')->group(function () {
//         Route::get('/', PostsIndexController::class)->name('posts.index');
//         Route::post('/', PostsStoreController::class)->name('posts.store');
//         Route::get('/{post}', PostsShowController::class)->name('posts.show');
//         Route::match(['put', 'patch'], '/{post}', PostsUpdateController::class)->name('posts.update');
//         Route::delete('/{post}', PostsDestroyController::class)->name('posts.destroy');
//     });
// });
