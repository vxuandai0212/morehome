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
			<section :style="'background: url('+post.thumbnail_url+')'" style="background-size: cover;" class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								@{{post.title}}				
							</h1>	 
							<p class="text-white link-nav"><a href="{{route('home')}}">Trang chủ </a>  <span class="lnr lnr-arrow-right"></span>  <a :href="post.view_url"> @{{post.title}}</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start project-details Area -->
			<section class="project-details-area">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-12 project-desc mt-60">
							<div v-html="post.content"></div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End project-details Area -->

			<div class="container">
				<div class="section-top-border">
					@if (count($photos) > 0)
					<div class="row gallery-item">
						@foreach ($photos as $photo)
						<div class="col-md-4">
							<a href="{{$photo->image_url}}" class="img-gal"><div class="single-gallery-image" style="background: url({{$photo->image_url}});"></div></a>
						</div>
						@endforeach
					</div>
					@endif
				</div>
			</div>

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