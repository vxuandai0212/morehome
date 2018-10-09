@extends('../layouts.master')

@section('css')
<!-- element_ui_css -->
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
<!-- end_element_ui_css -->
@endsection

@section('content')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Manage Users</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3" id="app">
            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-header">
                        <el-button type="primary" @click="go_manage_role()">Manage Role</el-button>
                        <el-button type="primary" @click="go_add_user()">Add User</el-button>
                    </div>
                    <div class="card-body">
                        <el-form :inline="true" :model="formInline" class="demo-form-inline">
                            <el-form-item label="Name">
                                <el-input v-model="formInline.user" placeholder="Name"></el-input>
                            </el-form-item>
                            <el-form-item label="Username">
                                <el-input v-model="formInline.user" placeholder="Username"></el-input>
                            </el-form-item>
                            <el-form-item label="Role">
                                <el-select v-model="formInline.region" placeholder="Role">
                                    <el-option label="Superadmin" value="superadmin"></el-option>
                                    <el-option label="Admin" value="admin"></el-option>
                                    <el-option label="Subcriber" value="subcriber"></el-option>
                                </el-select>
                            </el-form-item>
                            <el-form-item label="Status">
                                <el-select v-model="formInline.region" placeholder="Status">
                                    <el-option label="Authorized" value="authorized"></el-option>
                                    <el-option label="Unauthorized" value="unauthorized"></el-option>
                                </el-select>
                            </el-form-item>
                            <el-form-item>
                                <el-button type="primary">Search</el-button>
                                <el-button type="default">Clear</el-button>
                            </el-form-item>
                        </el-form>
                        <hr>
                        <el-table :data="users" stripe border style="width: 100%">
                            <el-table-column type="index" :index="indexMethod" width="50" align="center"></el-table-column>
                            <el-table-column prop="name" label="Name"></el-table-column>
                            <el-table-column prop="username" label="Username"></el-table-column>
                            <el-table-column prop="role.name" label="Role" width="120" align="center"></el-table-column>
                            <el-table-column prop="activities_log" label="Activities log" width="120" align="center">
                                <template slot-scope="scope">
                                    <el-button
                                    size="mini"
                                    @click="viewActivityLog(scope.$index, scope.row)">View</el-button>
                                </template>
                            </el-table-column>
                            <el-table-column prop="status" label="Status" width="120" align="center"></el-table-column>
                            <el-table-column prop="action" label="Action" width="180" align="center">
                                <template slot-scope="scope">
                                    <el-button
                                    size="mini"
                                    @click="viewUserProfile(scope.$index, scope.row)">View</el-button>
                                    <el-button
                                    size="mini"
                                    type="primary"
                                    @click="editUserProfile(scope.$index, scope.row)">Edit</el-button>
                                </template>
                            </el-table-column>
                        </el-table>
                        <hr>
                        <el-pagination
                            @size-change="handleSizeChange"
                            @current-change="handleCurrentChange"
                            :page-sizes="[10, 15, 20, 100]"
                            :page-size="page_size"
                            layout="total, sizes, prev, pager, next"
                            :total="total">
                        </el-pagination>
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
        this.table_change();
      },
      data: function() {
        return {
            users: [],
            formInline: {
                user: '',
                region: ''
            },
            current_page: 1,
            page_size: 10,
            total: null
        }
      },
      methods: {
        indexMethod(index) {
            return parseInt(index) + 1;
        },
        handleSizeChange(val) {
            this.page_size = val;
            this.table_change();
        },
        handleCurrentChange(val) {
            this.current_page = val;
            this.table_change();
        },
        table_change() {
            var com = this;
            axios.get('api/users', {params: {limit: com.page_size, offset: com.page_size * (com.current_page - 1)}})
            .then(function (response) {
                com.users = response.data[0];
                com.total = response.data[1];
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        viewActivityLog(index, row) {
            window.location.href = `/users/activities-log/${row.slug}`;
        },
        viewUserProfile(index, row) {
            window.location.href = `/users/profiles/${row.slug}`;
        },
        editUserProfile(index, row) {
            window.location.href = `/users/profiles/${row.slug}/edit`;
        },
        go_manage_role() {
            window.location.href = `/users/manage-role`;
        },
        go_add_user() {
            window.location.href = `/users/add`;
        }
      }
    })
</script>
@endsection