@extends('../layouts.master')

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
    <div id="app">
        <div class="breadcrumbs">
            <div class="page-header float-left">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{ route('admin.user') }}">Users</a></li>
                        <li><a>Profiles</a></li>
                        <li class="active">@{{user_slug}}</li>
                        <li><a>Edit</a></li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-row-reverse">
                            <div class="p-2"></div>
                            <div v-if="!loading" class="p-2">
                                <el-button type="primary" @click="update()">Update</el-button>
                            </div>
                            <div v-else class="p-2">
                                <el-button disabled type="primary">Updating</el-button>
                            </div>
                            <div class="p-2"><el-button type="default" @click="go_users()">Back</el-button></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <el-form ref="form" :model="user" label-width="120px">
                            <el-form-item label="Name">
                                <el-input v-model="user.name"></el-input>
                            </el-form-item>
                            <el-form-item label="Email">
                                <el-input v-model="user.email"></el-input>
                            </el-form-item>
                            <el-form-item label="First Name">
                                <el-input v-model="user.first_name"></el-input>
                            </el-form-item>
                            <el-form-item label="Middle Name">
                                <el-input v-model="user.middle_name"></el-input>
                            </el-form-item>
                            <el-form-item label="Last Name">
                                <el-input v-model="user.last_name"></el-input>
                            </el-form-item>
                            <el-form-item label="Biography">
                                <el-input type="textarea" v-model="user.biography"></el-input>
                            </el-form-item>
                            <el-form-item label="Avatar">
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
                            <el-form-item label="Contact">
                                <el-input v-model="user.phonenumber"></el-input>
                            </el-form-item>
                            <el-form-item label="Address">
                                <el-input v-model="user.address"></el-input>
                            </el-form-item>
                            <el-form-item label="Role">
                                <el-select v-model="user.role_id">
                                    <el-option v-for="role in roles"
                                        :key="role.id"
                                        :label="role.name"
                                        :value="role.id">
                                    </el-option>
                                </el-select>
                            </el-form-item>
                            <el-form-item label="Authorized">
                                <el-switch v-model="user.status"></el-switch>
                            </el-form-item>
                        </el-form>
                    </div>
                </div>
            </div><!-- .animated -->
        </div>
    </div>
@endsection

@section('script')
<script src="{{ asset('assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/element-ui/lib/index.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/element-ui/2.4.7/locale/en.js"></script>
<script>
    ELEMENT.locale(ELEMENT.lang.en)
</script>
<script>
    var app = new Vue({
      el: '#app',
      mounted: function() {
       this.init();
      },
      data: function() {
        return {
            user: {},
            user_slug: `{{$user_slug}}`,
            user_id: `{{$user_id}}`,
            image: '',
            image_is_new: false,
            roles: [],
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
            //get all roles
            axios.get(`/api/roles`)
            .then(function (response) {
                var roles = response.data;
                com.roles = roles;
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
        go_users() {
            window.location.href = `/users`;
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
                setTimeout(function(){
                    location = `/users`
                },2000)
            })
            .catch(function (error) {
                console.log(error);
            });
        }
      }
    })
</script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

@endsection