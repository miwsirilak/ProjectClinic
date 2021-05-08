<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostCRUDController;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\FullCalendarEventMasterController;
use App\Http\Controllers\FullCalendarAppointmentController;
use App\Http\Controllers\FullCalenderWorkingdayController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkingdayController;

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
    
    
//วัยหยุด
Route::resource('workingdays', WorkingdayController::class)->names([
    'index' => 'workingdays.index',
]);

//เพิ่มข้อมูลข่าวสาร
Route::resource('posts', PostCRUDController::class);
Route::get('/', [PostCRUDController::class, 'index']);

//เพิ่มข้อมูลผู้ป่วย
Route::resource('users', UserController::class)->names([
    'index' => 'users.index',
]);


Route::middleware(['auth:sanctum', 'verified'])->group(function(){

    Route::resource('events', EventController::class)->names([
        'index' => 'events.index',
        'create' => 'events.create',
    ]);
});

// For User or Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');

});

// For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function(){
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');

});


//fullcalender
Route::get('/fullcalendareventmaster',[FullCalendarEventMasterController::class,'index'])->name('fullcalendarDates');
Route::get('/fullcalendareventmaster/create',[FullCalendarEventMasterController::class,'create']);
Route::post('/fullcalendareventmaster/update',[FullCalendarEventMasterController::class,'update']);
Route::post('/fullcalendareventmaster/delete',[FullCalendarEventMasterController::class,'destroy']);

//fullcalender วันหยุด
Route::get('/fullcalendarworkingday',[FullCalenderWorkingdayController::class,'index'])->name('fullcalendarworkingday');
Route::post('/fullcalendarworkingday/create',[FullCalenderWorkingdayController::class,'create']);
Route::post('/fullcalendarworkingday/update',[FullCalenderWorkingdayController::class,'update']);
Route::post('/fullcalendarworkingday/delete',[FullCalenderWorkingdayController::class,'destroy']);

Route::get('/dermatologist', function () {
    return view('page_user/dermatologist');
})->name('dermatologist');

Route::get('/location', function () {
    return view('page_user/location');
})->name('location');

// Route Admin
Route::get('/templateadmin', function () {
    return view('templete/templateadmin');
});
// Route Admin