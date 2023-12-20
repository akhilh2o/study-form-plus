<h3>
    Hey {{ $order->name }},
</h3>
<p>Your Order status is now <strong>{!! Str::ucfirst($order->status) !!}</strong>. please check your email to get updated status</p>
