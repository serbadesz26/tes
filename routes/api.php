<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\PublikasiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('get_subkategori_publikasi', [PublikasiController::class, 'getSubKategori'])->name('api.get_subkategori_publikasi');
Route::get('get_agenda_kegiatan', [AgendaController::class, 'getAgendaKegiatan'])->name('api.get_agenda_kegiatan');
