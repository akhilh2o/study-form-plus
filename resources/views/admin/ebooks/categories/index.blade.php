<x-admin.layout>
    <x-admin.breadcrumb title='All Categories' :links="[
        [
            'text' => 'Dashboard',
            'url' => route('admin.dashboard'),
        ],
        [
            'text' => 'Ebook',
        ],
        [
            'text' => 'Category',
        ],
    ]" :actions="[
        [
            'text' => 'Filter',
            'icon' => 'fas fa-filter',
            'class' => 'btn-secondary btn-loader',
            'url' => route('admin.ebooks.categories.index', ['filter' => 1]),
        ],
        [
            'text' => 'Create New',
            'icon' => 'fas fa-plus',
            'url' => route('admin.ebooks.categories.create'),
            'class' => 'btn-dark btn-loader',
        ],
    ]" />

    @if (request()->get('filter'))
        <div class="card" id="filter">
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <input type="text" name="search" class="form-control mb-sm-0 mb-2" placeholder="Search"
                                value="{{ Request::get('search') }}">
                        </div>
                        <div class="col-12 col-md-4">
                            <button type="submit" class="btn btn-dark btn-loader">
                                <i class="fas fa-save"></i> Submit
                            </button>
                            <a href="{{ route('admin.ebooks.categories.index') }}" class="btn btn-basic border btn-loader">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <div class="card shadow-sm">
        <x-admin.paginator-info :items="$categories" class="card-header" />
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Thumbnail</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ $category->imageThumb() }}" alt="cover image" width="50"
                                    height="40"></td>
                            <td>{{ $category->name }}
                                <a href="{{ route('admin.ebooks.categories.index') }}?parent_id={{ $category->id }}">
                                    <div>
                                        <strong>({{ $category?->children_count }} Subcategory)</strong>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button"
                                        class="btn btn-{{ $category->status ? 'success' : 'danger' }} text-nowrap btn-sm">
                                        {!! $category->status ? 'Active' . str_repeat('&nbsp;', 3) : 'In-active' !!}
                                    </button>
                                    <button type="button"
                                        class="btn btn-{{ $category->status ? 'success' : 'danger' }} btn-sm dropdown-toggle dropdown-toggle-split"
                                        data-bs-toggle="dropdown">
                                        <i class="fas fa-caret-down"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item bg-danger text-white"
                                            href="{{ route('admin.ebooks.categories.status', [$category]) }}">
                                            In-active
                                        </a>
                                        <a class="dropdown-item bg-success text-white"
                                            href="{{ route('admin.ebooks.categories.status', [$category]) }}">
                                            Active
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td width="25%">
                                <form action="{{ route('admin.ebooks.categories.create') }}" class="d-inline-block">
                                    <input type="hidden" name="parent_id" value="{{ $category->id }}">
                                    <button class="btn btn-sm btn-warning btn-loader load-circle"
                                        title="Add Subcategory">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                </form>

                                <a href="{{ route('admin.ebooks.categories.show', [$category]) }}"
                                    class="btn btn-info btn-sm btn-loader load-circle">
                                    <i class="fas fa-info-circle"></i>
                                </a>

                                <a href="{{ route('admin.ebooks.categories.edit', [$category]) }}"
                                    class="btn btn-success btn-sm btn-loader load-circle">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.ebooks.categories.destroy', [$category]) }}" method="POST"
                                    class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger delete-alert btn-loader load-circle"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $categories->links() }}
        </div>
    </div>
</x-admin.layout>
