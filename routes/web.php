<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

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

Route::controller(MainController::class)->group(function () {

    Route::prefix(
        'mail'
    )->group(function () {

        // 一覧。
        Route::get('/list', 'list')->name('list');

        // メール送信。
        Route::post('/complete', 'processingMail');

        // 新規登録。
        Route::get('/create', 'create');
        Route::post('/create', 'processingCreate');

        // 編集。
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/edit/{id}', 'processingEdit');

        // 削除処理。
        Route::get('/delete/{id}', 'processingDelete')->name('delete');
    });

});
