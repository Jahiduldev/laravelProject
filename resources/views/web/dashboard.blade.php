@extends('web.layouts.app')
@section('title', 'Dashboard')


@section('style')
@endsection

@section('content')
<div class="col-md-8">
	<div class="home-news-block block-no-space">
		<div class="crumb inner-page-crumb">
			<ul>
				<li><i class="ti-home"></i><a href="{{ route('homePage') }}">Home</a> / </li>
				<li><a href="{{ route('dashboard.dashboardPage') }}">Dashboard</a></li>
			</ul>
		</div>

		<div class="about-us">
			<h3>Dashboard</h3>
			<div class="row"></div>
		</div>
	</div>
</div>
@endsection

@section('sidebar')
	@include('web.includes.user_sidebar')
@endsection

@section('script')
@endsection