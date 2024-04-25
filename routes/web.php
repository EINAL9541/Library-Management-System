<?php

use Illuminate\Support\Facades\Route;

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


route::get('/', function(){
    return redirect("/list/all");
 });
Route::get('/list/{id}', [App\Http\Controllers\HomeController::class, 'index'])->name('list');
Route::get('/detail/{id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail');
Route::post('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::post('/user/logout', [App\Http\Controllers\HomeController::class, 'logoutPost'])->name('logoutPost');




//Admin dashbord
Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

//book
Route::get('/admin/book-table', [App\Http\Controllers\BookController::class, 'show'])->name('book-table');
Route::get('/admin/create-book', [App\Http\Controllers\BookController::class, 'createBookForm'])->name('create-book');
Route::post('/admin/create-book',  [App\Http\Controllers\BookController::class, 'create'])->name('create-book');
Route::get('/admin/edit-book/{id}', [App\Http\Controllers\BookController::class, 'editBookForm'])->name('edit-book-form');
Route::patch('/admin/update-book/{id}', [App\Http\Controllers\BookController::class, 'update'])->name('updatet-book-form');
Route::delete('/admin/delete-book/{id}', [App\Http\Controllers\BookController::class, 'delete'])->name('delete-book-form');


//author
Route::get('/admin/author-table', [App\Http\Controllers\AuthorController::class, 'show'])->name('author-table');
Route::get('/admin/create-author', [App\Http\Controllers\AuthorController::class, 'createAuthorForm'])->name('create-author-form');
Route::post('/admin/create-author',  [App\Http\Controllers\AuthorController::class, 'create'])->name('create-author');
Route::get('/admin/edit-author/{id}', [App\Http\Controllers\AuthorController::class, 'editAuthorForm'])->name('edit-author-form');
Route::patch('/admin/update-author/{id}', [App\Http\Controllers\AuthorController::class, 'update'])->name('updatet-author-form');
Route::delete('/admin/delete-author/{id}', [App\Http\Controllers\AuthorController::class, 'delete'])->name('delete-author-form');

//Category
Route::get('/admin/category-table', [App\Http\Controllers\CategoryController::class, 'show'])->name('category-table');
Route::get('/admin/create-category', [App\Http\Controllers\CategoryController::class, 'createCategoryForm'])->name('create-category-form');
Route::post('/admin/create-category',  [App\Http\Controllers\CategoryController::class, 'create'])->name('create-category');
Route::get('/admin/edit-category/{id}', [App\Http\Controllers\CategoryController::class, 'editCategoryForm'])->name('edit-category-form');
Route::patch('/admin/update-category/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('updatet-category-form');
Route::delete('/admin/delete-category/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('delete-category-form');

//Member
Route::get('/admin/member-table', [App\Http\Controllers\MemberController::class, 'show'])->name('member-table');
Route::get('/admin/create-member', [App\Http\Controllers\MemberController::class, 'createMemberForm'])->name('create-member-form');
Route::post('/admin/create-member',  [App\Http\Controllers\MemberController::class, 'create'])->name('create-member');
Route::get('/admin/edit-member/{id}', [App\Http\Controllers\MemberController::class, 'editMemberForm'])->name('edit-member-form');
Route::patch('/admin/update-member/{id}', [App\Http\Controllers\MemberController::class, 'update'])->name('updatet-member-form');
Route::delete('/admin/delete-member/{id}', [App\Http\Controllers\MemberController::class, 'delete'])->name('delete-member-form');
Route::patch('/admin/ban-member/{id}', [App\Http\Controllers\MemberController::class, 'ban'])->name('ban-member-form');
Route::patch('/admin/unban-member/{id}', [App\Http\Controllers\MemberController::class, 'unban'])->name('unban-member-form');


//MemberLogin
Route::get('/user/register', [App\Http\Controllers\UserMemberController::class, 'register'])->name('userRegister');
Route::post('/register', [App\Http\Controllers\UserMemberController::class, 'registerPost'])->name('registerPost');
Route::get('/user/login', [App\Http\Controllers\UserMemberController::class, 'login'])->name('userLogin');
Route::post('/user/login', [App\Http\Controllers\UserMemberController::class, 'loginPost'])->name('loginPostPost');


//Issue
Route::get('/admin/issue-table', [App\Http\Controllers\IssueController::class, 'show'])->name('issue-table');
Route::post('/admin/create-issue',  [App\Http\Controllers\IssueController::class, 'create'])->name('create-issue');
Route::delete('/admin/return-book/{id}', [App\Http\Controllers\IssueController::class, 'delete'])->name('update-book-form');

//Return
Route::get('/admin/return-table', [App\Http\Controllers\ReturnListController::class, 'show'])->name('return-table');
Route::delete('/admin/delete-return-list/{id}', [App\Http\Controllers\ReturnListController::class, 'delete'])->name('delete-return-list-form');

Auth::routes(
    ['register'=>false]
);