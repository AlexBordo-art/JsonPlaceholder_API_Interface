<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JsonPlaceholderController;

// Отображение страницы
Route::get('/', function () {
    return view('jsonplaceholder');
});

// Показать все посты
Route::get('/show-posts', [JsonPlaceholderController::class, 'showPosts'])->name('showPosts');

// Показать всех пользователей
Route::get('/show-users', [JsonPlaceholderController::class, 'showUsers'])->name('showUsers');

// Показать все задания
Route::get('/show-todos', [JsonPlaceholderController::class, 'showTodos'])->name('showTodos');

// Добавить новый пост
Route::post('/create-post', [JsonPlaceholderController::class, 'createPost'])->name('createPost');

// Обновить существующий пост
Route::put('/update-post/{id}', [JsonPlaceholderController::class, 'updatePost'])->name('updatePost');

// Удалить существующий пост
Route::delete('/delete-post/{id}', [JsonPlaceholderController::class, 'deletePost'])->name('deletePost');
