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
<!-- login -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/login_v4/vendor/bootstrap/css/bootstrap.min.css') }}">
	
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/login_v4/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/login_v4/fonts/iconic/css/material-design-iconic-font.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/login_v4/vendor/animate/animate.css') }}">
	
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/login_v4/vendor/css-hamburgers/hamburgers.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/login_v4/vendor/animsition/css/animsition.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/login_v4/vendor/select2/select2.min.css') }}">
	
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/login_v4/vendor/daterangepicker/daterangepicker.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/login_v4/css/util.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/login_v4/css/main.css') }}">
@endsection

@section('content')
		<div id="app">
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="limiter">
							<div class="container-login100">
								<div class="wrap-login100 p-l-55 p-r-55 p-t-40 p-b-30">
									<form class="login100-form validate-form" onSubmit="event.preventDefault();">
										<span class="login100-form-title p-b-49">
											Đăng nhập
										</span>

										<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
											<span class="label-input100">Tên đăng nhập</span>
											<input v-model="login_form.username" class="input100" type="text" name="username" placeholder="Tên đăng nhập">
											<span class="focus-input100" data-symbol="&#xf206;"></span>
										</div>

										<div class="wrap-input100 validate-input" data-validate="Password is required">
											<span class="label-input100">Mật khẩu</span>
											<input v-model="login_form.password" class="input100" type="password" name="pass" placeholder="Mật khẩu">
											<span class="focus-input100" data-symbol="&#xf190;"></span>
										</div>
										
										<div class="text-right p-t-8 p-b-31">
											
										</div>
										
										<div class="container-login100-form-btn">
											<div class="wrap-login100-form-btn">
												<div class="login100-form-bgbtn"></div>
												<button @click="login" class="login100-form-btn">
													Đăng nhập
												</button>
											</div>
										</div>

										<div class="flex-col-c p-t-55">
											<a href="{{route('register')}}" class="txt2">
												Đăng kí
											</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- start banner Area -->
			@if ($post->thumbnail_url == null)
			<section class="banner-area relative" id="home">	
			@else
			<section style="background: url({{$post->thumbnail_url}});background-size: cover;" class="banner-area relative" id="home">	
			@endif
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Tư vấn nội thất nhà đẹp	
							</h1>	
							<p class="text-white link-nav">
								<a href="{{ route('home') }}">Trang chủ </a><span class="lnr lnr-arrow-right"></span>
								<a href="{{ route('advices') }}">Tư vấn </a> <span class="lnr lnr-arrow-right"></span> 
								<a href="{{$post->view_url}}"> {{$post->title}}</a>
							</p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->					  
			
			<!-- Start post-content Area -->
			<section class="post-content-area single-post-area">
				<div class="container">
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
									<div class="mt-30">
										@foreach($post->tags as $tag)
											<el-tag type="info">{{$tag->name}}</el-tag>
										@endforeach
										<div class="mt-10 mb-10">
											<i v-if="post.current_user_has_like && post.current_user_has_like.length != 0" :style="red" @click="unlike" class="fa fa-heart"></i>@{{post.likes_count}}
											<i v-else @click="like" class="fa fa-heart"></i>&nbsp;@{{post.likes_count}}
											&nbsp;
											<i v-if="post.current_user_has_bookmark && post.current_user_has_bookmark.length != 0" :style="blue" @click="unbookmark" class="fa fa-bookmark"></i>@{{post.bookmarks_count}}
											<i v-else @click="bookmark" class="fa fa-bookmark"></i>&nbsp;@{{post.bookmarks_count}}
										</div>
										<template v-if="post.current_user_rate && post.current_user_rate.length != 0">
											<span class="demonstration">Đánh giá của bạn</span>
											<el-rate
												v-model="post.current_user_rate[0].rate" allow-half @change="update_rate"
												:colors="['#99A9BF', '#F7BA2A', '#FF9900']">
											</el-rate>
										</template>
										<template v-else>
											<span class="demonstration">Đánh giá bài viết</span>
											<el-rate
												v-model="user_rate" allow-half @change="create_rate"
												:colors="['#99A9BF', '#F7BA2A', '#FF9900']">
											</el-rate>
										</template>
										</br>
										<span>Đánh giá:	&nbsp;@{{post.avg_rate}}</span>
									</div>
								</div>
							</div>
							<div class="navigation-area">
								<div class="row">
									<div v-if="post.previous_post" class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
										<div class="thumb">
											<a v-if="post.previous_post && post.previous_post.avatar_url != ''" :href="post.previous_post.view_url"><img style="width:60px;height:60px;" :src="post.previous_post.avatar_url" alt=""></a>
											<a v-else :href="post.previous_post.view_url"><img class="img-fluid" src="/images/user/no-avatar-user.png" alt=""></a>
										</div>
										<div class="arrow">
											<a :href="post.previous_post.view_url"><span class="lnr text-white lnr-arrow-left"></span></a>
										</div>
										<div class="detials">
											<p>Bài viết trước</p>
											<a :href="post.previous_post.view_url"><h5>@{{post.previous_post.title}}</h5></a>
										</div>
									</div>
									<div v-if="post.next_post" class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
										<div class="detials">
											<p>Bài viết tiếp theo</p>
											<a :href="post.next_post.view_url"><h5>@{{post.next_post.title}}</h5></a>
										</div>
										<div class="arrow">
											<a :href="post.next_post.view_url"><span class="lnr text-white lnr-arrow-right"></span></a>
										</div>
										<div class="thumb">
											<a v-if="post.next_post && post.next_post.avatar_url != ''" :href="post.next_post.view_url"><img style="width:60px;height:60px;" :src="post.next_post.avatar_url" alt=""></a>
											<a v-else :href="post.next_post.view_url"><img class="img-fluid" src="/images/user/no-avatar-user.png" alt=""></a>
										</div>										
									</div>									
								</div>
							</div>
							<div class="comments-area">
								<div class="comment-list">
									<div style="border-bottom:1px solid #eee;" class="single-comment justify-content-between d-flex">
										<div class="user justify-content-between d-flex">
											<div class="thumb">
												@if (Auth::check())
													@if (Auth::user()->avatar_url != null)
														<img style="width: 60px;height: 60px;" src="{{Auth::user()->avatar_url}}" alt="{{Auth::user()->name}}">
													@else
														<img style="width: 60px;height: 60px;" src="/images/user/no-avatar-user.png" alt="Default avatar">
													@endif
												@else
												<img style="width: 60px;height: 60px;" src="/images/user/no-avatar-user.png" alt="Default avatar">
												@endif
											</div>
											<div class="desc">
												<div class="form-group">
													<textarea class="form-control mb-10" v-model="comment_form" placeholder="Bình luận" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Bình luận'" required=""></textarea>
												</div>
											</div>
										</div>
										<div style="min-width: 110px;" class="reply-btn">
											<a v-if="comment_form.trim() === ''" class="btn-reply text-uppercase">Đăng</a> 
											<a v-else @click="post_comment" class="btn-reply text-uppercase">Đăng</a> 
										</div>
									</div>
								</div>   
								<!-- commemt -->
								<comment v-for="comment in comments" :key="comment.id" :comment="comment" :post_id="post_id"></comment>
								<div v-if="!load_all_cmts" class="text-center" ><a style="cursor:pointer;" @click="load_more_cmt">Xem các bình luận trước</a></div>
							</div>
						</div>
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
								<div class="single-sidebar-widget user-info-widget">
									<img style="width: 120px;height: 120px;border-radius: 50%;"
										 v-if="post.author && post.author.avatar_url != null" 
										 :src="post.author.avatar_url" alt="">
									<img v-else style="width: 120px;height: 120px;border-radius: 50%;" src="/images/user/no-avatar-user.png" alt="Default avatar">
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
									<p v-if="post.author.biography != null">
										@{{post.author.biography}}
									</p>
								</div>
								<div class="single-sidebar-widget popular-post-widget">
									<h4 class="popular-title">Xem nhiều</h4>
									<div class="popular-post-list">
										<div v-for="post_item in post.top_four" class="single-post-list d-flex flex-row align-items-center">
											<div class="thumb">
												<img v-if="post_item.thumbnail_url" 
													 style="width:100px;height:60px;" 
													 :src="post_item.thumbnail_url" alt="post_item.title">
												<img v-else style="width:100px;height:60px;" src="{{ asset('frontend/img/blog/pp1.jpg') }}" alt="">
											</div>
											<div class="details">
												<a :href="post_item.view_url"><h6>@{{post_item.title}}</h6></a>
												<p>@{{post_item.created_at}}</p>
											</div>
										</div>														
									</div>
								</div>
								<div class="single-sidebar-widget tag-cloud-widget">
									<h4 class="tagcloud-title">Tags</h4>
									<ul>
										<li v-for="tag_item in tags">
											<a :href=`/${post.category}?tag=${tag_item.name}`>@{{tag_item.name}}</a>
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
<script src="https://unpkg.com/element-ui/lib/index.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/element-ui/2.4.7/locale/en.js"></script>
<script>
	Vue.component('comment', {
		props: ['comment','post_id'],
		data: function () {
			return {
				reply_box: false,
				replies: [],
				reply_limit: 1,
				reply_cmt_form: '',
			}
		},
		methods: {
			load_reply(id) {
				var com = this;
				axios.get('/api/comments/replies', {params: {
					parent_comment_id: id,limit:com.reply_limit,offset:com.replies.length
				}})
				.then(function (response) {
					com.replies = [...com.replies,...response.data[0]];
				})
				.catch(function (error) {
					console.log(error);
				});
			},
			post_reply(cmt_id, post_id) {
				var com = this;
				axios.post('/api/comments', {
					comment_content: com.reply_cmt_form, post_id: post_id, parent_comment_id: cmt_id
				})
				.then(function (response) {
					com.handle_reply(cmt_id);
					com.reply_cmt_form = '';
				})
				.catch(function (error) {
					if (error.response.status === 401) {
						$('#myModal').modal('show');
					}
					if (error.response.status === 403) {
						com.$notify.error({
							title: 'Error',
							message: error.response.data.message
						});
					}
					console.log(error);
				});
			},
			handle_reply(id) {
				var com = this;
				axios.get('/api/comments/replies', {params: {
					parent_comment_id: id
				}})
				.then(function (response) {
					com.replies = response.data[0];
					com.reply_box = true;
				})
				.catch(function (error) {
					console.log(error);
				});
			}
		},
		template: `
		<div class="mt-20 mb-20">
			<div class="comment-list">
				<div class="single-comment justify-content-between d-flex">
					<div class="user justify-content-between d-flex">
						<div class="thumb">
							<img style="width: 60px;height: 60px;" v-if="comment.users[0].avatar_url" :src="comment.users[0].avatar_url" alt="comment.users[0].name">
							<img style="width: 60px;height: 60px;" v-else src="{{ asset('images/user/no-avatar-user.png') }}" alt="Default avatar">
						</div>
						<div class="desc">
							<h5><a href="#">@{{comment.users[0].name}}</a></h5>
							<p class="date">@{{comment.created_at}}</p>
							<p class="comment">
								@{{comment.content}}
							</p>
						</div>
					</div>
					<div style="min-width: 110px;" class="reply-btn">
						<a @click="handle_reply(comment.id)" class="btn-reply text-uppercase">Trả lời</a> 
					</div>
				</div>
				<template v-if="replies.length != 0">
					<reply @open_reply="handle_reply(comment.id)" v-for="reply in replies" :key="reply.id" :reply="reply"></reply>
				</template>
				<div v-if="comment.replies_count != 0 && comment.replies_count > replies.length" class="comment-list left-padding">
					<a @click="load_reply(comment.id)" style="cursor:pointer;"><i style="transform: rotate(180deg);" class="fa fa-reply"></i> Xem @{{comment.replies_count-replies.length}} câu trả lời</a>
				</div>
			</div>
			<div v-if="reply_box" class="comment-list left-padding">
				<div class="single-comment justify-content-between d-flex">
					<div class="user justify-content-between d-flex">
						<div class="thumb">
							@if (Auth::check())
								@if (Auth::user()->avatar_url == null)
									<img style="width: 60px;height: 60px;" src="/images/user/no-avatar-user.png" alt="Default avatar">
								@else
									<img style="width: 60px;height: 60px;" src="{{Auth::user()->avatar_url}}" alt="{{Auth::user()->name}}">
								@endif
							@else
								<img style="width: 60px;height: 60px;" src="/images/user/no-avatar-user.png" alt="Default avatar">
							@endif
						</div>
						<div class="desc">
							<div class="form-group">
								<textarea class="form-control mb-10" v-model="reply_cmt_form" placeholder="Bình luận" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Bình luận'" required=""></textarea>
							</div>
						</div>
					</div>
					<div style="min-width: 110px;" class="reply-btn">
						<a v-if="reply_cmt_form.trim() === ''" class="btn-reply text-uppercase">Trả lời</a> 
						<a v-else @click="post_reply(comment.id, post_id)" class="btn-reply text-uppercase">Trả lời</a> 
					</div>
				</div>
			</div>
		</div>
		`
	})

	Vue.component('reply', {
		props: ['reply'],
		data: function () {
			return {
				
			}
		},
		methods: {
			
		},
		template: `
		<div class="mt-20 mb-20">
			<div class="comment-list left-padding">
				<div class="single-comment justify-content-between d-flex">
					<div class="user justify-content-between d-flex">
						<div class="thumb">
							<img style="width: 60px;height: 60px;" v-if="reply.users[0].avatar_url" :src="reply.users[0].avatar_url" alt="reply.users[0].name">
							<img style="width: 60px;height: 60px;" v-else src="{{ asset('images/user/no-avatar-user.png') }}" alt="Default avatar">
						</div>
						<div class="desc">
							<h5><a href="#">@{{reply.users[0].name}}</a></h5>
							<p class="date">@{{reply.created_at}}</p>
							<p class="comment">
								@{{reply.content}}
							</p>
						</div>
					</div>
					<div style="min-width: 110px;" class="reply-btn">
						<a @click="$emit('open_reply')" class="btn-reply text-uppercase">Trả lời</a> 
					</div>
				</div>
			</div>
		</div>
		`
	})

	$( document ).ready(function() {
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
				login_form: {
					username: '',
					password: ''
				},
				comments: [],
				load_all_cmts: false,
				comment_limit: 5
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

					axios.get(`/api/comments/post`, {params: {post_id: com.post_id, limit: com.comment_limit}})
					.then(function (response) {
						com.comments = response.data[0];
						if (response.data[1] == com.comments.length) com.load_all_cmts = true;
					})
					.catch(function (error) {
						console.log(error);
					});
				},
				post_comment() {
					var com = this;
					axios.post('/api/comments', {comment_content: com.comment_form, post_id: com.post_id})
					.then(function (response) {
						com.load_new_cmt();
						com.comment_form = '';
					})
					.catch(function (error) {
						if (error.response.status === 401) {
							$('#myModal').modal('show');
						}
						if (error.response.status === 403) {
							com.$notify.error({
								title: 'Error',
								message: error.response.data.message
							});
						}
						console.log(error);
					});
				},
				load_new_cmt() {
					var com = this;
					axios.get(`/api/comments/post`, {params: {post_id: com.post_id, limit: 1}})
					.then(function (response) {
						com.comments = [...response.data[0],...com.comments];
					})
					.catch(function (error) {
						console.log(error);
					});
				},
				visibleReplyBox(comment_id) {
					this.reply_parent_id = comment_id;
				},
				like() {
					var com = this;
					axios.post('/api/likes', {post_id: com.post_id})
					.then(function (response) {
						com.init();
					})
					.catch(function (error) {
						if (error.response.status === 401) {
							$('#myModal').modal('show');
						}
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
						if (error.response.status === 401) {
							$('#myModal').modal('show');
						}
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
						if (error.response.status === 401) {
							$('#myModal').modal('show');
						}
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
				},
				login() {
					if (this.login_form.username.trim() === '' &&
						this.login_form.password.trim() === ''
					) {
						return this.$notify({
							title: 'Warning',
							message: 'Vui lòng điền tên đăng nhập và mật khẩu.',
							type: 'warning'
						});
					}
					var com = this;
					axios.post('/login', {
						username: com.login_form.username, 
						password: com.login_form.password})
					.then(function (response) {
						location.reload()
					})
					.catch(function (error) {
						return com.$notify({
							title: 'Warning',
							message: 'Tài khoản không tồn tại.',
							type: 'warning'
						});
						console.log(error);
					});
				},
				load_more_cmt() {
					var com = this;
					axios.get(`/api/comments/post`, {params: {post_id: com.post_id, limit:com.comment_limit, offset:com.comments.length}})
					.then(function (response) {
						com.comments = [...com.comments,...response.data[0]];
						if (response.data[1] == com.comments.length) com.load_all_cmts = true;
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