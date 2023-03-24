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

// news一覧API呼び出し
Route::get('/news', [TopController::class, 'news'])->name('news');

// news/{id}API呼び出し
Route::get('/news/{id}', [TopController::class, 'getNews'])->name('getNews');







// 管理画面表示
Route::get(
    '/admin/index',
    [AdminController::class, 'index']
)
->middleware('auth','admin');

// コンテンツ追加
Route::get(
    '/admin/content/add',
    [AdminController::class, 'contentAddIndex']
);

Route::post(
    '/admin/content/add',
    [AdminController::class, 'contentAdd']
);

// コンテンツ編集
Route::get(
    '/admin/content/edit/{id}',
    [AdminController::class, 'contentEditIndex']
)->name('admin.content.edit');

Route::post(
    '/admin/content/edit/{id}',
    [AdminController::class, 'contentEdit']
);
// コンテンツ削除
Route::get(
    '/admin/content/delete/{id}',
    [AdminController::class, 'contentDeleteIndex']
)->name('admin.content.delete');

Route::post(
    '/admin/content/delete/{id}',
    [AdminController::class, 'contentDelete']
);

// 言語追加
Route::get(
    '/admin/language/add',
    [AdminController::class, 'languageAddIndex']
);

Route::post(
    '/admin/language/add',
    [AdminController::class, 'languageAdd']
);

// 言語編集
Route::get(
    '/admin/language/edit/{id}',
    [AdminController::class, 'languageEditIndex']
)->name('admin.language.edit');

Route::post(
    '/admin/language/edit/{id}',
    [AdminController::class, 'languageEdit']
);
// 言語削除
Route::get(
    '/admin/language/delete/{id}',
    [AdminController::class, 'languageDeleteIndex']
)->name('admin.language.delete');

Route::post(
    '/admin/language/delete/{id}',
    [AdminController::class, 'languageDelete']
);


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

