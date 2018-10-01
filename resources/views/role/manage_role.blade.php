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
                            <li><a href="#">Users</a></li>
                            <li class="active">Manage Role</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3" id="app">
            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div>
                                <el-form ref="form" :model="form" label-width="120px">
                                    <el-form-item label="Role">
                                        <el-select v-model="form.region" placeholder="please select your zone">
                                            <el-option label="Superadmin" value="shanghai"></el-option>
                                            <el-option label="Admin" value="beijing"></el-option>
                                            <el-option label="Subcriber" value="beijing"></el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-form>
                            </div>
                            <div><el-button type="primary">Add Role</el-button></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <el-form ref="form" :model="form" label-width="520px">
                            <h3>User</h3>
                            <el-form-item label="View Superadmin activities log">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>
                            <el-form-item label="View admin activities log">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>
                            <el-form-item label="View user activities log">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>
                            <el-form-item label="View profile other users">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>
                            <el-form-item label="Edit profile of superadmin">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>
                            <el-form-item label="Edit profile of admin">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>
                            <el-form-item label="Edit profile of user">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>
                            <el-form-item label="Delete account of admin">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>
                            <el-form-item label="Delete account of user">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>

                            <hr>

                            <h3>Page</h3>
                            <el-form-item label="View page">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>
                            <el-form-item label="Upload page">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>
                            <el-form-item label="Edit page">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>
                            <el-form-item label="Delete page">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>
                            <el-form-item label="Comment on page">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>
                            <el-form-item label="Like on page">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>
                            <el-form-item label="Rate page">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>
                            <el-form-item label="Bookmark page">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>
                            <el-form-item label="Place question on advisory section">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>
                            <el-form-item label="Answer question on advisory section">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>

                            <hr>

                            <h3>Photo</h3>
                            <el-form-item label="View photo">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>
                            <el-form-item label="Upload photo">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>
                            <el-form-item label="Edit photo">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>
                            <el-form-item label="Delete photo">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>

                            <hr>

                            <el-form-item>
                                <el-button>Back</el-button>
                                <el-button type="primary" @click="onSubmit">Update</el-button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/element-ui/2.4.7/locale/en.js"></script>
<script>
    ELEMENT.locale(ELEMENT.lang.en)
</script>
<script>
    var app = new Vue({
      el: '#app',
      data: function() {
        return {
            form: {
                name: '',
                region: 'Superadmin',
                date1: '',
                date2: '',
                delivery: false,
                type: [],
                resource: '',
                desc: ''
            }
        }
      },
      methods: {
        onSubmit() {
            console.log('submit!');
        }
      }
    })
</script>
@endsection