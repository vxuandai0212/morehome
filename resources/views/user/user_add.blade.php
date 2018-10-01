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
                            <li class="active">Add User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3" id="app">
            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-body">
                        <el-form ref="form" :label-position="labelPosition" :model="form" label-width="120px">
                            <el-form-item label="First Name">
                                <el-input v-model="form.name"></el-input>
                            </el-form-item>
                            <el-form-item label="Last Name">
                                <el-input v-model="form.name"></el-input>
                            </el-form-item>
                            <el-form-item label="User Name">
                                <el-input v-model="form.name"></el-input>
                            </el-form-item>
                            <el-form-item label="Email Address">
                                <el-input v-model="form.name"></el-input>
                            </el-form-item>
                            <el-form-item label="Authorized">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>
                            <el-form-item label="Random Password">
                                <el-switch v-model="form.delivery"></el-switch>
                            </el-form-item>
                            <el-form-item label="Password">
                                <el-input v-model="form.name"></el-input>
                            </el-form-item>
                            <el-form-item label="Confirm Password">
                                <el-input v-model="form.name"></el-input>
                            </el-form-item>
                            <el-form-item label="Role">
                                <el-select v-model="form.region" placeholder="please select your zone">
                                    <el-option label="Superadmin" value="shanghai"></el-option>
                                    <el-option label="Admin" value="beijing"></el-option>
                                    <el-option label="Subcriber" value="beijing"></el-option>
                                </el-select>
                            </el-form-item>
                            <el-form-item>
                                <el-checkbox-group v-model="form.type">
                                    <el-checkbox label="Send An Email To New User" name="type"></el-checkbox>
                                </el-checkbox-group>
                            </el-form-item>
                            <el-form-item>
                                <el-button>Back</el-button>
                                <el-button type="primary" @click="onSubmit">Save</el-button>
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
                region: '',
                date1: '',
                date2: '',
                delivery: false,
                type: [],
                resource: '',
                desc: ''
            },
            labelPosition: 'top',
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