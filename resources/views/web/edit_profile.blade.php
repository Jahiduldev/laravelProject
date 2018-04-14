@extends('web.layouts.app')
@section('title', 'Update Profile')


@section('style')
<style type="text/css">
.form-control{
	border-radius: 0px;
	padding: 20px 12px;
}
.btn{
	border-radius: 0px;
}
</style>
@endsection

@section('content')
<div class="col-md-8">
	<div class="home-news-block block-no-space">
		<div class="crumb inner-page-crumb">
			<ul>
				<li><i class="ti-home"></i><a href="{{ route('homePage') }}">Home</a> / </li>
				<li><a href="{{ route('dashboard.dashboardPage') }}">Dashboard</a> / </li>
				<li><a href="{{ route('dashboard.editProfilePage') }}">Edit Profile</a></li>
			</ul>
		</div>

		@php($user = Auth::user())

		<div class="about-us">
			<h3>Edit Profile</h3>
			<div class="row">
				<div class="col-sm-12">
					@if (!empty(Session::get('message')))
					<p style="color: #5cb85c">{{ Session::get('message') }}</p>
					@elseif (!empty(Session::get('exception')))
					<p style="color: #d9534f">{{ Session::get('exception') }}</p>
					@else
					<p>Required fields are marked <span class="required">*</span></p>
					@endif
				</div>
				<div class="col-sm-12">
				<form data-parsley-validate name="profile_edit_form" action="{{ route('dashboard.updatePprofilePage', $user->id) }}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$user->name }}" placeholder="ex: name">
                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" value="{{ $user->username }}" placeholder="ex: username">
                    @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" placeholder="ex: example@gmail.com">
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
					<div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
						<label>Gender <span class="required">*</span></label>
						<select name="gender" id="gender" class="form-control" required>
							<option value="">Select One</option>
							<option value="m">Male</option>
							<option value="f">Female</option>
						</select>
						@if ($errors->has('gender'))
						<span class="help-block">
							<strong>{{ $errors->first('gender') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
						<label>Phone <span class="required">*</span></label>
						<input id="phone" type="text" name="phone" class="form-control" value="{{ $user->phone }}" required maxlength="25" placeholder="ex: xxxxxxxxxxxx">
						@if ($errors->has('phone'))
						<span class="help-block">
							<strong>{{ $errors->first('phone') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
						<label>Address <span class="required">*</span></label>
						<input id="address" type="text" name="address" class="form-control" value="{{ $user->address }}" required maxlength="250" placeholder="ex: address">
						@if ($errors->has('address'))
						<span class="help-block">
							<strong>{{ $errors->first('address') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
						<label>Facebook</label>
						<input id="facebook" type="text" name="facebook" class="form-control" value="{{ $user->facebook }}" maxlength="250" placeholder="ex: https://facebook.com">
						@if ($errors->has('facebook'))
						<span class="help-block">
							<strong>{{ $errors->first('facebook') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
						<label>Twitter</label>
						<input id="twitter" type="text" name="twitter" class="form-control" value="{{ $user->twitter }}" maxlength="250" placeholder="ex: https://twitter.com">
						@if ($errors->has('twitter'))
						<span class="help-block">
							<strong>{{ $errors->first('twitter') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('google_plus') ? ' has-error' : '' }}">
						<label>Google Plus</label>
						<input id="google_plus" type="text" name="google_plus" class="form-control" value="{{ $user->google_plus }}" maxlength="250" placeholder="ex: https://plus.google.com">
						@if ($errors->has('google_plus'))
						<span class="help-block">
							<strong>{{ $errors->first('google_plus') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('linkedin') ? ' has-error' : '' }}">
						<label>Linkedin</label>
						<input id="linkedin" type="text" name="linkedin" class="form-control" value="{{ $user->linkedin }}" maxlength="250" placeholder="ex: https://linkedin.com">
						@if ($errors->has('linkedin'))
						<span class="help-block">
							<strong>{{ $errors->first('linkedin') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
						<label>Profile Picture</label>
						<input id="avatar" type="file" name="avatar" class="form-control">
						@if ($errors->has('avatar'))
						<span class="help-block">
							<strong>{{ $errors->first('avatar') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
						<label>About <span class="required">*</span></label>
						<textarea name="about" rows="5" class="form-control" required maxlength="260" placeholder="ex: about me">{{ $user->about }}</textarea>
						@if ($errors->has('about'))
						<span class="help-block">
							<strong>{{ $errors->first('about') }}</strong>
						</span>
						@endif
					</div>
					<div class="col-sm-12">
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</form>
			</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('sidebar')
@include('web.includes.user_sidebar')
@endsection

@section('script')
<script type="text/javascript">
	document.forms['profile_edit_form'].elements['gender'].value = "{{ $user->gender }}";
</script>
@endsection