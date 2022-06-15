<?php


Route::get('/', 'PageController@index');


Route::get('/usuarios', 'PageController@index')
    ->name('users.index');

Route::get('/usuarios/{user}', 'PageController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');

Route::get('/usuarios/nuevo', 'PageController@create')->name('users.create');

Route::post('/usuarios', 'PageController@store');

Route::get('/usuarios/{user}/editar', 'PageController@edit')->name('users.edit');

Route::put('/usuarios/{user}', 'PageController@update');

Route::delete('/usuarios/{user}', 'PageController@destroy')->name('users.destroy');


