<x-admin.layout>
    <x-admin.breadcrumb title='Download Detail' :links="[
				['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
                ['text' => 'Download', 'url' => route('admin.ebooks.downloads.index')],
                ['text' => 'Detail']
			]" :actions="[
                ['text' => 'All Downloads', 'icon' => 'fas fa-list', 'url' => route('admin.ebooks.downloads.index'), 'class' => 'btn-dark btn-loader'],
            ]" />

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0 text-dark">Download Detail</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td><b>Avatar:</b></td>
                            <td><img src="{{ $download->avatar() }}" alt="alt" srcset="{{ $download->avatar() }}" width="40"></td>
                        </tr>
                        <tr>
                            <td><b>Full Name:</b></td>
                            <td>{{ $download->full_name }}</td>
                        </tr>
                        <tr>
                            <td><b>Email:</b></td>
                            <td>{{ $download->email }}</td>
                        </tr>
                        <tr>
                            <td><b>Mobile:</b></td>
                            <td>{{ $download->mobile }}</td>
                        </tr>
                        <tr>
                            <td><b>Category</b></td>
                            <td>{{ $download?->category?->name }}</td>
                        </tr>
                        <tr>
                            <td><b>Course:</b></td>
                            <td>{{ $download->course?->title }}</td>
                        </tr>
                        <tr>
                            <td><b>Created at:</b></td>
                            <td>{{ date('d-M-y h:i A', strtotime($download->created_at)) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


</x-admin.layout>
