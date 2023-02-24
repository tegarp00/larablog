<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Services\NewsLetter;
use Clockwork\Storage\Search;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\TryCatch;


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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);


Route::post('newsletter', NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Admin
Route::middleware('can:admin')->group(function() {
    route::resource('admin/posts', AdminPostController::class)->except('show');
});
// Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('can:admin');
// Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('can:admin');

// Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('can:admin');
// Route::get('admin/posts/{post:id}/edit', [AdminPostController::class, 'edit'])->middleware('can:admin');
// Route::patch('admin/posts/{post:id}', [AdminPostController::class, 'update'])->middleware('can:admin');
// Route::delete('admin/posts/{post:id}', [AdminPostController::class, 'destroy'])->middleware('can:admin');

// Route::get('categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'posts' => $category->posts,
//         'currentCategory' => $category,
//         'categories' => Category::all(),
//     ]);
// });

// Route::get('authors/{author:username}', function (User $author) {
//     return view('posts.index', [
//         'posts' => $author->posts,
//     ]);
// });
