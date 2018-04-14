<?php

namespace App\Providers;

use App\Page;
use App\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		//View::share('setting', 'query');
		View::composer(['web.includes.head', 'web.includes.header', 'web.includes.sidebar', 'web.includes.footer'], function ($view) {
			$setting = Setting::first();
			$pages = Page::where('publication_status', 1)->get(['page_name', 'page_slug']);
			$view->with(compact('setting', 'pages'));
		});
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}
}
