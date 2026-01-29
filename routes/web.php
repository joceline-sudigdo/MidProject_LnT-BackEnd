<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowingController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    $totalBooks = \App\Models\Book::count();
    $totalCategories = \App\Models\Category::count();
    $totalMembers = \App\Models\Member::count();
    $activeBorrowings = \App\Models\Borrowing::where('status', 'borrowed')->count();

    return view('dashboard', compact('totalBooks', 'totalCategories', 'totalMembers', 'activeBorrowings'));
})->name('dashboard');

Route::resource('categories', CategoryController::class);
Route::resource('books', BookController::class);
Route::resource('members', MemberController::class)->only(['index']);
Route::resource('borrowings', BorrowingController::class)->only(['index']);
