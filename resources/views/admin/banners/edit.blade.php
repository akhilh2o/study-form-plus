<x-admin.layout>
	<x-admin.breadcrumb
			title='Banner Edit'
			:links="[
				['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
                ['text' => 'Banner', 'url' => route('admin.banners.index')],
                ['text' => 'Edit']
			]"
            :actions="[
                ['text' => 'Banners', 'icon' => 'fas fa-list', 'url' => route('admin.banners.index'), 'permission' => 'banners_access', 'class' => 'btn-success btn-loader btn-loader'],
                ['text' => 'Create Banner', 'icon' => 'fas fa-plus', 'url' => route('admin.banners.create'), 'permission' => 'banners_create', 'class' => 'btn-dark btn-loader btn-loader'],
            ]"
		/>

    <form method="POST" action="{{ route('admin.banners.update', [$banner]) }}" class="card shadow-sm" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body table-responsive">
            <div class="row">
                <div class="col-sm-6">
                    <div class="d-flex">
                        <div class="mr-3">
                            <img src="{{ $banner->imageUrl() }}" alt="image" width="200" >
                        </div>
                        <div class="form-group flex-fill">
                            <label for="">Upload Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Alt Text <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="alt_text" placeholder="Title or Name" value="{{ $banner->alt_text }}">
                    </div>
                </div>
               
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
        </script>
    </x-slot>
</x-admin.layout>
