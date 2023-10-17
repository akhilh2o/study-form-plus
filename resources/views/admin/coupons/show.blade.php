<x-admin.layout>
    <x-admin.breadcrumb title='All Coupon' :links="[
			['text' => 'Dashboard', 'url' => route('admin.dashboard') ],
            ['text' => 'Coupon']
		]" :actions="[
            ['text' => 'All Coupons', 'icon' => 'fas fa-list',
            'class' => 'btn-secondary btn-loader',
            'url' => route('admin.coupons.index'),  ],
            ['text' => 'Create New', 'icon' => 'fas fa-plus',
            'url' => route('admin.coupons.create'),
            'class' => 'btn-dark btn-loader'],
        ]" />

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table mb-0">
                <tr>
                    <td><b>Title: </b> {{ $coupon->title }}</td>
                </tr>
                <tr>
                    <td><b>Coupon Code: </b> {{ $coupon->coupon_code }}</td>
                </tr>
                {{-- <tr>
                    <td><b>Start Date: </b> {{ date('d F Y',strtotime($coupon?->start_date)) }}</td>
                </tr>
                <tr>
                    <td><b>End Date: </b> {{ date('d F Y',strtotime($coupon?->end_date)) }}</td>
                </tr> --}}
                <tr>
                    <td><b>Discount Type: </b> {{ $coupon->discount_type }} </td>
                </tr>
                <tr>
                    <td><b>Discount: </b> {{ $coupon->discount }} {{ $coupon->discountSymbol() }}</td>
                </tr>
                <tr>
                    <td><b>Status: </b> {{ $coupon->status ? 'Active' : 'In-Active' }}</td>
                </tr>
                {{-- <tr>
                    <td><b>Description: </b> {!! $coupon->description ? $coupon->description : 'N/A' !!}</td>
                </tr> --}}
            </table>
        </div>
        <div class="card-footer">
            @can('coupon_update')
            <a href="{{ route('admin.coupons.edit', [$coupon]) }}" class="btn btn-success btn-loader">
                <i class="fas fa-edit"></i> Edit
            </a>
            @endcan

            @can('coupon_delete')
            <form action="{{ route('admin.coupons.destroy', [$coupon]) }}" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger delete-alert btn-loader"><i class="fas fa-trash"></i> Delete</button>
            </form>
            @endcan
        </div>
    </div>
</x-admin.layout>
