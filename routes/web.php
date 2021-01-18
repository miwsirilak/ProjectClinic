<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostCRUDController;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;




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