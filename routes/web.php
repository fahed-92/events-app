<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::get('/', [\App\Http\Controllers\DailyInfoController::class, 'index'])->name('daily.index');
Route::post('/daily-info/store', [\App\Http\Controllers\DailyInfoController::class, 'store'])->name('dailyInfo.store');

Route::get('/att', [\App\Http\Controllers\AttController::class, 'index'])->name('att.index');
Route::post('/att/store', [\App\Http\Controllers\AttController::class, 'store'])->name('att.store');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
    // Dashboard
    Route::prefix('admin')->name('admin.')->group(function () {
        // Authenticate
        Auth::routes();
        // Dashboard
        Route::middleware(['auth'])->group(function () {
            Route::get('/import-excel', [\App\Http\Controllers\StaffController::class, 'import'])->name('import.excel');
            Route::post('/import-excel', [\App\Http\Controllers\StaffController::class, 'import']);

            Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('index');
            Route::get('staff/data', [\App\Http\Controllers\SalaryController::class, 'get'])->name('staff.data');
            Route::get('staff/{id}', [\App\Http\Controllers\SalaryController::class, 'absent_count'])->name('staff.absent.count');
            Route::resource('corners', \App\Http\Controllers\CornerController::class);
            Route::resource('staff', \App\Http\Controllers\StaffController::class);
            Route::get('salary/report', [\App\Http\Controllers\SalaryController::class, 'get'])->name('salary.report');
            Route::get('salary', [\App\Http\Controllers\SalaryController::class, 'index'])->name('salary.index');
            Route::resource('store', \App\Http\Controllers\StoreController::class);
            Route::get('daily-report', [\App\Http\Controllers\ReportsController::class , 'index'])->name('daily-reports.index');
            Route::get('daily-report/date', [\App\Http\Controllers\ReportsController::class , 'dailyReport'])->name('daily-reports.report');
            Route::get('/daily-report/pdf/{date}', [\App\Http\Controllers\ReportsController::class , 'pdf'])->name('daily-reports.report.pdf');
            Route::get('hr-report', [\App\Http\Controllers\ReportsController::class , 'indexHr'])->name('hr-reports.index');
            Route::get('hr-report/date', [\App\Http\Controllers\ReportsController::class , 'hrReport'])->name('hr.report');
            Route::get('/hr-report/pdf/{date}', [\App\Http\Controllers\ReportsController::class , 'hrPdf'])->name('hr.report.pdf');
            Route::get('/dropdown', [\App\Http\Controllers\ReportsController::class ,'index']);
            Route::get('/dropdown/values', [\App\Http\Controllers\ReportsController::class ,'getDropdownValues']);
            Route::post('/dropdown/search', [\App\Http\Controllers\ReportsController::class ,'searchDropdown']);


        });

    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['admin']], function () {

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
