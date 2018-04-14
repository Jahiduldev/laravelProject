<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
 */

Route::group(['prefix' => '/'], function () {
	Route::get('/', ['as' => 'homePage', 'uses' => 'WebController@index']);
	Route::get('/gallery', ['as' => 'galleryPage', 'uses' => 'WebController@gallery']);
	Route::get('/get-gallery-image/{id}', ['as' => 'getGalleryRoute', 'uses' => 'WebController@get_gallery_image']);
	Route::get('/contact-us', ['as' => 'contactUsPage', 'uses' => 'WebController@contact_us']);

	Route::get('/page/{slug}', ['as' => 'pagePage', 'uses' => 'WebController@page'])->where('slug', '[\w\d\-\_]+');

	Route::post('/subscribe', ['as' => 'subscribeRoute', 'uses' => 'WebController@subscribe']);

	Route::group(['prefix' => 'dashboard', 'middleware' => ['user'], 'as' => 'dashboard.'], function () {
		Route::get('/', ['as' => 'dashboardPage', 'uses' => 'WebController@dashboard']);
		Route::get('/change-password', ['as' => 'editPasswordPage', 'uses' => 'WebController@edit_password']);
		Route::post('/update-password', ['as' => 'updatePasswordPage', 'uses' => 'WebController@update_password']);
		Route::get('/edit-profile', ['as' => 'editProfilePage', 'uses' => 'WebController@edit_profile']);
		Route::post('/update-profile/{id}', ['as' => 'updatePprofilePage', 'uses' => 'WebController@update_profile']);
	});
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
 */

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 'as' => 'admin.'], function () {
	Route::get('/dashboard', ['as' => 'dashboardRoute', 'uses' => 'DashboardController@index']);

	/*** For Subscriber ***/
	Route::resource('subscribers', 'SubscriberController');
	Route::get('/get-subscribers', ['as' => 'getSubscribersRoute', 'uses' => 'SubscriberController@get']);

	/*** For Setting ***/
	Route::resource('setting', 'SettingController');
	Route::post('/setting/logo/{id}', ['as' => 'settingLogoRoute', 'uses' => 'SettingController@logo']);
	Route::post('/setting/favicon/{id}', ['as' => 'settingFaviconRoute', 'uses' => 'SettingController@favicon']);
	Route::post('/setting/general/{id}', ['as' => 'settingGeneralRoute', 'uses' => 'SettingController@general']);
	Route::post('/setting/contact/{id}', ['as' => 'settingContactRoute', 'uses' => 'SettingController@contact']);
	Route::post('/setting/address/{id}', ['as' => 'settingAddressRoute', 'uses' => 'SettingController@address']);
	Route::post('/setting/social/{id}', ['as' => 'settingSocialRoute', 'uses' => 'SettingController@social']);
	Route::post('/setting/meta/{id}', ['as' => 'settingMetaRoute', 'uses' => 'SettingController@meta']);
	Route::post('/setting/gallery-meta/{id}', ['as' => 'settingGalleryMetaRoute', 'uses' => 'SettingController@gallery_meta']);

	/*** For Profile ***/
	Route::resource('profile', 'ProfileController');
	Route::post('/profile/avatar/{id}', ['as' => 'profileAvatarRoute', 'uses' => 'ProfileController@avatar']);
	Route::post('/profile/update-password', ['as' => 'profileUpdatePasswordRoute', 'uses' => 'ProfileController@update_password']);

	/*** For User ***/
	Route::resource('users', 'UserController');

	/*** For Page ***/
	Route::resource('pages', 'PageController');
	Route::get('/get-pages', ['as' => 'getPagesRoute', 'uses' => 'PageController@get']);
	Route::get('/pages/published/{id}', ['as' => 'publishedPagesRoute', 'uses' => 'PageController@published']);
	Route::get('/pages/unpublished/{id}', ['as' => 'unpublishedPagesRoute', 'uses' => 'PageController@unpublished']);

	/*** For Gallery ***/
	Route::resource('galleries', 'GalleryController');
	Route::get('/get-galleries', ['as' => 'getGalleriesRoute', 'uses' => 'GalleryController@get']);
	Route::get('/galleries/published/{id}', ['as' => 'publishedGalleriesRoute', 'uses' => 'GalleryController@published']);
	Route::get('/galleries/unpublished/{id}', ['as' => 'unpublishedGalleriesRoute', 'uses' => 'GalleryController@unpublished']);

});

Auth::routes();