@extends('../layouts.master')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
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
                        <el-button type="primary">Manage Role</el-button>
                        <el-button type="primary">Add User</el-button>
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
                        <el-table :data="tableData" stripe border style="width: 100%">
                            <el-table-column type="index" :index="indexMethod" width="50" align="center"></el-table-column>
                            <el-table-column prop="name" label="Name"></el-table-column>
                            <el-table-column prop="username" label="Username"></el-table-column>
                            <el-table-column prop="role" label="Role" width="120" align="center"></el-table-column>
                            <el-table-column prop="activities_log" label="Activities log" width="120" align="center">
                                <template slot-scope="scope">
                                    <el-button
                                    size="mini"
                                    @click="handleEdit(scope.$index, scope.row)">View</el-button>
                                </template>
                            </el-table-column>
                            <el-table-column prop="status" label="Status" width="120" align="center"></el-table-column>
                            <el-table-column prop="action" label="Action" width="180" align="center">
                                <template slot-scope="scope">
                                    <el-button
                                    size="mini"
                                    @click="handleEdit(scope.$index, scope.row)">View</el-button>
                                    <el-button
                                    size="mini"
                                    type="primary"
                                    @click="handleDelete(scope.$index, scope.row)">Edit</el-button>
                                </template>
                            </el-table-column>
                        </el-table>
                        <hr>
                        <el-pagination
                            @size-change="handleSizeChange"
                            @current-change="handleCurrentChange"
                            :page-sizes="[100, 200, 300, 400]"
                            :page-size="100"
                            layout="total, sizes, prev, pager, next"
                            :total="400">
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
            tableData: [{
            date: '2016-05-03',
            name: 'Tom',
            state: 'California',
            city: 'Los Angeles',
            address: 'No. 189, Grove St, Los Angeles',
            zip: 'CA 90036',
            tag: 'Home'
            }, {
            date: '2016-05-02',
            name: 'Tom',
            state: 'California',
            city: 'Los Angeles',
            address: 'No. 189, Grove St, Los Angeles',
            zip: 'CA 90036',
            tag: 'Office'
            }, {
            date: '2016-05-04',
            name: 'Tom',
            state: 'California',
            city: 'Los Angeles',
            address: 'No. 189, Grove St, Los Angeles',
            zip: 'CA 90036',
            tag: 'Home'
            }, {
            date: '2016-05-01',
            name: 'Tom',
            state: 'California',
            city: 'Los Angeles',
            address: 'No. 189, Grove St, Los Angeles',
            zip: 'CA 90036',
            tag: 'Office'
            }],
            formInline: {
                user: '',
                region: ''
            }
        }
      },
      methods: {
        indexMethod(index) {
            return index * 2;
        },
        handleSizeChange(val) {
            console.log(`${val} items per page`);
        },
        handleCurrentChange(val) {
            console.log(`current page: ${val}`);
        }
      }
    })
</script>
@endsection