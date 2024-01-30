<x-admin.layout>
    <x-admin.breadcrumb title='Create Category' :links="[
            ['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
            ['text' => 'Category', 'url' => route('admin.categories.index')],
            ['text' => 'Create']
        ]" :actions="[
            ['text' => 'All Categories',
            'icon'  => 'fas fa-list',
            'url'   => route('admin.categories.index'),
            'class' => 'btn-dark btn-loader'],
        ]" />


    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.categories.store') }}" method="POST" class="card shadow-sm"
                enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 col-12">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group">
                                <label for="">Parent</label>
                                <select name="parent_id" class="form-control select2">
                                    <option value="">-- Select --</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(request()->get('parent_id')==$category->id)>{{ $category?->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group">
                                <label for="">Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control select2" required>
                                    <option value="">-- Select --</option>
                                    <option value="1" {{ (old('status','1')=='1') ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ (old('status')=='0') ? 'selected' : '' }}>In-Active</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content">Description </label>
                        <textarea name="content" class="form-control" id="content" rows="3" required></textarea>
                    </div>
                    <div class="d-flex">
                        <div class="mr-2">
                            <div id="main-image-preview"></div>
                        </div>
                        <div class="form-group flex-fill">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control" id="crop-main-image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <textarea name="meta_title" class="form-control" id="meta_title" cols="30" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_keyword">Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control" id="meta_keyword" cols="30"
                            rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description" class="form-control" id="meta_description" cols="30"
                            rows="2"></textarea>
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
            var previewImg2 = {
                width: '70px',
                height: '70px',
                targetId:'main-image-preview'
            };
            imageCropper('crop-main-image', 6/5, previewImg2);
        </script>
    </x-slot>
</x-admin.layout>
