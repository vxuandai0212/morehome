<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
		<!-- Author Meta -->
        @yield('meta_author')
		<!-- Meta Description -->
        @yield('meta_description')
		<!-- Meta Keyword -->
        @yield('meta_keywords')
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
        @yield('title')

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="{{ asset('frontend/css/linearicons.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">							
        <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
		<style>
			a:hover{
				cursor: pointer;
			}
		</style>
        @yield('css')
		</head>
		<body>	
			<header id="header" id="home">
		  		<div class="header-top">
		  			<div class="container">
				  		<div class="row">
				  			<div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">
				  				<a href="#">+09 67 61 63 88 </a>
				  				<a href="#">support@morehome.com</a>					  
				  			</div>
				  			<div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding">
				  				<ul>
									<li><a href="https://www.facebook.com/vxuandai0212"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
									<li><a href="#"><i class="fa fa-behance"></i></a></li>
									@if (Auth::check())
									<li><a href="#" id="user_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}  <i class="fa fa-user-circle"></i></a>
										<div class="dropdown-menu" aria-labelledby="user_dropdown">
											<button class="btn-sm dropdown-item" type="button"><a style="color: #212529;" href="/personal/{{Auth::user()->username}}">Trang cá nhân</a></button>
    										<button class="btn-sm dropdown-item" type="button"><a style="color: #212529;" href="/personal/{{Auth::user()->username}}/profile">Giới thiệu</a></button>
											<div class="btn-sm dropdown-divider"></div>
											<button class="btn-sm dropdown-item" type="button"><a style="color: #212529;" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a></button>
										</div>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form>
									</li>
									@else
									<li><a href="#" id="user_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle"></i></a>
										<div class="dropdown-menu" aria-labelledby="user_dropdown">
											<button class="btn-sm dropdown-item" type="button"><a style="color: #212529;" href="{{route('login')}}">Đăng nhập</a></button>
    										<button class="btn-sm dropdown-item" type="button"><a style="color: #212529;" href="{{route('register')}}">Đăng kí</a></button>
										</div>
									</li>
									@endif
				  				</ul>			
				  			</div>
				  		</div>			  					
		  			</div>
				</div>
			    <div class="container main-menu">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="{{ route('home') }}"><img src="{{ asset('frontend/img/logo.png') }}" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="{{ route('home') }}">Trang chủ</a></li>
				          <li><a href="{{ route('about') }}">Giới thiệu</a></li>
				          <li><a href="{{ route('services') }}">Dịch vụ</a></li>
				          <li><a href="{{ route('projects') }}">Dự án</a></li>
						  <li><a href="{{ route('advices') }}">Tư vấn</a></li>				          					          		          
				          <li><a href="{{ route('contact') }}">Liên hệ</a></li>
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			</header><!-- #header -->

            @yield('content')	

			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6><a style="color:black;" href="{{route('policy')}}">Chính sách & Điều khoản</a></h6>
								<p class="footer-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>								
							</div>
						</div>
						<div class="col-lg-5  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Nhận thư từ chúng tôi</h6>
								<p>Cập nhật thông tin mới nhất về chúng tôi</p>
								<div>
									<form onsubmit="event.preventDefault();" class="form-inline">
										<input id="email_address" class="form-control" name="email" placeholder="Địa chỉ email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Địa chỉ email'" required type="email">
			                            	<button id="send_mail" class="click-btn btn btn-default"><i class="lnr lnr-arrow-right" aria-hidden="true"></i></button>
										<div style="margin-top: 10%;color: green;" class="info"></div>
									</form>
								</div>
							</div>
						</div>						
						<div class="col-lg-2 col-md-6 col-sm-6 social-widget">
							<div class="single-footer-widget">
								<h6>Theo dõi</h6>
								<p>Theo dõi chúng tôi trên mạng xã hội</p>
								<div class="footer-social d-flex align-items-center">
									<a href="https://www.facebook.com/vxuandai0212"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-dribbble"></i></a>
									<a href="#"><i class="fa fa-behance"></i></a>
								</div>
							</div>
						</div>							
					</div>
				</div>
			</footer>	
			<!-- End footer Area -->	

			<script src="{{ asset('frontend/js/vendor/jquery-2.2.4.min.js') }}"></script>
			@yield('script')
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="{{ asset('frontend/js/vendor/bootstrap.min.js') }}"></script>			
  			<script src="{{ asset('frontend/js/easing.min.js') }}"></script>			
			<script src="{{ asset('frontend/js/hoverIntent.js') }}"></script>
			<script src="{{ asset('frontend/js/superfish.min.js') }}"></script>	
			<script src="{{ asset('frontend/js/jquery.ajaxchimp.min.js') }}"></script>
			<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>	
			<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>						
			<script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>							
			<script src="{{ asset('frontend/js/mail-script.js') }}"></script>	
			<script src="{{ asset('frontend/js/main.js') }}"></script>	
			<script>
				$( "#send_mail" ).click(function() {
					var email = $("#email_address").val();
					$.get( "/subcribe?email="+email, function( data ) {
						$( ".info" ).text( data );
						$("#email_address").val('');
					});
				})
			</script>
		</body>
	</html>