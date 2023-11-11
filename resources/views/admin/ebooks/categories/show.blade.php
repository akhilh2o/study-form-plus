<x-admin.layout>
    <x-admin.breadcrumb title='Category Detail' :links="[
				['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
                ['text' => 'Categories', 'url' => route('admin.categories.index')],
                ['text' => 'Detail']
			]" :actions="[
                ['text' => 'Create New', 'icon' => 'fas fa-plus', 'url' => route('admin.categories.create'), 'class' => 'btn-success btn-loader'],
                ['text' => 'All Categories', 'icon' => 'fas fa-list', 'url' => route('admin.categories.index'), 'class' => 'btn-dark btn-loader'],
            ]" />

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0 text-dark">Category Detail</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td><b>Image:</b></td>
                            <td><img src="{{ $category->image() }}" alt="alt" srcset="{{ $category->image() }}"
                                    width="40"></td>
                        </tr>
                        <tr>
                            <td><b>Thumbnail:</b></td>
                            <td><img src="{{ $category->imageThumb() }}" alt="alt"
                                    srcset="{{ $category->imageThumb() }}" width="40"></td>
                        </tr>
                        <tr>
                            <td><b>Name:</b></td>
                            <td>{{ $category->name }}</td>
                        </tr>
                        <tr>
                            <td><b>By:</b></td>
                            <td>{{ $category->professor }}</td>
                        </tr>
                        <tr>
                            <td><b>Parent Category</b></td>
                            <td>{{ $category?->parent?->name }}</td>
                        </tr>
                        <tr>
                            <td><b>Short Description:</b></td>
                            <td>{!! $category->short_content !!}</td>
                        </tr>
                        <tr>
                            <td><b>Description:</b></td>
                            <td>{!! $category->content !!}</td>
                        </tr>
                        <tr>
                            <td><b>Meta Title:</b></td>
                            <td>{{ $category->meta_title }}</td>
                        </tr>
                        <tr>
                            <td><b>Meta Keyword:</b></td>
                            <td>{{ $category->meta_keyword }}</td>
                        </tr>
                        <tr>
                            <td><b>Meta Description:</b></td>
                            <td>{{ $category->meta_description }}</td>
                        </tr>
                        <tr>
                            <td><b>Status:</b></td>
                            <td><span class="badge bg-{{ $category->status ? 'success' : 'danger' }} fs-12">
                                    {{ $category->status ? 'Active' : 'In-active' }} </span></td>
                        </tr>
                        <tr>
                            <td><b>Created at:</b></td>
                            <td>{{ date('d-M-y h:i A', strtotime($category->created_at)) }}</td>
                        </tr>
                        <tr>
                            <td colspan="1" class="text-center">
                                <a href="{{ route('admin.categories.edit', [$category]) }}"
                                    class="btn btn-success px-3"><i class="fas fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


</x-admin.layout>
