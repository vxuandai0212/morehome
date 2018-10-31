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
			<section class="banner-area relative blog-home-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content blog-header-content col-lg-12">
							<h1 class="text-white">
								Dude You’re Getting
								a Telescope				
							</h1>	
							<p class="text-white">
								There is a moment in the life of any aspiring astronomer that it is time to buy that first
							</p>
							<a href="#" class="primary-btn">View More</a>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->				  
			
			<!-- Start post-content Area -->
			<section class="post-content-area pt-90" id="app">
				<div class="container">
					<div class="row">
						<div v-if="posts" class="col-lg-8 posts-list">
							<div v-for="post in posts" class="single-post row">
								<div class="col-lg-3  col-md-3 meta-details">
									<ul v-if="post.tags" class="tags">
										<li v-for="(tag, index) in post.tags">
											<a href="#" v-if="index == post.tags.length - 1">@{{tag.name}},</a>
											<a href="#" v-else>@{{tag.name}}</a>
										</li>
									</ul>
									<div class="user-details row">
										<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">@{{post.author.name}}</a> <span class="lnr lnr-user"></span></p>
										<p class="date col-lg-12 col-md-12 col-6"><a href="#">@{{post.created_at}}</a> <span class="lnr lnr-calendar-full"></span></p>
										<p class="view col-lg-12 col-md-12 col-6"><a href="#">@{{post.view_count}} Views</a> <span class="lnr lnr-eye"></span></p>
										<p class="comments col-lg-12 col-md-12 col-6"><a href="#">@{{post.comments_count}} Comments</a> <span class="lnr lnr-bubble"></span></p>						
									</div>
								</div>
								<div class="col-lg-9 col-md-9 ">
									<div class="feature-img">
										<img v-if="!post.thumbnail_url" class="img-fluid" src="{{ asset('frontend/img/blog/feature-img1.jpg') }}" alt="">
										<img v-else class="img-fluid" :src="post.thumbnail_url" alt="post.title">
									</div>
									<a class="posts-title" :href="post.view_url"><h3>@{{post.title}}</h3></a>
									<p class="excert">@{{post.short_content}}</p>
									<a :href="post.view_url" class="primary-btn">View More</a>
								</div>
							</div>													
		                    <nav class="blog-pagination justify-content-center d-flex">
								<el-pagination
									background
									layout="prev, pager, next"
									:total="1000">
								</el-pagination>
		                        <ul class="pagination">
		                            <li class="page-item">
		                                <a href="#" class="page-link" aria-label="Previous">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-left"></span>
		                                    </span>
		                                </a>
		                            </li>
		                            <li class="page-item active"><a href="#" class="page-link">01</a></li>
		                            <li class="page-item"><a href="#" class="page-link">02</a></li>
		                            <li class="page-item"><a href="#" class="page-link">03</a></li>
		                            <li class="page-item"><a href="#" class="page-link">04</a></li>
		                            <li class="page-item"><a href="#" class="page-link">09</a></li>
		                            <li class="page-item">
		                                <a href="#" class="page-link" aria-label="Next">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-right"></span>
		                                    </span>
		                                </a>
		                            </li>
		                        </ul>
		                    </nav>
						</div>
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
								<div class="single-sidebar-widget popular-post-widget">
									<h4 class="popular-title">Popular Posts</h4>
									<div class="popular-post-list" v-if="posts[0]">
										<div v-for="popular_post in posts[0].top_four" class="single-post-list d-flex flex-row align-items-center">
											<div class="thumb">
												<img class="img-fluid" src="{{ asset('frontend/img/blog/pp1.jpg') }}" alt="">
											</div>
											<div class="details">
												<a :href="popular_post.view_url"><h6>@{{popular_post.title}}</h6></a>
												<p>@{{popular_post.created_at}}</p>
											</div>
										</div>														
									</div>
								</div>
								<div class="single-sidebar-widget post-category-widget">
									<h4 class="category-title">Post Catgories</h4>
									<ul class="cat-list">
										<li v-for="category in categories">
											<a href="#" class="d-flex justify-content-between">
												<p>@{{category.name}}</p>
												<p>37</p>
											</a>
										</li>													
									</ul>
								</div>	
								<div class="single-sidebar-widget tag-cloud-widget">
									<h4 class="tagcloud-title">Tag Clouds</h4>
									<ul>
										<li v-for="tag in tags"><a href="#">@{{tag.name}}</a></li>
									</ul>
								</div>								
							</div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->
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

				var com = this;

				axios.get('/api/categories')
				.then(function (response) {
					com.categories = response.data;
				})
				.catch(function (error) {
					console.log(error);
				});

				axios.get('/api/tags')
				.then(function (response) {
					com.tags = response.data;
				})
				.catch(function (error) {
					console.log(error);
				});

			},
			data: {
				category_name: `{{$category}}`,
				posts: [],
				limit: 5,
				current_page: 1,
				tags: [],
				categories: []
			},
			methods: {
				init() {
					var com = this;
					axios.get(`/api/posts`, {params: {category: com.category_name, limit: com.limit, offset: (com.current_page-1)*com.limit}})
					.then(function (response) {
						com.posts = response.data[0];
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