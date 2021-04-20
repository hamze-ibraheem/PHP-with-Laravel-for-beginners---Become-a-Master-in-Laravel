<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

//Route::resource('posts', [PostsController::class]);
Route::get('contact',[PostsController::class,'contact']);
Route::get('post/{id}/{name}/{password}',[PostsController::class,'show_post']);

Route::get('/insert',function(){
    DB::insert('insert into posts (title, content) values (?, ?)', ['post 1', 'Content 1']);
});

Route::get('/read',function(){
    return $results = DB::select('select * from posts where id = ?', [1]);
    // foreach($results as $post){
    //     return $post->title.' '.$post->content;
    // }
});
