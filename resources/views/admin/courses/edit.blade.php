<x-admin.layout>
    <x-admin.breadcrumb title='Edit Course' :links="[
        ['text' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['text' => 'Course', 'url' => route('admin.courses.index')],
        ['text' => 'Edit'],
    ]" :actions="[
        [
            'text' => 'Create New',
            'icon' => 'fas fa-plus',
            'url' => route('admin.courses.create'),
            'class' => 'btn-success btn-loader',
        ],
        [
            'text' => 'All Course',
            'icon' => 'fas fa-list',
            'url' => route('admin.courses.index'),
            'class' => 'btn-dark btn-loader',
        ],
    ]" />


    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.courses.update', [$course]) }}" method="POST" class="card shadow-sm"
                enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" value="{{ $course->title }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sub_title">Sub Title </label>
                                <input type="text" name="sub_title" class="form-control"
                                    value="{{ old('sub_title', $course->sub_title) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="mr-2">
                                    <div id="cover-image-preview">
                                        <img src="{{ $course->thumb() }}" alt="image" width="75"
                                            class="img-thumbnail">
                                    </div>
                                </div>
                                <div class="form-group flex-fill">
                                    <label for="">Thumbnail</label>
                                    <input type="file" name="thumbnail" class="form-control" id="crop-cover-image">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="demo_link">Demo URL (Youtube link) <span
                                        class="text-danger">*</span></label>
                                <input type="url" name="demo_link" class="form-control"
                                    value="{{ $course->demo_link }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="net_price">Faculties <span class="text-danger">*</span></label>
                                <select name="faculties[]" class="form-control select2" multiple required>
                                    <option disabled>-- Select --</option>
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ $faculty?->title }}" @selected(in_array($faculty?->title, $course?->faculties ? explode(', ', $course->faculties) : []))>
                                            {{ $faculty?->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="doubt_solving_faculties">Doubt Solving Facility <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="doubt_solving_faculties" class="form-control"
                                    value="{{ $course->doubt_solving_faculties }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="net_price">Net Price <span class="text-danger">*</span></label>
                                <input type="number" name="net_price" class="form-control"
                                    value="{{ $course->net_price }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sale_price">Sale Price <span class="text-danger">*</span></label>
                                <input type="number" name="sale_price" class="form-control"
                                    value="{{ $course->sale_price }}" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="">Language <span class="text-danger">*</span></label>
                            <select name="language" class="form-control select2" required>
                                <option value="">-- Select --</option>
                                <option value="English" {{ $course->language == 'English' ? 'selected' : '' }}>English
                                </option>
                                <option value="Hindi" {{ $course->language == 'Hindi' ? 'selected' : '' }}>Hindi
                                </option>
                                <option value="English/Hindi" {{ $course->language == 'English/Hindi' ? 'selected' : '' }}>English/Hindi
                                </option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Category <span class="text-danger">*</span></label>
                                <select name="category_id" class="form-control select2" required>
                                    <option value="">-- Select --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category?->id }}" @selected($course->category_id == $category?->id)>
                                            {{ $category?->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="">Popular <span class="text-danger">*</span></label>
                            <select name="popular" class="form-control select2" required>
                                <option value="">-- Select --</option>
                                <option value="1" {{ $course->popular == '1' ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $course->popular == '0' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control select2" required>
                                    <option value="">-- Select --</option>
                                    <option value="1" {{ $course->status == '1' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="0" {{ $course->status == '0' ? 'selected' : '' }}>In-Active
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="duration">Duration <span class="text-danger">*</span></label>
                                <input type="text" name="duration" class="form-control"
                                    value="{{ $course->duration }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exam_validity">Exam Validity <span class="text-danger">*</span></label>
                                <input type="text" name="exam_validity" class="form-control"
                                    value="{{ $course->exam_validity }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="order_type_download">Study Material <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="order_type_pendrive" type="checkbox"
                                        id="order_type_pendrive" value="1" @checked($course->order_type_pendrive)>
                                    <label class="form-check-label" for="order_type_pendrive">Pendrive</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="order_type_download" type="checkbox"
                                        id="order_type_download" value="1" @checked($course->order_type_download)>
                                    <label class="form-check-label" for="order_type_download">Downloadable</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description </label>
                        <textarea name="description" class="form-control text-editor" id="description" rows="10">{{ $course->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <textarea name="meta_title" class="form-control" id="meta_title" rows="2">{{ $course?->meta_title }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_keyword">Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control" id="meta_keyword" rows="2">{{ $course?->meta_keyword }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description" class="form-control" id="meta_description" rows="2">{{ $course?->meta_description }}</textarea>
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
            var previewImg = {
                width: '70px',
                height: '70px',
                rounded: '50px',
                targetId: 'cover-image-preview'
            };
            imageCropper('crop-cover-image', 16 / 9, previewImg);


            tinymce.init({
                toolbar: 'fontselect fontsizeselect | bold italic underline strikethrough | aligncenter alignjustify alignleft alignright | indent outdent |  table forecolor backcolor image code',
                plugins: 'table autosave image code',
                selector: '.text-editor',
                height: 400,
                images_upload_handler: function(blobInfo, success, failure) {
                    success("data:" + blobInfo.blob().type + ";base64," + blobInfo.base64());
                },
            });
        </script>
    </x-slot>
</x-admin.layout>
