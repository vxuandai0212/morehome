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
                            <li><a href="{{ route('admin.user') }}">Users</a></li>
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
                            <el-row :gutter="20">
                                <el-col :span="12">
                                    <el-form-item label="First Name">
                                        <el-input v-model="form.first_name"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="Last Name">
                                        <el-input v-model="form.last_name"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row :gutter="20">
                                <el-col :span="12">
                                    <el-form-item label="User Name">
                                        <el-input v-model="form.username"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="Email Address">
                                        <el-input v-model="form.email"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row :gutter="20">
                                <el-col :span="4">
                                    <el-form-item label="Random Password">
                                        <el-switch @change="generate_password" v-model="form.is_rand_password"></el-switch>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="10">
                                    <el-form-item label="Password">
                                        <el-input v-model="form.password"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="10">
                                    <el-form-item label="Confirm Password">
                                        <el-input v-model="form.confirm_password"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row :gutter="20">
                                <el-col :span="12">
                                    <el-form-item label="Authorized">
                                        <el-switch v-model="form.status"></el-switch>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="Role">
                                        <el-select v-model="form.role" placeholder="Please select role">
                                            <el-option label="Superadmin" value="1"></el-option>
                                            <el-option label="Admin" value="2"></el-option>
                                            <el-option label="Subcriber" value="3"></el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-form-item>
                                <el-checkbox-group v-model="form.send_email">
                                    <el-checkbox label="Send An Email To New User" name="type"></el-checkbox>
                                </el-checkbox-group>
                            </el-form-item>
                            <el-form-item>
                                <el-button @click="go_users()">Back</el-button>
                                <template v-if="saving">
                                    <el-button type="primary" :disabled="true">Saving</el-button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/element-ui/2.4.7/locale/en.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>

<script>
    ELEMENT.locale(ELEMENT.lang.en)
</script>
<script>
    var app = new Vue({
      el: '#app',
      data: function() {
        return {
            form: {
                first_name: '',
                last_name: '',
                username: '',
                email: '',
                status: true,
                is_rand_password: false,
                password: '',
                confirm_password: '',
                role: null,
                send_email: false
            },
            labelPosition: 'top',
            saving: false
        }
      },
      methods: {
        save() {
            // this.saving = true;
            var com = this;
            axios.post('/api/users', com.form)
            .then(function (response) {
                com.$notify({
                    title: 'Success',
                    message: 'Successful create an user.',
                    type: 'success'
                });
                com.saving = false;
                // setTimeout(function() {
                //     window.location.href = `/users`;
                // }, 2000)
            })
            .catch(function (error) {
                console.log(error);
                com.$notify.error({
                    title: 'Error',
                    message: error
                });
            });
        },
        go_users() {
            window.location.href = `/users`;
        },
        generate_password: function() {
            if (this.form.is_rand_password) {
                var random_string = Math.random().toString(36).slice(-8);
                this.form.password = random_string;
                this.form.confirm_password = random_string;
            } else {
                this.form.password = '';
                this.form.confirm_password = '';
            }
        }
      }
    })
</script>
@endsection