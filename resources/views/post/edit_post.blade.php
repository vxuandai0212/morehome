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
                            <div id="summernote_wrapper">
                                <el-form-item label="Content">
                                    <el-input type="textarea"></el-input>
                                </el-form-item>
                            </div>
                            <el-form-item label="Tags">
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
                            </el-form-item>
                            <el-form-item label="Category">
                                <el-select v-model="post.category" placeholder="Choose category">
                                    <el-option label="TƯ VẤN" value="ideabooks"></el-option>
                                    <el-option label="DỰ ÁN" value="projects"></el-option>
                                    <el-option label="DỊCH VỤ" value="services"></el-option>
                                </el-select>
                            </el-form-item>
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
            has_schedule: null,
            updating: false,
        }
      },
      created: function() {
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
            $('#summernote_wrapper textarea').summernote('destroy');
            $('#summernote_wrapper textarea').summernote({focus: true});
            this.post.content = markup;
            this.updating = true;
            var com = this;
            com.post.status = com.post.status === 'Visible' || com.post.status === 1 ? 1 : 0;
            axios.put(`/api/posts/${com.id}`, com.post)
            .then(function (response) {
                com.$notify({
                    title: 'Success',
                    message: 'Successful update post',
                    type: 'success'
                });
                com.updating = false;
                com.init();
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        back() {
            window.location.href = "/posts";
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