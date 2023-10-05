<x-admin.layout>
    <x-admin.breadcrumb title='Create Course' :links="[
            ['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
            ['text' => 'Course', 'url' => route('admin.courses.index')],
            ['text' => 'Create']
        ]" :actions="[
            ['text' => 'All Courses',
            'icon'  => 'fas fa-list',
            'url'   => route('admin.courses.index'),
            'class' => 'btn-dark btn-loader'],
        ]" />


    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.courses.store') }}" method="POST" class="card shadow-sm"
                enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="">Category <span class="text-danger">*</span></label>
                                <select name="category_id" class="form-control select2" required>
                                    <option value="">-- Select --</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category?->id }}" @selected(old('category_id')==$category?->id)>
                                    {{ $category?->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sub_title">Sub Title </label>
                                <input type="text" name="sub_title" class="form-control" value="{{ old('sub_title') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="">Popular <span class="text-danger">*</span></label>
                            <select name="popular" class="form-control" required>
                                <option value="">-- Select --</option>
                                <option value="1" {{ (old('popular','1')=='1' ) ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ (old('popular')=='0' ) ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control" required>
                                    <option value="">-- Select --</option>
                                    <option value="1" {{ (old('status','1')=='1' ) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ (old('status')=='0' ) ? 'selected' : '' }}>In-Active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="mr-2">
                                    <div id="cover-image-preview"></div>
                                </div>
                                <div class="form-group flex-fill">
                                    <label for="">Thumbnail</label>
                                    <input type="file" name="thumbnail" class="form-control" id="crop-cover-image">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="download_link">Download Link</label>
                                <input type="url" name="download_link" class="form-control" value="{{ old('download_link') }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description </label>
                        <textarea name="description" class="form-control text-editor" id="description" cols="30"
                            rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <textarea name="meta_title" class="form-control" id="meta_title" cols="30" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_keyword">Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control" id="meta_keyword" cols="30"
                            rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description" class="form-control" id="meta_description" cols="30"
                            rows="5"></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-dark btn-loader">
                        <i class="fas fa-save"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="script">
        <script>
            var previewImg = {
                width: '70px',
                height: '70px',
                rounded: '50px',
                targetId:'cover-image-preview'
            };
            imageCropper('crop-cover-image', 16/9, previewImg);
            tinymce.init({
                toolbar: 'fontselect fontsizeselect | bold italic underline strikethrough | aligncenter alignjustify alignleft alignright | indent outdent |  table forecolor backcolor image code',
                plugins: 'table autosave image code',
                selector: '.text-editor',
                height: 400,
                images_upload_handler: function (blobInfo, success, failure) {
                    success("data:" + blobInfo.blob().type + ";base64," + blobInfo.base64());
                },
            });
        </script>
    </x-slot>
</x-admin.layout>
