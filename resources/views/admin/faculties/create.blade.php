<x-admin.layout>
    <x-admin.breadcrumb title='Faculties Create' :links="[
				['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
                ['text' => 'Faculties', 'url' => route('admin.faculties.index')],
                ['text' => 'Create']
			]" :actions="[
                ['text' => 'Faculties', 'icon' => 'fas fa-list', 'url' => route('admin.faculties.index'), 'permission' => 'faculties_access', 'class' => 'btn-success btn-loader btn-loader'],
                ['text' => 'Dashboard', 'icon' => 'fas fa-technometer', 'url' => auth()->user()->dashboardRoute(), 'class' => 'btn-dark btn-loader'],
            ]" />

    <form method="POST" action="{{ route('admin.faculties.store') }}" class="card shadow-sm"
        enctype="multipart/form-data">
        @csrf
        <div class="card-body table-responsive">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="form-group">
                        <label for="">Upload Avatar</label>
                        <input type="file" class="form-control" name="avatar">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="form-group">
                        <label for="">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" placeholder="Title or Name"
                            value="{{ old('title') }}">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="form-group">
                        <label for="">Subtitle </label>
                        <input type="text" class="form-control" name="subtitle" placeholder="Location or Degisnation"
                            value="{{ old('subtitle') }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Description <span class="text-danger">*</span> </label>
                <textarea class="form-control text-editor" name="content" rows="3" placeholder="Write your description"
                    required>{{ old('content') }}</textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-dark btn-loader">
                <i class="fas fa-save"></i> Submit
            </button>
        </div>
    </form>
    <x-slot name="script">
        <script>
            tinymce.init({
                selector: '.text-editor',
                plugins: 'print preview paste importcss searchreplace autolink autosave directionality code visualblocks visualchars fullscreen image link codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap emoticons',
                imagetools_cors_hosts: ['picsum.photos'],
                menubar: 'file edit view insert format tools table help',
                toolbar1: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent',
                toolbar2: 'numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview print | insertfile image link codesample',
                toolbar_sticky: true,
                autosave_ask_before_unload: true,
                height: 400,
                toolbar_mode: 'sliding',
                file_picker_types: 'image',
                images_upload_handler: function (blobinfo, success, failure) {
                    success("data:" + blobinfo.blob().type + ";base64," + blobinfo.base64());
                }
            });
        </script>
    </x-slot>
</x-admin.layout>
