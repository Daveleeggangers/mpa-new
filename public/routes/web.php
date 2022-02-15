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


Route::group(['middleware' => ['auth', 'verified'] ], function() {
    Route::post('/newUser/{roleName}/{id}', [App\Http\Controllers\adminController::class, 'addingRoleToNewUser'])->name('addingRoleToNewUser');
    Route::get('/newUser/{roleName}', [App\Http\Controllers\adminController::class, 'newUser'])->name('newUser');
});

Route::group(['middleware' => ['auth', 'verified', 'role:admin'] ], function() {


    Route::get('/notificationPage', [App\Http\Controllers\NotificationController::class, 'notificationButton'])->name('NotificationButton');
    Route::post('/notificationPage', [App\Http\Controllers\NotificationController::class, 'SendingNotification'])->name('SendingNotification');

    Route::get('/adminPage', [App\Http\Controllers\adminController::class, 'adminPage'])->name('adminPage');
    Route::get('/addAdmin/{id}', [App\Http\Controllers\adminController::class, 'addAdmin'])->name('addAdmin');

    Route::get('/removeAdmin', [App\Http\Controllers\adminController::class, 'adminPage'])->name('adminPage');
    Route::get('/removeAdmin/{id}', [App\Http\Controllers\adminController::class, 'removeAdmin'])->name('removeAdmin');

    Route::get('/removeRoleFromUser', [App\Http\Controllers\adminController::class, 'removeRoleFromUser'])->name('removeRoleFromUser');
    Route::get('/removeRoleFromUser/{role}/{id}', [App\Http\Controllers\adminController::class, 'removeRoleFromUser'])->name('removeRoleFromUser');


    Route::get('/createRole/{roleName}', [App\Http\Controllers\adminController::class, 'createRole'])->name('createRole');
    Route::get('/removeRole/{roleName}', [App\Http\Controllers\adminController::class, 'removeRole'])->name('removeRole');

    Route::get('/newGroup', [App\Http\Controllers\adminController::class, 'newGroup'])->name('newGroup');
    Route::post('/newGroup', [App\Http\Controllers\adminController::class, 'addingNewGroup'])->name('addingNewGroup');

    Route::get('/groupsPage', [App\Http\Controllers\adminController::class, 'groupsPage'])->name('groupsPage');


    Route::get('/livePreview', [App\Http\Controllers\live::class, 'livePreview'])->name('livePreview');

});









require __DIR__.'/auth.php';

