<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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

// Auth::routes();

Route::get('/', function () {
    return view('welcome');
})
->name('welcome');


Route::get('/test', function () {
    Mail::to('posse@example.com')->send(new Test);
    return 'メール送信しました！';
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';

// ユーザー画面表示

Auth::routes();
Route::get(
    '/top',
    [TopController::class, 'index']
)
->middleware('auth');

// 学習記録登録
Route::post(
    '/top',
    [TopController::class, 'form']
)
->name('top');








// 管理画面表示
Route::get(
    '/admin/index',
    [AdminController::class, 'index']
)
->middleware('auth','admin');

// ユーザー管理画面表示
Route::get(
    '/admin/user/index',
    [AdminController::class, 'user']
)
->middleware('auth','admin');;



// ユーザー削除
Route::get(
    '/admin/user/delete/{id}',
    [AdminController::class, 'userDeleteIndex']
)->name('admin.user.delete');

Route::post(
    '/admin/user/delete/{id}',
    [AdminController::class, 'userDelete']
);

// ユーザー編集
Route::get(
    '/admin/user/edit/{id}',
    [AdminController::class, 'userEditIndex']
)->name('admin.user.edit');

Route::post(
    '/admin/user/edit/{id}',
    [AdminController::class, 'userEdit']
);
