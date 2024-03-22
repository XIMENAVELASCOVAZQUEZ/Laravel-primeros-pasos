
<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Middleware\TestMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([TestMiddleware::class])->group(function() {
    Route::get('/test/{id?}/{name?}',function($id = 10, $name="pepe") {
    echo $id;
    echo $name;
    });
});

Route::group(['prefix' => 'dashboard'],function() {
    //Route::resource('post', PostController::class);
    //Route::resource('post', PostController::class)->only(['show']);
    Route::resource('post', PostController::class)->except(['show']);
    //Route::resource('category', CategoryController::class);

    // Route::resources([
    //     'post' => PostController::class,
    //     'category' => CategoryController::class,
    // ]);
});

// Route::get('/test/{id?}/{name?}',function($id = 10, $name="pepe") {
//     echo $id;
//     echo $name;
// });

// Route::controller(PostController::class)->group(function()
// {
//     Route::get('post','index')->name("post.index");
//     Route::get('post/{post}','show')->name("post.show");
//     Route::get('post/create','create')->name("post.create");
//     Route::get('post/{post}','edit')->name("post.edit");

//     Route::post('post','store')->name("post.store");
//     Route::put('post/{post}','update')->name("post.update");
//     Route::delete('post/{post}','delete')->name("post.destroy");
// });


// Route::get('post', [PostController::class,'index']);
// Route::get('post/{post}', [PostController::class,'show']);
// Route::get('post/create', [PostController::class,'create']);
// Route::get('post/{post}', [PostController::class,'edit']);

// Route::post('post', [PostController::class,'store']);
// Route::put('post/{post}', [PostController::class,'update']);
// Route::delete('post/{post}', [PostController::class,'delete']);