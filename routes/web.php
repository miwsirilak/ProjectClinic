<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostCRUDController;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\FullCalendarEventMasterController;
use App\Http\Controllers\FullCalendarAppointmentController;



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


Route::resource('posts', PostCRUDController::class);
Route::get('/', [PostCRUDController::class, 'index']);

  
Route::resource('patients', PatientController::class);

Route::resource('appointments', AppointmentController::class);

// Route::get('appointments/{event}', AppointmentController::class, 'update')->name('appointments.update');
// Route::get('appointments', [AppointmentController::class, 'create'])->name('appointments.create');
// Route::get('appointments', [AppointmentController::class, 'dataTable'])->name('appointments.index');
// Route::post('appointments', [AppointmentController::class, 'store'])->name('appointments.store');
// Route::get('appointments/dataTable', [AppointmentController::class, 'dataTable']);

// login
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// For User or Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');

});

// For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function(){
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');

});


//fullcalender
// Route::resource('fullcalendareventmaster', FullCalendarEventMasterController::class);
Route::get('/fullcalendareventmaster',[FullCalendarEventMasterController::class,'index']);
Route::post('/fullcalendareventmaster/create',[FullCalendarEventMasterController::class,'create']);
Route::post('/fullcalendareventmaster/update',[FullCalendarEventMasterController::class,'update']);
Route::post('/fullcalendareventmaster/delete',[FullCalendarEventMasterController::class,'destroy']);

//fullcalendar_User
Route::get('/FullCalendarAppointment',[FullCalendarAppointmentController::class,'index']);
Route::post('/FullCalendarAppointment/create',[FullCalendarAppointmentController::class,'create']);
Route::post('/FullCalendarAppointment/update',[FullCalendarAppointmentController::class,'update']);
Route::post('/FullCalendarAppointment/delete',[FullCalendarAppointmentController::class,'destroy']);


// test
Route::get('/layout', function () {
    return view('patients/layout');
});

Route::get('/test', function () {
    return view('posts/test');
});

Route::get('/templat', function () {
    return view('templete/template');
});

// templat
Route::get('/home', function () {
    return view('page_user/index');
})->name('index');

Route::get('/cards', function () {
    return view('page_user/cards');
})->name('cards');

Route::get('/calen', function () {
    return view('page_user/calen');
})->name('calen');

// Route::get('/appointment', function () {
//     return view('page_user/appointment');
// })->name('appointment');

Route::get('/cancle', function () {
    return view('page_user/cancle');
})->name('cancle');

Route::get('/chat', function () {
    return view('page_user/chat');
})->name('chat');

Route::get('/dermatologist', function () {
    return view('page_user/dermatologist');
})->name('dermatologist');

Route::get('/location', function () {
    return view('page_user/location');
})->name('location');

// Route::get('/register', function () {
//     return view('page_user/register');
// })->name('register');

// Route::get('/login', function () {
//     return view('page_user/login');
// })->name('login');

Route::get('/sliding', function () {
    return view('page_user/sliding');
})->name('sliding');
// templat

//StartDate-EndDate ไม่ใช้แล้ว
Route::get('/startdate', function () {
    return view('datetime/startdate');
});

Route::get('/enddate', function () {
    return view('datetime/enddate');
});


// Route Admin
Route::get('/templateadmin', function () {
    return view('templete/templateadmin');
});
// Route Admin