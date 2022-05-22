<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class,'welcome'])->name('home');
Route::get('/comfort', [MainController::class,'comfort']);

//   Если пользователь авторизовался 
Route::middleware('auth')->group(function () {
Route::get('/exit', [AuthController::class, 'exit']);
}); 
//   Если пользователь авторизовался END

//   Регистрация и Авторизация пользователя start
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login_process']);    
    Route::get('/register', [AuthController::class, 'register'])->name('registration');
    Route::post('/register', [AuthController::class, 'register_process']);
});
//   Регистрация и Авторизация пользователя END

