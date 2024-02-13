<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\RegistrationController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\UrlsController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\UrlController;
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
 
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/urls', [UrlController::class, 'store'])->name('store');

    Route::get('/urls/del/{id}', [UrlController::class, 'del']);
    // Route::get('/urls/update/{id}', [UrlController::class, 'update'])->name('update');
});


Route::get('/url/{shortener_url}', [UrlController::class, 'shortenLink'])->name('shortener-url');


Route::get('/admin', function () {
    return view('admin.login');
});

Route::post('/admin/login',[LoginController::class,'store']);
Route::get('/admin/logout',[LoginController::class,'destroy']);

Route::group([ 'prefix' => 'admin','middleware'=>['admin']], function() {

    Route::prefix('/dashboard')->group(function () {
        //Route::get('/index',[IndexController::class,'index']);
        Route::get('/index',[RegistrationController::class,'index']);
        Route::get('/del_content',[RegistrationController::class,'del_content']);
        Route::get('/register',[RegistrationController::class,'index']);
        Route::get('/show/{id}',[RegistrationController::class,'show']);
        Route::post('/edit/{id}',[RegistrationController::class,'edit']);
        Route::post('/insert',[RegistrationController::class,'store']);
        
    });

     Route::group(['prefix'=>'/setting/'], function(){
        Route::get('/index',[SettingController::class,'index']);
        Route::post('/update',[SettingController::class,'edit']);

     });

     Route::group(['prefix'=>'/url/'], function(){

        Route::get('/index',[UrlsController::class,'index']);

        Route::post('/insert',[UrlsController::class,'store']);
        Route::get('/show/{id}',[UrlsController::class,'show']);
        Route::post('/edit/{id}',[UrlsController::class,'edit']);
        Route::get('/del_content',[UrlsController::class,'del_content']);

        Route::get('/update_listpic',[UrlsController::class,'update_listpic']);
        Route::get('/del_img',[UrlsController::class,'del_img']);

    });


});
