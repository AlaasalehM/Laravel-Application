<?php

use App\Http\Controllers\postcontroller;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts', [postcontroller::class,'index'])->name(name:'posts.index');

Route::get('/posts/create', [postcontroller::class,'create']) -> name(name:'posts.create');

Route::post('/posts',[postcontroller::class,'store'])->name(name:'posts.store');

Route::get('/posts/{post}', [postcontroller::class,'show']) -> name(name:'posts.show');

Route::get('/posts/{post}/edit',[postcontroller::class,'edit'])->name(name:'posts.edit');

Route::put('posts/{postId}',[postcontroller::class,'update'])->name(name:'posts.update');

Route::delete('posts/{post}',[postcontroller::class,'destroy'])->name(name:'posts.destroy');



