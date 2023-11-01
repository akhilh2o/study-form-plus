<x-admin.layout>
    <x-admin.breadcrumb title='All Faculties' :links="[
				['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
                ['text' => 'Faculties']
			]" :actions="[
                ['text' => 'Create New', 'icon' => 'fas fa-plus', 'url' => route('admin.faculties.create'), 'permission' => 'faculties_create', 'class' => 'btn-success btn-loader btn-loader'],
                ['text' => 'Dashboard', 'icon' => 'fas fa-technometer', 'url' => auth()->user()->dashboardRoute(), 'class' => 'btn-dark btn-loader'],
            ]" />

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Avatar</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($faculties ?? [] as $faculty)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ $faculty->avatarUrl() }}" alt="image" width="50" class="rounded-circle">
                        </td>
                        <td>
                            {{ $faculty->title }}
                            <div class="small text-nowrap">
                                <b>Designation: </b> {{ $faculty->subtitle }}
                            </div>
                        </td>
                        <td class="small" width="60%">{!! $faculty->content !!}</td>
                        <td class="text-nowrap">
                            @can('faculties_update')
                            <a href="{{ route('admin.faculties.edit', [$faculty]) }}"
                                class="btn btn-success btn-sm btn-loader load-circle">
                                <i class="fas fa-edit"></i>
                            </a>
                            @endcan

                            @can('faculties_delete')
                            <form action="{{ route('admin.faculties.destroy', [$faculty]) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger delete-alert btn-loader load-circle"><i
                                        class="fas fa-trash"></i></button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin.layout>
