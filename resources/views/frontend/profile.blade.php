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


@section('css')
<!-- element_ui_css -->
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
<!-- end_element_ui_css -->
<style>
.avatar-upload {
  position: relative;
  max-width: 205px;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 10px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "";
  font-family: "FontAwesome";
  color: #757575;
  position: absolute;
  top: 0px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
  width: 192px;
  height: 192px;
  position: relative;
  border-radius: 100%;
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}
</style>
@endsection

@section('content')
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
                            <h1 class="text-white">
								Cập nhật thông tin
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
						<div style="width:100%;" class="card">
							<div class="card-header">
								<div class="d-flex flex-row-reverse">
									<div class="p-2"></div>
									<div v-if="!loading" class="p-2">
										<el-button type="primary" @click="update()">Cập nhật</el-button>
									</div>
									<div v-else class="p-2">
										<el-button disabled type="primary">Đang cập nhật</el-button>
									</div>
								</div>
							</div>
							<div class="card-body">
								<el-form ref="form" :model="user" label-width="120px">
									<el-form-item label="Tên sử dụng">
										<el-input v-model="user.name"></el-input>
									</el-form-item>
									<el-form-item label="Email">
										<el-input v-model="user.email"></el-input>
									</el-form-item>
									<el-form-item label="Tên">
										<el-input v-model="user.first_name"></el-input>
									</el-form-item>
									<el-form-item label="Tên đệm">
										<el-input v-model="user.middle_name"></el-input>
									</el-form-item>
									<el-form-item label="Họ">
										<el-input v-model="user.last_name"></el-input>
									</el-form-item>
									<el-form-item label="Giới thiệu">
										<el-input type="textarea" v-model="user.biography"></el-input>
									</el-form-item>
									<el-form-item label="Ảnh đại diện">
										<div class="container">
											<div class="avatar-upload">
												<div class="avatar-edit">
													<input type='file' id="imageUpload" @change="onImageChange" accept=".png, .jpg, .jpeg" />
													<label for="imageUpload"></label>
												</div>
												<div class="avatar-preview" v-if="user.avatar_url">
													<div id="imagePreview" :style="{backgroundImage: 'url(' + user.avatar_url + ')'}">
													</div>
												</div>
												<div class="avatar-preview" v-else>
													<div id="imagePreview" style="background-image: url(/images/user/no-avatar-user.png);">
													</div>
												</div>
											</div>
										</div>
									</el-form-item>
									<el-form-item label="Số điện thoại">
										<el-input v-model="user.phonenumber"></el-input>
									</el-form-item>
									<el-form-item label="Địa chỉ nhà">
										<el-input v-model="user.address"></el-input>
									</el-form-item>
								</el-form>
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
<script src="https://unpkg.com/element-ui/lib/index.js"></script>
<script>
    var app = new Vue({
      el: '#app',
      mounted: function() {
       this.init();
      },
      data: function() {
        return {
            user: {},
            user_slug: `{{$user->slug}}`,
            user_id: `{{$user->id}}`,
            image: '',
            image_is_new: false,
            loading: false
        }
      },
      methods: {
        init() {
            var com = this;
            //get user
            axios.get(`/api/users/${com.user_id}`)
            .then(function (response) {
                var user = response.data;
                user.status == 1 ? user.status = true : user.status = false;
                com.user = user;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        onImageChange(e) {
            this.image_is_new = true;
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
        },
        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.image = e.target.result;
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            };
            reader.readAsDataURL(file);
        },
        update() { 
            var com = this;
            com.loading = true;
            axios.put(`/api/users/${com.user_slug}`, {user: com.user, image: com.image, image_is_new: com.image_is_new})
            .then(function (response) {
                com.$notify({
                    title: 'Success',
                    message: 'Successful update user',
                    type: 'success'
                });
                com.loading = false;
                com.init();
            })
            .catch(function (error) {
                console.log(error);
            });
        }
      }
    })
</script>
@endsection
