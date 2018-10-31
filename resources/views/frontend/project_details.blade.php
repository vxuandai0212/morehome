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
		<div id="app">
            <!-- start banner Area -->
            <section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								@{{post.title}}				
							</h1>	 
							<p class="text-white link-nav"><a href="{{route('home')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a :href="post.view_url"> @{{post.title}}</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start project-details Area -->
			<section class="project-details-area section-gap">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6 project-details-left">
							<img v-if="post.thumbnail_url" class="img-fluid" :src="post.thumbnail_url" alt="post.title">
							<img v-else class="img-fluid" src="{{ asset('frontend/img/project-details.jpg') }}" alt="">
						</div>
						<div class="col-lg-6 project-details-right">
							<h3 class="pb-20">@{{post.title}}</h3>
							<p>@{{post.description}}</p>
							<div class="details-info d-flex flex-row">
								<ul class="names">
									<li>Rating    </li>
									<li>Client    </li>
									<li>Website   </li>
									<li>Completed </li>
								</ul>
								<ul class="desc">
									<li>
										<div class="star">
											: <span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star"></span>								
										</div>	
									</li>
									<li>: Envato</li>
									<li>: Themeforest.net</li>
									<li>: 17 Aug 1028</li>
								</ul>							
							</div>	
							<div class="social-links mt-30">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-dribbble"></i></a>
								<a href="#"><i class="fa fa-behance"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
							</div>														
						</div>
						<div class="col-lg-12 project-desc mt-60">
							<div v-html="post.content"></div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End project-details Area -->

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
		</div>	
@endsection

@section('script')
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
				post_id: `{{$post_id}}`,
				post: {}
			},
			methods: {
				init() {
					var com = this;
					axios.get(`/api/posts/${com.post_id}`)
					.then(function (response) {
						com.post = response.data;
					})
					.catch(function (error) {
						console.log(error);
					});
				},
			}
		})
    });
</script>
@endsection