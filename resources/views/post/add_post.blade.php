@extends('../layouts.master')

@section('css')
<!-- element_ui_css -->
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
<!-- end_element_ui_css -->

<!-- summernote_css -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<style>
.note-editor.note-frame .note-editing-area .note-editable {
    width: 85%;
    padding: 20px;
    margin: auto;
    overflow-y: scroll;
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
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('admin.post') }}">Manage Posts</a></li>
                            <li class="active">Publish a post</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3" id="app">
            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-body">
                        <el-form ref="form" :model="form" label-width="120px">
                            <el-form-item label="Name">
                                <el-input v-model="form.name"></el-input>
                            </el-form-item>
                            <el-form-item label="Title">
                                <el-input v-model="form.title"></el-input>
                            </el-form-item>
                            <el-form-item label="Description">
                                <el-input type="textarea" v-model="form.desc"></el-input>
                            </el-form-item>
                            <el-form-item label="Keywords">
                                <el-input type="textarea" v-model="form.keywords"></el-input>
                            </el-form-item>
                            <el-form-item label="Thumbnail">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" @change="onImageChange" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" :style="{'background-image': 'url(' + image + ')'}">
                                        </div>
                                    </div>
                                </div>
                            </el-form-item>
                            <div id="summernote_wrapper">
                                <el-form-item label="Content">
                                    <el-input type="textarea"></el-input>
                                </el-form-item>
                            </div>
                            <el-form-item label="Tags">
                                <el-select
                                    v-model="form.tags"
                                    multiple
                                    filterable
                                    allow-create
                                    default-first-option
                                    placeholder="Choose tags for your article"
                                    style="width: 50%;">
                                    <el-option
                                        v-for="tag in tags"
                                        :key="tag.id"
                                        :label="tag.name"
                                        :value="tag.name">
                                    </el-option>
                                </el-select>
                            </el-form-item>
                            <el-form-item label="Category">
                                <el-select v-model="form.category" placeholder="Choose category">
                                    <el-option label="TƯ VẤN" value="ideabooks"></el-option>
                                    <el-option label="DỰ ÁN" value="projects"></el-option>
                                </el-select>
                            </el-form-item>
                            <el-form-item label="Display in Menu">
                                <el-switch v-model="form.is_menu_display"></el-switch>
                            </el-form-item>
                            <el-form-item label="Enable Scheduling">
                                <el-switch v-model="form.has_schedule"></el-switch>
                                <template v-if="form.has_schedule">
                                    <el-date-picker
                                        value-format="timestamp"
                                        format="dd/MM/yyyy HH:mm:ss"
                                        v-model="form.time_schedule"
                                        type="datetime"
                                        value-format="timestamp"
                                        placeholder="Select date and time">
                                    </el-date-picker>
                                </template>
                            </el-form-item>
                            <el-form-item label="Template">
                                <el-select v-model="form.template" placeholder="Choose template">
                                    <el-option label="Dự án" value="project"></el-option>
                                    <el-option label="Tư vấn" value="advice"></el-option>
                                </el-select>
                            </el-form-item>
                            <el-form-item label="Status:">
                                <el-select v-model="form.page_status">
                                    <el-option label="Visible" value="1"></el-option>
                                    <el-option label="Hide" value="0"></el-option>
                                </el-select>
                            </el-form-item>
                            <el-form-item>
                                <el-button @click="back">Cancel</el-button>
                                <template v-if="publishing">
                                    <el-button type="primary" :disabled="true">Publishing</el-button>
                                </template>
                                <template v-else>
                                    <el-button type="primary" @click="add">Publish</el-button>
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

<!-- start_summer -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
<!-- end_summer -->

<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/element-ui/lib/index.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/element-ui/2.4.7/locale/vi.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script>
    ELEMENT.locale(ELEMENT.lang.vi)
</script>
<script>
    var app = new Vue({
      el: '#app',
      data: function() {
        return {
            form: {
                name: '',
                title: '',
                desc: '',
                keywords: '',
                content:'',
                tags: [],
                category: '',
                is_menu_display: true,
                has_schedule: false,
                time_schedule: null,
                template: '',
                page_status: 'Visible',
            },
            image: '/images/album/default.png',
            tags: [],
            publishing: false,
        }
      },
      created: function() {
        var com = this;
        axios.get('/api/tags')
        .then(function (response) {
            com.tags = response.data;
        })
        .catch(function (error) {
            console.log(error);
        });
      },
      methods: {
        add() {
            if (this.form.name.trim() === '') {
                return this.$notify({
                    title: 'Warning',
                    message: 'Name is required',
                    type: 'warning'
                });
            }
            if (this.form.title.trim() === '') {
                return this.$notify({
                    title: 'Warning',
                    message: 'Title is required',
                    type: 'warning'
                });
            }
            if (this.form.desc.trim() === '') {
                return this.$notify({
                    title: 'Warning',
                    message: 'Description is required',
                    type: 'warning'
                });
            }
            if (this.form.keywords.trim() === '') {
                return this.$notify({
                    title: 'Warning',
                    message: 'Keywords is required',
                    type: 'warning'
                });
            }
            if (this.image === '/images/album/default.png') {
                return this.$notify({
                    title: 'Warning',
                    message: 'Thumbnail is required',
                    type: 'warning'
                });
            }
            if (this.image === '/images/album/default.png') {
                return this.$notify({
                    title: 'Warning',
                    message: 'Thumbnail is required',
                    type: 'warning'
                });
            }
            if (this.form.tags.length === 0) {
                return this.$notify({
                    title: 'Warning',
                    message: 'Post need at least one tag',
                    type: 'warning'
                });
            }
            if (this.form.category === '') {
                return this.$notify({
                    title: 'Warning',
                    message: 'Category is required',
                    type: 'warning'
                });
            }
            if (this.form.template === '') {
                return this.$notify({
                    title: 'Warning',
                    message: 'Template is required',
                    type: 'warning'
                });
            }
            var markup = $('#summernote_wrapper textarea').summernote('code');
            var text_content = markup.replace(/<(?:.|\n)*?>/gm, '');
            var short_content = text_content.slice(0, 255);
            $('#summernote_wrapper textarea').summernote('destroy');
            $('#summernote_wrapper textarea').summernote({focus: true});
            this.form.content = markup;
            if (this.form.content === '') {
                return this.$notify({
                    title: 'Warning',
                    message: 'Content is required',
                    type: 'warning'
                });
            }
            this.form.text_content = text_content;
            this.form.short_content = short_content;
            this.form.image = this.image;
            this.publishing = true;
            var com = this;
            com.form.page_status = com.form.page_status === 'Visible' || com.form.page_status === 1 ? 1 : 0;
            axios.post('/api/posts', com.form)
            .then(function (response) {
                com.$notify({
                    title: 'Success',
                    message: 'Successful publish a post',
                    type: 'success'
                });
                com.publishing = false;
                com.form.page_status = 'Visible';
                setTimeout(function() {
                    window.location.href = `/posts`;
                }, 2000)
            })
            .catch(function (error) {
                console.log(error);
                com.$notify.error({
                    title: 'Error',
                    message: error
                });
                com.publishing = false;
                com.form.page_status = 'Visible';
            });
        },
        back() {
            window.location.href = `/posts`;
        },
        onImageChange(e) {
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
            };
            reader.readAsDataURL(file);
        }
      }
    })
</script>
<script>
      $('#summernote_wrapper textarea').summernote({
        placeholder: 'Type something...',
        tabsize: 2,
        height: 100
      });
</script>
@endsection