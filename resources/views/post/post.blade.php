@extends('../layouts.master')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
@endsection

@section('content')
        <div class="breadcrumbs">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Manage Posts</h1>
                </div>
            </div>
        </div>

        <div class="content mt-3" id="app">
            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-header">
                        <el-button type="primary" @click="go_write_post">Write Post</el-button>
                    </div>
                    <div class="card-body">
                        <el-form :inline="true" :model="formInline" class="demo-form-inline">
                            <el-form-item label="Name">
                                <el-input v-model="formInline.user" placeholder="Article name"></el-input>
                            </el-form-item>
                            <el-form-item label="Author">
                                <el-input v-model="formInline.user" placeholder="Author"></el-input>
                            </el-form-item>
                            <el-form-item label="Category">
                                <el-select v-model="formInline.region" placeholder="Article category">
                                    <el-option label="Decoration" value="authorized"></el-option>
                                    <el-option label="Design" value="authorized"></el-option>
                                    <el-option label="Construction" value="unauthorized"></el-option>
                                </el-select>
                            </el-form-item>
                            <el-form-item>
                                <el-button type="primary">Search</el-button>
                                <el-button type="default">Clear</el-button>
                            </el-form-item>
                        </el-form>
                        <hr>
                        <el-table :data="posts" stripe border style="width: 100%">
                            <el-table-column type="index" :index="indexMethod" width="50" align="center"></el-table-column>
                            <el-table-column prop="name" label="Name"></el-table-column>
                            <el-table-column prop="category" label="Category"></el-table-column>
                            <el-table-column prop="view_count" label="Views" width="120" align="center"></el-table-column>
                            <el-table-column prop="created_by" label="Author" width="150" align="center"></el-table-column>
                            <el-table-column prop="created_at_carbon" label="Publish Time" width="120" align="center"></el-table-column>
                            <el-table-column prop="status" label="Status" width="120" align="center"></el-table-column>
                            <el-table-column prop="action" label="Action" width="180" align="center">
                                <template slot-scope="scope">
                                    <el-button
                                    size="mini"
                                    @click="viewPost(scope.$index, scope.row)"
                                    >View</el-button>
                                    <el-button
                                    size="mini"
                                    type="primary"
                                    @click="editPost(scope.$index, scope.row)"
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
            posts: [],
            current_page: 1,
            page_size: 10,
            total: null,
            formInline: {
                user: '',
                region: ''
            },
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
            axios.get('api/posts', {params: {limit: com.page_size, offset: com.page_size * (com.current_page - 1)}})
            .then(function (response) {
                com.posts = response.data[0];
                com.total = response.data[1];
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        viewPost(index, row) {
            window.location.href = row.view_url;
        },
        editPost(index, row) {
            window.location.href = row.edit_url;
        },
        go_write_post() {
            window.location.href = '/posts/add';
        }
      }
    })
</script>
@endsection