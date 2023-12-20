<x-admin.layout>
    <x-admin.breadcrumb title='All Courses' :links="[
				[
                    'text' => 'Dashboard',
                    'url'  => route('admin.dashboard')
                ],
                [
                    'text' => 'Course'
                ]
			]" :actions="[
                [
                    'text'  => 'Filter',
                    'icon'  => 'fas fa-filter',
                    'class' => 'btn-secondary btn-loader',
                    'url'   => route('admin.courses.index', ['filter' => 1])
                ],
                [
                    'text'       => 'Create New',
                    'icon'       => 'fas fa-plus',
                    'url'        => route('admin.courses.create'),
                    'class'      => 'btn-dark btn-loader'
            ],
            ]" />

    @if(request()->get('filter'))
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
                        <a href="{{ route('admin.courses.index') }}" class="btn btn-basic border btn-loader">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endif
    <div class="card shadow-sm">
        <x-admin.paginator-info :items="$courses" class="card-header" />
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Language</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td width="2%">{{ $loop->iteration }}</td>
                        <td width="10%"><img src="{{ $course->thumb() }}" alt="cover image" width="50" height="40">
                        </td>
                        <td width="40%">
                            {{ $course->title }}
                            <div class="text-small">{{ Str::limit($course->sub_title,50) }}</div>
                        </td>
                        <td>{{ $course?->category?->name }}</td>
                        <td>{{ $course?->language }}</td>
                        <td>{{ $course?->duration }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button"
                                    class="btn btn-{{ $course->status ? 'success' : 'danger' }} text-nowrap btn-sm">
                                    {!! $course->status ? 'Active'.str_repeat('&nbsp;', 3) : 'In-active' !!}
                                </button>
                                <button type="button"
                                    class="btn btn-{{ $course->status ? 'success' : 'danger' }} btn-sm dropdown-toggle dropdown-toggle-split"
                                    data-bs-toggle="dropdown">
                                    <i class="fas fa-caret-down"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item bg-danger text-white"
                                        href="{{ route('admin.courses.status', [$course]) }}">
                                        In-active
                                    </a>
                                    <a class="dropdown-item bg-success text-white"
                                        href="{{ route('admin.courses.status', [$course]) }}">
                                        Active
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td width="15%">
                            <a href="{{ route('admin.courses.show', [$course]) }}"
                                class="btn btn-info btn-sm btn-loader load-circle">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <a href="{{ route('admin.courses.edit', [$course]) }}"
                                class="btn btn-success btn-sm btn-loader load-circle">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('admin.courses.destroy', [$course]) }}" method="POST"
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
            {{ $courses->links() }}
        </div>
    </div>
</x-admin.layout>
