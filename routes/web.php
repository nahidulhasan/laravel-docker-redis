<?php

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


use Illuminate\Support\Facades\Redis;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/order', 'OrderController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/redis', function () {
    $visits = Redis::Incr('visits');

    return $visits;
});

Route::get('/videos/{id}', function($id){

    $downloads = Redis::get('videos.{$id}.downloads');

    return view('welcome')->withDownloads($downloads);
});

Route::get('/videos/{id}/downloads', function($id){

    Redis::Incr('videos.{$id}.downloads');

    return back();
});

Route::get('/posts', function (){

    $redis = Redis::connection();

    try {
        $redis->ping();

        if(Redis::exists('posts.all')){

            return json_decode(Redis::get('posts.all'));
        }

        $posts = \App\Post::all();

        Redis::set('posts.all', $posts);

        return json_decode($posts);
    } catch (\Predis\Connection\ConnectionException $e) {

        $posts = \App\Post::all();

        return json_decode($posts);
    }

});
