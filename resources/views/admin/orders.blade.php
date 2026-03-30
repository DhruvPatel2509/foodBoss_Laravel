<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Orders</title>

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
.header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.title {
    font-size: 26px;
}

/* Table Card */
.table-card {
    background: #fff;
    border-radius: 12px;
    padding: 15px;
    border: 1px solid #eee;
}

/* Table */
.table {
    width: 100%;
    border-collapse: collapse;
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

/* Status badges */
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

/* Amount */
.amount {
    font-weight: bold;
}

/* Action */
.action a {
    color: #007bff;
    text-decoration: none;
    font-size: 13px;
}

.action a:hover {
    text-decoration: underline;
}

/* Empty */
.empty {
    text-align: center;
    padding: 20px;
    color: #999;
}
</style>

</head>

<body>

<div class="sidebar">
    <div class="logo">🍔 Admin</div>
    <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
    <a href="{{ url('/admin/categories') }}">Categories</a>
    <a href="{{ url('/admin/products') }}">Products</a>
    <a href="{{ url('/admin/orders') }}">Orders</a>
</div>

<div class="main">

<div class="header">
    <div class="title">Orders</div>
</div>

<div class="table-card">

<table class="table">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Status</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>

<tbody>
    @forelse($orders as $order)
        <tr>
            <td>#{{ $order->id }}</td>

            <td>{{ $order->user->name ?? 'Guest' }}</td>

            <td class="amount">₹{{ number_format($order->total_amount, 2) }}</td>

            <td>
                <span class="status {{ $order->status }}">
                    {{ $order->status }}
                </span>
            </td>

            <td>
                {{ $order->created_at ? $order->created_at->format('d M Y') : 'NA' }}
            </td>

            <td class="action">
                <a href="{{ url('/admin/viewOrder/' . $order->id) }}">View Details</a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="empty">No orders found 🚫</td>
        </tr>
    @endforelse
</tbody>

</table>

</div>

</div>

</body>
</html>
