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
<title>Interior</title>
@endsection

@section('css')
<style>
.vietnamese
{
    font-family: Arial, Helvetica, sans-serif;
}

.mpadding
{
    padding: 70px;
}

.smpadding
{
    padding: 30px;
}

.text-bold
{
    font-weight: bold;
}
.imagesbg
{
    background-image: url({{ asset('frontend/img/room-1336497_1920.jpg') }})
}
</style>
@endsection

@section('content')
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								About Us				
							</h1>	
							<p class="text-white link-nav"><a href="{{route('home')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{route('about')}}"> About Us</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start about Area -->
			<section class="about-video-area section-gap">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6 about-video-left">
							<h1>
								Giới thiệu
							</h1>
							<p class="vietnamese">
								Được thành lập vào năm 2009, Công ty cổ phần Morehome được biết đến là một đơn vị chuyên sâu trong lĩnh vực tư vấn thiết kế nội thất và thi công nội thất và sản xuất nội thất hàng đầu tại Việt Nam.
							</p>
						</div>
						<div class="col-lg-6 about-video-right justify-content-center align-items-center d-flex relative">
							<img src="{{ asset('frontend/img/bedroom-416062.jpg') }}" alt="" width="570px" height="330px;">
						</div>
					</div>
				</div>	
			</section>
			<!-- End about Area -->					

			<!-- Start Human Resources Area -->	
			<section class="feature-area section-gap">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-6 about-video-right justify-content-center align-items-center d-flex relative">
								<img src="{{ asset('frontend/img/architecture-1477041_1280.jpg') }}" alt="" width="570px" height="330px;">
							</div>
							<div class="col-lg-6 about-video-left">
									<h1 class="text-white">
										Nguồn nhân lực
									</h1>
									<p class="vietnamese text-white">
										Với đội ngũ chuyên gia, kiến trúc sư, kỹ sư được đào tạo chuyên sâu, có nhiều năm kinh nghiệm kết hợp với đội ngũ thi công lành nghề chúng tôi đã hoàn thành hàng trăm công trình chất lượng cao mang tầm vóc Quốc Gia , chúng tôi luôn đem đến cho quý khách hàng những sản phẩm sáng tạo về thiết kế thi công đẳng cấp và khác biệt nhất cho căn nhà của bạn, đáp ứng tốt mọi nhu cầu ngày càng cao của khách hàng.
							</div>
						</div>
					</div>	
				</section>

			<!-- Start Service Area -->
			<section class="feature-area section-gap imagesbg">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-12 pb-40 header-text text-center">
							<h1 class="pb-10 text-black">Dịch vụ</h1>
							<p class="text-white">
								Sau đây Morehome xin giới chi tiết các dịch vụ hàng đầu Nội thất Morehome
							</p>
						</div>
					</div>							
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="single-feature">
								<a href="#" class="title d-flex justify-content-center">
									<span class="lnr lnr-pencil"></span>
									<h4 class="vietnamese">Thiết kế nội thất</h4>
								</a>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="single-feature">
								<a href="#" class="title d-flex justify-content-center">
									<span class="lnr lnr-home"></span>
									<h4 class="vietnamese">Thiết kế kiến trúc</h4>
								</a>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="single-feature">
								<a href="#" class="title d-flex justify-content-center">
									<span class="lnr lnr-funnel"></span>
									<h4 class="vietnamese">Thi công nội thất</h4>
								</a>
							</div>
						</div>						
						<div class="col-lg-6 col-md-6">
							<div class="single-feature">
								<a href="#" class="title d-flex justify-content-center">
									<span class="lnr lnr-inbox"></span>
									<h4 class="vietnamese">Sản xuất nội thất</h4>
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End service Area -->	

		    <!-- Start strategy Area -->
		    <section class="testimonial-area pt-120 pb-120">
		        <div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Chiến lược phát triển bền vững</h1>
		                        <p class="vietnamese"> Thế mạnh của MOREHOME  là thiết kế và thi công nội thất ngoài ra chúng tôi còn đẩy mạnh nhiều sản phẩm thương hiệu khác và nhận được sự tin tưởng giao phó của khách hàng. Trong nhiều năm qua lĩnh vực hoạt động của công ty ngày càng được mở rộng. Nếu bạn thực sự có nhu cầu, hãy gọi đến hotline: 097 543 8686 hoặc truy cập website: thietkenoithat.com để được tư vấn chi tiết. Ngoài ra, bạn có thể đến trực tiếp văn phòng Morehome để được tư vấn cụ thể và chiêm ngưỡng những sản phẩm được sản xuất bởi Morehome.</p>
		                    </div>
		                </div>
					</div>
					<div class="row align-items-center ">
							<div class="col-lg-6 about-video-right justify-content-center align-items-center d-flex relative">
								<img src="{{ asset('frontend/img/living-room-690174_1920.jpg') }}" alt="" width="570px" height="330px;">
							</div>
							<div class="col-lg-6 about-video-left">
									<h3>
										Phương hướng phát triển chung
									</h3>
									<p class="vietnamese mt-3">
											-  Xây dựng những giá trị văn hóa tốt đẹp và môi trường làm việc văn minh.<br>
											-  Luôn tìm tòi, nghiên cứu sản phẩm phù hợp với thị hiếu của người tiêu dùng và không ngừng phát triển nhằm đáp ứng nhu cầu tốt nhất cho khách hàng.<br>											
											-  Luôn đề cao việc đào tạo, bồi dưỡng nguồn nhân lực và nâng cao tay nghề.
									</p>
							</div>
					</div>
					<div class="row align-items-center ">
							<div class="col-lg-6 about-video-left">
									<h3>
										Đối với nhân viên
									</h3>
									<p class="vietnamese mt-3">
											- Sắp xếp và bố trí làm việc hợp lý, đúng với  nhu cầu của từng vị trí và từng công việc cụ thể trên cơ sở căn cứ vào công việc, tìm người có năng lực tương xứng với vị trí đảm nhiệm.<br>
											- Chủ động thực hiện công tác đào tạo, bồi dưỡng năng lực cho cán bộ công nhân viên để nâng cao trình độ kiến thức chuyên môn của cán bộ và tay nghề cho công nhân để họ có thể tiếp cận và sử dụng được máy móc hiện đại, sản xuất ra những sản phẩm đạt chất lượng cao.<br>										
											- Xây dựng định mức lao động và các cơ chế, chính sách về tiền lương, tiền thưởng phù hợp để động viên được những lao động tích cực, có tinh thần trách nhiệm với công việc.<br>											
											- Quan tâm đến đời sống tinh thần cho CBCNV qua các hoạt động như thưởng vào các ngày lễ tết, nghỉ mát, thăm hỏi, động viên,…
									</p>
							</div>
							<div class="col-lg-6 about-video-right justify-content-center align-items-center d-flex relative">
									<img src="{{ asset('frontend/img/Pool-House-HD-wallpaper.jpg') }}" alt="" width="570px" height="330px;">
							</div>
					</div>
					<div class="row align-items-center ">
							<div class="col-lg-6 about-video-right justify-content-center align-items-center d-flex relative">
								<img src="{{ asset('frontend/img/chair-1845270_1920.jpg') }}" alt="" width="570px" height="330px;">
							</div>
							<div class="col-lg-6 about-video-left">
									<h3>
										Đối với sản phẩm - Dịch vụ
									</h3>
									<p class="vietnamese mt-3">
											- Tập trung cải tiến các khâu sản xuất, chất lượng nguyên vật liệu đầu vào.<br>
											- Phương châm làm việc: luôn lắng nghe ý kiến khách hàng để tạo ra những sản phẩm thỏa mãn mọi nhu cầu, hệ thống quản lý chất lượng của Công ty có một quy trình hướng dẫn, theo dõi và thu thập, xử lý thông tin khách hàng thông qua các dịch vụ sửa chữa, bảo hành, …<br>											
											- Tiếp tục nâng cao chất lượng và tính thẩm mỹ của sản phẩm, nâng cao năng lực cạnh tranh của sản phẩm một cách toàn diện.
									</p>
							</div>
					</div>
					<div class="row align-items-center ">
							<div class="col-lg-6 about-video-left">
									<h3>
										Đối với khách hàng
									</h3>
									<p class="vietnamese mt-3">
											- Thực hiện tốt dịch vụ chăm sóc khách hàng. Sử dụng các thông tin về thỏa mãn và không thỏa mãn của khách hàng để kịp thời thông qua dịch vụ sửa chữa bảo hành sản phẩm.<br>
											- Xây dựng chính sách đãi ngộ cho khách hàng dựa trên năng lực thực tế.<br>										
											- Xây dựng mối qua hệ công bằng giữa khách hàng và doanh nghiệp trên cơ sở cùng chia sẻ lợi ích giữa các bên để cùng nhau phát triển bền vững.
									</p>
							</div>
							<div class="col-lg-6 about-video-right justify-content-center align-items-center d-flex relative">
									<img src="{{ asset('frontend/img/columns-801715_1280.jpg') }}" alt="" width="570px" height="330px;">
							</div>
					</div>
		        </div>
		    </section>
		    <!-- End strategy Area -->	

			<!-- Start location Area -->
				<section class="feature-area section-gap">
					<div class="container">
							<div class="col-md-12 pb-40 header-text text-center">
									<h1 class="pb-10 text-white">Liên hệ</h1>
									<p class="text-white">
										Mọi thông tin chi tiết xin vui lòng liên hệ với chúng tôi để được tư vấn tốt nhất 
									</p>
							</div>
							<div>
									<h3 class="text-white">
										Hà Nội
									</h3>
									<p class="vietnamese text-white ">
											- Văn phòng công ty: Tầng 3 tòa nhà T6-08, ngõ 643A Phạm Văn Đồng, Từ Liêm, Hà Nội<br>	
											- Xưởng gỗ 1: Thượng cát, Từ Liêm, Hà Nội<br>												
											- Xưởng gỗ 2: Khu công nghiệp Nam Thăng Long, Từ Liêm, Hà Nội<br>												
											- Xưởng tranh kính: Xã Thượng Cát, Từ Liêm, Hà Nội<br>												
											- Hotline: 097 543 8686 (Mr. Chính) hoặc 098 765 3777 (Mr. Hiệu).
									</p>
							</div>
							<div>
									<h3 class="text-white">
										Đà Nẵng 
									</h3>
									<p class="vietnamese text-white ">
											-Địa chỉ: 112 Lê Đình Lý - Quận Hải Châu - Thành phố Đà nẵng<br>
											-Hotline: 090 852 1777 (Mr. Phú)
									</p>
							</div>
							<div>
									<h3 class="text-white">
										Thành Phố Hồ Chí Minh
									</h3>
									<p class="vietnamese text-white">
											-Địa chỉ:  89 Dương Văn An, Khu B, Phường An Phú, Quận 2 ( Phía sau Metro, An Phú )<br>
											-Xưởng sản xuất: 260 To Ngọc Vân, Phương Linh Đông, Quận Thủ Đức, HCM<br>											
											-Hotline: 098 635 6789 (Mr. Hoàn)
									</p>
							</div>		
					</div>
				</section>
			<!-- End location Area -->
			
			<!-- Start brands Area -->
			<section class="brands-area pb-60 pt-60">
				<div class="container no-padding">
					<div class="brand-wrap">
						<div class="row align-items-center active-brand-carusel justify-content-start no-gutters">
							<div class="col single-brand">
								<a href="#"><img class="mx-auto" src="{{ asset('frontend/img/l1.png') }}" alt=""></a>
							</div>
							<div class="col single-brand">
								<a href="#"><img class="mx-auto" src="{{ asset('frontend/img/l2.png') }}" alt=""></a>
							</div>
							<div class="col single-brand">
								<a href="#"><img class="mx-auto" src="{{ asset('frontend/img/l3.png') }}" alt=""></a>
							</div>
							<div class="col single-brand">
								<a href="#"><img class="mx-auto" src="{{ asset('frontend/img/l4.png') }}" alt=""></a>
							</div>
							<div class="col single-brand">
								<a href="#"><img class="mx-auto" src="{{ asset('frontend/img/l5.png') }}" alt=""></a>
							</div>								
						</div>																			
					</div>
				</div>	
			</section>
			<!-- End brands Area -->		
@endsection