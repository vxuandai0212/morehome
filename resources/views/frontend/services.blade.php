@extends('../layouts.frontend')

@section('meta_author')
<meta name="author" content="colorlib">
@endsection

@section('meta_description')
<meta name="description" content="">
@endsection

@section('meta_keywords')
<meta name="keywords" content="">
@endsection

@section('title')
<title>Dịch vụ</title>
@endsection

@section('content')
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Dịch vụ				
							</h1>	
							<p class="text-white link-nav"><a href="{{route('home')}}">Trang chủ </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{route('services')}}"> Dịch vụ</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->

			<!-- Start service Area -->
			<section class="service-area section-gap" id="service">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-12 pb-50 header-text text-center">
							<h1 class="mb-10">Chúng tôi cung cấp những gì cho khách hàng</h1>
							<p>
								Chúng tôi tạo nên một hệ sinh thái thân thiện và hiện đại.
							</p>
						</div>
					</div>						
					<div class="row">
						<div class="col-lg-3">
							<div class="single-service">
								<a href="/projects?tag=Thiết kế nội thất"><h4>Thiết kế nội thất</h4></a>
								<p style="height:200px;">
									Từ ý tưởng đến hiện thực về một không gian sống trong mơ - Đó là nhiệm vụ của Morehome
								</p>
							</div>
						</div>	
						<div class="col-lg-3">
							<div class="single-service">
								<a href="/ideabooks?tag=Thiết kế nhà đẹp"><h4>Thiết kế nhà đẹp</h4></a>
								<p style="height:200px;">
									Bạn đang muốn công ty thiết kế nhà đẹp tư vấn thiết kế nhà miễn phí, bạn đang cần đơn vị Uy Tín thiết kế nhà đẹp tại Đà Nẵng, Hà Nội, Tp. Hồ Chí Minh và có khả năng thi công xây nhà trọn gói giá rẻ, hoàn thiện nội thất chuẩn theo chi phí đầu tư.
								</p>
							</div>
						</div>	
						<div class="col-lg-3">
							<div class="single-service">
								<a href="/ideabooks?tag=Thi công nội thất"><h4>Thi công nội thất</h4></a>
								<p style="height:200px;">
									Morehome là một trong những công ty chuyên thiết kế thi công nội thất chuyên nghiệp
								</p>
							</div>
						</div>	
						<div class="col-lg-3">
							<div class="single-service">
								<a href="/ideabooks?tag=Sản xuất nội thất"><h4>Sản xuất nội thất</h4></a>
								<p style="height:200px;">
									Được thành lập vào năm 2009, Công ty cổ phần Morehome được biết đến là một đơn vị chuyên sâu trong lĩnh vực tư vấn thiết kế nội thất và thi công nội thất và sản xuất nội thất hàng đầu tại Việt Nam.
								</p>
							</div>
						</div>																												
					</div>
				</div>	
			</section>
			<!-- End service Area -->

			<!-- Start feature Area -->
			<section class="feature-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-12 pb-40 header-text text-center">
							<h1 class="pb-10 text-white">Những tiêu chí tạo nên sự khác biệt</h1>
							<p class="text-white">
								Làm việc chuyên nghiệp, đặt sự hài lòng của khách hàng là ưu tiên hàng đầu
							</p>
						</div>
					</div>							
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<a class="title d-flex flex-row align-items-center">
									<span class="lnr lnr-user"></span>
									<h4>Chuyên gia thiết kế</h4>
								</a>
								<p style="height:65px;">
								Luôn cập nhật xu thế của thế giới, đem lại những thiết kế hiện đại, tiện lợi
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<a class="title d-flex flex-row align-items-center">
									<span class="lnr lnr-license"></span>
									<h4>Dịch vụ chuyên nghiệp</h4>
								</a>
								<p style="height:80px;">
								Chúng tôi có 20 năm kinh nghiệm đảm bảo sự hài lòng của khách hàng
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<a class="title d-flex flex-row align-items-center">
									<span class="lnr lnr-phone"></span>
									<h4>Hỗ trợ nhiệt tình</h4>
								</a>
								<p style="height:65px;">
								Đội ngũ tư vấn của chúng tôi sẽ góp ý cho bạn những sản phẩm tốt nhất cũng như hỗ trợ sau khi mua hàng
								</p>
							</div>
						</div>						
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<a class="title d-flex flex-row align-items-center">
									<span class="lnr lnr-rocket"></span>
									<h4>Đội ngũ nhân viên tay nghề cao</h4>
								</a>
								<p style="height:45px;">
									Nhân viên của công ty được đào tạo bài bản, có kinh nghiệm lâu năm
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<a class="title d-flex flex-row align-items-center">
									<span class="lnr lnr-diamond"></span>
									<h4>Khách hàng tin cậy</h4>
								</a>
								<p style="height:80px;">
									Chúng tôi có kinh nghiệm phục vụ lâu năm và được nhiều khách hàng giới thiệu
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<a class="title d-flex flex-row align-items-center">
									<span class="lnr lnr-bubble"></span>
									<h4>Đánh giá tích cực</h4>
								</a>
								<p style="height:65px;">
								Chúng tôi không ngừng cố gắng hoàn thiện đem đến dịch vụ tốt nhất
								</p>
							</div>
						</div>	

					</div>
				</div>	
			</section>
			<!-- End feature Area -->

			<!-- Start callto-action Area -->
			<section class="callto-action-area section-gap">
				<div class="container">
					<div class="row justify-content-center">
						<div class="callto-action-wrap col-lg-12 relative section-gap">
							<div class="content">
								<h1>
									Bạn đang tìm kiếm một  <br>
									thiết kế chất lượng và giá cả phải chăng?
								</h1>
								<p class="mx-auto">
								Hãy tìm cho mình một ngôi nhà mơ ước với dịch vụ của chúng tôi.
								</p>
								<a href="/ideabooks" class="primary-btn text-uppercase">Tham khảo ngay</a>			
							</div>							
						</div>
					</div>
				</div>	
			</section>
			<!-- End callto-action Area -->

			<!-- Start brands Area -->
			<section class="brands-area pb-60 pt-60">
				<div class="container no-padding">
					<div class="brand-wrap">
						<div class="row align-items-center active-brand-carusel justify-content-start no-gutters">
							<div class="col single-brand">
								<a><img class="mx-auto" src="{{ asset('frontend/img/l1.png') }}" alt=""></a>
							</div>
							<div class="col single-brand">
								<a><img class="mx-auto" src="{{ asset('frontend/img/l2.png') }}" alt=""></a>
							</div>
							<div class="col single-brand">
								<a><img class="mx-auto" src="{{ asset('frontend/img/l3.png') }}" alt=""></a>
							</div>
							<div class="col single-brand">
								<a><img class="mx-auto" src="{{ asset('frontend/img/l4.png') }}" alt=""></a>
							</div>
							<div class="col single-brand">
								<a><img class="mx-auto" src="{{ asset('frontend/img/l5.png') }}" alt=""></a>
							</div>								
						</div>																			
					</div>
				</div>	
			</section>
			<!-- End brands Area -->	
@endsection