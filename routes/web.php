<?php
 
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnouncementController;
use Illuminate\Support\Facades\Route;

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
    return view('homepage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/users',[UserController::class, 'index'])
         ->middleware(['auth', 'verified'])
        ->name('users');

Route::get('/users/add',[UserController::class, 'form'])
        ->middleware(['auth', 'verified']);
Route::post('/users/add',[UserController::class, 'store'])
        ->middleware(['auth', 'verified']);

Route::get('/users/update/{id}',[UserController::class, 'show'])
        ->middleware(['auth', 'verified']);
Route::post('/users/update/{id}', [UserController::class, 'update'])
        ->middleware(['auth', 'verified']);

Route::get('/users/editPassword/{id}',[UserController::class, 'editPassword'])
        ->middleware(['auth', 'verified']);


Route::get('/users/delete/{id}',[UserController::class, 'index'])
        ->middleware(['auth', 'verified']);
Route::get('/users/delete/{id}',[UserController::class, 'destroy'])
        ->middleware(['auth', 'verified']);
       

Route::get('/announcement', [AnnouncementController::class, 'index'])
        ->middleware(['auth', 'verified'])->name('announcement');
Route::get('/make-an',[AnnouncementController::class, 'makeAn'])
        ->middleware(['auth', 'verified']);
Route::post('/announcement',[AnnouncementController::class, 'destroy'])
        ->middleware(['auth', 'verified']);

 


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
