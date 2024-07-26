<x-admin.layout>
    <x-admin.breadcrumb title='Banner Notice' />
    <form method="POST" action="{{ route('admin.settings.notices.store') }}" class="card shadow-sm"
        enctype="multipart/form-data">
        @php $notice_value = !empty($notices->option_value) ? $notices->option_value : ''; @endphp
        @csrf
        <div class="card-header">
            Notice Setting
        </div>
        <div class="card-body table-responsive">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Notice 1<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="notice_1" placeholder="Notice 1"
                            value="{{ $notice_value['notice_1'] ?? '' }}">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Notice 2<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="notice_2" placeholder="Notice 2"
                            value="{{ $notice_value['notice_2'] ?? '' }}">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Notice 3<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="notice_3" placeholder="Notice 3"
                            value="{{ $notice_value['notice_3'] ?? '' }}">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Notice 4<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="notice_4" placeholder="Notice 4"
                            value="{{ $notice_value['notice_4'] ?? '' }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="hidden" name="RecordId" value="{{ $notices->id ?? '' }}" />
            <button type="submit" class="btn btn-dark btn-loader">
                <i class="fas fa-save mr-2"></i> Update
            </button>
        </div>
    </form>

</x-admin.layout>
