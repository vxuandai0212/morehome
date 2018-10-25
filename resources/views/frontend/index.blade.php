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
					<div class="row fullscreen d-flex justify-content-center align-items-center">
						<div class="banner-content col-lg-9 col-md-12 justify-content-center ">
							<h1>
								Precise concept design <br>
								for stylish living			
							</h1>
							<p class="text-white mx-auto">
								If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see some for as low as $.17 each. You may be saying to yourself.
							</p>
							<a href="{{ route('services') }}" class="primary-btn header-btn text-uppercase mt-10">Get Started</a>
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
							<h1 class="mb-10">What we offer to our clients</h1>
							<p>
								Who are in extremely love with eco friendly system..
							</p>
						</div>
					</div>						
					<div class="row">
						<div class="col-lg-4">
							<div class="single-service">
								<a href="/services/interior-design"><h4>Interior Design</h4></a>
								<p>
									Sony laptops are among the most well known laptops on today’s market. Sony is a name that over time has established itself as creating a solid product.
								</p>
							</div>
						</div>	
						<div class="col-lg-4">
							<div class="single-service">
								<a href="/services/architecture-design"><h4>Architecture Design</h4></a>
								<p>
									Computer users and programmers have become so accustomed to using Windows, even for the changing capabilities and the appearances of the graphical.
								</p>
							</div>
						</div>	
						<div class="col-lg-4">
							<div class="single-service">
								<a href="/services/concept-design"><h4>Concept Design</h4></a>
								<p>
									Can you imagine what we will be downloading in another twenty years? I mean who would have ever thought that you could record sound.
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
								    <a href="/projects/lavendar-ambient-interior" target="_blank">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="{{ asset('frontend/img/g1.jpg') }}" alt="Lavendar ambient interior">
								      <div class="content-details fadeIn-bottom">
								        <h3 class="content-title mx-auto">Lavendar ambient interior</h3>
								        <a href="/projects/lavendar-ambient-interior" class="primary-btn text-uppercase mt-20">More Details</a>
								      </div>
								    </a>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-gallery">
								<div class="content">
								    <a href="/projects/ambient-interior" target="_blank">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="{{ asset('frontend/img/g2.jpg') }}" alt="Ambient interior">
								      <div class="content-details fadeIn-bottom">
								        <h3 class="content-title mx-auto">Ambient interior</h3>
								        <a href="/projects/ambient-interior" class="primary-btn text-uppercase mt-20">More Details</a>
								      </div>
								    </a>
								</div>
							</div>
						</div>	
						<div class="col-lg-4">
							<div class="single-gallery">
								<div class="content">
								    <a href="/projects/ambient-interior" target="_blank">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="{{ asset('frontend/img/g3.jpg') }}" alt="Ambient interior">
								      <div class="content-details fadeIn-bottom">
								        <h3 class="content-title mx-auto">Ambient interior</h3>
								        <a href="/projects/ambient-interior" class="primary-btn text-uppercase mt-20">More Details</a>
								      </div>
								    </a>
								</div>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="single-gallery">
								<div class="content">
								    <a href="/projects/lavendar-ambient-interior" target="_blank">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="{{ asset('frontend/img/g4.jpg') }}" alt="Lavendar ambient interior">
								      <div class="content-details fadeIn-bottom">
								        <h3 class="content-title mx-auto">Lavendar ambient interior</h3>
								        <a href="/projects/lavendar-ambient-interior" class="primary-btn text-uppercase mt-20">More Details</a>
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
							<h1 class="pb-10 text-white">Some Features that Made us Unique</h1>
							<p class="text-white">
								Who are in extremely love with eco friendly system.
							</p>
						</div>
					</div>							
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<a class="title d-flex flex-row align-items-center">
									<span class="lnr lnr-user"></span>
									<h4>Expert Technicians</h4>
								</a>
								<p>
									Computer users and programmers have become so accustomed to using Windows, even for the changing.
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<a class="title d-flex flex-row align-items-center">
									<span class="lnr lnr-license"></span>
									<h4>Professional Service</h4>
								</a>
								<p>
									Finding the perfect learning tool for Flash is a daunting task to any novice web developer. One can find help.
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<a class="title d-flex flex-row align-items-center">
									<span class="lnr lnr-phone"></span>
									<h4>Great Support</h4>
								</a>
								<p>
									While most people enjoy casino ambling, sports betting, lottery and bingo playing for the fun and excitement.
								</p>
							</div>
						</div>						
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<a class="title d-flex flex-row align-items-center">
									<span class="lnr lnr-rocket"></span>
									<h4>Technical Skills</h4>
								</a>
								<p>
									“The moment you think of buying a Web Hosting Plan, you know one thing – So many choices, which one to choose.
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<a class="title d-flex flex-row align-items-center">
									<span class="lnr lnr-diamond"></span>
									<h4>Highly Recomended</h4>
								</a>
								<p>
									Many conventional colleges and universities are now offering online DVD repair courses, which are the exact same.
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<a class="title d-flex flex-row align-items-center">
									<span class="lnr lnr-bubble"></span>
									<h4>Positive Reviews</h4>
								</a>
								<p>
									So you have your new digital camera and clicking away to glory anything and everything in sight. Now you want.
								</p>
							</div>
						</div>	

					</div>
				</div>	
			</section>
			<!-- End feature Area -->		
		
		    <!-- Start testimonial Area -->
		    <section class="testimonial-area pt-120">
		        <div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Testimonial from our Clients</h1>
		                        <p>Who are in extremely love with eco friendly system.</p>
		                    </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="active-testimonial-carusel">
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="{{ asset('frontend/img/elements/user1.png') }}" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware.
		                            </p>
		                            <h4 mt-30>Mark Alviro Wiens</h4>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>								
									</div>			                            
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="{{ asset('frontend/img/elements/user2.png') }}" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                Hypnosis quit smoking methods maintain caused quite world over the last two decades. There is a lot of argument pertaining to
		                            </p>
		                            <h4 mt-30>Lina Harrington</h4>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>								
									</div>			                            
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="{{ asset('frontend/img/elements/user1.png') }}" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware.
		                            </p>
		                            <h4 mt-30>Mark Alviro Wiens</h4>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>								
									</div>			                            
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="{{ asset('frontend/img/elements/user2.png') }}" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                Hypnosis quit smoking methods maintain caused quite world over the last two decades. There is a lot of argument pertaining to
		                            </p>
		                            <h4 mt-30>Lina Harrington</h4>
									<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>								
									</div>			                            
		                        </div>
		                    </div>		                    
		                </div>
		            </div>
		        </div>
		    </section>
		    <!-- End testimonial Area -->	

			<!-- Start callto-action Area -->
			<section class="callto-action-area pt-120">
				<div class="container">
					<div class="row justify-content-center">
						<div class="callto-action-wrap col-lg-12 relative section-gap">
							<div class="content">
								<h1>
									Looking for a <br>
									quality and affordable interior design?
								</h1>
								<p class="mx-auto">
									inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace.
								</p>
								<a href="/ideabooks" class="primary-btn text-uppercase">Request quote now</a>			
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
								<h1 class="mb-10">Ongoing Exhibitions from the scratch</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>							
					<div class="row">
						<div class="active-blog-carusel">
							<div class="single-blog-post item">
								<div class="thumb">
									<img class="img-fluid" src="{{ asset('frontend/img/b1.jpg') }}" alt="">
								</div>
								<div class="details">
									<div class="tags">
										<ul>
											<li>
												<a href="/ideabooks">Travel</a>
											</li>
											<li>
												<a href="/ideabooks">Life Style</a>
											</li>											
										</ul>
									</div>
									<a href="/ideabooks/low-cost-advertising"><h4 class="title">Low Cost Advertising</h4></a>
									<p>
										Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.
									</p>
									<h6 class="date">31st January,2018</h6>
								</div>	
							</div>
							<div class="single-blog-post item">
								<div class="thumb">
									<img class="img-fluid" src="{{ asset('frontend/img/b2.jpg') }}" alt="">
								</div>
								<div class="details">
									<div class="tags">
										<ul>
											<li>
												<a href="/ideabooks">Travel</a>
											</li>
											<li>
												<a href="/ideabooks">Life Style</a>
											</li>											
										</ul>
									</div>
									<a href="/ideabooks/creative-outdoor-ads"><h4 class="title">Creative Outdoor Ads</h4></a>
									<p>
										Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.
									</p>
									<h6 class="date">31st January,2018</h6>
								</div>	
							</div>
							<div class="single-blog-post item">
								<div class="thumb">
									<img class="img-fluid" src="{{ asset('frontend/img/b3.jpg') }}" alt="">
								</div>
								<div class="details">
									<div class="tags">
										<ul>
											<li>
												<a href="/ideabooks">Travel</a>
											</li>
											<li>
												<a href="/ideabooks">Life Style</a>
											</li>											
										</ul>
									</div>
									<a href="/ideabooks/its-classified-how-to-utilize-free"><h4 class="title">It's Classified How To Utilize Free</h4></a>
									<p>
										Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.
									</p>
									<h6 class="date">31st January,2018</h6>
								</div>	
							</div>	
							<div class="single-blog-post item">
								<div class="thumb">
									<img class="img-fluid" src="{{ asset('frontend/img/b1.jpg') }}" alt="">
								</div>
								<div class="details">
									<div class="tags">
										<ul>
											<li>
												<a href="/ideabooks">Travel</a>
											</li>
											<li>
												<a href="/ideabooks">Life Style</a>
											</li>											
										</ul>
									</div>
									<a href="/ideabooks/low-cost-advertising"><h4 class="title">Low Cost Advertising</h4></a>
									<p>
										Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.
									</p>
									<h6 class="date">31st January,2018</h6>
								</div>	
							</div>
							<div class="single-blog-post item">
								<div class="thumb">
									<img class="img-fluid" src="{{ asset('frontend/img/b2.jpg') }}" alt="">
								</div>
								<div class="details">
									<div class="tags">
										<ul>
											<li>
												<a href="/ideabooks">Travel</a>
											</li>
											<li>
												<a href="/ideabooks">Life Style</a>
											</li>											
										</ul>
									</div>
									<a href="/ideabooks/creative-outdoor-ads"><h4 class="title">Creative Outdoor Ads</h4></a>
									<p>
										Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.
									</p>
									<h6 class="date">31st January,2018</h6>
								</div>	
							</div>
							<div class="single-blog-post item">
								<div class="thumb">
									<img class="img-fluid" src="{{ asset('frontend/img/b3.jpg') }}" alt="">
								</div>
								<div class="details">
									<div class="tags">
										<ul>
											<li>
												<a href="/ideabooks">Travel</a>
											</li>
											<li>
												<a href="/ideabooks">Life Style</a>
											</li>											
										</ul>
									</div>
									<a href="/ideabooks/its-classified-how-to-utilize-free"><h4 class="title">It's Classified How To Utilize Free</h4></a>
									<p>
										Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.
									</p>
									<h6 class="date">31st January,2018</h6>
								</div>	
							</div>														

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