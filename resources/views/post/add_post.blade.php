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
    margin: auto;
    overflow: visible!important;
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
                            <el-form-item label="Name*">
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
                                    <el-option label="DỊCH VỤ" value="services"></el-option>
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
                                        placeholder="Select date and time">
                                    </el-date-picker>
                                </template>
                            </el-form-item>
                            <el-form-item label="Template">
                                <el-select v-model="form.template" placeholder="Choose template">
                                    <el-option label="Project" value="project"></el-option>
                                    <el-option label="Advice" value="advice"></el-option>
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
            var markup = $('#summernote_wrapper textarea').summernote('code');
            $('#summernote_wrapper textarea').summernote('destroy');
            $('#summernote_wrapper textarea').summernote({focus: true});
            this.form.content = markup;
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
            });
        },
        back() {
            window.location.href = `/posts`;
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