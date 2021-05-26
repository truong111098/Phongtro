<!DOCTYPE html>
<html lang="en">
<head>
	<title>Project Phòng Trọ</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<base href="{{asset('')}}">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/style.css">
	<link rel="stylesheet" href="assets/awesome/css/fontawesome-all.css">
	<link rel="stylesheet" href="assets/toast/toastr.min.css">
	<script src="assets/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/myjs.js"></script>
	<link rel="stylesheet" href="assets/selectize.default.css" data-theme="default">
	<script src="assets/js/fileinput/fileinput.js" type="text/javascript"></script>
	<script src="assets/js/fileinput/vi.js" type="text/javascript"></script>
	<link rel="stylesheet" href="assets/fileinput.css">
	<script src="assets/pgwslider/pgwslider.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="assets/pgwslider/pgwslider.min.css">
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
    This must be loaded before fileinput.min.js -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.8/js/plugins/sortable.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.8/js/plugins/purify.min.js" type="text/javascript"></script> -->
<link rel="stylesheet" href="assets/bootstrap/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="assets/bootstrap/bootstrap-select.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse pdlr bgrw">
		<a class="navbar-brand" href=""><img style="width: 50%;" src="images/logo.png"></a>
		
		@if(Auth::user())
		
				<ul class="nav navbar-nav navbar-right ">
					<li><a class="btn-dangtin" href="user/dangtin"><i class="fas fa-edit"></i> Đăng tin ngay</a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Xin chào! {{Auth::user()->name}} <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="user/profile">Thông tin chi tiết</a></li>
							<li><a href="user/dangtin">Đăng tin</a></li>
							<li><a href="user/logout">Thoát</a></li>
						</ul>
					</li>
					
				</ul>
				
				@else
				<ul class="nav navbar-nav navbar-right mgbt">
					<li><a class="btn-dangtin" href="user/dangtin"><i class="fas fa-edit"></i> Đăng tin ngay</a></li>
					<li><a href="user/login" ><i class="fas fa-user-circle "></i> Đăng Nhập</a></li>
					<li><a href="user/register" ><i class="fas fa-sign-in-alt"></i> Đăng Kí</a></li>
				</ul>
				@endif
	</nav>
	<nav class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li><a href="">Trang chủ</a></li>
					@foreach($categories as $category)
					<li><a href="category/{{$category->id}}">{{ $category->name }}</a></li>
					@endforeach
					<li><a href="">Liên hệ</a></li>
					<li><a href="">Hướng dẫn</a></li>
				</ul>
				<div class="email-box pull-right">
						<i class="fas fa-search"></i>
						<input type="text" class="tbox" placeholder="  Nhập từ khóa tìm kiếm">
						<input type="submit" value="Tìm kiếm" class="btntk">
								
				</div>
			</div>
		</div>
	</nav>
	
		@yield('content')
	<div class="gap"></div>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="logo-footer">
						<a href="/">
							<img src="images/logo.png">                        
						</a>
					</div>
				</div>
			</div>
		</div>

	</footer>
	
<script type="text/javascript" src="assets/toast/toastr.min.js"></script>
</body>
</html>
