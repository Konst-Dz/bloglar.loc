<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubscribeController;


Route::redirect('/page', '/', 301);
Route::redirect('/page/1', '/', 301);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/{page?}', [HomeController::class, 'index'])
    ->where('page', 'page/\d*');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('posts', PostController::class)->except(['index']);
Route::get('/posts/{slug}',[PostController::class,'show'])->name('post.show');
Route::get('/member/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/toggle-public', [PostController::class,'togglePublic']);
Route::post('/subscribe',[SubscribeController::class,'store'])->name('subscribe.store');
Route::get('/subscriptions', [PostController::class, 'subscriptions'])->name('subscriptions');
Route::get('/{category}/{page?}', [HomeController::class, 'category'])->name('category.page');


Route::post('/comments',[CommentController::class,'store'])->name('comment.store');





require __DIR__.'/auth.php';
