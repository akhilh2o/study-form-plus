<x-admin.layout>
    <x-admin.breadcrumb title='Banner Create' :links="[
				['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
                ['text' => 'Banners', 'url' => route('admin.banners.index')],
                ['text' => 'Create']
			]" :actions="[
                ['text' => 'Banners', 'icon' => 'fas fa-list', 'url' => route('admin.banners.index'), 'permission' => 'banners_access', 'class' => 'btn-success btn-loader btn-loader'],
                ['text' => 'Dashboard', 'icon' => 'fas fa-technometer', 'url' => auth()->user()->dashboardRoute(), 'class' => 'btn-dark btn-loader'],
            ]" />

    <form method="POST" action="{{ route('admin.banners.store') }}" class="card shadow-sm" enctype="multipart/form-data">
        @csrf
        <div class="card-body table-responsive">
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <div class="form-group">
                        <label for="image">Upload Image</label>
                        <input type="file" id="image" class="form-control" name="image">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="form-group">
                        <label for="alt_text">Alt Text <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="alt_text" id="alt_text" placeholder="Alt Text"
                            value="{{ old('alt_text') }}">
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
