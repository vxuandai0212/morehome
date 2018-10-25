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

@section('content')
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Projects				
							</h1>	
							<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="projects.html"> Projects</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start gallery Area -->
			<section class="gallery-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-12 pb-40 header-text text-center">
							<h1 class="pb-10">Our Recent Works may impress you</h1>
							<p>
								Who are in extremely love with eco friendly system.
							</p>
						</div>
					</div>							
					<div class="row">
						<div class="col-lg-8">
							<div class="single-gallery">
								<div class="content">
								    <a href="#" target="_blank">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="{{ asset('frontend/img/g1.jpg') }}" alt="">
								      <div class="content-details fadeIn-bottom">
								        <h3 class="content-title mx-auto">Lavendar ambient interior</h3>
								        <a href="project-details.html" class="primary-btn text-uppercase mt-20">More Details</a>
								      </div>
								    </a>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-gallery">
								<div class="content">
								    <a href="#" target="_blank">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="{{ asset('frontend/img/g2.jpg') }}" alt="">
								      <div class="content-details fadeIn-bottom">
								        <h3 class="content-title mx-auto">Ambient interior</h3>
								        <a href="project-details.html" class="primary-btn text-uppercase mt-20">More Details</a>
								      </div>
								    </a>
								</div>
							</div>
						</div>	
						<div class="col-lg-4">
							<div class="single-gallery">
								<div class="content">
								    <a href="#" target="_blank">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="{{ asset('frontend/img/g3.jpg') }}" alt="">
								      <div class="content-details fadeIn-bottom">
								        <h3 class="content-title mx-auto">Ambient interior</h3>
								        <a href="project-details.html" class="primary-btn text-uppercase mt-20">More Details</a>
								      </div>
								    </a>
								</div>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="single-gallery">
								<div class="content">
								    <a href="#" target="_blank">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="{{ asset('frontend/img/g4.jpg') }}" alt="">
								      <div class="content-details fadeIn-bottom">
								        <h3 class="content-title mx-auto">Lavendar ambient interior</h3>
								        <a href="project-details.html" class="primary-btn text-uppercase mt-20">More Details</a>
								      </div>
								    </a>
								</div>
							</div>
						</div>												
					</div>
				</div>	
			</section>
			<!-- End gallery Area -->
				
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