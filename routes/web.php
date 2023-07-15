<?php

use App\Http\Controllers\SoloModeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth ;
use App\Http\Controllers\UserController;
use App\Models\Solo_mode;
use Illuminate\Support\Facades\DB;
use App\Models\User ;
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

Route::get('/' , [UserController::class, 'index']);


// profile routes
Route::get('/profile/{url}' , [App\Http\Controllers\UserController::class, 'profile'])->where('url' , '[A-Za-z0-9]+')->name('profile') ;

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

// game categories 
Route::get('/categories' , function () {

    
    $count = Solo_mode::all()->count() - 2 ;
    return view('categories' , ['count' => $count - 1]);

})->name('categories');


// creat game route
Route::get('/new-game/{mode}' , function() {
    return view('subjects');
} )->middleware('auth')->name('subjects');

Route::get('/new-game/{mode}/{subject}' , [App\Http\Controllers\UserController::class , 'create_new_game' ] )
->middleware('auth')->name('new_game');

// solo_mode route 
Route::get("solo_mode/{id}" , [App\Http\Controllers\SoloModeController::class , 'index'])->middleware('auth')->middleware('CheckUserIsValid')->name('solo_mode');
Route::get("solo_mode/{id}/progress" , [App\Http\Controllers\SoloModeController::class , 'progress'])->middleware('auth')->middleware('CheckUserIsValid')
->name('solo_mode_progress');

// double mode route 
Route::get("double_mode/{id}" , function($id){
    return  view('double_game_page');
} )->name("double_mode");

// receive chosen option by ajax 
Route::post("solo_mode/answer" , [App\Http\Controllers\SoloModeQuestionController::class , 'index'])->name('check_solo_answer')
;
// return next question by ajax 
Route::get("solo_mode/{id}/progress/next_question", [App\Http\Controllers\SoloModeQuestionController::class , 'next'] )->name('next_question');

// game guides route
Route::post("game/game_guide" , [App\Http\Controllers\SoloModeController::class , 'guide'] )->name('game_guide');


// profile settings 
Route::get("settings" , function(){
    return view('settings') ;
})->name('settings');

// standings

Route::get("standings" , function(){

    $users = User::orderBy('score' , 'desc')->get() ;
    return view("standings" , ['users' => $users]);

})->name("standings");

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


?>