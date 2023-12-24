<x-app-layout>
    <x-breadcrumb title="Orders" :links="[['text' => 'Home', 'url' => route('home')], ['text' => 'Orders']]" />

    <section class="carts pt-40 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    @include('user.sidebar')
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-8 col-md-8">
                                    <h3>Orders <span class="text-danger font-weight-400">List</span></h3>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Order ID</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Payment</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders ?? [] as $order)
                                                <tr>
                                                    <th scope="row">{{ $order->id }}</th>
                                                    <td>{{ $order->created_at->diffForHumans() }}</td>
                                                    <td><span @class(['badge', 'bg-success' => $order->payment_status, 'bg-danger' => !$order->payment_status])>{{ $order->payment_status ? 'Paid' : 'Failed' }}</span></td>
                                                    <td>{{ ucfirst($order->status) }}</td>
                                                    <td>{!! currencySymbol() !!} {{ $order->total }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" align="center"><strong>No Record Available.</strong></td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
