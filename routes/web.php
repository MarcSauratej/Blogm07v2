<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Http\Controllers\TagController;
use App\Models\Tag;
use App\Http\Controllers\CommentController;
use App\Models\Comment;
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
//rutas publicas
Route::get('/', function () {
    return view('allPost',[
        'posts'=>Post::where('active', true)->get()
    ]);
});
//rutas privadas
Route::get('/dashboard', function () {
    return view('dashboard',[
        'posts'=>Post::where('active', true)->get()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');
//ruta admin
Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth', 'verified'])->name('admin');


Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}',[PostController::class, 'view'])->name('posts.view');
Route::post('/posts',[PostController::class, 'store'])->name('posts.store');
Route::get('/posts/delete/{id}',[PostController::class, 'destroy'])->name('posts.delete');

Route::post('/tags',[TagController::class, 'store'])->name('tag.store');
Route::get('/tags/delete/{id}',[TagController::class, 'destroy'])->name('tag.delete');

//Route::post('/comments',[CommentController::class, 'store'])->name('comment.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
