<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','WelcomeController@index')->name('home_index');
Route::get('about','AboutController@index')->name('about_index');
Route::get('gallery','GalleryController@index')->name('gallery_index');
Route::get('contact','ContactController@index')->name('contact_index');
Route::post('contact/store','ContactController@mailStore')->name('contact_mail_Store');

Route::group(['prefix' => 'blog'], function () {
    Route::get('/', 'BlogController@index')->name('blog_index');
    Route::post('store', 'BlogController@store')->name('blog_store');
    Route::get('{id}/show', 'BlogController@show')->name('blog_show');
    Route::get('{id}/category', 'BlogController@CategoryPost')->name('blog_category_show');
    Route::get('{id}/download', 'BlogController@download')->name('blog_file_download');
});

Route::group(['prefix' => 'research'], function () {
    Route::get('/', 'ResearchController@index')->name('research_index');
    Route::post('store', 'ResearchController@store')->name('research_store');
    Route::get('{id}/show', 'ResearchController@show')->name('research_show');
    Route::get('{id}/category', 'ResearchController@CategoryPost')->name('research_category_show');
    Route::get('{id}/download', 'ResearchController@download')->name('research_file_download');
});

Route::group(['prefix' => 'project'], function () {
    Route::get('/', 'ProjectController@index')->name('project_index');
    Route::post('store', 'ProjectController@store')->name('project_store');
    Route::get('{id}/show', 'ProjectController@show')->name('project_show');
    Route::get('{id}/category', 'ProjectController@CategoryPost')->name('project_category_show');
    Route::get('{id}/download', 'ProjectController@download')->name('project_file_download');
});











