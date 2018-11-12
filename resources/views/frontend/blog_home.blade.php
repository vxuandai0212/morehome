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
<title>Morehome</title>
@endsection

@section('css')
<style>
a:hover {
 cursor:pointer;
}
</style>
@endsection

@section('content')
		<div id="app">
			<!-- start banner Area -->
			<section style="padding: 165px 0;" class="banner-area relative blog-home-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content blog-header-content col-lg-12">
							<h1 class="text-white">
								{{$banner}}
							</h1>	
							<p class="text-white">
								{{$desc}}
							</p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->			

			<!-- Start blog Area -->
			<section style="padding-top:120px;" class="blog-area">
				<div class="container">							
					<div class="row">
						<div class="active-blog-carusel">
							<!-- 6 bài random thuộc category_name-->
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
			
			<!-- Start post-content Area -->
			<section class="post-content-area pt-90">
				<div class="container">
					<div class="row">
						<div v-if="posts.length != 0" class="col-lg-8 posts-list">
							<div v-for="post in posts" class="single-post row">
								<div class="col-lg-3  col-md-3 meta-details">
									<ul v-if="post.tags" class="tags">
										<li v-for="(tag, index) in post.tags">
											<a :href=`/{{$category}}?tag=${tag.name}` v-if="index !== post.tags.length - 1">@{{tag.name}}, </a>
											<a :href=`/{{$category}}?tag=${tag.name}` v-else>@{{tag.name}}</a>
										</li>
									</ul>
									<div class="user-details row">
										<p class="user-name col-lg-12 col-md-12 col-6"><a>@{{post.author.name}}</a> <span class="lnr lnr-user"></span></p>
										<p class="date col-lg-12 col-md-12 col-6"><a>@{{post.created_at}}</a> <span class="lnr lnr-calendar-full"></span></p>
										<p class="view col-lg-12 col-md-12 col-6"><a>@{{post.view_count}} Views</a> <span class="lnr lnr-eye"></span></p>
										<p class="comments col-lg-12 col-md-12 col-6"><a>@{{post.comments_count}} Comments</a> <span class="lnr lnr-bubble"></span></p>						
									</div>
								</div>
								<div class="col-lg-9 col-md-9 ">
									<div class="feature-img">
										<img v-if="!post.thumbnail_url" class="img-fluid" src="{{ asset('frontend/img/blog/feature-img1.jpg') }}" alt="">
										<img v-else class="img-fluid" :src="post.thumbnail_url" alt="post.title">
									</div>
									<a class="posts-title" :href="post.view_url"><h3>@{{post.title}}</h3></a>
									<p class="excert">@{{post.short_content}}</p>
									<a :href="post.view_url" class="primary-btn">Xem thêm</a>
								</div>
							</div>													
		                    <nav v-if="total_page > 1" class="blog-pagination justify-content-center d-flex">
		                        <ul class="pagination">
		                            <li class="page-item">
		                                <a @click="go_previous" class="page-link" aria-label="Previous">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-left"></span>
		                                    </span>
		                                </a>
		                            </li>
		                            <li v-for="page_num in total_page" :class="{active: current_page === page_num}" class="page-item"><a @click="page_change(page_num)" class="page-link">@{{page_num < 10 ? '0'+page_num : page_num}}</a></li>
		                            <li class="page-item">
		                                <a @click="go_next" class="page-link" aria-label="Next">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-right"></span>
		                                    </span>
		                                </a>
		                            </li>
		                        </ul>
		                    </nav>
						</div>
						<div v-else class="col-lg-8 posts-list">
							<h1>Không có bài viết nào.</h1>
						</div>
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
								<div class="single-sidebar-widget popular-post-widget">
									<h4 class="popular-title">Xem nhiều</h4>
									<div class="popular-post-list" v-if="posts[0]">
										<div v-for="popular_post in posts[0].top_four" class="single-post-list d-flex flex-row align-items-center">
											<div style="width:35%;" class="thumb">
												<img style="width:100px;height:60px;" v-if="popular_post.thumbnail_url" class="img-fluid" :src="popular_post.thumbnail_url" alt="popular_post.title">
												<img style="width:100px;height:60px;" v-else class="img-fluid" src="{{ asset('frontend/img/blog/pp1.jpg') }}" alt="">
											</div>
											<div style="width:65%;" class="details">
												<a :href="popular_post.view_url"><h6>@{{popular_post.title}}</h6></a>
												<p>@{{popular_post.created_at}}</p>
											</div>
										</div>														
									</div>
								</div>
								<div class="single-sidebar-widget tag-cloud-widget">
									<h4 class="tagcloud-title">Tags</h4>
									<ul>
										<li v-for="tag in tags">
										<a :href=`/{{$category}}?tag=${tag.name}`>@{{tag.name}}</a>
										</li>
									</ul>
								</div>								
							</div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->
		</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script>
		var app = new Vue({
			el: '#app',
			created: function() {
				this.init();

				var com = this;

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
				filter_tag: `{{$filter_tag}}`,
				posts: [],
				limit: 5,
				current_page: 1,
				tags: [],
				total_posts: null,
			},
			computed: {
				total_page: function(){return Math.ceil(this.total_posts/this.limit)}
			},
			methods: {
				init() {
					var com = this;
					axios.get(`/api/posts`, {params: {
						posted: true, category: com.category_name, limit: com.limit, offset: (com.current_page-1)*com.limit, tag: com.filter_tag
					}})
					.then(function (response) {
						com.posts = response.data[0];
						com.total_posts = response.data[1];
					})
					.catch(function (error) {
						console.log(error);
					});
				},
				go_previous() {
					var com = this;
					var pre = com.current_page - 1;
					if (pre > 0) {
						com.current_page = pre;
						com.init();
					}
				},
				go_next() {
					var com = this;
					var next = com.current_page + 1;
					if (next <= com.total_page) {
						com.current_page = next;
						com.init();
					}
				},
				page_change(page) {
					this.current_page = page;
					this.init();
				}
			}
		})
    
</script>
@endsection