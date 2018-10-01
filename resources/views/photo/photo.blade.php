@extends('../layouts.master')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
@endsection

@section('content')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Manage Photo Albums</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3" id="app">
            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-header">
                        <el-button type="primary" @click="dialogAddVisible = true">Add Album</el-button>
                    </div>
                    <div class="card-body">
                        <el-form :inline="true" :model="formInline" class="demo-form-inline">
                            <el-form-item label="Title">
                                <el-input v-model="formInline.user" placeholder="Name"></el-input>
                            </el-form-item>
                            <el-form-item label="Author">
                                <el-input v-model="formInline.user" placeholder="Username"></el-input>
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
                            <el-table-column prop="name" label="Title"></el-table-column>
                            <el-table-column prop="username" label="Views"></el-table-column>
                            <el-table-column prop="role" label="Author" width="120" align="center"></el-table-column>
                            <el-table-column prop="activities_log" label="Publish Time" width="120" align="center"></el-table-column>
                            <el-table-column prop="status" label="Status" width="120" align="center"></el-table-column>
                            <el-table-column prop="action" label="Action" width="180" align="center">
                                <template slot-scope="scope">
                                    <el-button
                                    size="mini"
                                    >View</el-button>
                                    <el-button
                                    size="mini"
                                    type="primary"
                                    @click="handleEdit(scope.$index, scope.row)"
                                    >Edit</el-button>
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
                        <!-- Form Add-->
                        <el-dialog title="Add an album" :visible.sync="dialogAddVisible">
                            <el-form :model="form">
                                <el-form-item label="Title" :label-width="formLabelWidth">
                                    <el-input v-model="form.name" autocomplete="off"></el-input>
                                </el-form-item>
                            </el-form>
                            <span slot="footer" class="dialog-footer">
                                <el-button @click="dialogAddVisible = false">Close</el-button>
                                <el-button type="primary" @click="dialogAddVisible = false">Add</el-button>
                            </span>
                        </el-dialog>
                        <!-- Form Edit-->
                        <el-dialog title="Beautiful kitchen" :visible.sync="dialogFormVisible">
                            <el-form :model="form">
                                <el-form-item label="Title" :label-width="formLabelWidth">
                                    <el-input v-model="form.name" autocomplete="off"></el-input>
                                </el-form-item>
                                <el-form-item label="Status" :label-width="formLabelWidth">
                                    <el-select v-model="form.status">
                                        <el-option label="Active" value="true"></el-option>
                                        <el-option label="Disabled" value="false"></el-option>
                                    </el-select>
                                </el-form-item>
                            </el-form>
                            <span slot="footer" class="dialog-footer">
                                <el-button type="danger" @click="handleDelete()">Delete</el-button>
                                <el-button @click="dialogVisible = false">Close</el-button>
                                <el-button type="primary" @click="dialogVisible = false">Update</el-button>
                            </span>
                        </el-dialog>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
            },
            dialogFormVisible: false,
            dialogVisible: false,
            dialogAddVisible: false,
            form: {
                name: '',
                region: '',
                date1: '',
                date2: '',
                delivery: false,
                type: [],
                resource: '',
                desc: '',
                status: 'false'
            },
            formLabelWidth: '120px'
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
        },
        handleEdit() {
            this.dialogFormVisible = true;
            this.dialogVisible = true;
        },
        handleClose(done) {
            this.$confirm('Are you sure to close this dialog?')
            .then(_ => {
                done();
            })
            .catch(_ => {});
        },
        handleDelete() {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this album!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Your album has been deleted!", {
                    icon: "success",
                });
                } else {
                    swal("Your album is safe!");
                }
            });
        }
      }
    })
</script>
@endsection