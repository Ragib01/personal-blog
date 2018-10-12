<?php

Route::get('admin/dashboard', 'DashboardController@index')->name('admin_dashboard')->middleware('auth');

Route::group(['prefix' => 'admin/user-list'], function () {
    Route::get('/', 'UserListController@index')->name('admin_user_list');
    Route::get('{id}/update', 'UserListController@update')->name('admin_user_status_update');
});

Route::group(['prefix' => 'admin/breaking', 'middleware'=>'auth'], function () {
    Route::get('/', 'Breaking\BreakingController@index')->name('admin_breaking_index');
    Route::get('create', 'Breaking\BreakingController@create')->name('admin_breaking_create');
    Route::post('store', 'Breaking\BreakingController@store')->name('admin_breaking_store');
    Route::get('{id}/edit', 'Breaking\BreakingController@edit')->name('admin_breaking_edit');
    Route::post('{id}/update', 'Breaking\BreakingController@update')->name('admin_breaking_update');
    Route::get('{id}/delete', 'Breaking\BreakingController@destroy')->name('admin_breaking_delete');
});

Route::group(['prefix' => 'admin/about', 'middleware'=>'auth'], function () {

    Route::post('store', 'About\AboutController@store')->name('admin_about_store');
    Route::get('{id}/edit', 'About\AboutController@edit')->name('admin_about_edit');
    Route::post('{id}/update', 'About\AboutController@update')->name('admin_about_update');
});

Route::group(['prefix' => 'admin/slider', 'middleware'=>'auth'], function () {
    Route::get('/', 'Slider\SliderController@index')->name('admin_slider_index');
    Route::get('create', 'Slider\SliderController@create')->name('admin_slider_create');
    Route::post('store', 'Slider\SliderController@store')->name('admin_slider_store');
    Route::get('{id}/show', 'Slider\SliderController@show')->name('admin_slider_show');
    Route::get('{id}/edit', 'Slider\SliderController@edit')->name('admin_slider_edit');
    Route::post('{id}/update', 'Slider\SliderController@update')->name('admin_slider_update');
    Route::get('{id}/delete', 'Slider\SliderController@destroy')->name('admin_slider_delete');
});


Route::group(['prefix' => 'admin/blog', 'middleware'=>'auth'], function () {
    Route::get('/', 'Blog\BlogController@index')->name('admin_blog_index');
    Route::get('create', 'Blog\BlogController@create')->name('admin_blog_create');
    Route::post('store', 'Blog\BlogController@store')->name('admin_blog_store');
    Route::get('{id}/show', 'Blog\BlogController@show')->name('admin_blog_show');
    Route::get('{id}/edit', 'Blog\BlogController@edit')->name('admin_blog_edit');
    Route::post('{id}/update', 'Blog\BlogController@update')->name('admin_blog_update');
    Route::get('{id}/delete', 'Blog\BlogController@destroy')->name('admin_blog_delete');
});

Route::group(['prefix' => 'admin/blog/category', 'middleware'=>'auth'], function () {
    Route::get('/', 'Blog\BlogCategoryController@index')->name('admin_blog_category_index');
    Route::get('create', 'Blog\BlogCategoryController@create')->name('admin_blog_category_create');
    Route::post('store', 'Blog\BlogCategoryController@store')->name('admin_blog_category_store');
    Route::get('{id}/show', 'Blog\BlogCategoryController@show')->name('admin_blog_category_show');
    Route::get('{id}/edit', 'Blog\BlogCategoryController@edit')->name('admin_blog_category_edit');
    Route::post('{id}/update', 'Blog\BlogCategoryController@update')->name('admin_blog_category_update');
    Route::get('{id}/delete', 'Blog\BlogCategoryController@destroy')->name('admin_blog_category_delete');
});

Route::group(['prefix' => 'admin/gallery', 'middleware'=>'auth'], function () {
    Route::get('/', 'Gallery\GalleryController@index')->name('admin_gallery_index');
    Route::get('create', 'Gallery\GalleryController@create')->name('admin_gallery_create');
    Route::post('store', 'Gallery\GalleryController@store')->name('admin_gallery_store');
    Route::get('{id}/show', 'Gallery\GalleryController@show')->name('admin_gallery_show');
    Route::get('{id}/edit', 'Gallery\GalleryController@edit')->name('admin_gallery_edit');
    Route::post('{id}/update', 'Gallery\GalleryController@update')->name('admin_gallery_update');
    Route::get('{id}/delete', 'Gallery\GalleryController@destroy')->name('admin_gallery_delete');
});

Route::group(['prefix' => 'admin/gallery/category', 'middleware'=>'auth'], function () {
    Route::get('/', 'Gallery\GalleryCategoryController@index')->name('admin_gallery_category_index');
    Route::get('create', 'Gallery\GalleryCategoryController@create')->name('admin_gallery_category_create');
    Route::post('store', 'Gallery\GalleryCategoryController@store')->name('admin_gallery_category_store');
    Route::get('{id}/show', 'Gallery\GalleryCategoryController@show')->name('admin_gallery_category_show');
    Route::get('{id}/edit', 'Gallery\GalleryCategoryController@edit')->name('admin_gallery_category_edit');
    Route::post('{id}/update', 'Gallery\GalleryCategoryController@update')->name('admin_gallery_category_update');
    Route::get('{id}/delete', 'Gallery\GalleryCategoryController@destroy')->name('admin_gallery_category_delete');
});

Route::group(['prefix' => 'admin/project', 'middleware'=>'auth'], function () {
    Route::get('/', 'Project\ProjectController@index')->name('admin_project_index');
    Route::get('create', 'Project\ProjectController@create')->name('admin_project_create');
    Route::post('store', 'Project\ProjectController@store')->name('admin_project_store');
    Route::get('{id}/show', 'Project\ProjectController@show')->name('admin_project_show');
    Route::get('{id}/edit', 'Project\ProjectController@edit')->name('admin_project_edit');
    Route::post('{id}/update', 'Project\ProjectController@update')->name('admin_project_update');
    Route::get('{id}/delete', 'Project\ProjectController@destroy')->name('admin_project_delete');
});

Route::group(['prefix' => 'admin/project/category', 'middleware'=>'auth'], function () {
    Route::get('/', 'Project\ProjectCategoryController@index')->name('admin_project_category_index');
    Route::get('create', 'Project\ProjectCategoryController@create')->name('admin_project_category_create');
    Route::post('store', 'Project\ProjectCategoryController@store')->name('admin_project_category_store');
    Route::get('{id}/show', 'Project\ProjectCategoryController@show')->name('admin_project_category_show');
    Route::get('{id}/edit', 'Project\ProjectCategoryController@edit')->name('admin_project_category_edit');
    Route::post('{id}/update', 'Project\ProjectCategoryController@update')->name('admin_project_category_update');
    Route::get('{id}/delete', 'Project\ProjectCategoryController@destroy')->name('admin_project_category_delete');
});

Route::group(['prefix' => 'admin/research', 'middleware'=>'auth'], function () {
    Route::get('/', 'Research\ResearchController@index')->name('admin_research_index');
    Route::get('create', 'Research\ResearchController@create')->name('admin_research_create');
    Route::post('store', 'Research\ResearchController@store')->name('admin_research_store');
    Route::get('{id}/show', 'Research\ResearchController@show')->name('admin_research_show');
    Route::get('{id}/edit', 'Research\ResearchController@edit')->name('admin_research_edit');
    Route::post('{id}/update', 'Research\ResearchController@update')->name('admin_research_update');
    Route::get('{id}/delete', 'Research\ResearchController@destroy')->name('admin_research_delete');
});

Route::group(['prefix' => 'admin/research/category', 'middleware'=>'auth'], function () {
    Route::get('/', 'Research\ResearchCategoryController@index')->name('admin_research_category_index');
    Route::get('create', 'Research\ResearchCategoryController@create')->name('admin_research_category_create');
    Route::post('store', 'Research\ResearchCategoryController@store')->name('admin_research_category_store');
    Route::get('{id}/show', 'Research\ResearchCategoryController@show')->name('admin_research_category_show');
    Route::get('{id}/edit', 'Research\ResearchCategoryController@edit')->name('admin_research_category_edit');
    Route::post('{id}/update', 'Research\ResearchCategoryController@update')->name('admin_research_category_update');
    Route::get('{id}/delete', 'Research\ResearchCategoryController@destroy')->name('admin_research_category_delete');
});

Route::group(['prefix' => 'admin/mail', 'middleware'=>'auth'], function () {

    Route::get('inbox', 'MailBoxController@index')->name('admin_mail_index');
    Route::post('store', 'MailBoxController@store')->name('admin_mail_store');
    Route::get('{id}/show', 'MailBoxController@show')->name('admin_mail_show');
    Route::get('{id}/delete', 'MailBoxController@destroy')->name('admin_mail_delete');
});

Route::group(['prefix' => 'admin/contact', 'middleware'=>'auth'], function () {

    Route::post('store', 'Contact\ContactController@store')->name('admin_contact_store');
    Route::get('{id}/edit', 'Contact\ContactController@edit')->name('admin_contact_edit');
    Route::post('{id}/update', 'Contact\ContactController@update')->name('admin_contact_update');
});
