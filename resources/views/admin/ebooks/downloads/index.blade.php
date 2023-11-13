<x-admin.layout>
    <x-admin.breadcrumb title='All Downloads' :links="[
        [
            'text' => 'Dashboard',
            'url' => route('admin.dashboard'),
        ],
        [
            'text' => 'Ebook',
        ],
        [
            'text' => 'Download',
        ],
    ]" :actions="[
        [
            'text' => 'Filter',
            'icon' => 'fas fa-filter',
            'class' => 'btn-secondary btn-loader',
            'url' => route('admin.ebooks.downloads.index', ['filter' => 1]),
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
        <x-admin.paginator-info :items="$downloads" class="card-header" />
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Thumbnail</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Course</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($downloads as $download)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ $download->avatar() }}" alt="Avatar" width="50" height="40"></td>
                            <td>{{ $download?->full_name }}</td>
                            <td>{{ $download?->email }}</td>
                            <td>{{ $download?->mobile }}</td>
                            <td>{{ $download?->course?->title }}</td>
                            <td width="25%">
                                <a href="{{ route('admin.ebooks.downloads.show', [$download]) }}"
                                    class="btn btn-info btn-sm btn-loader load-circle">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                                <form action="{{ route('admin.ebooks.downloads.destroy', [$download]) }}" method="POST"
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
            {{ $downloads->links() }}
        </div>
    </div>
</x-admin.layout>
