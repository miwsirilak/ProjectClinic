<?php

use Illuminate\Support\Facades\Route;

// PostKnowledge
use App\Http\Controllers\PostCRUDController;


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
use App\Http\Controllers\PatientController;

Route::resource('posts', PostCRUDController::class);
Route::get('/', [PostCRUDController::class, 'index']);

  
Route::resource('patients', PatientController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

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

Route::get('/appointment', function () {
    return view('page_user/appointment');
})->name('appointment');

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