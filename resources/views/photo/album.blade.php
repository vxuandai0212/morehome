@extends('../layouts.master')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
<style>
  .avatar-uploader .el-upload {
    border: 1px dashed #d9d9d9;
    border-radius: 6px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
  }
  .avatar-uploader .el-upload:hover {
    border-color: #409EFF;
  }
  .avatar-uploader-icon {
    font-size: 28px;
    color: #8c939d;
    width: 178px;
    height: 178px;
    line-height: 178px;
    text-align: center;
  }
  .avatar {
    width: 178px;
    height: 178px;
    display: block;
  }
</style>
@endsection

@section('content')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Photo</a></li>
                            <li><a href="#">Album</a></li>
                            <li class="active">Beautiful Kitchen</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3" id="app">
            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-header">
                        <el-select v-model="formInline.region">
                            <el-option label="All photos" value="all"></el-option>
                            <el-option label="Interior Design" value="interior design"></el-option>
                        </el-select>
                        <el-button type="primary" @click="dialogAddVisible = true">Add Image</el-button>
                    </div>
                    <div class="card-body">
                        <el-form :inline="true" :model="formInline" class="demo-form-inline">
                            <el-form-item label="Title">
                                <el-input v-model="formInline.user" placeholder="Enter Title"></el-input>
                            </el-form-item>
                            <el-form-item label="Category">
                                <el-input v-model="formInline.user" placeholder="Enter Category"></el-input>
                            </el-form-item>
                            <el-form-item label="Tag">
                                <el-select v-model="formInline.user" placeholder="Enter Tag">
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
                            <el-table-column prop="name" width="100" align="center">
                                <template slot-scope="scope">
                                    <img alt="avatar" src="{{ asset('images/avatar/1.jpg') }}">
                                </template>
                            </el-table-column>
                            <el-table-column prop="name" label="Title"></el-table-column>
                            <el-table-column prop="username" label="Views"></el-table-column>
                            <el-table-column prop="role" label="Category" width="120" align="center"></el-table-column>
                            <el-table-column prop="role" label="Tag" width="120" align="center"></el-table-column>
                            <el-table-column prop="role" label="Author" width="120" align="center"></el-table-column>
                            <el-table-column prop="activities_log" label="Publish Time" width="120" align="center"></el-table-column>
                            <el-table-column prop="status" label="Status" width="120" align="center"></el-table-column>
                            <el-table-column prop="action" label="Action" width="180" align="center">
                                <template slot-scope="scope">
                                    <el-button
                                    size="mini"
                                    @click="dialogViewVisible = true">View</el-button>
                                    <el-button
                                    size="mini"
                                    type="primary"
                                    @click="dialogEditVisible = true">Edit</el-button>
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
                        <!-- View image -->
                        <el-dialog :visible.sync="dialogViewVisible">
                            <img alt="avatar" src="{{ asset('images/avatar/1.jpg') }}">
                        </el-dialog>
                        <!-- Form Add-->
                        <el-dialog :visible.sync="dialogAddVisible">
                            <el-form :model="form">
                                <el-form-item label="Title">
                                    <el-input v-model="form.name"></el-input>
                                </el-form-item>
                                <el-form-item label="Category">
                                    <el-select v-model="form.category" placeholder="Choose category">
                                        <el-option label="Default" value="default"></el-option>
                                        <el-option label="News" value="news"></el-option>
                                    </el-select>
                                </el-form-item>
                                <el-form-item label="Tags">
                                    <el-select
                                        v-model="form.tag"
                                        multiple
                                        filterable
                                        allow-create
                                        default-first-option
                                        placeholder="Choose tags for your article"
                                        style="width: 50%;">
                                        <el-option
                                        v-for="item in options5"
                                        :key="item.value"
                                        :label="item.label"
                                        :value="item.value"
                                        >
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                                <el-form-item label="Status:">
                                    <el-select v-model="form.status">
                                        <el-option label="Visible" value="visible"></el-option>
                                        <el-option label="Hide" value="hide"></el-option>
                                    </el-select>
                                </el-form-item>
                                <el-form-item>
                                    <el-upload
                                        class="avatar-uploader"
                                        action="https://jsonplaceholder.typicode.com/posts/"
                                        :show-file-list="false"
                                        :on-success="handleAvatarSuccess"
                                        :before-upload="beforeAvatarUpload">
                                        <img v-if="imageUrl" :src="imageUrl" class="avatar">
                                        <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                                    </el-upload>
                                </el-form-item>
                            </el-form>
                            <span slot="footer" class="dialog-footer">
                                <el-button @click="dialogAddVisible = false">Close</el-button>
                                <el-button type="primary" @click="dialogAddVisible = false">Add</el-button>
                            </span>
                        </el-dialog>
                        <!-- Form Edit-->
                        <el-dialog :visible.sync="dialogEditVisible">
                            <el-form :model="form">
                                <el-form-item label="Title">
                                    <el-input v-model="form.name"></el-input>
                                </el-form-item>
                                <el-form-item label="Category">
                                    <el-select v-model="form.category" placeholder="Choose category">
                                        <el-option label="Default" value="default"></el-option>
                                        <el-option label="News" value="news"></el-option>
                                    </el-select>
                                </el-form-item>
                                <el-form-item label="Tags">
                                    <el-select
                                        v-model="form.tag"
                                        multiple
                                        filterable
                                        allow-create
                                        default-first-option
                                        placeholder="Choose tags for your article"
                                        style="width: 50%;">
                                        <el-option
                                        v-for="item in options5"
                                        :key="item.value"
                                        :label="item.label"
                                        :value="item.value"
                                        >
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                                <el-form-item label="Status:">
                                    <el-select v-model="form.status">
                                        <el-option label="Visible" value="visible"></el-option>
                                        <el-option label="Hide" value="hide"></el-option>
                                    </el-select>
                                </el-form-item>
                                <el-form-item>
                                    <el-upload
                                        class="avatar-uploader"
                                        action="https://jsonplaceholder.typicode.com/posts/"
                                        :show-file-list="false"
                                        :on-success="handleAvatarSuccess"
                                        :before-upload="beforeAvatarUpload">
                                        <img v-if="imageUrl" :src="imageUrl" class="avatar">
                                        <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                                    </el-upload>
                                </el-form-item>
                            </el-form>
                            <span slot="footer" class="dialog-footer">
                                <el-button type="danger" @click="handleDelete()">Delete</el-button>
                                <el-button type="primary" @click="dialogEditVisible = false">Update</el-button>
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
                region: 'all'
            },
            dialogViewVisible: false,
            imageUrl: '',
            dialogAddVisible: false,
            dialogEditVisible: false,
            form: {
                name: '',
                category: '',
                tag: '',
                status: ''
            },
            options5: [{
                value: 'HTML',
                label: 'HTML'
                }, {
                value: 'CSS',
                label: 'CSS'
                }, {
                value: 'JavaScript',
                label: 'JavaScript'
            }],
            value10: []
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
        handleAvatarSuccess(res, file) {
            this.imageUrl = URL.createObjectURL(file.raw);
        },
        beforeAvatarUpload(file) {
            const isJPG = file.type === 'image/jpeg';
            const isLt2M = file.size / 1024 / 1024 < 2;

            if (!isJPG) {
            this.$message.error('Avatar picture must be JPG format!');
            }
            if (!isLt2M) {
            this.$message.error('Avatar picture size can not exceed 2MB!');
            }
            return isJPG && isLt2M;
        },
        handleDelete() {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this image!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Your image has been deleted!", {
                    icon: "success",
                });
                } else {
                    swal("Your image is safe!");
                }
            });
        }
      }
    })
</script>
@endsection