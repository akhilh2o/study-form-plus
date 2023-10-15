<x-admin.layout>
    <x-admin.breadcrumb title='Course Detail' :links="[
				['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
                ['text' => 'Course', 'url' => route('admin.courses.index')],
                ['text' => 'Detail']
			]" :actions="[
                ['text' => 'Create New', 'icon' => 'fas fa-plus', 'url' => route('admin.courses.create'), 'class' => 'btn-success btn-loader'],
                ['text' => 'All Courses', 'icon' => 'fas fa-list', 'url' => route('admin.courses.index'), 'class' => 'btn-dark btn-loader'],
            ]" />

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td><b>Thumbnail:</b></td>
                            <td><img src="{{ $course->thumbnail() }}" alt="alt" srcset="{{ $course->thumbnail() }}"
                                    width="100"></td>
                        </tr>
                        <tr>
                            <td><b>Video</b></td>
                            <td>
                                <iframe width="420" height="315" src="{{ $course->demo_link }}"></iframe>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Title:</b></td>
                            <td>{{ $course->title }}</td>
                        </tr>
                        <tr>
                            <td><b>Sub Title:</b></td>
                            <td>{{ $course->sub_title }}</td>
                        </tr>
                        <tr>
                            <td><b>Net Price:</b></td>
                            <td>{{ $course->net_price }}</td>
                        </tr>
                        <tr>
                            <td><b>Sale Price:</b></td>
                            <td>{{ $course->sale_price }}</td>
                        </tr>
                        <tr>
                            <td><b>Description:</b></td>
                            <td>{!! $course->description !!}</td>
                        </tr>
                        <tr>
                            <td><b>Meta Title:</b></td>
                            <td>{{ $course->meta_title }}</td>
                        </tr>
                        <tr>
                            <td><b>Meta Keyword:</b></td>
                            <td>{{ $course->meta_keyword }}</td>
                        </tr>
                        <tr>
                            <td><b>Meta Description:</b></td>
                            <td>{{ $course->meta_description }}</td>
                        </tr>
                        <tr>
                            <td><b>Status:</b></td>
                            <td><span class="badge bg-{{ $course->status ? 'success' : 'danger' }} fs-12">
                                    {{ $course->status ? 'Active' : 'In-active' }} </span></td>
                        </tr>
                        <tr>
                            <td><b>Popular:</b></td>
                            <td><span class="badge bg-{{ $course->popular ? 'success' : 'danger' }} fs-12">
                                    {{ $course->popular ? 'Yes' : 'No' }} </span></td>
                        </tr>
                        <tr>
                            <td><b>Created at:</b></td>
                            <td>{{ date('d-M-y h:i A', strtotime($course->created_at)) }}</td>
                        </tr>
                        <tr>
                            <td colspan="1" class="text-center">
                                <a href="{{ route('admin.courses.edit', [$course]) }}" class="btn btn-success px-3"><i
                                        class="fas fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


</x-admin.layout>
