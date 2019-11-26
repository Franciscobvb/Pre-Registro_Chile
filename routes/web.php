<?php

Route::get('/', 'preregistro@index');
Route::get('profile/{country}/{language}/', 'preregistro@profile');
Route::get('profile/{country}/{language}/submitregistro/','preregistro@submitRegistro');
Route::get('profile/{country}/{language}/validateEmail/', 'preregistro@validateEmail');
Route::post('profile/{country}/{language}/genealogy/', 'preregistro@getgenealogy');
Route::post('profile/{country}/{language}/loginprocess/', 'preregistro@Loginproccess');
Route::get('/profile/{country}/{language}/pdf/', 'preregistro@pdf');
Route::get('/profile/{country}/{language}/sponsors/', 'preregistro@getSponsors');
Route::get('/profile/{country}/{language}/validaSponsor/', 'preregistro@validarSponsor');

/// TEST ///

Route::get('profile/{country}/{language}/test/', 'preregistro@profiletest');
Route::post('profile/{country}/{language}/loginprocesstest/', 'preregistro@Loginproccesstest');
Route::post('profile/{country}/{language}/genealogytest/', 'preregistro@getgenealogytest');