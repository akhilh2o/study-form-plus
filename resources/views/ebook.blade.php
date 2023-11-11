<x-app-layout>
    <x-breadcrumb :title="$category?->name" :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'Ebook Detail'], ['text' => $category?->name]]" />

    <!-- ~~~ ebook Section ~~~ -->
    <section class="course-details-section pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ $category->image() }}" alt="thumbnail" class="rounded w-100">
                </div>
                <div class="col-md-8">
                    <h4 class="title mb-4">{{ $category?->name }}</h4>
                    <h6 class="mb-4">{{ $category?->short_content }}</h6>
                    <p class="lead">
                        <b>By: </b>
                        <span>{{ $category?->professor }}</span>
                    </p>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        class="btn btn-dark px-3 rounded-pill" style="height:auto">
                        <i class="fas fa-download"></i> Download Free PDF
                    </button>
                    <hr />
                    <div class="description">
                        <h6 class="mb-4">Description</h6>
                        {!! $category?->description !!}
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ~~~ ebook Section ~~~ -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="{{ route('ebooks.download',[$category]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Download E-Book</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="first_name" class="col-form-label">First Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        @required(true)>
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="col-form-label">Last Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="last_name"
                                        name="last_name" @required(true)>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email" class="col-form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        @required(true)>
                                </div>
                                <div class="col-md-6">
                                    <label for="mobile" class="col-form-label">Mobile <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="mobile" name="mobile"
                                        @required(true)>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="course_id" class="col-form-label">Course <span class="text-danger">*</span></label>
                                    <select class="form-select select2" aria-label="Default select course" name="course_id" id="course_id">
                                        <option selected>--Select Course--</option>
                                        @foreach ($courses ?? [] as $course)
                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Download</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
