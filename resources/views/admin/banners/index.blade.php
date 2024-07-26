<x-admin.layout>
    <x-admin.breadcrumb title='All Banners' :links="[
				['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
                ['text' => 'Banners']
			]" :actions="[
                ['text' => 'Create New', 'icon' => 'fas fa-plus', 'url' => route('admin.banners.create'), 'permission' => 'banners_create', 'class' => 'btn-success btn-loader btn-loader'],
                ['text' => 'Dashboard', 'icon' => 'fas fa-technometer', 'url' => auth()->user()->dashboardRoute(), 'class' => 'btn-dark btn-loader'],
            ]" />

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Alt Text</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($banners ?? [] as $banner)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ $banner->imageUrl() }}" alt="{{ $banner->alt_text }}" width="200">
                        </td>
                        <td>
                            {{ $banner->alt_text }}
                        </td>
                        <td class="text-nowrap">
                            @can('banners_update')
                            <a href="{{ route('admin.banners.edit', [$banner]) }}"
                                class="btn btn-success btn-sm btn-loader load-circle">
                                <i class="fas fa-edit"></i>
                            </a>
                            @endcan

                            @can('banners_delete')
                            <form action="{{ route('admin.banners.destroy', [$banner]) }}" method="POST"
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
