<x-admin.layout>
    <x-admin.breadcrumb title='All Coupon' :links="[
			[   'text' => 'Dashboard',
                'url'  => route('admin.dashboard')
            ],
            [   'text' => 'Coupon']
		]" :actions="[
            [   'text'       => 'Filter',
                'icon'       => 'fas fa-filter',
                'class'      => 'btn-secondary btn-loader',
                'url'        => route('admin.coupons.index', ['filter' => 1]),
                'permission' => 'coupon_access', ],
            [
                'text'       => 'Create New',
                'permission' => 'coupon_create',
                'icon'       => 'fas fa-plus',
                'url'        => route('admin.coupons.create'),
                'class'      => 'btn-primary btn-loader'],
        ]" />

    @if(request()->get('filter'))
    <form class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-fill mr-3">
                    <input type="text" name="search" class="form-control" value="{{ request()->get('search') }}"
                        placeholder="Search here...">
                </div>
                <div class="mr-3 w-25">
                    <select name="status" class="form-control select2">
                        <option value="">-- Status --</option>
                        <option value="1" {{ (request()->get('status') == '1') ? 'selected' : '' }} >Active</option>
                        <option value="0" {{ (request()->get('status') == '0') ? 'selected' : '' }} >In-Active</option>
                    </select>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark btn-loader" name="filter" value="1">
                        <i class="fas fa-search"></i> Submit
                    </button>
                    <a href="{{ route('admin.coupons.index') }}" class="btn btn-danger btn-loader">
                        <i class="fas fa-times"></i> Reset
                    </a>
                </div>
            </div>
        </div>
    </form>
    @endif

    <div class="card shadow-sm">
        <x-admin.paginator-info :items="$coupons" class="card-header" />
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Coupon Code</th>
                        <th>Discount Type</th>
                        <th>Discount</th>
                        {{-- <th>Date Between</th> --}}
                        <th class="text-nowrap">Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coupons ?? [] as $coupon)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{ $coupon->title }}
                        </td>
                        <td>
                            <strong> {{ $coupon->coupon_code }}</strong>
                        </td>
                        <td>
                            {{ $coupon?->discount_type }} {{ $coupon?->discountSymbol() }}
                        </td>
                        <td>
                            {{ $coupon?->discount }} {{ $coupon?->discountSymbol() }}
                        </td>
                        {{-- <td>
                            <strong>{{ date('d F Y',strtotime($coupon?->start_date)) }} To {{ date('d F
                                Y',strtotime($coupon?->end_date)) }}</strong>
                        </td> --}}
                        <td>
                            <span class="d-block">
                                {{ $coupon->status ? 'Active' : 'In-Active' }}
                            </span>
                        </td>
                        <td class="text-nowrap">
                            @can('coupon_show')
                            <a href="{{ route('admin.coupons.show', [$coupon]) }}"
                                class="btn btn-info btn-sm btn-loader load-circle">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            @endcan

                            @can('coupon_update')
                            <a href="{{ route('admin.coupons.edit', [$coupon]) }}"
                                class="btn btn-success btn-sm btn-loader load-circle">
                                <i class="fas fa-edit"></i>
                            </a>
                            @endcan

                            @can('coupon_delete')
                            <form action="{{ route('admin.coupons.destroy', [$coupon]) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger delete-alert btn-loader load-circle"><i
                                        class="fas fa-trash"></i></button>
                            </form>
                            @endcan
                            <div class="small">{{ $coupon->created_at->format('d-M-Y h:i a') }}</div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $coupons->links() }}
        </div>
    </div>
</x-admin.layout>
