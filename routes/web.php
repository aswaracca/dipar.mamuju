<?php

Route::get('/', 'HomeBerandaController@index');

Route::get('/wisata', 'HomeWisataController@index');
Route::get('/wisata/{wisata}', 'HomeWisataController@show');

Route::get('/hotel', 'HomeHotelController@index');
Route::get('/hotel/{hotel}', 'HomeHotelController@show');

Route::get('/rumah-makan', 'HomeRumahMakanController@index');
Route::get('/rumah-makan/{rm}', 'HomeRumahMakanController@show');

Route::get('/dokumentasi', 'HomeDokumentasiController@index');
Route::get('/dokumentasi/{dokumentasi}', 'HomeDokumentasiController@show');

Route::get('/pencarian', 'HomePencarianController@index');
Route::get('/pencarian/{id}', 'HomePencarianController@show');

Route::get('/profil', 'HomeProfilController@index');


// auth
Route::get('login', 'Auth\LoginController@index')->name('login');
Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');

Route::middleware('checklogin')->group(function () {
	Route::prefix('admin')->group(function () {

		Route::get('/', 'SysBerandaController@index')->name('beranda.index');

		// wisata
		Route::resource('/wisata', 'SysWisataController');

		// hotel	
	    Route::resource('/hotel', 'SysHotelController');

	    // rumah makan
		Route::resource('/rumah-makan', 'SysRumahMakanController');
		
		// dokumentasi
		Route::resource('/dokumentasi', 'SysDokumentasiController');
		
		// profil
		Route::resource('/profil', 'SysProfilController');
		
		// user
		Route::resource('/user', 'UserController');
		

		Route::resource('/kategori-wisata', 'SysKategoriWisataController');

		Route::resource('/kategori-rumah-makan', 'SysKategoriRMController');
		
		Route::resource('/kategori-dokumentasi', 'SysKategoriDokumentasiController');

		//gambar
		Route::resource('/gambar', 'SysGambarController');
	});
});


