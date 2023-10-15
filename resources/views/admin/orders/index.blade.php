<x-admin.layout>
    <x-admin.breadcrumb title='All Order' :links="[
				[
                    'text' => 'Dashboard',
                    'url'  => route('admin.dashboard')
                ],
                [
                    'text' => 'Order'
                ]
			]" :actions="[
                [
                    'text'  => 'Filter',
                    'icon'  => 'fas fa-filter',
                    'class' => 'btn-secondary btn-loader',
                    'url'   => route('admin.orders.index', ['filter' => 1])
                ],
            ]" />

    @if(request()->get('filter'))
    <div class="card" id="filter">
        <div class="card-body">
            <form action="">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <input type="text" name="search" class="form-control mb-sm-0 mb-2" placeholder="Search"
                            value="{{ Request::get('search') }}">
                    </div>
                    <div class="col-12 col-md-4">
                        <select name="status" id="status" class="form-control select2">
                            <option value="">- Select --</option>
                            <option value="pending"  @selected(Request::get('status')=='pending')>Pending</option>
                            <option value="confirmed" @selected(Request::get('status')=='confirmed')>Confirmed</option>
                            <option value="delivered" @selected(Request::get('status')=='delivered')>Delivered</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <button type="submit" class="btn btn-dark btn-loader">
                            <i class="fas fa-save"></i> Submit
                        </button>
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-basic border btn-loader">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endif
    <div class="card shadow-sm">
        <x-admin.paginator-info :items="$orders" class="card-header" />
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td width="2%">{{ $loop->iteration }}</td>
                        <td width="10%">{{ $order?->name }}</td>
                        <td width="50%">
                            {{ $order->address }}
                            <div class="text-small">
                                {{ $order->city }}
                                {{ $order->state }}
                                {{ $order->landmark }}
                                {{ $order->pincode }}
                                {{ $order->country }}
                            </div>
                        </td>
                        <td>{{ $order?->total }}</td>
                        <td>{{ $order?->payment_status ? 'Paid' : 'Unpaid' }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button"
                                    class="btn btn-{{ $order->status=='delivered' ? 'success' : 'warning' }} text-nowrap btn-sm">
                                    {!! Str::ucfirst($order->status) !!}
                                </button>
                                <button type="button"
                                    class="btn btn-{{ $order->status=='delivered' ? 'success' : 'warning' }} btn-sm dropdown-toggle dropdown-toggle-split"
                                    data-bs-toggle="dropdown">
                                    <i class="fas fa-caret-down"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item bg-warning text-white"
                                        href="{{ route('admin.orders.status', [$order,'status'=>'pending']) }}">
                                        Pending
                                    </a>
                                    <a class="dropdown-item bg-success text-white"
                                        href="{{ route('admin.orders.status', [$order,'status'=>'confirmed']) }}">
                                        Confirmed
                                    </a>
                                    <a class="dropdown-item bg-info text-white"
                                        href="{{ route('admin.orders.status', [$order,'status'=>'delivered']) }}">
                                        Delivered
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('admin.orders.show', [$order]) }}"
                                class="btn btn-info btn-sm btn-loader load-circle">
                                <i class="fas fa-info-circle"></i>
                            </a>

                            {{-- <form action="{{ route('admin.orders.destroy', [$order]) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger delete-alert btn-loader load-circle"><i
                                        class="fas fa-trash"></i></button>
                            </form> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $orders->links() }}
        </div>
    </div>
</x-admin.layout>
