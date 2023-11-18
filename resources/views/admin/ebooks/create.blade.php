<x-admin.layout>
    <x-admin.breadcrumb title='Create E-Book' :links="[
        ['text' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['text' => 'E-Books', 'url' => route('admin.ebooks.index')],
        ['text' => 'Create'],
    ]" :actions="[
        [
            'text' => 'All E-Books',
            'icon' => 'fas fa-list',
            'url' => route('admin.ebooks.index'),
            'class' => 'btn-dark btn-loader',
        ],
    ]" />


    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.ebooks.store') }}" method="POST" class="card shadow-sm"
                enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label for="">Category <span class="text-danger">*</span></label>
                                <select name="parent_id" class="form-control select2" required>
                                    <option value="">-- Select --</option>
                                    @foreach ($categories as $rootCategory)
                                        <optgroup label="{{ $rootCategory->name }}">
                                            @foreach ($rootCategory->children as $subCategory)
                                                @include('admin.ebooks.categories.partials.subCategory', [
                                                    'subCategory' => $subCategory,
                                                    'selected' => request()->get('parent_id'),
                                                ])
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label for="professor">By Professor <span class="text-danger">*</span></label>
                                <input type="text" name="professor" class="form-control"
                                    value="{{ old('professor') }}" required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label for="">Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control" required>
                                    <option value="">-- Select --</option>
                                    <option value="1" selected>Active
                                    </option>
                                    {{-- <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>In-Active
                                    </option> --}}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="short_content">Short Description </label>
                        <textarea name="short_content" class="form-control" id="short_content" rows="2">{{ old('short_content') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Description </label>
                        <textarea name="content" class="form-control" id="content" rows="3">{{ old('content') }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-6">
                            <div class="d-flex">
                                <div class="mr-2">
                                    <div id="main-image-preview"></div>
                                </div>
                                <div class="form-group flex-fill">
                                    <label for="">Thumbnail Image</label>
                                    <input type="file" name="image" class="form-control" id="crop-main-image">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-6">
                            <div class="d-flex">
                                <div class="mr-2">
                                    <div id="main-image-preview"></div>
                                </div>
                                <div class="form-group flex-fill">
                                    <label for="">PDF File <span class="text-danger">*</span></label>
                                    <input type="file" name="download_file" class="form-control" id="download_file" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <textarea name="meta_title" class="form-control" id="meta_title" cols="30" rows="2">{{ old('meta_title') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_keyword">Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control" id="meta_keyword" cols="30" rows="2">{{ old('meta_keyword') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description" class="form-control" id="meta_description" cols="30" rows="2">{{ old('meta_description') }}</textarea>
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
                targetId: 'main-image-preview'
            };
            imageCropper('crop-main-image', 6 / 5, previewImg2);
        </script>
    </x-slot>
</x-admin.layout>
