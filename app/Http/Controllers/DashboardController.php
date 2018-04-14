<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Page;
use App\Subscriber;
use App\User;

class DashboardController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$all_galleries = Gallery::all();
		$all_pages = Page::all();
		$all_subscribers = Subscriber::all();
		$all_users = User::all();

		$users = User::orderBy('created_at', 'desc')->limit(10)->get();

		return view('admin.dashboard', compact('all_galleries', 'all_pages', 'all_subscribers', 'all_users', 'users'));
	}
}
