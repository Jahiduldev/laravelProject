@extends('web.layouts.app')

@section('title', $setting->meta_title)
@section('keywords', $setting->meta_keywords)
@section('description', $setting->meta_description)

@section('style')
@endsection

@section('content')
<div class="col-md-8">
	<div class="crumb inner-page-crumb">
		<ul>
			<li><i class="ti-home"></i><a href="{{ route('homePage') }}">Home</a></li>
		</ul>
	</div>
	<div class="about-us">
		<h3>Welcome to {{ $setting->website_title }}</h3>
		@if(!empty($setting->featured_image))
			<img src="{{ asset('public/web/home-image/' . $setting->featured_image) }}" alt="{{ $setting->page_name }}">
			@endif
		<div class="about-meta">
		<p>{!! $setting->home_page_content !!}</p>
		</div>
	</div>
</div>
@endsection

@section('sidebar')
@include('web.includes.sidebar')
@endsection

@section('script')
@endsection