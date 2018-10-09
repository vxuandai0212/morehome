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
                            <li><a>Activities Log</a></li>
                            <li class="active">Sơn</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3" id="app">
            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <el-select v-model="form.region" placeholder="please select your zone">
                                    <el-option label="Superadmin" value="shanghai"></el-option>
                                    <el-option label="Admin" value="beijing"></el-option>
                                    <el-option label="Subcriber" value="beijing"></el-option>
                                </el-select>
                            </div>
                            <div class="col-md-8">
                                <el-input
                                    placeholder="Search activities"
                                    prefix-icon="el-icon-search"
                                    v-model="form.name">
                                </el-input>
                            </div>
                        </div>
                        <hr>
                        <div class="row media">
                            <div class="col-md-2">
                                <span class="photo media-left"><i class="fa fa-ban"></i></span>
                            </div>
                            <div class="col-md-7">
                                <span class="name float-left"><span>Sơn banned account provipcf</span>
                            </div>
                            <div class="col-md-3">
                                <span class="time float-right">21 Tháng 9 2018 11:13</span>
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
            form: {
                name: '',
                region: 'Today',
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