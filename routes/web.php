<?php

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

use Illuminate\Support\Facades\Storage;

//Baru
//Route::get('/', 'OutletMapController@index');
Route::get('/', 'TPSMapController@index');
Route::get('/tps1', 'TPSMapController@tps1')->name('tps1');
Route::get('/tps2', 'TPSMapController@tps2')->name('tps2');
Route::get('/tps3', 'TPSMapController@tps3')->name('tps3');
Route::get('/tps4', 'TPSMapController@tps4')->name('tps4');
Route::get('/tps5', 'TPSMapController@tps5')->name('tps5');
Route::get('/tps6', 'TPSMapController@tps6')->name('tps6');
Route::get('/tps7', 'TPSMapController@tps7')->name('tps7');
Route::get('/tps8', 'TPSMapController@tps8')->name('tps8');
Route::get('/tps9', 'TPSMapController@tps9')->name('tps9');
Route::get('/tps10', 'TPSMapController@tps10')->name('tps10');
Route::get('/tps11', 'TPSMapController@tps11')->name('tps11');
Route::get('/tps12', 'TPSMapController@tps12')->name('tps12');
Route::get('/tps13', 'TPSMapController@tps13')->name('tps13');
Route::get('/tps14', 'TPSMapController@tps14')->name('tps14');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('dashboard')->group(function () {
    Route::group(['middleware' => 'auth'], function(){
        Route::resource('/sambutan', 'SambutanController', ['except' => 'show' ,'as' => 'dashboard']);
        Route::resource('/sejarah', 'SejarahController', ['except' => 'show' ,'as' => 'dashboard']);
        Route::resource('/pelayanan', 'PelayananController', ['except' => 'show' ,'as' => 'dashboard']);
        Route::resource('/kajian', 'KajianController', ['except' => 'show' ,'as' => 'dashboard']);
        Route::resource('/struktur', 'StrukturOrganisasiController', ['except' => 'show' ,'as' => 'dashboard']);
        Route::resource('/kontak', 'KontakController', ['except' => 'show' ,'as' => 'dashboard']);
    });
});
/*
 * Outlets Routes
 */
Route::get('/petaperusahaan', 'OutletMapController@index')->name('outlet_map.index');
Route::resource('outlets', 'OutletController');
//Route::resource('perusahaan', 'PerusahaanController');

//Semua Data Perusahaan
Route::get('showBesarInvestasiIndex', 'PerusahaanController@index')->name('semuaDataPerusahaan');

//Pencarian Berdasarkan Investasi
Route::get('showBesarInvestasi', 'PerusahaanController@showBesarInvestasi')->name('tempilBesarInvestasi');
Route::get('showBesarInvestasiIndex', 'PerusahaanController@index');
Route::get('cariBesarInvestasi/{investasi}', 'PerusahaanController@cariBesarInvestasi')->name('cariBesarInvestasi');

//Pencarian Berdasarkan Jenis Usaha
Route::get('showBerdasarkanJenisUsaha', 'PerusahaanController@showBerdasarkanJenisUsaha')->name('showBerdasarkanJenisUsaha');
Route::get('cariBerdasarkanJenisUsaha/{jenisusaha}', 'PerusahaanController@cariBerdasarkanJenisUsaha')->name('cariBerdasarkanJenisUsaha');

//Pencarian Berdasarkan Nama Perusahaan
Route::get('cariNama', 'PerusahaanController@cariNama')->name('cariNama');

//Pencarian Berdasarkan Nama NIB
Route::get('cariNib', 'PerusahaanController@cariNib')->name('cariNib');

//Pencarian Berdasarkan Kecamatan
Route::get('showBerdasarkanKecamatan', 'PerusahaanController@showBerdasarkanKecamatan')->name('showBerdasarkanKecamatan');

//Download File Geojeson
Route::get('showDownloadFile', 'PerusahaanController@showDownloadFile')->name('showDownloadFile');
Route::get('downloadFile', 'PerusahaanController@downloadFile')->name('downloadFile');

//Download File Excel
Route::get('downloadFileExcel', 'PerusahaanController@downloadFileExcel')->name('downloadFileExcel');
Route::get('showDownloadFileExcel', 'PerusahaanController@showDownloadFileExcel')->name('showDownloadFileExcel');
Route::get('downloadFileExcelBasedOnYear', 'PerusahaanController@downloadFileExcelBasedOnYear')->name('downloadFileExcelBasedOnYear');
Route::get('showDownloadFileExcelBasedOnYear', 'PerusahaanController@showDownloadFileExcelBasedOnYear')->name('showDownloadFileExcelBasedOnYear');

//Download format import data
Route::get('downloadFormatImportData', 'PerusahaanController@downloadFormatImportData')->name('downloadFormatImportData');


//Import excel file
Route::post('importFileExcel', 'PerusahaanController@importFileExcel')->name('importFileExcel');
Route::get('showImportFileExcel', 'PerusahaanController@showImportFileExcel')->name('showImportFileExcel');


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});