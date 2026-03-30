<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

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

.btn {
    background: #ff4d4d;
    color: #fff;
    padding: 10px 15px;
    border-radius: 6px;
    text-decoration: none;
}

.btn:hover {
    background: #e60000;
}

/* Alert */
.alert {
    padding: 12px;
    background: #d4edda;
    color: #155724;
    border-radius: 6px;
    margin-bottom: 15px;
}

/* ===== TABLE ===== */
.table-card {
    background: #fff;
    border-radius: 12px;
    padding: 15px;
    border: 1px solid #eee;
}

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
    vertical-align: middle;
}

.table tr:hover {
    background: #fafafa;
}

/* Image */
.table img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
}

/* Category badge */
.cat-badge {
    background: #eef2f7;
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 12px;
}

/* Description */
.desc {
    font-size: 12px;
    color: #777;
    max-width: 200px;
}

/* Price */
.price {
    font-weight: bold;
    color: #333;
}

/* Status */
.status {
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 12px;
}

.available {
    background: #e6f9ec;
    color: green;
}

.unavailable {
    background: #ffeaea;
    color: red;
}

/* Actions */
.action a {
    padding: 6px 10px;
    border-radius: 6px;
    font-size: 12px;
    text-decoration: none;
    margin-right: 5px;
}

.edit {
    background: #e7f1ff;
    color: #007bff;
}

.delete {
    background: #ffeaea;
    color: #dc3545;
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

<!-- Sidebar -->

<div class="sidebar">
    <div class="logo">🍔 Admin</div>
    <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
    <a href="{{ url('/admin/categories') }}">Categories</a>
    <a href="{{ url('/admin/products') }}">Products</a>
    <a href="{{ url('/admin/orders') }}">Orders</a>
</div>

<!-- Main -->

<div class="main">

<div class="header">
    <div class="title">Products</div>
    <a href="{{ url('/admin/products/create') }}" class="btn">+ Add Product</a>
</div>

@if(session('success'))
    <div class="alert" id="success-alert">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            document.getElementById('success-alert').style.display = 'none';
        }, 2000);
    </script>
@endif

<div class="table-card">

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        @if($product->image)
                            <img src="{{ asset($product->image) }}">
                        @else
                            <span style="color: gray;">No Image</span>
                        @endif
                    </td>

                    <td><strong>{{ $product->name }}</strong></td>

                    <td>
                        <span class="cat-badge">
                            {{ $product->category->cat_name ?? 'N/A' }}
                        </span>
                    </td>

                    <td class="desc">
                        {{ $product->description ?? 'No description' }}
                    </td>

                    <td class="price">₹{{ number_format($product->price, 2) }}</td>

                    <td>
                        <span class="status {{ $product->availability == 'available' ? 'available' : 'unavailable' }}">
                            {{ $product->availability }}
                        </span>
                    </td>

                    <td class="action">
                        <a href="{{ url('/admin/products/edit/' . $product->id) }}" class="edit">Edit</a>
                        <a href="{{ url('/admin/products/delete/' . $product->id) }}"
                           class="delete"
                           onclick="return confirm('Delete this product?')">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="empty">No products found 🚫</td>
                </tr>
            @endforelse
        </tbody>

    </table>

</div>

</div>

</body>
</html>
