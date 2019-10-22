<?php

Route::get('/', 'preregistro@index');
Route::get('profile/{country}/{language}/', 'preregistro@profile');
Route::post('profile/{country}/{language}/submitregistro','preregistro@store');
Route::get('profile/{country}/{language}/validateEmail/', 'preregistro@validateEmail');
Route::post('profile/{country}/{language}/genealogy/', 'preregistro@getgenealogy');
Route::post('profile/{country}/{language}/loginprocess', 'preregistro@Loginproccess');
Route::get('/profile/{country}/{language}/pdf', 'preregistro@pdf');