<?php

use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvide;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['middleware' => ['auth', 'verified', 'role:admin'] ], function() {


    Route::get('/notificationPage', [App\Http\Controllers\NotificationController::class, 'notificationButton'])->name('NotificationButton');
    Route::post('/notificationPage', [App\Http\Controllers\NotificationController::class, 'SendingNotification'])->name('SendingNotification');

    Route::get('/adminPage', [App\Http\Controllers\adminController::class, 'adminPage'])->name('adminPage');
    Route::get('/addAdmin/{id}', [App\Http\Controllers\adminController::class, 'addAdmin'])->name('addAdmin');

    Route::get('/removeAdmin', [App\Http\Controllers\adminController::class, 'adminPage'])->name('adminPage');
    Route::get('/removeAdmin/{id}', [App\Http\Controllers\adminController::class, 'removeAdmin'])->name('removeAdmin');





});


require __DIR__.'/auth.php';
