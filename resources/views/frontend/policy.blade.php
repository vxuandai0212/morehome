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
								Term and Policy				
							</h1>	
							<p class="text-white link-nav"><a href="{{route('home')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{route('policy')}}"> Term and Policy	</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- White Area -->
			<section class="about-video-area mpadding">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-12 header-text text-center">
							<h1 class="pb-10 text-black vietnamese">Thời gian sản xuất và giao sản phẩm</h1>
							<p class="text-black vietnamese">
								Công ty Cổ phần MoreHome  bắt đầu sản xuất sau khi hai bên đã thống nhất được bản thiết kế. Trong quá trình sản xuất khách hàng có quyền kiểm tra và yêu cầu Morehome.vn sản xuất theo đúng mẫu và chất liệu sản phẩm đã thỏa thuận (nếu cần).
							</p>
						</div>
					</div>	
				</div>	
			</section>
			<!-- End White Area -->					

			<!-- Yellow Area -->
			<section class="feature-area mpadding">
				<div class="container">						
					<div class="row d-flex justify-content-center">
						<div class="col-md-12 header-text text-center">
							<h1 class="pb-10 text-white vietnamese">Thời gian giao nhận sản phẩm</h1>
							<p class="text-white vietnamese">
								Thời gian giao hàng kể từ ngày khách hàng (ký hợp đồng sản xuất – duyệt thiết kế )
								Trong quá trình sản xuất có một số nguyên nhân khách quan như thời tiết, mất điện ……. mà chúng tôi không đảm bảo giao hàng đúng tiến độ cho khách hàng thì Morehome.vn phải có trách nhiệm thông báo cho khách hàng được biết để hai bên cùng thống nhất giải quyết.							</p>
						</div>
					</div>	
				</div>	
			</section>
			<!-- End Yellow Area -->	
			
			<!-- White Area -->
			<section class="about-video-area mpadding">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-12 header-text text-center">
							<h1 class="pb-10 text-black vietnamese">Thanh toán</h1>
							<p class="text-black vietnamese">
								Khách hàng tạm ứng trước 50%-70% tổng giá gị hợp đồng (Tùy theo từng loai hợp đồng) cho bên Morehome.vn
								Khách hàng có trách nhiện thanh toán số tiền còn lại cho bên Morehome.vn ngay sau khi Morehome.vn hoàn thiện bàn giao công trình. Khách hàng có thể thanh toán tiền mặt hoặc chuyển khoản về công ty.
								Morehome.vn miễn phí vận chuyển (đồ gỗ) và lắp đặt tại nội thành Hà Nội.
							</p>
						</div>
					</div>	
				</div>	
			</section>
			<!-- End White Area -->	

			<!-- Yellow Area -->
			<section class="feature-area mpadding">
				<div class="container">						
					<div class="row d-flex justify-content-center">
						<div class="col-md-12 header-text text-center">
							<h1 class="pb-10 text-white vietnamese">Trách nhiệm do vi phạm hợp đồng</h1>
							<p class="text-white vietnamese">
									Morehome.vn phải có trách nhiệm làm đúng chất liệu, thiết kế mà hai bên đã thống nhất.
									Khách hàng phải có trách nhiệm thanh toán đúng theo hợp đồng đã quy định
									Khách hàng phải có trách nhiệm duyệt bản vẽ phối cảnh và bản vẽ kỹ thuật, trong trường hợp morehome.vn sản xuất đúng kích thước theo yêu cầu của khách hàng  nhưng không lắp đặt được sản phẩm do nguyên nhân khách quan như trần không phẳng, tường vênh……. thì hai bên phải có trách nhiệm lên phương án sửa chữa lắp đặt sản phẩm.
							</p>
						</div>
					</div>	
				</div>	
			</section>
			<!-- End Yellow Area -->	

			<!-- White Area -->
			<section class="about-video-area mpadding">
					<div class="container">
						<div class="row d-flex justify-content-center">
							<div class="col-md-12 header-text text-center">
								<h1 class="pb-10 text-black vietnamese">Bảo hành</h1>
								<p class="text-black vietnamese">
										Morehome.vn có trách nhiệm bảo hành sản phẩm cho khách hàng 12 tháng kể từ ngày bên Morehome.vn bàn giao sản phẩm cho bên khách hàng.<br>
									</p>										
									<div class="text-left">
											<h5>Chính sách xử lý khiếu nại</h5>
										<p class="text-black vietnamese ml-4 mt-2">
											- Tiếp nhận mọi khiếu nại của khách hàng liên quan đến việc sử dụng dịch vụ của công ty.<br>
											- Tất cả mọi trường hơp bảo hành, quý khách có thể liên hệ với chúng tôi để làm thủ tục bảo hành.<br>
											- Thời gian giải quyết khiếu nại trong thời hạn tối đa là 03 (ba) ngày làm việc kể từ khi nhận được khiếu nại của của khách hàng. Trong trường hợp bất khả kháng 2 bên sẽ tự thương lượng.
										</p>	
									</div>										
							</div>
						</div>	
					</div>	
				</section>
				<!-- End White Area -->	

			<!-- Yellow Area -->
			<section class="feature-area smpadding">
					<div class="container">						
						<div class="row d-flex justify-content-center">
							<div class="col-md-12 header-text text-center">
								<h1 class="pb-10 text-white vietnamese">Chính sách bảo mật thông tin</h1>
								<div class="text-left">
										<h5 class="text-white">1. Mục đích và phạm vi thu thập thông tin</h5>
									<p class="text-white vietnamese ml-4 mt-2">
											Morehome.vn không bán, chia sẻ hay trao đổi thông tin cá nhân của khách hàng thu thập trên trang web cho một bên thứ ba nào khác.<br>
											Thông tin cá nhân thu thập được sẽ chỉ được sử dụng trong nội bộ công ty.<br>											
											Khi bạn liên hệ đăng ký dịch vụ, thông tin cá nhân mà morehome.vn thu thập bao gồm:<br>											
											Họ và tên<br>											
											Địa chỉ<br>											
											Điện thoại<br>											
											Email<br>
										</p>	
								</div>
								<div class="text-left">
										<h5 class="text-white">2. Phạm vi sử dụng thông tin</h5>
									<p class="text-white vietnamese ml-4 mt-2">
											Thông tin cá nhân thu thập được sẽ chỉ được Morehome.vn sử dụng trong nội bộ công ty và cho một hoặc tất cả các mục đích sau đây:<br>
											- Hỗ trợ khách hàng<br>										
											- Cung cấp thông tin liên quan đến dịch vụ.<br>											
											- Xử lý đơn đặt hàng và cung cấp dịch vụ và thông tin qua trang web của chúng tôi theo yêu cầu của bạn.<br>											
											- Chúng tôi có thể sẽ gửi thông tin sản phẩm, dịch vụ mới, thông tin về các sự kiện sắp tới hoặc thông tin tuyển dụng nếu quý khách đăng kí nhận email thông báo.<br>											
											- Ngoài ra, chúng tôi sẽ sử dụng thông tin bạn cung cấp để hỗ trợ quản lý tài khoản khách hàng; xác nhận và thực hiện các giao dịch tài chính liên quan đến các khoản thanh toán trực tuyến của bạn.</p>									</p>	
								</div>
								<div class="text-left">
										<h5 class="text-white">3. Thời gian lưu trữ thông tin</h5>
									<p class="text-white vietnamese ml-4 mt-2">
										Đối với thông tin cá nhân, Morehome.vn chỉ xóa đi dữ liệu này nếu khách hàng có yêu cầu, khách hàng yêu cầu gửi mail về  chinh@morehome.vn</p>
								</div>
								<div class="text-left">
										<h5 class="text-white">4. Địa chỉ của đơn vị thu thập và quản lý thông tin cá nhân</h5>
									<p class="text-white vietnamese ml-4 mt-2">
											Công ty Cổ phần MoreHome<br>
											Địa chỉ:Tầng 3,Tòa T6-08 Chung cư Bộ công an,643A Phạm Văn Đồng,Hà Nội<br>											
											Hotline: 0975438686<br> 											
											Website: Morehome.vn.<br>										
											Email:  chinh@morehome.vn</p>
								</div>
								<div class="text-left">
										<h5 class="text-white">5. Phương tiện và công cụ để người dùng tiếp cận và chỉnh sửa dữ liệu cá nhân của mình</h5>
									<p class="text-white vietnamese ml-4 mt-2">
											Morehome.vn không thu thập thông tin khách hàng qua trang web, thông tin cá nhân khách hàng được thực hiện thu thập qua email liên hệ đặt mua sản phẩm, dịch vụ gửi về hộp mail của chúng tôi:  chinh@morehome.vn hoặc số điện thoại liên hệ đặt mua sản phẩm gọi về 0975438686 
											Bạn có thể liên hệ địa chỉ email cùng số điện thoại trên để yêu cầu  Morehome.vn chỉnh sửa dữ liệu cá nhân của mình.</p>
								</div>
								<div class="text-left">
										<h5 class="text-white">6. Cam kết bảo mật thông tin cá nhân khách hàng</h5>
									<p class="text-white vietnamese ml-4 mt-2">
											Tại Morehome.vn, việc bảo vệ thông tin cá nhân của bạn là rất quan trọng, bạn được đảm bảo rằng thông tin cung cấp cho chúng tôi sẽ được mật. Morehome.vn cam kết không chia sẻ, bán hoặc cho thuê thông tin cá nhân của bạn cho bất kỳ người nào khác.<br>
											Morehome.vn cam kết chỉ sử dụng các thông tin của bạn vào các trường hợp sau:<br>
											- Nâng cao chất lượng dịch vụ dành cho khách hàng<br>
											- Giải quyết các tranh chấp, khiếu nại<br>
											- Khi cơ quan pháp luật có yêu cầu.</p>
								</div>
								<p class="text-white vietnamese text-bold">
									Morehome.vn  hiểu rằng quyền lợi của bạn trong việc bảo vệ thông tin cá nhân cũng chính là trách nhiệm của chúng tôi nên trong bất kỳ trường hợp có thắc mắc, góp ý nào liên quan đến chính sách bảo mật của Morehome.vn, vui lòng liên hệ qua số hotline 0975438686 hoặc email:  chinh@morehome.vn
								</p>
							</div>

						</div>	
					</div>	
				</section>
				<!-- End Yellow Area -->

			<!-- Start brands Area -->
			<section class="brands-area pb-60 pt-60">
				<div class="container no-padding">
					<div class="brand-wrap">
						<div class="row align-items-center active-brand-carusel justify-content-start no-gutters">
							<div class="col single-brand">
								<a href="#"><img class="mx-auto" src="img/l1.png" alt=""></a>
							</div>
							<div class="col single-brand">
								<a href="#"><img class="mx-auto" src="img/l2.png" alt=""></a>
							</div>
							<div class="col single-brand">
								<a href="#"><img class="mx-auto" src="img/l3.png" alt=""></a>
							</div>
							<div class="col single-brand">
								<a href="#"><img class="mx-auto" src="img/l4.png" alt=""></a>
							</div>
							<div class="col single-brand">
								<a href="#"><img class="mx-auto" src="img/l5.png" alt=""></a>
							</div>								
						</div>																			
					</div>
				</div>	
			</section>
			<!-- End brands Area -->	
@endsection