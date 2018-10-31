@extends('../layouts.master')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
<!-- summernote_css -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<style>
.note-editor.note-frame .note-editing-area .note-editable {
    width: 85%;
    margin: auto;
    overflow: visible!important;
}
.avatar-upload {
  position: relative;
  max-width: 80%;
  margin: auto;
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
  top: -3px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
  height: 192px;
  position: relative;
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}
</style>
<!-- end_summernote_css -->
@endsection

@section('content')
        <div class="breadcrumbs">
            <div class="page-header float-left">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Manage Posts</a></li>
                        <li class="active">{{$post->name}}</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="content mt-3" id="app">
            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-body">
                        <h4 style="margin-bottom: 10px;">{{$post->name}}</h4>
                        <h6><i>Created: {{$post->created_at}} by {{$post->created_by}}</i></h6>
                        <hr>
                        <el-form ref="form" :model="post" label-width="130px">
                            <el-form-item label="Status:">
                                <el-select v-model="post.status" placeholder="Select post status">
                                    <el-option label="Visible" value="1"></el-option>
                                    <el-option label="Hide" value="0"></el-option>
                                </el-select>
                            </el-form-item>
                            <el-form-item label="Name*">
                                <el-input v-model="post.name"></el-input>
                            </el-form-item>
                            <el-form-item label="Title">
                                <el-input v-model="post.title"></el-input>
                            </el-form-item>
                            <el-form-item label="Description">
                                <el-input type="textarea" v-model="post.description"></el-input>
                            </el-form-item>
                            <el-form-item label="Keywords">
                                <el-input type="textarea" v-model="post.keywords"></el-input>
                            </el-form-item>
                            <el-form-item label="Thumbnail">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" @change="onImageChange" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" :style="{'background-image': 'url(' + post.thumbnail_url + ')'}">
                                        </div>
                                    </div>
                                </div>
                            </el-form-item>
                            <div id="summernote_wrapper">
                                <el-form-item label="Content">
                                    <el-input type="textarea"></el-input>
                                </el-form-item>
                            </div>
                            <!-- <el-form-item label="Tags">
                                <el-select
                                    v-model="post.tags"
                                    multiple
                                    filterable
                                    allow-create
                                    default-first-option
                                    placeholder="Choose tags for your article"
                                    style="width: 50%;">
                                    <el-option
                                    v-for="item in tags"
                                    :key="item.id"
                                    :label="item.name"
                                    :value="item.id"
                                    >
                                    </el-option>
                                </el-select>
                            </el-form-item> -->
                            <!-- <el-form-item label="Category">
                                <el-select v-model="post.category" placeholder="Choose category">
                                    <el-option label="TƯ VẤN" value="ideabooks"></el-option>
                                    <el-option label="DỰ ÁN" value="projects"></el-option>
                                    <el-option label="DỊCH VỤ" value="services"></el-option>
                                </el-select>
                            </el-form-item> -->
                            <div class="row">
                                <div class="col-md-6 float-left">
                                    <el-form-item label="Display in Menu">
                                        <el-switch v-model="post.display_in_menu"></el-switch>
                                    </el-form-item>
                                </div>
                                <div class="col-md-6 float-right">
                                    <el-form-item label="Enable Scheduling">
                                        <el-switch v-model="has_schedule"></el-switch>
                                        <template v-if="has_schedule">
                                            <el-date-picker
                                                format="dd/MM/yyyy HH:mm:ss"
                                                value-format="timestamp"
                                                v-model="post.scheduling_post"
                                                type="datetime"
                                                placeholder="Select date and time">
                                            </el-date-picker>
                                        </template>
                                    </el-form-item>
                                </div>
                            </div>
                            <el-form-item>
                                <el-button type="danger" @click="handleDelete">Delete</el-button>
                                <el-button @click="back">Cancel</el-button>
                                <template v-if="updating">
                                    <el-button type="primary" :disabled="true">Updating</el-button>
                                </template>
                                <template v-else>
                                    <el-button type="primary" @click="save">Save</el-button>
                                </template>
                            </el-form-item>
                        </el-form>
                    </div>
                </div>
            </div><!-- .animated -->
        </div>

@endsection

@section('script')
<script src="{{ asset('assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/element-ui/lib/index.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/element-ui/2.4.7/locale/vi.js"></script>

<!-- start_summer -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
<script>
      $('#summernote_wrapper textarea').summernote({
        placeholder: 'Type something...',
        tabsize: 2,
        height: 100
      });
</script>
<!-- end_summer -->

<!-- sweet alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>

<script>
    ELEMENT.locale(ELEMENT.lang.vi)
</script>
<script>
    var app = new Vue({
      el: '#app',
      data: function() {
        return {
            id: {{$post->id}},
            post: {},
            tags: [],
            edit_thumbnail_is_new: false,
            has_schedule: null,
            updating: false,
        }
      },
      mounted: function() {
        this.init();
      },
      methods: {
        init() {
            var com = this;
            axios.get(`/api/posts/${com.id}`)
            .then(function (response) {
                com.post = response.data;
                com.post.tags = com.post.tags.map(tag => tag.id);
                com.post.status = com.post.status === 1 ? 'Visible' : 'Hide';
                com.post.display_in_menu = com.post.display_in_menu === 1 ? true : false;
                com.has_schedule = com.post.scheduling_post != 0 ? true : false;
                $('#summernote_wrapper textarea').summernote('code', com.post.content);
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
        save() {
            if (this.post.name.trim() === '') {
                return this.$notify({
                    title: 'Warning',
                    message: 'Name is required',
                    type: 'warning'
                });
            }
            var markup = $('#summernote_wrapper textarea').summernote('code');
            var text_content = markup.replace(/<(?:.|\n)*?>/gm, '');
            var short_content = text_content.slice(0, 255);
            $('#summernote_wrapper textarea').summernote('destroy');
            $('#summernote_wrapper textarea').summernote({focus: true});
            this.post.content = markup;
            this.post.text_content = text_content;
            this.post.short_content = short_content;
            this.updating = true;
            var com = this;
            com.post.status = com.post.status === 'Visible' || com.post.status === 1 ? 1 : 0;
            axios.put(`/api/posts/${com.id}`, {post: com.post, image: com.post.thumbnail_url, thumbnail_is_new: com.edit_thumbnail_is_new})
            .then(function (response) {
                com.$notify({
                    title: 'Success',
                    message: 'Successful update post',
                    type: 'success'
                });
                com.edit_thumbnail_is_new = false;
                com.updating = false;
                setTimeout(function() {
                    location.reload();
                }, 1500)
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        back() {
            window.location.href = "/posts";
        },
        onImageChange(e) {
            this.edit_thumbnail_is_new = true;
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
        },
        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.post.thumbnail_url = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        handleDelete() {
            var com = this;
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this post!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.delete(`/api/posts/${com.id}`)
                    .then(function (response) {
                        swal("Poof! Your post has been deleted!", {
                            icon: "success",
                        });
                        setTimeout(function() {
                            window.location.href = `/posts`;
                        }, 2000);
                    })
                    .catch(function (error) {
                        this.$notify.error({
                            title: 'Error',
                            message: error.message
                        });
                    });
                } else {
                    swal("Your post is safe!");
                }
            });
        },
      }
    })
</script>
@endsection