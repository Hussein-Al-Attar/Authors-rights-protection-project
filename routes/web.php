<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupervisorController;
use Illuminate\Support\Facades\Route;
use App\Models\User;


Route::get('/', function () {
    $userCount = User::count();

    // Pass the user count to the welcome view
    return view('welcome', ['userCount' => $userCount]);
});

Route::get('/dashboard', function () {
    return redirect()->route('books.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/index', [ProfileController::class, 'index'])->name('profile.index');

    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/law', [BookController::class, 'law'])->name('books.law');
    Route::get('/books/search', [BookController::class, 'search'])->name('books.search');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
    Route::get('/books-by-user/{book}', [BookController::class, 'showByUser'])->name('books.by_user');
    Route::get('/books/{id}/download', [BookController::class, 'download'])->name('books.download');
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');


    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/edit/{user}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/update/{user}', [AdminController::class, 'update'])->name('admin.update');

    Route::get('/supervisor', [SupervisorController::class, 'index'])->name('supervisor.index');
    Route::post('/supervisor/publish/{book}', [SupervisorController::class, 'publish'])->name('supervisor.publish');
    Route::post('/supervisor/reject/{book}', [SupervisorController::class, 'reject'])->name('supervisor.reject');
    Route::get('/supervisor/edit/{book}', [SupervisorController::class, 'edit'])->name('supervisor.edit');
    Route::put('/supervisor/update/{book}', [SupervisorController::class, 'update'])->name('supervisor.update');
    Route::get('/supervised-books', [SupervisorController::class, 'showSupervisedBooks'])->name('supervised-books.index');

});

require __DIR__ . '/auth.php';
