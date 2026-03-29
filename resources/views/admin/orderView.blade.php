<div style="background: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 8px; margin-bottom: 20px;">
    <h2>Order #{{ $order->id }} Details</h2>
    <p><strong>Customer:</strong> {{ $order->user->name }} ({{ $order->user->email }})</p>
<p><strong>Date:</strong> {{ $order->created_at ? $order->created_at->diffForHumans() : 'Date not available' }}</p> 
    <p><strong>Status:</strong>
        <span style="color: {{ $order->status == 'delivered' ? 'green' : 'orange' }}; font-weight: bold;">
            {{ ucfirst($order->status) }}
        </span>
    </p>
</div>

<table border="1" width="100%" cellpadding="10" style="border-collapse: collapse; text-align: left; background: #fff;">
    <thead>
        <tr style="background: #f4f4f4;">
            <th>#</th>
            <th>Image</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th style="text-align: right;">Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @php $grandTotal = 0; @endphp
        @foreach($order->items as $item)
            @php 
                $subtotal = $item->quantity * $item->price;
    $grandTotal += $subtotal;
            @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if($item->product->image)
                        <img src="{{ asset($item->product->image) }}" width="50" style="border-radius: 5px;">
                    @else
                        <small>No Image</small>
                    @endif
                </td>
                <td>
                    <strong>{{ $item->product->name }}</strong><br>
                    <small style="color: gray;">Category: {{ $item->product->category->cat_name ?? 'N/A' }}</small>
                </td>
                <td>₹{{ number_format($item->price, 2) }}</td>
                <td>{{ $item->quantity }}</td>
                <td style="text-align: right; font-weight: bold;">
                    ₹{{ number_format($subtotal, 2) }}
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr style="background: #f9f9f9; font-size: 18px;">
            <td colspan="5" style="text-align: right;"><strong>Grand Total:</strong></td>
            <td style="text-align: right; color: green; font-weight: bold;">
                ₹{{ number_format($grandTotal, 2) }}
            </td>
        </tr>
    </tfoot>
</table>

<div style="margin-top: 20px; padding: 15px; background: #eee; border-radius: 5px;">
    <form action="{{ url('/admin/orders/update-status/' . $order->id) }}" method="POST">
        @csrf
        <label><strong>Update Order Status:</strong></label>
        <select name="status" style="padding: 5px; margin-left: 10px;">
            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>
        <button type="submit" style="background: blue; color: white; border: none; padding: 6px 15px; cursor: pointer; border-radius: 3px;">
            Update
        </button>
    </form>
</div>