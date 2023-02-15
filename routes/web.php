<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
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
    
    // $document =  YamlFrontMatter::parseFile(
    //     resource_path('posts/my-fourth-post.html')
    // );

    return view('posts', [
        'posts' => Post::all(),
    ]);
});

Route::get('posts/{post}', function ($slug) {

    // Find a post by its slug and pass it to a view called "post
    // $post = Post::find($slug);

    // $path = file_get_contents(__DIR__ . "/../resources/posts/{$slug}.html");
    // $path = __DIR__ . "/../resources/posts/{$slug}.html";

    // ddd($path);

    // if(!file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")) {
    //     // abort(404);
    //     return redirect('/');
    // }

    // $post = cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path)); 

    // inline        
    $post = Post::findOrFail($slug);

    return view('post', [
        'post' => $post,
    ]);
});
// handle slug ngasal
//->where('post', '[A-z_\-]+');