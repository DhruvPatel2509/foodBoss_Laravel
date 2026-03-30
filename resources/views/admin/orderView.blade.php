<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Order Details</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

body {
    background: linear-gradient(120deg, #fdfbfb, #ebedee);
}

/* Sidebar */
.sidebar {
    width: 220px;
    height: 100vh;
    position: fixed;
    left: 0;
    top: 0;
    padding: 20px;
    background: rgba(255,255,255,0.6);
    backdrop-filter: blur(12px);
}

.logo {
    font-size: 22px;
    font-weight: bold;
    color: #ff4d4d;
    margin-bottom: 30px;
}

.sidebar a {
    display: block;
    padding: 12px;
    margin-bottom: 10px;
    text-decoration: none;
    color: #444;
    border-radius: 8px;
}

.sidebar a:hover {
    background: #ff4d4d;
    color: #fff;
}

/* Main */
.main {
    margin-left: 220px;
    padding: 30px;
}

/* Header */
.title {
    font-size: 26px;
    margin-bottom: 20px;
}

/* Card */
.card {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    border: 1px solid #eee;
    margin-bottom: 20px;
}

/* Table */
.table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
}

.table th {
    text-align: left;
    padding: 12px;
    font-size: 13px;
    color: #888;
    border-bottom: 2px solid #f1f1f1;
}

.table td {
    padding: 14px 12px;
    border-bottom: 1px solid #f5f5f5;
}

.table tr:hover {
    background: #fafafa;
}

/* Image */
.table img {
    width: 50px;
    border-radius: 6px;
}

/* Status */
.status {
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 12px;
    text-transform: capitalize;
}

.pending { background: #fff3cd; color: #856404; }
.processing { background: #e3f2fd; color: #0d6efd; }
.delivered { background: #e6f9ec; color: #28a745; }
.cancelled { background: #ffeaea; color: #dc3545; }

/* Total */
.total {
    font-size: 18px;
    font-weight: bold;
    color: green;
}

/* Update box */
.update-box {
    background: #fff;
    padding: 15px;
    border-radius: 10px;
    border: 1px solid #eee;
}

.update-box select {
    padding: 6px;
    margin-left: 10px;
}

.update-box button {
    background: #ff4d4d;
    color: #fff;
    border: none;
    padding: 6px 15px;
    border-radius: 5px;
    cursor: pointer;
}
</style>

</head>

<body>

<div class="sidebar">
    <div class="logo">🍔 Admin</div>
    <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
    <a href="{{ url('/admin/orders') }}">Orders</a>
</div>

<div class="main">

<div class="title">Order #{{ $order->id }}</div>

<!-- ORDER INFO -->

<div class="card">
    <p><strong>Customer:</strong> {{ $order->user->name }} ({{ $order->user->email }})</p>
    <p><strong>Date:</strong> {{ $order->created_at ? $order->created_at->format('d M Y, h:i A') : 'NA' }}</p>
    <p><strong>Status:</strong>
        <span class="status {{ $order->status }}">
            {{ $order->status }}
        </span>
    </p>
</div>

<!-- ITEMS TABLE -->

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Product</th>
            <th>Price</th>
            <th>Qty</th>
            <th style="text-align:right;">Subtotal</th>
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
                    <img src="{{ asset($item->product->image) }}">
                @endif
            </td>

            <td>
                <strong>{{ $item->product->name }}</strong><br>
                <small style="color:gray;">
                    {{ $item->product->category->cat_name ?? 'N/A' }}
                </small>
            </td>

            <td>₹{{ number_format($item->price, 2) }}</td>

            <td>{{ $item->quantity }}</td>

            <td style="text-align:right; font-weight:bold;">
                ₹{{ number_format($subtotal, 2) }}
            </td>
        </tr>
    @endforeach
</tbody>

<tfoot>
    <tr>
        <td colspan="5" style="text-align:right;"><strong>Grand Total:</strong></td>
        <td style="text-align:right;" class="total">
            ₹{{ number_format($grandTotal, 2) }}
        </td>
    </tr>
</tfoot>

</table>

<!-- STATUS UPDATE -->

<div class="update-box">
    <form action="{{ url('/admin/orders/update-status/' . $order->id) }}" method="POST">
        @csrf

    <strong>Update Status:</strong>

    <select name="status">
        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
    </select>

    <button type="submit">Update</button>
</form>

</div>

</div>

</body>
</html>
