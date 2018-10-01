@extends('../layouts.master')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
@endsection

@section('content')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Manage Pages</a></li>
                            <li class="active">Add Page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3" id="app">
            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-4">
                            <el-menu class="el-menu-vertical-demo" @open="handleOpen" @close="handleClose">
                                <el-menu-item index="1">
                                    <template slot="title">
                                        <i class="el-icon-document"></i>
                                        <span>Home</span>
                                    </template>
                                </el-menu-item>
                                <el-submenu index="2">
                                    <template slot="title">
                                        <i class="el-icon-document"></i>
                                        <span>Activity Feed</span>
                                    </template>
                                    <el-menu-item index="2-1">
                                        <template slot="title">
                                            <i class="el-icon-document"></i>
                                            <span>PAGE A</span>
                                        </template>
                                    </el-menu-item>
                                    <el-menu-item index="2-2">
                                        <template slot="title">
                                            <i class="el-icon-document"></i>
                                            <span>PAGE B</span>
                                        </template>
                                    </el-menu-item>
                                </el-submenu>
                                <el-menu-item index="3">
                                    <template slot="title">
                                        <i class="el-icon-document"></i>
                                        <span>Search Results</span>
                                    </template>
                                </el-menu-item>
                                <el-menu-item index="4">
                                    <template slot="title">
                                        <i class="el-icon-document"></i>
                                        <span>404 Error Page</span>
                                    </template>
                                </el-menu-item>
                                <el-submenu index="5">
                                    <template slot="title">
                                        <i class="el-icon-document"></i>
                                        <span>SẢN PHẨM</span>
                                    </template>
                                    <el-menu-item index="5-1">
                                        <template slot="title">
                                            <i class="el-icon-document"></i>
                                            <span>GHẾ BAR TOLIX</span>
                                        </template>
                                    </el-menu-item>
                                    <el-menu-item index="5-2">
                                        <template slot="title">
                                            <i class="el-icon-document"></i>
                                            <span>BÀN TOLIX</span>
                                        </template>
                                    </el-menu-item>
                                </el-submenu>
                                <el-menu-item index="6">
                                    <template slot="title">
                                        <i class="el-icon-document"></i>
                                        <span>TIN TỨC</span>
                                    </template>
                                </el-menu-item>
                                <el-menu-item index="7">
                                    <template slot="title">
                                        <i class="el-icon-document"></i>
                                        <span>LIÊN HỆ</span>
                                    </template>
                                </el-menu-item>
                                <el-menu-item index="8">
                                    <template slot="title">
                                        <i class="el-icon-document"></i>
                                        <el-input style="width: 50%;" v-model="form.name"></el-input>
                                    </template>
                                </el-menu-item>
                            </el-menu>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <el-form ref="form" :model="form" label-width="120px">
                                        <el-form-item label="Name*">
                                            <el-input v-model="form.name"></el-input>
                                        </el-form-item>
                                        <el-form-item label="Title">
                                            <el-input v-model="form.name"></el-input>
                                        </el-form-item>
                                        <el-form-item label="Description">
                                            <el-input type="textarea" v-model="form.desc"></el-input>
                                        </el-form-item>
                                        <el-form-item label="Keywords">
                                            <el-input type="textarea" v-model="form.desc"></el-input>
                                        </el-form-item>
                                        <el-form-item label="Tags">
                                            <el-select
                                                v-model="value10"
                                                multiple
                                                filterable
                                                allow-create
                                                default-first-option
                                                placeholder="Choose tags for your article"
                                                style="width: 50%;">
                                                <el-option
                                                v-for="item in options5"
                                                :key="item.value"
                                                :label="item.label"
                                                :value="item.value"
                                                >
                                                </el-option>
                                            </el-select>
                                        </el-form-item>
                                        <el-form-item label="Parent Page">
                                            <el-select v-model="parent_page" placeholder="Choose parent page">
                                                <el-option label="SẢN PHẨM" value="sanpham"></el-option>
                                                <el-option label="TIN TỨC" value="tintuc"></el-option>
                                            </el-select>
                                        </el-form-item>
                                        <el-form-item label="Display in Menu">
                                            <el-switch v-model="form.delivery"></el-switch>
                                        </el-form-item>
                                        <el-form-item label="Enable Scheduling">
                                            <el-switch v-model="form.delivery"></el-switch>
                                        </el-form-item>
                                        <el-form-item label="Template">
                                            <el-select v-model="template" placeholder="Choose template">
                                                <el-option label="Default" value="default"></el-option>
                                                <el-option label="News" value="news"></el-option>
                                            </el-select>
                                        </el-form-item>
                                        <el-form-item label="Status:">
                                            <el-select v-model="page_status">
                                                <el-option label="Visible" value="visible"></el-option>
                                                <el-option label="Hide" value="hide"></el-option>
                                            </el-select>
                                        </el-form-item>
                                        <el-form-item>
                                            <el-button>Cancel</el-button>
                                            <el-button type="primary" @click="onSubmit">Add Page</el-button>
                                        </el-form-item>
                                    </el-form>
                                </div>
                            </div>
                        </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/element-ui/2.4.7/locale/en.js"></script>
<script>
    ELEMENT.locale(ELEMENT.lang.en)
</script>
<script>
    var app = new Vue({
      el: '#app',
      data: function() {
        return {
            value: 'visible',
            parent_page: '',
            page_status: 'visible',
            template: '',
            form: {
                name: '',
                region: '',
                date1: '',
                date2: '',
                delivery: false,
                type: [],
                resource: '',
                desc: ''
            },
            dynamicTags: ['Tag 1', 'Tag 2', 'Tag 3'],
            inputVisible: false,
            inputValue: '',
            options5: [{
            value: 'HTML',
            label: 'HTML'
            }, {
            value: 'CSS',
            label: 'CSS'
            }, {
            value: 'JavaScript',
            label: 'JavaScript'
            }],
            value10: []
        }
      },
      methods: {
        onSubmit() {
            console.log('submit!');
        },
        handleSelect(key, keyPath) {
            console.log(key, keyPath);
        },
        handleOpen() {

        },
        handleClose() {

        },
        handleClose(tag) {
            this.dynamicTags.splice(this.dynamicTags.indexOf(tag), 1);
        },
        showInput() {
            this.inputVisible = true;
            this.$nextTick(_ => {
            this.$refs.saveTagInput.$refs.input.focus();
            });
        },
        handleInputConfirm() {
            let inputValue = this.inputValue;
            if (inputValue) {
                this.dynamicTags.push(inputValue);
            }
            this.inputVisible = false;
            this.inputValue = '';
        }
      }
    })
</script>
@endsection