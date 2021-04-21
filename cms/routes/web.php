<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

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
    //return $results = DB::select('select * from posts where id = ?', [1]);
    // foreach($results as $post){
    //     return $post->title.' '.$post->content;
    // }
    return $posts = Post::all();
});

Route::get('/update',function(){
    $updated = DB::update('update posts set title = "updated title 1" where id = ?', [1]);
    return $updated;
});

Route::get('/delete',function(){
    $deleted = DB::delete('delete from posts where id = ?', [1]);
    return $deleted;
});

Route::get('/find',function(){
    return $posts = Post::find(2);
});

Route::get('/find-where',function(){
    return $posts = Post::where('id',2)->orderBy('id','desc')->take(1)->get();
});

Route::get('/find-more',function(){
    return $posts = Post::findOrFail(1);
    // return $posts = Post::where('users_count','<',50)->firstOrFail();
});

Route::get('/basic-insert',function(){
    $post = new Post;
    $post->title = "title 3";
    $post->content = "Content 3";
    $post->save();
});
