<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LeaveModelController;
use App\Models\LeaveModel;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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


Route::get('/', [CustomAuthController::class, 'index']);
// Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->middleware('auth');
// Route::get('Employeelogin', [CustomAuthController::class, 'index'])->name("login.emp");
// Route::get('AdminLogin', [CustomAuthController::class, 'index'])->name("login.admin");
// Route::post('auth', [CustomAuthController::class, 'manualAuth'])->name("login.manAuth");
// Route::get('logout', [CustomAuthController::class, 'logout'])->name("logout");

Route::controller(CustomAuthController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('login/user', 'index')->name('user.login');
    Route::get('login/admin', 'index')->name('admin.login');
    Route::get('login/auth/admin', 'AdminAuth')->name('login.admin');
    Route::get('login/auth/user', 'EmployeeAuth')->name('login.employee');
    Route::get('logout', 'logout')->name('logout');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::prefix('/dashboard')->group(function () {
            Route::controller(LeaveModelController::class)->group(function () {
                Route::get('/', 'adminDash')->name('adminHome');
                Route::get('/leaveNotices', 'LeaveNotices')->name('leaveNotices');
                Route::get('/leaveType', 'LeaveTypes')->name('leaveTypes');
                Route::get('/employeeList', 'EmployeeList')->name('employeeList');
                Route::post('/employeeList/addEmp', 'storeEmployee')->name('addEmp');
                Route::post('/leaveType/addType', 'CRLeaveType')->name('addType');
                Route::post('/leaveList/{leave}', 'updateleave')->name("updateleave");
                Route::post('/leaveType/{type}', 'CRLeaveType')->name("removeLeaveType");
                Route::post('/employeeList/{emp}', 'CRUDEmp')->name("CRUDEmp");
            });
            // Route::get('/dashboard', [CustomAuthController::class, 'AdminDashView'])->middleware('auth:admin');
        });
    });
});


Route::middleware(['auth:web'])->group(function () {
    Route::prefix('/user')->group(function () {
        Route::get('/dashboard', [LeaveModelController::class, 'leaveDetails'])->name("employeeHome");
        Route::get('/dashboard/leavedetails', [LeaveModelController::class, 'leaveDetails'])->name('leaveDetails');
        Route::post('/dashboard/applyLeave', [LeaveModelController::class, 'ApplyLeave'])->name('applyLeave');
    });
});
