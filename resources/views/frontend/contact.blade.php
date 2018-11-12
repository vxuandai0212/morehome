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
<title>Liên hệ</title>
@endsection

@section('content')
		<div id="app">
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Liên hệ			
							</h1>	
							<p class="text-white link-nav"><a href="{{route('home')}}">Trang chủ </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{route('contact')}}"> Liên hệ</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->				  

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
						<div class="map-wrap" style="width:100%; height: 445px;" id="map"></div>
						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>Cầu Giấy, Hà Nội</h5>
									<p>
										35 Trần Thái Tông
									</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>09 67 61 63 88</h5>
									<p>Thứ hai đến thứ sáu, 9h đến 18h</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>support@morehome.com</h5>
									<p>Chúng tôi sẽ giúp đỡ bạn bất cứ khi nào!</p>
								</div>
							</div>														
						</div>
						<div class="col-lg-8">
							<form class="form-area" id="myForm" class="contact-form text-right">
								<div class="row">	
									<div class="col-lg-6 form-group">
										<input v-model="mail.name" name="name" placeholder="Nhập tên" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập tên'" class="common-input mb-20 form-control" required="" type="text">
									
										<input v-model="mail.email_address" name="email" placeholder="Nhập địa chỉ email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập địa chỉ email'" class="common-input mb-20 form-control" required="" type="email">

										<input v-model="mail.subject" name="subject" placeholder="Nhập chủ đề" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập chủ đề'" class="common-input mb-20 form-control" required="" type="text">
									</div>
									<div class="col-lg-6 form-group">
										<textarea v-model="mail.mail_content" class="common-textarea form-control" name="message" placeholder="Lời nhắn" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Lời nhắn'" required=""></textarea>				
									</div>
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<button type="button" @click="send_mail" class="genric-btn primary circle" style="float: right;">Gửi</button>											
									</div>
								</div>
							</form>	
						</div>
					</div>
				</div>	
			</section>
			<!-- End contact-page Area -->	
		</div>	
@endsection
@section('script')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script>
	$( document ).ready(function() {
		var app = new Vue({
			el: '#app',
			created: function() {
				this.init();
			},
			data: {
				mail: {
					name: '',
					email_address: '',
					subject: '',
					mail_content: ''
				}
			},
			methods: {
				init() {
					
				},
				send_mail() {
					var com = this;
					axios.post('/message/send', {mail: com.mail})
					.then(function (response) {
						$('div.alert-msg').text('Thành công.');
						com.mail.name = '';
						com.mail.email_address = '';
						com.mail.subject = '';
						com.mail.mail_content = '';
					})
					.catch(function (error) {
						$('div.alert-msg').text('Thất bại.');
						console.log(error);
					});
				}
			}
		})
    });
</script>
@endsection