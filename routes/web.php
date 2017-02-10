<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function(){
    if(Auth::guard('web')->check()){
        return redirect('/home');
    }else{
        return redirect('login');
    }
});
    

Auth::routes();
Route::get('/home', 'SuratController@home');

Route::group(['middleware'=>['web']],function(){
    
    Route::get('/surat_masuk/index', 'SuratController@index_surat_masuk');
    Route::get('/surat_masuk/tambah', 'SuratController@tambah_surat_masuk');
    Route::get('/surat_masuk/update/{id}', 'SuratController@update_surat_masuk');
    Route::get('/surat_masuk/view/{id}', 'SuratController@view_surat_masuk');
    Route::post('/surat_masuk/simpan', 'SuratController@simpan_surat_masuk');
    Route::post('/surat_masuk/hapus', 'SuratController@hapus_surat_masuk');
    Route::post('/surat_masuk/simpan_update', 'SuratController@simpan_update_surat_masuk');

    Route::get('/surat_keluar/index', 'SuratController@index_surat_keluar');
    Route::get('/surat_keluar/tambah', 'SuratController@tambah_surat_keluar');
    Route::get('/surat_keluar/update/{id}', 'SuratController@update_surat_keluar');
    Route::get('/surat_keluar/view/{id}', 'SuratController@view_surat_keluar');
    Route::post('/surat_keluar/simpan', 'SuratController@simpan_surat_keluar');
    Route::post('/surat_keluar/hapus', 'SuratController@hapus_surat_keluar');
    Route::post('/surat_keluar/simpan_update', 'SuratController@simpan_update_surat_keluar');

    Route::get('/disposisi/index', 'SuratController@index_disposisi');
    Route::get('/disposisi/tambah', 'SuratController@tambah_disposisi');
    Route::get('/disposisi/update/{i}', 'SuratController@update_disposisi');
    Route::post('/disposisi/simpan', 'SuratController@simpan_disposisi');
    Route::post('/disposisi/hapus', 'SuratController@hapus_disposisi');
    Route::get('/disposisi/view/{i}', 'SuratController@view_disposisi');
    Route::post('/disposisi/simpan_update', 'SuratController@simpan_update_disposisi');



    Route::get('/laporan/index_surat_masuk', 'SuratController@laporan_surat_masuk');
    Route::post('/laporan/print_surat_masuk', 'SuratController@print_surat_masuk');
    Route::post('/laporan/print_surat_keluar', 'SuratController@print_surat_keluar');
    Route::post('/laporan/print_disposisi', 'SuratController@print_disposisi');
    Route::get('/laporan/index_surat_keluar', 'SuratController@laporan_surat_keluar');
    Route::get('/laporan/index_disposisi', 'SuratController@laporan_disposisi');

    Route::get('/tentang', 'HomeController@tentang');
    

});
Auth::routes();

Route::get('/home', 'HomeController@index');
