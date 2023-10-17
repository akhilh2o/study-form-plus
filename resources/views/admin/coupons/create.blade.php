<x-admin.layout>
    <x-admin.breadcrumb title='Coupon Create' :links="[
			['text' => 'Dashboard', 'url' => auth()->user()->dashboardRoute() ],
            ['text' => 'Coupon', 'url' => route('admin.coupons.index')],
            ['text' => 'Create']
		]" :actions="[
            ['text' => 'All Coupons', 'icon' => 'fas fa-list',
            'url' => route('admin.coupons.index'),
            'permission' => 'coupon_access',
            'class' => 'btn-dark btn-loader'],
        ]" />

    <form method="POST" action="{{ route('admin.coupons.store') }}" class="card shadow-sm"
        enctype="multipart/form-data">
        @csrf
        <div class="card-body table-responsive">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}"
                            required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="coupon_code">Coupon Code <span class="text-danger">*</span></label>
                        <input type="text" name="coupon_code" id="coupon_code" class="form-control"
                            value="{{ old('coupon_code') }}" required>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="discount_type">Discount Type <span class="text-danger">*</span></label>
                        <select name="discount_type" class="form-control select2" id="discount_type" required>
                            <option value="">-- Select --</option>
                            <option value="percent"> Percent (%) </option>
                            <option value="flat"> Flat </option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Discount <span class="text-danger">*</span></label>
                        <input type="number" name="discount" id="discount" class="form-control"
                            value="{{ old('discount') }}" required>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Start Date <span class="text-danger">*</span></label>
                        <input type="date" name="start_date" id="start_date" class="form-control"
                            value="{{ old('start_date') }}" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">End Date <span class="text-danger">*</span></label>
                        <input type="date" name="end_date" id="end_date" class="form-control"
                            value="{{ old('end_date') }}" required>
                    </div>
                </div>
            </div> --}}
            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control select2" required>
                            <option value="">-- Select --</option>
                            <option value="1" {{ (old('status')=='1' ) ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ (old('status')=='0' ) ? 'selected' : '' }}>In-Active</option>
                        </select>
                    </div>
                </div>
            </div>
            {{-- <div class="form-group">
                <label for="">Description </label>
                <textarea name="description" rows="3" class="form-control">{{ old('description') }}</textarea>
            </div> --}}
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-dark btn-loader">
                <i class="fas fa-save"></i> Submit
            </button>
        </div>
    </form>


    <x-slot name="script">
        <script>
            var previewImg = {
                width: '70px',
                rounded: '50px',
            };
            imageCropper('crop-image', 1/1, previewImg);
        </script>
    </x-slot>
</x-admin.layout>
