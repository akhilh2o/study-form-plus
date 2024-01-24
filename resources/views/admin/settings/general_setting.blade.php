<x-admin.layout>
    <x-admin.breadcrumb title='Website Setting Edit' />
    <form method="POST" action="{{ route('admin.settings.store') }}" class="card shadow-sm"
        enctype="multipart/form-data">
        @php $setting_value = !empty($setting->option_value) ? $setting->option_value : ''; @endphp
        @csrf
        <div class="card-header">
            Website Setting
        </div>
        <div class="card-body table-responsive">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Application Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="app_name" placeholder="Application Name"
                            value="{{ $setting_value['app_name'] ?? '' }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Support Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="support_email" placeholder="Support Email"
                            value="{{ $setting_value['support_email'] ?? '' }}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Support Phone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="support_phone" placeholder="Support Phone No"
                            value="{{ $setting_value['support_phone'] ?? '' }}">
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Company Address <span class="text-danger">*</span> </label>
                        <textarea class="form-control" name="company_address" rows="3" placeholder="Company Address"
                            required>{{ $setting_value['company_address'] ?? '' }}</textarea>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="d-flex">
                        @if(!empty($setting_value['logo']))
                        <div class="mr-3">
                            <img src="{{ asset('storage/'.$setting_value['logo']) }}" alt="logo" width="70">
                        </div>
                        @endif
                        <div class="form-group flex-fill">
                            <label for="">Logo</label>
                            <input type="file" class="form-control" name="logo">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="d-flex">
                        @if(!empty($setting_value['favicon']))
                        <div class="mr-3">
                            <img src="{{ asset('storage/'.$setting_value['favicon']) }}" alt="image" width="70"
                                class="rounded-circle">
                        </div>
                        @endif
                        <div class="form-group flex-fill">
                            <label for="">Favicon</label>
                            <input type="file" class="form-control" name="favicon">
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Meta Title <span class="text-danger">*</span> </label>
                        <textarea class="form-control" name="meta_title" rows="1" placeholder="Meta Title"
                            required>{{ $setting_value['meta_title'] ?? '' }}</textarea>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Meta Keyword <span class="text-danger">*</span> </label>
                        <textarea class="form-control" name="meta_keyword" rows="2" placeholder="Meta Keyword"
                            required>{{ $setting_value['meta_keyword'] ?? '' }}</textarea>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Meta Description <span class="text-danger">*</span> </label>
                        <textarea class="form-control" name="meta_description" rows="3" placeholder="Meta Description"
                            required>{{ $setting_value['meta_description'] ?? '' }}</textarea>
                    </div>
                </div>

                <div class="row">
                    <h3 class="my-3">Banner Setting</h3>
                    {{-- <div class="col-sm-12">
                        <div class="d-flex">
                            @if(!empty($setting_value['banner']))
                            <div class="mr-3">
                                <img src="{{ asset('storage/'.$setting_value['banner']) }}" alt="banner" width="100">
                            </div>
                            @endif
                            <div class="form-group flex-fill">
                                <label for="">Banner <span class="text-danger">(Please ensure the image is sized at
                                        1600x800
                                        pixels.)</span></label>
                                <input type="file" class="form-control" name="banner">
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Heading</label>
                            <input type="text" class="form-control" name="banner_heading" placeholder="Banner Heading"
                                value="{{ $setting_value['banner_heading'] ?? '' }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Subheading </label>
                            <input type="text" class="form-control" name="banner_subheading"
                                placeholder="Banner subheading" value="{{ $setting_value['banner_subheading'] ?? '' }}">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" class="form-control" name="banner_description" placeholder="Banner Description"
                                value="{{ $setting_value['banner_description'] ?? '' }}">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Action Button 1</label>
                            <input type="text" class="form-control" name="banner_action_name1" placeholder="Button Name"
                                value="{{ $setting_value['banner_action_name1'] ?? '' }}">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Action Button URL 1</label>
                            <input type="url" class="form-control" name="banner_action_url1" placeholder="Full URL"
                                value="{{ $setting_value['banner_action_url1'] ?? '' }}">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Action Button 2</label>
                            <input type="text" class="form-control" name="banner_action_name2" placeholder="Button Name"
                                value="{{ $setting_value['banner_action_name2'] ?? '' }}">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Action Button URL 2</label>
                            <input type="url" class="form-control" name="banner_action_url2" placeholder="Full URL"
                                value="{{ $setting_value['banner_action_url2'] ?? '' }}">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Banner Text</label>
                            <input type="text" class="form-control" name="banner_text" placeholder="Banner Text"
                                value="{{ $setting_value['banner_text'] ?? '' }}">
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <div class="card-footer">
            <input type="hidden" name="RecordId" value="{{ $setting->id ?? '' }}" />
            <button type="submit" class="btn btn-dark btn-loader">
                <i class="fas fa-save mr-2"></i> Update
            </button>
        </div>
    </form>

    @push('scripts')
    <script>
        tinymce.init({
                selector: '.text-editor',
                height: 300,
            });
    </script>
    @endpush

</x-admin.layout>
