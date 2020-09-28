<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadFileController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/import_excel', [UploadFileController::class, 'index']);
Route::post('/import_excel/import', [UploadFileController::class, 'import']);

Route::get('/detail', function () {
    return view('detail');
});

Route::get('/subjekty', function () {
    return view('subjekty');
});

Route::get('/import_excel/{cislo}', [UploadFileController::class, 'getInvoice']);

Route::get('/subjekty/{dodavatel}', [UploadFileController::class, 'getSubjects']);
