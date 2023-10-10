<x-admin.layout>
    <x-admin.breadcrumb title='Edit Category' :links="[
        ['text' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['text' => 'Category', 'url' => route('admin.categories.index')],
        ['text' => 'Edit'],
    ]" :actions="[
        [
            'text' => 'Create New',
            'icon' => 'fas fa-plus',
            'url' => route('admin.categories.create'),
            'class' => 'btn-success btn-loader',
        ],
        [
            'text' => 'All Categories',
            'icon' => 'fas fa-list',
            'url' => route('admin.categories.index'),
            'class' => 'btn-dark btn-loader',
        ],
    ]" />


    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.categories.update', [$category]) }}" method="POST" class="card shadow-sm"
                enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-4 col-12">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{ $category->name }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group">
                                <label for="">Parent</label>
                                <select name="parent_id" class="form-control select2">
                                    <option value="">-- Select --</option>
                                    @foreach ($categories as $parent)
                                    <option value="{{ $parent->id }}" @selected($category->parent_id==$parent->id)>{{
                                        $parent?->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group">
                                <label for="">Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control" required>
                                    <option value="">-- Select --</option>
                                    <option value="1" {{ ($category->status=='1' ) ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="0" {{ ($category->status=='0' ) ? 'selected' : '' }}>In-Active
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content">Description </label>
                        <textarea name="content" class="form-control text-editor" id="content" cols="30"
                            rows="10">{{ $category?->content }}</textarea>
                    </div>
                    <div class="d-flex">
                        <div class="mr-2">
                            <div id="main-image-preview">
                                <img src="{{ $category->image() }}" alt="image" width="70"
                                    class="rounded-circle img-thumbnail">
                            </div>
                        </div>
                        <div class="form-group flex-fill">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control" id="crop-main-image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <textarea name="meta_title" class="form-control" id="meta_title" cols="30"
                            rows="2">{{ $category?->meta_title }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_keyword">Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control" id="meta_keyword" cols="30"
                            rows="3">{{ $category?->meta_keyword }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description" class="form-control" id="meta_description" cols="30"
                            rows="5">{{ $category?->meta_description }}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-dark">
                        <i class="fas fa-save"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('styles')
    <style>
        .user_profile_remove {
            position: absolute;
            width: 25px;
            height: 25px;
            font-size: 15px;
        }
    </style>
    @endpush
    <x-slot name="script">
        <script>
            var previewImg2 = {
                width: '70px',
                height: '70px',
                rounded: '50px',
                targetId:'main-image-preview'
            };
            imageCropper('crop-main-image', 16/9, previewImg2);

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
