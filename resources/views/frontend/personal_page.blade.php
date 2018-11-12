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
<title>{{$user->name}}</title>
@endsection

@section('content')
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Trang cá nhân
							</h1>
						</div>
					</div>
				</div>
			</section>
			<!-- End banner Area -->


			<!-- Start post-content Area -->
			<section class="post-content-area pt-90 pb-90" id="app">
				<div class="container">
					<div class="row">
						<div v-if="user.posts.length != 0" class="col-lg-8 posts-list">
							<div class="pb-50 header-text text-center">
								<h1>Những bài viết mà bạn yêu thích</h1>
							</div>
							<div v-for="post in user.posts" class="single-post row">
								<div class="col-lg-3  col-md-3 meta-details">
									<ul v-if="post.tags" class="tags">
										<li v-for="tag in post.tags"><a href="#">@{{tag.name}}</a></li>
									</ul>
									<div class="user-details row">
										<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">@{{post.author.name}}</a> <span class="lnr lnr-user"></span></p>
										<p class="date col-lg-12 col-md-12 col-6"><a href="#">@{{post.created_at}}</a> <span class="lnr lnr-calendar-full"></span></p>
										<p class="view col-lg-12 col-md-12 col-6"><a href="#">@{{post.view_count}}</a> <span class="lnr lnr-eye"></span></p>
										<p class="comments col-lg-12 col-md-12 col-6"><a href="#">@{{post.comment_count}}</a> <span class="lnr lnr-bubble"></span></p>
									</div>
								</div>
								<div class="col-lg-9 col-md-9 ">
									<div class="feature-img">
										<img class="img-fluid" :src="post.thumbnail_url" alt="post.title">
									</div>
									<a class="posts-title" :href="post.view_url"><h3>@{{post.title}}</h3></a>
									<p class="excert">
										@{{post.short_content}}
									</p>
									<a :href="post.view_url" class="primary-btn">View More</a>
								</div>
							</div>
						</div>
						<div v-else class="col-lg-8 posts-list"><h1>Không có bài viết nào được bookmark.</h1></div>
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
								<div class="single-sidebar-widget user-info-widget">
									<img style="width: 120px;height: 120px;border-radius: 50%;"
										 v-if="user && user.avatar_url != null" 
										 :src="user.avatar_url" alt="">
									<img v-else style="width: 120px;height: 120px;border-radius: 50%;" src="/images/user/no-avatar-user.png" alt="Default avatar">
									<a><h4>@{{user.name}}</h4></a>
									<p>
										@{{user.role.name}}
									</p>
									<ul class="social-links">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-github"></i></a></li>
										<li><a href="#"><i class="fa fa-behance"></i></a></li>
									</ul>
									<p v-if="user.biography != null">
										@{{user.biography}}
									</p>
								</div>
							</div>

						</div>
					</div>
				</div>
			</section>
			<!-- End post-content Area -->
@endsection

@section('script')
<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script>
 var app = new Vue({
      el: '#app',
      mounted: function() {
        this.init();
      },
      data: function() {
        return {
			user_id: {{$user->id}},
            user: {},
		}
      },
      methods: {
        init() {
			var com = this;
			axios.get(`/api/users/${com.user_id}`)
            .then(function (response) {
				var user = response.data;
                com.user = user;
            })
            .catch(function (error) {
                console.log(error);
            });
		},
      }
    })
</script>
@endsection
