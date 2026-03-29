<h1>Orders Page</h1>
<a href="{{ url('/admin/dashboard') }}">HOME</a>
<hr>


<table border="1" width="100%" cellpadding="10" style="border-collapse: collapse;">
    <tr style="background: #eee;">
        <th>Order ID</th>
        <th>Customer</th>
        <th>Total Amount</th>
        <th>Status</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
    @foreach($orders as $order)
        <tr>
            <td>#{{ $order->id }}</td>
            <td>{{ $order->user->name ?? 'Guest' }}</td>
            <td>₹{{ $order->total_amount }}</td>
            <td>
                <span
                    style="padding: 5px; background: {{ $order->status == 'pending' ? 'orange' : 'green' }}; color: white;">
                    {{ ucfirst($order->status) }}
                </span>
            </td>
            <td>{{ $order->created_at ? $order->created_at->format('d M Y') : 'NA' }}</td>
            <td>
                <a href="{{ url('/admin/viewOrder' . $order->id) }}">View Details</a>
            </td>
        </tr>
    @endforeach
</table>