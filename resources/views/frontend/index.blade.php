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
<title>Trang chủ</title>
@endsection

@section('content')
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row fullscreen d-flex justify-content-center align-items-center">
						<div class="banner-content col-lg-9 col-md-12 justify-content-center ">
							<h1>
							"The best rooms<br> have something to say about the people who live in them." <br><i style="font-size:20px;">David Hicks</i>	
							</h1>
							<p class="text-white mx-auto">
								Hãy tìm cho bạn một ngôi nhà trong mơ với dịch vụ của chúng tôi.
							</p>
							<a href="{{ route('services') }}" class="primary-btn header-btn text-uppercase mt-10">Bắt đầu</a>
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

			<!-- Start gallery Area -->
			<section class="gallery-area pb-120">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-12 pb-40 header-text text-center">
							<h1 class="pb-10">Những dự án có thể khiến bạn ấn tượng</h1>
							<p>
								Thiết kế khách sạn, thiết kế chung cư, thiết kế biệt thự..
							</p>
						</div>
					</div>							
					<div class="row">
						<div class="col-lg-8">
							<div class="single-gallery">
								<div class="content">
								    <a href="{{$projects[0]->view_url}}" target="_blank">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="{{$projects[0]->thumbnail_url}}" alt="{{$projects[0]->title}}">
								      <div class="content-details fadeIn-bottom">
								        <h3 class="content-title mx-auto">{{$projects[0]->title}}</h3>
								        <a href="{{$projects[0]->view_url}}" class="primary-btn text-uppercase mt-20">Xem thêm</a>
								      </div>
								    </a>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-gallery">
								<div class="content">
								    <a href="{{$projects[1]->view_url}}" target="_blank">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="{{$projects[1]->thumbnail_url}}" alt="{{$projects[1]->title}}">
								      <div class="content-details fadeIn-bottom">
								        <h3 class="content-title mx-auto">{{$projects[1]->title}}</h3>
								        <a href="{{$projects[1]->view_url}}" class="primary-btn text-uppercase mt-20">Xem thêm</a>
								      </div>
								    </a>
								</div>
							</div>
						</div>	
					</div>
				</div>	
			</section>
			<!-- End gallery Area -->
				
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
								
			<!-- Start blog Area -->
			<section class="blog-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-9">
							<div class="title text-center">
								<h1 class="mb-10">Lời khuyên từ những chuyên gia của Morehome</h1>
								<p>
									Thiết kế khách sạn, thiết kế chung cư, thiết kế biệt thự..
								</p>
							</div>
						</div>
					</div>							
					<div class="row">
						<div class="active-blog-carusel">
							@foreach ($slide_posts as $post)
							<div class="single-blog-post item">
								<div class="thumb">
									<img style="width:345px;height:250px;" class="img-fluid" src="{{$post->thumbnail_url}}" alt="{{$post->title}}">
								</div>
								<div class="details">
									<div class="tags">
										<ul>
											@foreach($post->tags as $tag)
											<li>
												<a href="/{{$post->category}}?tag={{$tag->name}}">{{$tag->name}}</a>
											</li>
											@endforeach
										</ul>
									</div>
									<a href="{{$post->view_url}}"><h4 style="height:50px;" class="title">{{$post->title}}</h4></a>
									<p style="height:87px;overflow:hidden;">{{$post->short_content}}</p>
									<h6 class="date">{{$post->created_at}}</h6>
								</div>	
							</div>
							@endforeach
						</div>
					</div>
				</div>	
			</section>
			<!-- End blog Area -->

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