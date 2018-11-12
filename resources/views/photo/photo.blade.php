@extends('../layouts.master')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
<style>
.v-modal {
    z-index: -1!important;
}
</style>
@endsection

@section('content')
        <div class="breadcrumbs">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Manage Photo Albums</h1>
                </div>
            </div>
        </div>

        <div class="content mt-3" id="app">
            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-header">
                        <el-button type="primary" @click="openAdd">Add Album</el-button>
                    </div>
                    <div class="card-body">
                        <el-form :inline="true" :model="form_search" class="demo-form-inline">
                            <el-form-item label="Title">
                                <el-input v-model="form_search.name" placeholder="Name"></el-input>
                            </el-form-item>
                            @if (Auth::check() && Auth::user()->role_id === 1)
                            <el-form-item label="Author">
                                <el-input v-model="form_search.author" placeholder="Username"></el-input>
                            </el-form-item>
                            @endif
                            <el-form-item label="Status">
                                <el-select v-model="form_search.status" placeholder="Status">
                                    <el-option label="Active" value="1"></el-option>
                                    <el-option label="Disabled" value="0"></el-option>
                                </el-select>
                            </el-form-item>
                            <el-form-item>
                                <el-button @click="search" type="primary">Search</el-button>
                                <el-button @click="clear" type="default">Clear</el-button>
                            </el-form-item>
                        </el-form>
                        <hr>
                        <el-table :data="albums" stripe border style="width: 100%">
                            <el-table-column type="index" :index="indexMethod" width="50" align="center"></el-table-column>
                            <el-table-column prop="name" label="Title"></el-table-column>
                            <el-table-column prop="view_count" label="Views" width="120" align="center"></el-table-column>
                            <el-table-column prop="created_by" label="Author" width="150" align="center"></el-table-column>
                            <el-table-column prop="created_at_carbon" label="Publish Time" width="120" align="center"></el-table-column>
                            <el-table-column prop="status" label="Status" width="120" align="center"></el-table-column>
                            <el-table-column prop="action" label="Action" width="180" align="center">
                                <template slot-scope="scope">
                                    <el-button
                                    size="mini"
                                    @click="viewAlbum(scope.$index, scope.row)"
                                    >View</el-button>
                                    <el-button
                                    size="mini"
                                    type="primary"
                                    @click="editAlbum(scope.$index, scope.row)"
                                    >Edit</el-button>
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

                        <!-- Form Add-->
                        <el-dialog title="Add an album" :visible.sync="dialogAddVisible">
                            <el-form>
                                <el-form-item label="Title" :label-width="formLabelWidth">
                                    <el-input v-model="form_add.title" autocomplete="off"></el-input>
                                </el-form-item>
                                <el-form-item label="Post" :label-width="formLabelWidth">
                                    <el-select
                                        v-model="post_search.id"
                                        filterable
                                        remote
                                        reserve-keyword
                                        placeholder="Please enter post name"
                                        :remote-method="load_post"
                                        :loading="loading">
                                        <el-option
                                        v-for="post in posts"
                                        :key="post.value"
                                        :label="post.label"
                                        :value="post.value">
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                            </el-form>
                            <span slot="footer" class="dialog-footer">
                                <el-button @click="dialogAddVisible = false">Close</el-button>
                                <el-button type="primary" @click="addAlbum">Add</el-button>
                            </span>
                        </el-dialog>
                        <!-- Form Edit-->
                        <el-dialog title="Beautiful kitchen" :visible.sync="dialogEditVisible">
                            <el-form>
                                <el-form-item label="Title" :label-width="formLabelWidth">
                                    <el-input v-model="form_edit.title" autocomplete="off"></el-input>
                                </el-form-item>
                                <el-form-item label="Status" :label-width="formLabelWidth">
                                    <el-select v-model="form_edit.status">
                                        <el-option
                                        v-for="status in statuses"
                                        :key="status.value"
                                        :label="status.label"
                                        :value="status.value">
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                                <el-form-item label="Post" :label-width="formLabelWidth">
                                    <el-select
                                        v-model="post_search.id"
                                        filterable
                                        remote
                                        reserve-keyword
                                        placeholder="Please enter post name"
                                        :remote-method="load_post"
                                        :loading="loading">
                                        <el-option
                                        v-for="post in posts"
                                        :key="post.value"
                                        :label="post.label"
                                        :value="post.value">
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                            </el-form>
                            <span slot="footer" class="dialog-footer">
                                <el-button type="danger" @click="handleDelete()">Delete</el-button>
                                <el-button @click="dialogEditVisible = false">Close</el-button>
                                <el-button type="primary" @click="updateAlbum">Update</el-button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
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
      mounted: function() {
        this.table_change();
      },
      data: function() {
        return {
            albums: [],
            current_page: 1,
            page_size: 10,
            total: null,
            form_search: {
                name: '',
                author: '',
                status: null
            },
            form_add: {
                title: ''
            },
            form_edit: {
                id: null,
                title: '',
                status: ''
            },
            posts: [],
            post_search: {
                id: null,
                name: ''
            },
            dialogEditVisible: false,
            dialogAddVisible: false,
            statuses: [{
                value: '1',
                label: 'Active'
                }, {
                value: '0',
                label: 'Disable'
            }],
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
            formLabelWidth: '120px',
            loading: false
        }
      },
      methods: {
        indexMethod(index) {
            return parseInt(index) + 1 + this.page_size * (this.current_page - 1);
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
            axios.get('api/albums', {params: {
                limit: com.page_size, 
                offset: com.page_size * (com.current_page - 1), 
                name: com.form_search.name,
                author: com.form_search.author,
                status: com.form_search.status
            }})
            .then(function (response) {
                com.albums = response.data[0];
                com.total = response.data[1];
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        openAdd() {
            var com = this;
            com.form_add.title = '';
            com.post_search.id = null;
            com.post_search.name = '';
            com.dialogAddVisible = true;
        },
        addAlbum() {
            var com = this;
            axios.post('api/albums', {name: com.form_add.title, post_id: com.post_search.id})
            .then(function (response) {
                com.$notify({
                    title: 'Success',
                    message: 'Successful add album',
                    type: 'success'
                });
                com.dialogAddVisible = false;
                com.form_add.title = '';
                com.post_search.id = null;
                com.post_search.name = '';
                com.table_change();
            })
            .catch(function (error) {
                this.$notify.error({
                    title: 'Error',
                    message: error.message
                });
            });
        },
        editAlbum(index, row) {
            var com = this;
            axios.get(`api/albums/${row.id}`)
            .then(function (response) {
                com.form_edit.title = response.data.name;
                com.form_edit.status = response.data.status == 1 ? 'Active' : 'Disable';
                com.form_edit.id = response.data.id;
                com.post_search.id = response.data.post_id;
                return axios.get(`api/posts/${com.post_search.id}/name`);
            })
            .then(function(response) {
                com.load_post(response.data);
                com.dialogEditVisible = true;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        updateAlbum() {
            var com = this;
            var status = com.form_edit.status == 1 || com.form_edit.status == 'Active' ? 1 : 0;
            axios.put(`/api/albums/${com.form_edit.id}`, {
                id: com.form_edit.id, title: com.form_edit.title, status: status, post_id: com.post_search.id
            })
            .then(function (response) {
                com.$notify({
                    title: 'Success',
                    message: 'Successful update album',
                    type: 'success'
                });
                com.dialogEditVisible = false;
                com.table_change();
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        handleDelete() {
            var com = this;
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this album!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.delete(`api/albums/${com.form_edit.id}`)
                    .then(function (response) {
                        swal("Poof! Your album has been deleted!", {
                            icon: "success",
                        });
                        com.dialogEditVisible = false;
                        com.table_change();
                    })
                    .catch(function (error) {
                        this.$notify.error({
                            title: 'Error',
                            message: error.message
                        });
                    });
                } else {
                    swal("Your album is safe!");
                }
            });
        },
        viewAlbum(index, row) {
            window.location.href = `/photos/albums/${row.slug}`;
        },
        load_post(name) {
            var com = this;
            com.loading = true;
            axios.get('api/posts/search', {params: {name: name}})
            .then(function (response) {
                com.posts = response.data.map(post => {
                    return { value: post.id, label: post.name };
                });
                console.log(com.posts);
                com.loading = false;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        clear() {
            this.current_page = 1;
            this.page_size = 10;
            this.form_search.name = '';
            this.form_search.author = '';
            this.form_search.status = null;
            this.table_change();
        },
        search() {
            if (this.form_search.name.trim() === '' &&
                this.form_search.author.trim() === '' &&
                this.form_search.status === null
            ) {
                return this.$notify({
                    title: 'Warning',
                    message: 'Vui lòng điền điều kiện tìm kiếm.',
                    type: 'warning'
                });
            }
            
            this.current_page = 1;
            this.page_size = 10;
            this.table_change();
        }
      }
    })
</script>
@endsection