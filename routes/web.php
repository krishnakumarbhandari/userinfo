<?php

#userinfo_form
Route::get('show-user-form/{id?}', 'userinfo_controller@create')->name('show_user_form');
Route::post('store-user_info', 'userinfo_controller@store')->name('store_user_info');
Route::get('/', 'userinfo_controller@show')->name('show_user_info');
Route::get('delete-user-info/{id}', 'userinfo_controller@delete')->name('delete_user_info');
Route::post('update-user-info/{id}', 'userinfo_controller@update')->name('update_user_info');
