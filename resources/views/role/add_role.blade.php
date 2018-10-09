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
                            <li>Manage Role</li>
                            <li class="active">Add Role</li>
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
                                        <el-input v-model="form.name"></el-input>
                                    </el-form-item>
                                </el-form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <el-form ref="form" :model="form" label-width="520px">
                            <div class="row">
                                <div class="col-md-6" v-for="module in permissions">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title">@{{module.name}}</strong>
                                        </div>
                                        <div class="card-body">
                                            <div v-for="permission in module.permissions">
                                                    <h6>@{{permission.name}} 
                                                    <span>
                                                        <label class="switch switch-3d switch-primary mr-3">
                                                            <input type="checkbox" class="switch-input"> 
                                                            <span class="switch-label"></span> <span class="switch-handle"></span>
                                                        </label>
                                                    </span>
                                                    </h6>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        var com = this;
        axios.get('/api/permissions')
        .then(function (response) {
            com.permissions = response.data;
        })
        .catch(function (error) {
            console.log(error);
        });
      },
      data: function() {
        return {
            permissions: [],
            status: false,
            form: {}
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