<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AbitController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\OpenAirController;
use App\Http\Middleware\HeaderMiddle;
use App\Http\Controllers\MisterMissController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\StudCuratorsController;
use App\Http\Controllers\NewsMediaController;

use Illuminate\Support\Facades\Redirect;

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

Route::get('/', [HomeController::class, 'show'])->name("index");
Route::get('/news', [NewsController::class, 'show'])->name("news");
Route::get('/abit', [AbitController::class, 'page'])->name("abit");
Route::get('/openair', [OpenAirController::class, 'page'])->name("openair");
Route::get('/mr_its', [MisterMissController::class, 'mister'])->name("mr_its");
Route::get('/miss_its', [MisterMissController::class, 'miss'])->name("miss_its");

Route::get('/contacts', function (Request $request) {
    return view('contacts',[
        "header" => $request->header
    ]);
})->name("contacts");

Route::get('/stud', [StudentController::class, 'page'])->name("stud");

Route::get('/register', function (){
    return view("auth.register");
})->name("register");

Route::get('/login', function (){
    if(Auth::check()){
        return view("admin.index");
    }
    return view("auth.login");
})->name("login");

Route::prefix("admin")->middleware('auth')->group(function () {
    
    Route::get('/', function() {
        return view("admin.index");
    })->name("admin");

    Route::resource('/header',HeaderController::class)->only([
        'index', "edit","update"
    ]);;

    Route::resource('/stud_curators',StudCuratorsController::class)->only([
        'index', 'store', "edit","update","destroy"
    ]);

    Route::resource('/mister_miss',MisterMissController::class)->only([
        'index', 'store', "edit","update","destroy"
    ]);

    Route::resource('/abit_fest',AbitController::class)->only([
        'index', 'store', "edit","update","destroy"
    ]);

    Route::resource('/open_air',OpenAirController::class,[
        'except' => ['create','edit',"show"]
    ]);

    Route::get('/open_air/create/{type}', [OpenAirController::class, 'create'])->name("open_air.create");
    Route::get('/open_air/edit/{id}/{type}', [OpenAirController::class, 'edit'])->name("open_air.edit");

    Route::resource('/stud',StudentController::class);
    Route::resource('/news',NewsController::class)->only([
        'index', 'store', "edit","update","destroy"
    ]);

    Route::resource('/news_media',NewsMediaController::class)->only([
        'store',"update","destroy"
    ]);

    Route::get('/news_media/{news_id?}', [NewsMediaController::class, 'index'])->name("news_media.index");
    Route::get('/news_media/create/{news_id}/{type}', [NewsMediaController::class, 'create'])->name("news_media.create");
    Route::get('/news_media/edit/{id}/{type}', [NewsMediaController::class, 'edit'])->name("news_media.edit");
});