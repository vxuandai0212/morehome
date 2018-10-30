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

						</div>
					</div>
				</div>
			</section>
			<!-- End banner Area -->


			<!-- Start post-content Area -->
			<section class="post-content-area pt-90 pb-90" id="app">
				<div class="container">
					<div class="row">
						<div v-if="user.posts" class="col-lg-8 posts-list">
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
										<img class="img-fluid" src="img/blog/feature-img1.jpg" alt="">
									</div>
									<a class="posts-title" href="blog-single.html"><h3>@{{post.title}}</h3></a>
									<p class="excert">
										@{{post.short_content}}
									</p>
									<a :href="post.view_url" class="primary-btn">View More</a>
								</div>
							</div>
		                    <nav class="blog-pagination justify-content-center d-flex">
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
								<div class="single-sidebar-widget search-widget">
									<form class="search-form" action="#">
			                            <input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'" >
			                            <button type="submit"><i class="fa fa-search"></i></button>
			                        </form>
								</div>
								<div class="single-sidebar-widget user-info-widget">
									<img src={{$user->avatar_url}} alt="">
									<a href="#"><h4>{{$user->name}}</h4></a>
									<p>
										Senior blog writer
									</p>
									<ul class="social-links">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-github"></i></a></li>
										<li><a href="#"><i class="fa fa-behance"></i></a></li>
									</ul>
									<p>
									    {{$user->biography}}
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
				user.posts.map(post => post.short_content = post.description);
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
