@extends('../layouts.master')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
<style>
.v-modal {
    z-index: -1!important;
}
.container {
    margin-bottom: 15px;
}
.avatar-upload {
  position: relative;
  max-width: 80%;
  margin: auto;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 10px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "";
  font-family: "FontAwesome";
  color: #757575;
  position: absolute;
  top: 5px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
  height: 192px;
  position: relative;
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}
</style>
@endsection

@section('content')
        <div class="breadcrumbs">
            <div class="page-header float-left">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{ route('admin.photo') }}">Photo</a></li>
                        <li class="active">Beautiful Kitchen</li>
                    </ol>
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
                        <el-table :data="album.photos" stripe border style="width: 100%">
                            <el-table-column width="100" align="center">
                                <template slot-scope="scope">
                                    <img alt="avatar" :src="scope.row.image_url">
                                </template>
                            </el-table-column>
                            <el-table-column prop="name" label="Title"></el-table-column>
                            <el-table-column prop="view_count" label="Views" width="80" align="center"></el-table-column>
                            <el-table-column prop="categories" label="Category" width="120" align="center"></el-table-column>
                            <el-table-column prop="tags" label="Tag" width="120" align="center"></el-table-column>
                            <el-table-column prop="created_by" label="Author" width="120" align="center"></el-table-column>
                            <el-table-column prop="created_at_carbon" label="Publish Time" width="120" align="center"></el-table-column>
                            <el-table-column prop="status" label="Status" width="100" align="center"></el-table-column>
                            <el-table-column label="Action" width="150" align="center">
                                <template slot-scope="scope">
                                    <el-button
                                    size="mini"
                                    @click="viewPhoto(scope.$index, scope.row)">View</el-button>
                                    <el-button
                                    size="mini"
                                    type="primary"
                                    @click="editPhoto(scope.$index, scope.row)">Edit</el-button>
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
                        <!-- View image -->
                        <el-dialog :visible.sync="dialogViewVisible">
                            <img alt="avatar" :src="view_image">
                        </el-dialog>
                        <!-- Form Add-->
                        <el-dialog :visible.sync="dialogAddVisible">
                            <el-row>
                                <div class="container">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="imageUpload" @change="onImageChange" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview" style="background-image: url(/images/album/default.png);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </el-row>
                            <el-row>
                                <el-form :label-position="labelPosition">
                                    <el-form-item label="Title">
                                        <el-input v-model="form_photo.name"></el-input>
                                    </el-form-item>
                                    <el-form-item label="Category">
                                        <el-select
                                            v-model="form_photo.categories"
                                            multiple
                                            filterable
                                            allow-create
                                            default-first-option
                                            placeholder="Choose categories for your photo">
                                            <el-option
                                                v-for="category in categories"
                                                :key="category.id"
                                                :label="category.name"
                                                :value="category.id">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                    <el-form-item label="Tags">
                                        <el-select
                                            v-model="form_photo.tags"
                                            multiple
                                            filterable
                                            allow-create
                                            default-first-option
                                            placeholder="Choose tags for your photo">
                                            <el-option
                                                v-for="tag in tags"
                                                :key="tag.id"
                                                :label="tag.name"
                                                :value="tag.id">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                    <el-form-item label="Status:">
                                        <el-select v-model="form_photo.status">
                                            <el-option label="Active" value="1"></el-option>
                                            <el-option label="Disable" value="0"></el-option>
                                        </el-select>
                                    </el-form-item>
                                    <el-form-item>
                                        
                                    </el-form-item>
                                </el-form>
                            </el-row>
                            <span slot="footer" class="dialog-footer" v-if="!disable_add_button">
                                <el-button @click="dialogAddVisible = false">Close</el-button>
                                <el-button type="primary" @click="addPhoto">Add</el-button>
                            </span>
                            <span slot="footer" class="dialog-footer" v-else>
                                <el-button type="primary" disabled>Uploading...</el-button>
                            </span>
                        </el-dialog>

                        <!-- Form Edit-->
                        <el-dialog :visible.sync="dialogEditVisible">
                            <el-row>
                                <div class="container">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="imageEditUpload" @change="onImageEditChange" accept=".png, .jpg, .jpeg" />
                                            <label for="imageEditUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imageEditPreview" :style="{backgroundImage: 'url(' + edit_photo.image_url + ')'}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </el-row>
                            <el-row>
                                <el-form :label-position="labelPosition">
                                    <el-form-item label="Title">
                                        <el-input v-model="edit_photo.name"></el-input>
                                    </el-form-item>
                                    <el-form-item label="Category">
                                        <el-select 
                                            v-model="edit_photo.categories" 
                                            multiple
                                            filterable
                                            allow-create
                                            placeholder="Choose category">
                                            <el-option
                                                v-for="category in categories"
                                                :key="category.id"
                                                :label="category.name"
                                                :value="category.id">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                    <el-form-item label="Tags">
                                        <el-select
                                            v-model="edit_photo.tags"
                                            multiple
                                            filterable
                                            allow-create
                                            default-first-option
                                            placeholder="Choose tags for your article"
                                            style="width: 50%;">
                                            <el-option
                                            v-for="tag in tags"
                                            :key="tag.id"
                                            :label="tag.name"
                                            :value="tag.id"
                                            >
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                    <el-form-item label="Status:">
                                        <el-select v-model="edit_photo.status">
                                            <el-option label="Active" value="1"></el-option>
                                            <el-option label="Disable" value="0"></el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-form>
                            </el-row>
                            <span slot="footer" class="dialog-footer" v-if="!disable_edit_button">
                                <el-button type="danger" @click="handleDelete()">Delete</el-button>
                                <el-button type="default" @click="dialogEditVisible = false">Close</el-button>
                                <el-button type="primary" @click="update">Update</el-button>
                            </span>
                            <span slot="footer" class="dialog-footer" v-else>
                                <el-button type="primary" disabled>Updating...</el-button>
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
      data: function() {
        return {
            labelPosition: 'top',
            album: {
                photos: []
            },
            tags: [],
            categories: [],
            form_photo: {
                album_id: {{$album->id}},
                name: '',
                status: null,
                tags: [],
                categories: []
            },
            image: '',
            formInline: {
                region: null,
            },
            dialogViewVisible: false,
            dialogAddVisible: false,
            dialogEditVisible: false,
            page_size: 10,
            total: null,
            view_image: '',
            edit_photo: {
                id: null,
                name: '',
                categories: '',
                tags: '',
                status: null,
                image_url: ''
            },
            edit_image: '',
            disable_add_button: false,
            disable_edit_button: false,
            edit_photo_is_new: false
        }
      },
      created: function() {
        var com = this;

        axios.get('/api/categories')
        .then(function (response) {
            com.categories = response.data;
        })
        .catch(function (error) {
            console.log(error);
        });

        axios.get('/api/tags')
        .then(function (response) {
            com.tags = response.data;
        })
        .catch(function (error) {
            console.log(error);
        });

        this.table_change();
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
        table_change() {
            var com = this;
            axios.get('/api/photos', {params: {limit: 10, offset: 0, album_id: com.form_photo.album_id}})
            .then(function (response) {
                // console.log(response.data[0]);
                var photos = response.data[0];
                photos = photos.map(function(photo) {
                    photo.categories = photo.categories.map(function(category) {
                        return category.name;
                    }).join(", ");
                    photo.tags = photo.tags.map(function(tag) {
                        return tag.name;
                    }).join(", ");
                    return photo
                })
                com.album.photos = photos;
                com.total = response.data[1];
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        onImageChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
        },
        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.image = e.target.result;
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            };
            reader.readAsDataURL(file);
        },
        onImageEditChange(e) {
            this.edit_photo_is_new = true;
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createEditImage(files[0]);
        },
        createEditImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.edit_image = e.target.result;
                $('#imageEditPreview').css('background-image', 'url('+e.target.result +')');
                $('#imageEditPreview').hide();
                $('#imageEditPreview').fadeIn(650);
            };
            reader.readAsDataURL(file);
        },
        addPhoto() {
            var com = this;
            com.disable_add_button = true;
            axios.post('/api/photos', {photo: com.form_photo, image: com.image})
            .then(function (response) {
                com.$notify({
                    title: 'Success',
                    message: 'Successful add photo to album',
                    type: 'success'
                });
                com.dialogAddVisible = false;
                com.table_change();
                com.disable_add_button = false;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        viewPhoto(index, row) {
            this.dialogViewVisible = true;
            this.view_image = row.image_url;
        },
        editPhoto(index, row) {
            this.dialogEditVisible = true;
            this.edit_photo.name = row.name;
            this.edit_photo.status = row.status;
            this.edit_photo.categories = row.categories.split(", ");
            this.edit_photo.tags = row.tags.split(", ");
            this.edit_photo.image_url = row.image_url;
            this.edit_photo.id = row.id;
        },
        update() {
            var com = this;
            com.disable_edit_button = true;
            axios.put(`/api/photos/${com.edit_photo.id}`, {photo: com.edit_photo, image: com.edit_image, photo_is_new: com.edit_photo_is_new})
            .then(function (response) {
                com.$notify({
                    title: 'Success',
                    message: 'Successful update photo',
                    type: 'success'
                });
                com.dialogEditVisible = false;
                com.edit_photo_is_new = false;
                com.table_change();
                com.disable_edit_button = false;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        handleDelete() {
            var com = this;
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this image!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.delete(`/api/photos/${com.edit_photo.id}`)
                    .then(function (response) {
                        swal("Poof! Your image has been deleted!", {
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
                    swal("Your image is safe!");
                }
            });
        }
      }
    })
</script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
@endsection