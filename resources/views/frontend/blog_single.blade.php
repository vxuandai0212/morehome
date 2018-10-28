@extends('../layouts.frontend')

@section('meta_author')
<meta name="author" content="{{$post->created_by}}">
@endsection

@section('meta_description')
<meta name="description" content="{{$post->description}}">
@endsection

@section('meta_keywords')
<meta name="keywords" content="{{$post->keywords}}">
@endsection

@section('title')
<title>{{$post->title}}</title>
@endsection

@section('css')
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
@endsection

@section('content')
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Ideabooks And Advices		
							</h1>	
							<p class="text-white link-nav">
								<a href="{{ route('home') }}">Home </a><span class="lnr lnr-arrow-right"></span>
								<a href="{{ route('advices') }}">Advice </a> <span class="lnr lnr-arrow-right"></span> 
								<a href="{{$post->view_url}}"> {{$post->title}}</a>
							</p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->					  
			
			<!-- Start post-content Area -->
			<section class="post-content-area single-post-area">
				<div class="container" id="app">
					<div class="row">
						<div class="col-lg-8 posts-list">
							<div class="single-post row">
								<div class="col-lg-12  col-md-12 meta-details">
									<a class="posts-title" href="#"><h3>{{$post->title}}</h3></a>
									<div class="user-details row">
										<ul class="social-links col-lg-12 col-md-12 d-flex justify-content-between">
											<li class="user-name"><a>{{$post->created_by}}</a> <span class="lnr lnr-user"></span></li>
											<li class="date"><a>{{$post->created_at}}</a> <span class="lnr lnr-calendar-full"></span></li>
											<li class="view"><a>{{$post->view_count}}</a> <span class="lnr lnr-eye"></span></li>
											<li class="comments"><a>@{{post.comments_count}}</a> <span class="lnr lnr-bubble"></span></li>
										</ul>
										<ul class="social-links col-lg-12 col-md-12 col-6">
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-github"></i></a></li>
											<li><a href="#"><i class="fa fa-behance"></i></a></li>
										</ul>																				
									</div>
								</div>
								<div class="col-lg-12 col-md-12">
									<div v-html="post.content"></div>
									<ul class="tags">
										@foreach($post->tags as $tag)
											@if (!$loop->last)
												<li><a href="#">{{$tag->name}}, </a></li>
											@else
												<li><a href="#">{{$tag->name}}</a></li>
											@endif
										@endforeach
									</ul>
									<i v-if="post.current_user_has_like.length" :style="red" @click="unlike" class="fa fa-heart"></i>@{{post.likes_count}}
									<i v-else @click="like" class="fa fa-heart"></i>@{{post.likes_count}}
									<i v-if="post.current_user_has_bookmark.length" :style="blue" @click="unbookmark" class="fa fa-bookmark"></i>@{{post.bookmarks_count}}
									<i v-else @click="bookmark" class="fa fa-bookmark"></i>@{{post.bookmarks_count}}
									<template v-if="post.current_user_rate.length != 0">
										<span class="demonstration">Your rating</span>
										<el-rate
											v-model="post.current_user_rate[0].rate" allow-half @change="update_rate"
											:colors="['#99A9BF', '#F7BA2A', '#FF9900']">
										</el-rate>
									</template>
									<template v-else>
										<span class="demonstration">Rate this post</span>
										<el-rate
											v-model="user_rate" allow-half @change="create_rate"
											:colors="['#99A9BF', '#F7BA2A', '#FF9900']">
										</el-rate>
									</template>
									<span>Total Rating: @{{post.avg_rate}}</span>
								</div>
							</div>
							<div class="navigation-area">
								<div class="row">
									<div v-if="post.previous_post" class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
										<div class="thumb">
											<a :href="post.previous_post.view_url"><img class="img-fluid" :src="post.previous_post.avatar_url" alt=""></a>
										</div>
										<div class="arrow">
											<a :href="post.previous_post.view_url"><span class="lnr text-white lnr-arrow-left"></span></a>
										</div>
										<div class="detials">
											<p>Prev Post</p>
											<a :href="post.previous_post.view_url"><h4>@{{post.previous_post.title}}</h4></a>
										</div>
									</div>
									<div v-if="post.next_post" class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
										<div class="detials">
											<p>Next Post</p>
											<a :href="post.next_post.view_url"><h4>@{{post.next_post.title}}</h4></a>
										</div>
										<div class="arrow">
											<a :href="post.next_post.view_url"><span class="lnr text-white lnr-arrow-right"></span></a>
										</div>
										<div class="thumb">
											<a :href="post.next_post.view_url"><img class="img-fluid" :src="post.next_post.avatar_url" alt=""></a>
										</div>										
									</div>									
								</div>
							</div>
							<div class="comments-area">
								<template v-for="comment in post.comments">
									<div class="comment-list">
										<div class="single-comment justify-content-between d-flex">
											<div class="user justify-content-between d-flex">
												<div class="thumb">
													<img src="{{ asset('frontend/img/blog/c1.jpg') }}" alt="">
												</div>
												<div class="desc">
													<h5><a href="#">@{{comment.users[0].name}}</a></h5>
													<p class="date">@{{comment.created_at}}</p>
													<p class="comment">
														@{{comment.content}}
													</p>
												</div>
											</div>
											<div class="reply-btn">
												<a @click="visibleReplyBox(comment.id)" class="btn-reply text-uppercase">reply</a> 
											</div>
										</div>
									</div>
									<template v-if="comment.replies.length">
										<div v-for="reply in comment.replies" class="comment-list left-padding">
											<div class="single-comment justify-content-between d-flex">
												<div class="user justify-content-between d-flex">
													<div class="thumb">
														<img src="{{ asset('frontend/img/blog/c2.jpg') }}" alt="">
													</div>
													<div class="desc">
														<h5><a href="#">@{{reply.users[0].name}}</a></h5>
														<p class="date">@{{reply.created_at}}</p>
														<p class="comment">
															@{{reply.content}}
														</p>
													</div>
												</div>
												<div class="reply-btn">
													<a @click="visibleReplyBox(comment.id)" class="btn-reply text-uppercase">reply</a> 
												</div>
											</div>
										</div>	
									</template>
									<div v-if="comment.id === reply_parent_id" class="comment-list left-padding">
										<div class="single-comment justify-content-between d-flex">
											<div class="user justify-content-between d-flex">
												<div class="thumb">
													<img src="{{ asset('frontend/img/blog/c2.jpg') }}" alt="">
												</div>
												<div class="desc">
													<div class="form-group">
														<textarea class="form-control mb-10" v-model="reply_form" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
													</div>
												</div>
											</div>
											<div class="reply-btn">
												<a v-if="reply_form.trim() === ''" class="btn-reply text-uppercase">reply</a> 
												<a v-else @click="post_reply" class="btn-reply text-uppercase">reply</a> 
											</div>
										</div>
									</div>
								</template>  
								<div class="comment-list">
									<div class="single-comment justify-content-between d-flex">
										<div class="user justify-content-between d-flex">
											<div class="thumb">
												<img src="{{ asset('frontend/img/blog/c1.jpg') }}" alt="">
											</div>
											<div class="desc">
												<div class="form-group">
													<textarea class="form-control mb-10" v-model="comment_form" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
												</div>
											</div>
										</div>
										<div class="reply-btn">
											<a v-if="comment_form.trim() === ''" class="btn-reply text-uppercase">comment</a> 
											<a v-else @click="post_comment" class="btn-reply text-uppercase">comment</a> 
										</div>
									</div>
								</div>                                           				
							</div>
						</div>
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
								<div class="single-sidebar-widget user-info-widget">
									<img :src="post.author.avatar_url" alt="">
									<a><h4>@{{post.author.name}}</h4></a>
									<p>
										@{{post.author.role.name}}
									</p>
									<ul class="social-links">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-github"></i></a></li>
										<li><a href="#"><i class="fa fa-behance"></i></a></li>
									</ul>
									<p>
										@{{post.author.biography}}
									</p>
								</div>
								<div class="single-sidebar-widget popular-post-widget">
									<h4 class="popular-title">Popular Posts</h4>
									<div class="popular-post-list">
										<div v-for="post_item in post.top_four" class="single-post-list d-flex flex-row align-items-center">
											<div class="details">
												<a :href="post_item.view_url"><h6>@{{post_item.title}}</h6></a>
												<p>@{{post_item.created_at}}</p>
											</div>
										</div>														
									</div>
								</div>
								<div class="single-sidebar-widget post-category-widget">
									<h4 class="category-title">Post Catgories</h4>
									<ul class="cat-list">
										<li v-for="category_item in categories">
											<a :href=`/${post.category}?category=${category_item.name}` class="d-flex justify-content-between">
												<p>@{{category_item.name}}</p>
											</a>
										</li>														
									</ul>
								</div>	
								<div class="single-sidebar-widget tag-cloud-widget">
									<h4 class="tagcloud-title">Tag Clouds</h4>
									<ul>
										<li v-for="tag_item in tags"><a :href=`/${post.category}?tag=${tag_item.name}`>@{{tag_item.name}}</a></li>
										<li><a href="#">Fashion</a></li>
										<li><a href="#">Architecture</a></li>
										<li><a href="#">Fashion</a></li>
										<li><a href="#">Food</a></li>
										<li><a href="#">Technology</a></li>
										<li><a href="#">Lifestyle</a></li>
										<li><a href="#">Art</a></li>
										<li><a href="#">Adventure</a></li>
										<li><a href="#">Food</a></li>
										<li><a href="#">Lifestyle</a></li>
										<li><a href="#">Adventure</a></li>
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
<script src="https://unpkg.com/element-ui/lib/index.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/element-ui/2.4.7/locale/en.js"></script>
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
				post_id: {{$post->id}},
				post: {},
				comment_form: '',
				reply_form: '',
				reply_parent_id: null,
				visible_reply: false,
				red: "color: red",
				blue: "color: blue",
				user_rate: null,
				tags: [],
				categories: []
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
				post_comment() {
					var com = this;
					axios.post('/api/comments', {comment_content: com.comment_form, post_id: com.post_id})
					.then(function (response) {
						com.init();
						com.comment_form = '';
					})
					.catch(function (error) {
						console.log(error);
					});
				},
				visibleReplyBox(comment_id) {
					this.reply_parent_id = comment_id;
				},
				post_reply() {
					var com = this;
					axios.post('/api/comments', {comment_content: com.reply_form, post_id: com.post_id, parent_comment_id: com.reply_parent_id})
					.then(function (response) {
						com.init();
						com.reply_form = '';
					})
					.catch(function (error) {
						console.log(error);
					});
				},
				like() {
					var com = this;
					axios.post('/api/likes', {post_id: com.post_id})
					.then(function (response) {
						com.init();
					})
					.catch(function (error) {
						console.log(error);
					});
				},
				unlike() {
					var com = this;
					axios.put(`/api/likes/${com.post.current_user_has_like[0].id}`)
					.then(function (response) {
						com.init();
					})
					.catch(function (error) {
						console.log(error);
					});
				},
				bookmark() {
					var com = this;
					axios.post('/api/bookmarks', {post_id: com.post_id})
					.then(function (response) {
						com.init();
					})
					.catch(function (error) {
						console.log(error);
					});
				},
				unbookmark() {
					var com = this;
					axios.put(`/api/bookmarks/${com.post.current_user_has_bookmark[0].id}`)
					.then(function (response) {
						com.init();
					})
					.catch(function (error) {
						console.log(error);
					});
				},
				create_rate() {
					var com = this;
					axios.post('/api/rates', {post_id: com.post_id, rate: com.user_rate})
					.then(function (response) {
						com.init();
					})
					.catch(function (error) {
						console.log(error);
					});
				},
				update_rate() {
					var com = this;
					axios.put(`/api/rates/${com.post.current_user_rate[0].id}`, {rate: com.post.current_user_rate[0].rate})
					.then(function (response) {
						com.init();
					})
					.catch(function (error) {
						console.log(error);
					});
				}
			}
		})
    });
</script>
@endsection