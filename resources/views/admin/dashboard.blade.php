@extends('admin.layouts.app')
@section('title', 'Dashboard')


@section('style')
<style type="text/css">
.modal-title {
	font-weight: bold;
}
.bg-grey{
	background-color: #BDBDBD;
}
.users-list>li {
	width: 10%;
}
</style>
@endsection

@section('content')
<!-- Page header -->
<section class="content-header">
	<h1>
		DASHBOARD
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('admin.dashboardRoute') }}"><i class="fa fa-home active"></i> Dashboard</a></li>
	</ol>
</section>
<!-- /.page header -->

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-grey">
				<div class="inner">
					<h3>{{ $all_users->count() }}</h3>

					<p>USER</p>
				</div>
				<div class="icon">
					<i class="fa fa-users"></i>
				</div>
				<a href="{{ route('admin.users.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-grey">
				<div class="inner">
					<h3>{{ $all_subscribers->count() }}</h3>

					<p>SUBSCRIBER</p>
				</div>
				<div class="icon">
					<i class="fa fa-envelope"></i>
				</div>
				<a href="{{ route('admin.subscribers.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-grey">
				<div class="inner">
					<h3>{{ $all_pages->count() }}</h3>

					<p>PAGE</p>
				</div>
				<div class="icon">
					<i class="fa fa-file"></i>
				</div>
				<a href="{{ route('admin.pages.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-grey">
				<div class="inner">
					<h3>{{ $all_galleries->count() }}</h3>

					<p>GALLERY</p>
				</div>
				<div class="icon">
					<i class="fa fa-image"></i>
				</div>
				<a href="{{ route('admin.galleries.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
	</div>

	<div class="row">
		<div class="col-md-12">
			<!-- USERS LIST -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Recent Users</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body no-padding">
					<ul class="users-list clearfix">
						@foreach($users as $user)
						<li>
							@if(!empty($user->avatar))
							<img class="img-responsive" alt="{{ $user->name }}" src="{{ asset('public/avatar/' . $user->avatar) }}" width="128px">
							@else
							<img class="img-responsive" alt="{{ $user->name }}" src="{{ get_gravatar($user->email) }}" width="128px">
							@endif
							<a class="users-list-name user-view-button" data-id="{{ $user->id }}" role="button" tabindex="0">{{ $user->name }}</a>
							<span class="users-list-date">{{ date("d F Y", strtotime($user->created_at)) }}</span>
						</li>
						@endforeach
					</ul>
					<!-- /.users-list -->
				</div>
				<!-- /.box-body -->
				<div class="box-footer text-center">
					<a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-info btn-flat pull-right">View All</a>
				</div>
				<!-- /.box-footer -->
			</div>
			<!--/.box -->
		</div>

		<!-- view user modal -->
		<div id="user-view-modal" class="modal fade bs-example-modal-lg print-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<div class="btn-group pull-right no-print">
							<div class="btn-group">
								<button class="tip btn btn-default btn-flat btn-sm" id="print-button" data-toggle="tooltip" data-original-title="Print">
									<i class="fa fa-print"></i>
									<span class="hidden-sm hidden-xs"></span>
								</button>
							</div>
							<div class="btn-group">
								<button class="tip btn btn-default btn-flat btn-sm" data-toggle="tooltip" data-original-title="Close" data-dismiss="modal" aria-label="Close">
									<i class="fa fa-remove"></i>
									<span class="hidden-sm hidden-xs"></span>
								</button>
							</div>
						</div>
						<h4 class="modal-title" id="view-name"></h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-9">
								<table class="table table-bordered table-striped">
									<tbody>
										<tr>
											<td width="20%">Role</td>
											<td id="view-role"></td>
										</tr>
										<tr>
											<td>Username</td>
											<td id="view-username"></td>
										</tr>
										<tr>
											<td>Email</td>
											<td id="view-email"></td>
										</tr>
										<tr>
											<td>Gender</td>
											<td id="view-gender"></td>
										</tr>
										<tr>
											<td>Phone</td>
											<td id="view-phone"></td>
										</tr>
										<tr>
											<td>Address</td>
											<td id="view-address"></td>
										</tr>
										<tr>
											<td>Facebook</td>
											<td id="view-facebook"></td>
										</tr>
										<tr>
											<td>Twitter</td>
											<td id="view-twitter"></td>
										</tr>
										<tr>
											<td>Google Plus</td>
											<td id="view-google-plus"></td>
										</tr>
										<tr>
											<td>Linkedin</td>
											<td id="view-linkedin"></td>
										</tr>
										<tr>
											<td>Status</td>
											<td id="view-status"></td>
										</tr>
										<tr>
											<td>About</td>
											<td id="view-about"></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-3">
								<img id="view-avatar" class="img-responsive img-thumbnail img-rounded">
							</div>
						</div>
					</div>
					<div class="modal-footer no-print">
						<button type="button" class="btn btn-default btn-flat" data-dismiss="modal" aria-label="Close">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- /.view user modal -->
	</section>
	<!-- /.main content -->
	@endsection

	@section('script')
	<script type="text/javascript">
		/** User View **/
		$(".user-view-button").click(function(){
			var id = $(this).data("id");
			var url = "{{ route('admin.users.show', 'id') }}";
			url = url.replace("id", id);
			$.ajax({
				url: url,
				method: "GET",
				dataType: "json",
				success:function(data){
					var src = '{{ asset('public/avatar') }}/';
					var default_avatar = '{{ asset('public/avatar/user.png') }}';
					$('#user-view-modal').modal('show');

					$('#view-name').text(data['name']);
					$('#view-username').text(data['username']);
					$('#view-email').text(data['email']);
					$("#view-avatar").attr("src", src+data['avatar']);
					if(data['avatar']){
						$("#view-avatar").attr("src", src+data['avatar']);
					}else{
						$("#view-avatar").attr("src", default_avatar);
					}
					if(data['gender'] == 'm'){
						$('#view-gender').text('Male');
					}else{
						$('#view-gender').text('Female');
					}
					$('#view-phone').text(data['phone']);
					$('#view-address').text(data['address']);
					$('#view-facebook').text(data['facebook']);
					$('#view-twitter').text(data['twitter']);
					$('#view-google-plus').text(data['google_plus']);
					$('#view-linkedin').text(data['linkedin']);
					$('#view-about').text(data['about']);
					if(data['role'] == 'admin'){
						$('#view-role').text('Admin');
					}else{
						$('#view-role').text('User');
					}
					if(data['activation_status'] == 1){
						$('#view-status').text('Active');
					}else{
						$('#view-status').text('Block');
					}
				}});
		});
	</script>
	@endsection