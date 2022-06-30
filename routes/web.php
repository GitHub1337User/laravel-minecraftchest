<?php

use App\Http\Controllers\AdminArticleController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCraftController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CraftController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminUserController;


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

Route::get('/', function (Request $request) {
//    dd($request);
    return view('pages.index');
})->name('index');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');

Route::get('/mainpage/{category_id}', [ArticleController::class, 'index'])->name('mainpage');
Route::get('/mainpage/{category_id}/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/crafts', [CraftController::class, 'show'])->name('crafts.show');


Route::get('/login', [AuthController::class, 'indexLog'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('loginUser');
Route::get('/register', [AuthController::class, 'indexReg'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'regUser'])->middleware('guest')->name('regUser');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::post('/store_comment/{article_id}/{user_id}', [CommentController::class, 'store'])->middleware('auth')->name('addComment');


Route::prefix('admin')->name('admin.')->middleware(['auth','checkRole'])->group(function () {
    Route::get('/main/users', [AdminUserController::class,'index'])->name('users');
    Route::get('/main/ban_user/{user_id}', [AdminUserController::class,'banUser'])->name('banUser');
    // Соответствует URL-адресу `/admin/main/users` ...
    // Маршруту присвоено имя `admin.users` ...
    Route::get('/main', [AdminController::class, 'index'])->name('main');
    Route::get('/main/{category_id}', [AdminArticleController::class, 'showByCategory'])->name('showByCategory');
    Route::delete('/main/delete_article/{article_id}', [AdminArticleController::class, 'deleteArticle'])->name('deleteArticle');
    Route::get('/main/add_article/{category_id}', [AdminArticleController::class, 'addArticle'])->name('addArticle');
    Route::post('/main/store_article', [AdminArticleController::class, 'store'])->name('articleStore');

    Route::get('/main/edit_article/{article_id}', [AdminArticleController::class, 'toEditArticle'])->name('toEditArticle');
    Route::put('/main/edit_article/{article_id}', [AdminArticleController::class, 'editArticle'])->name('editArticle');
//    Route::get('/main/articles/all', [AdminArticleController::class, 'showAll'])->name('showAll');
    Route::get('/main/categories/all',[AdminCategoryController::class,'index'])->name('allCategories');
    Route::delete('/main/categories/delete/{category_id}',[AdminCategoryController::class,'deleteCategory'])->name('deleteCategory');
    Route::post('/main/categories/store_category',[AdminCategoryController::class,'store'])->name('categoryStore');
    Route::get('/main/categories/add_category',[AdminCategoryController::class,'addCategory'])->name('addCategory');
    Route::get('/main/categories/edit_category/{category_id}',[AdminCategoryController::class,'toEditCategory'])->name('toEditCategory');
    Route::put('/main/categories/edit_category/{category_id}',[AdminCategoryController::class,'editCategory'])->name('editCategory');

    Route::get('/main/crafts/all', [AdminCraftController::class, 'index'])->name('crafts');

    Route::post('/main/crafts/add',[AdminCraftController::class,'store'])->name('craftStore');
    Route::get('/main/crafts/add',[AdminCraftController::class,'addCraft'])->name('addCraft');

    Route::delete('/main/crafts/delete/{craft_id}', [AdminCraftController::class, 'deleteCraft'])->name('deleteCraft');
    Route::get('/main/crafts/craft_edit/{craft_id}', [AdminCraftController::class, 'toEditCraft'])->name('toEditCraft');
    Route::put('/main/crafts/craft_edit/{craft_id}', [AdminCraftController::class, 'editCraft'])->name('editCraft');
});
