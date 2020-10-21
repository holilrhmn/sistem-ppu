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
Route::get('/map', 'TPSMapController@index')->name('map');
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



Auth::routes(['register' => false]);
//dashboard
Route::get('/home', 'HomeController@index')->name('home');

//homepage
Route::get('/', 'Front\HomepageController@index')->name('homepage');

//Tampilan Halaman Depan
Route::get('/sambutan', 'Front\SambutanController@index')->name('sambutan');
Route::get('/struktur-organisasi', 'Front\StrukturController@index')->name('struktur');
Route::get('/sejarah', 'Front\SejarahController@index')->name('sejarah');
Route::get('/standar-pelayanan', 'Front\StandarPelayananController@index')->name('pelayanan');
Route::get('/info-terkini', 'Front\InfoController@index')->name('info');
Route::get('/info-terkini/{slug}', 'Front\InfoController@show')->name('info.show');
Route::get('/link-terkait', 'Front\LinkTerkaitController@index')->name('link');
Route::get('/faq', 'Front\FaqController@index')->name('faq');
Route::get('/regulasi', 'Front\RegulasiController@index')->name('regulasi');
Route::get('/dokumen-pembangunan', 'Front\PembangunanController@index')->name('dokumen');
Route::get('/kajian', 'Front\KajianController@index')->name('kajian');
Route::get('/kontak', 'Front\KontakController@index')->name('kontak');
//prefix untuk dashboard

Route::prefix('dashboard')->group(function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', 'HomeController@dashboard')->name('dashboard');
        //Profil User
        Route::get('/edit/profil', 'HomeController@editProfil')->name('dashboard.edit.profil');
        Route::post('/update/{user}/profil', 'HomeController@updateProfil')->name('dashboard.update.profil');
        Route::post('/changePassword', 'HomeController@changePassword')->name('dashboard.changePassword');
        Route::resource('/sambutan', 'SambutanController', ['except' => 'show', 'as' => 'dashboard']);
        Route::resource('/sejarah', 'SejarahController', ['except' => 'show', 'as' => 'dashboard']);
        Route::resource('/pelayanan', 'PelayananController', ['except' => 'show', 'as' => 'dashboard']);
        Route::resource('/kajian', 'KajianController', ['except' => 'show', 'as' => 'dashboard']);
        Route::resource('/struktur', 'StrukturOrganisasiController', ['except' => 'show', 'as' => 'dashboard']);
        Route::resource('/kontak', 'KontakController', ['except' => 'show', 'as' => 'dashboard']);
        Route::resource('/link', 'LinkController', ['except' => 'show', 'as' => 'dashboard']);
        Route::resource('/faq', 'FaqController', ['except' => 'show', 'as' => 'dashboard']);
        Route::resource('/regulasi', 'RegulasiController', ['except' => 'show', 'as' => 'dashboard']);
        Route::resource('/dokumen-pembangunan', 'DokumenPembangunanController', ['except' => 'show', 'as' => 'dashboard']);
        Route::resource('/user', 'UserController', ['except' => 'show', 'as' => 'dashboard']);
        Route::resource('/link-menu', 'LinkMenuController', ['except' => 'show', 'as' => 'dashboard']);
        Route::resource('/info-terkini', 'InfoTerkiniController', ['except' => 'show', 'as' => 'dashboard']);
    });
});


//Unduh data Dokumen
Route::get('/regulasi/download/{dokumen}', 'RegulasiController@download')->name('dokumen.download');
Route::get('/dokumen-pembangunan/download/{dokumen}', 'DokumenPembangunanController@download')->name('pembangunan.download');
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

//Laravel File Manager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/edit/profil', 'HomeController@editProfil')->name('edit.profil');
Route::post('/update/{user}/profil', 'HomeController@updateProfil')->name('update.profil');