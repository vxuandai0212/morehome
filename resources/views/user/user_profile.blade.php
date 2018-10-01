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
                            <li><a href="#">Profiles</a></li>
                            <li class="active">Sơn</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3" id="app">
            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-row-reverse">
                            <div class="p-2"></div>
                            <div class="p-2"><el-button type="default">Back</el-button></div>
                            <div class="p-2"><el-button type="primary">Edit</el-button></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <el-form ref="form" :model="form" label-width="120px">
                            <el-form-item label="Name">
                                <el-input v-model="form.name"></el-input>
                            </el-form-item>
                            <el-form-item label="Email">
                                <el-input v-model="form.name"></el-input>
                            </el-form-item>
                            <el-form-item label="First Name">
                                <el-input v-model="form.name"></el-input>
                            </el-form-item>
                            <el-form-item label="Middle Name">
                                <el-input v-model="form.name"></el-input>
                            </el-form-item>
                            <el-form-item label="Last Name">
                                <el-input v-model="form.name"></el-input>
                            </el-form-item>
                            <el-form-item label="Biography">
                                <el-input type="textarea" v-model="form.desc"></el-input>
                            </el-form-item>
                            <el-form-item label="Avatar">
                                
                            </el-form-item>
                            <el-form-item label="Contact">
                                <el-input v-model="form.name"></el-input>
                            </el-form-item>
                            <el-form-item label="Address">
                                <el-input v-model="form.name"></el-input>
                            </el-form-item>
                            <el-form-item label="Role">
                                <el-select v-model="form.region" placeholder="please select your zone">
                                    <el-option label="Superadmin" value="shanghai"></el-option>
                                    <el-option label="Admin" value="beijing"></el-option>
                                    <el-option label="Subcriber" value="beijing"></el-option>
                                </el-select>
                            </el-form-item>
                            <el-form-item label="Authorized">
                                <el-switch v-model="form.delivery"></el-switch>
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