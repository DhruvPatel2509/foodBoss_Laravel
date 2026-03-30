<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>


<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
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
        transition: 0.3s;
    }

    .sidebar a:hover {
        background: #ff4d4d;
        color: #fff;
        transform: translateX(5px);
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
        font-weight: 600;
    }

    /* ===== UPDATED BUTTON ===== */
    .btn {
        background: linear-gradient(135deg, #ff4d4d, #ff1a1a);
        color: #fff;
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
        transition: 0.3s;
        font-weight: 600;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 12px rgba(255, 77, 77, 0.3);
    }

    .btn:hover {
        background: linear-gradient(135deg, #e60000, #cc0000);
        transform: translateY(-2px);
        letter-spacing: 1px;
    }

    /* Alert */
    .alert {
        padding: 12px;
        background: #d4edda;
        color: #155724;
        border-radius: 6px;
        margin-bottom: 15px;
    }

    /* ===== PREMIUM TABLE ===== */
    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 12px;
    }

    .table th {
        text-align: left;
        padding: 12px;
        color: #555;
    }

    .table tbody tr {
        background: rgba(255,255,255,0.9);
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: 0.3s;
    }

    .table tbody tr:hover {
        transform: scale(1.01);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .table td {
        padding: 14px;
    }

    .table td:first-child {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    .table td:last-child {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    /* Status */
    .status-active {
        background: #e6f9ec;
        color: #28a745;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 13px;
    }

    .status-inactive {
        background: #ffeaea;
        color: #dc3545;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 13px;
    }

    /* Actions */
    .action a {
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 13px;
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

    img {
        border-radius: 8px;
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
    <div class="title">Categories</div>
    <a href="{{ url('/admin/categories/create') }}" class="btn">+ Add New</a>
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

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($categories as $cat)
            <tr>
                <td>{{ $loop->iteration }}</td>

                <td>
                    @if($cat->image)
                        <img src="{{ asset($cat->image) }}" width="90">
                    @else
                        <span style="color: gray;">No Image</span>
                    @endif
                </td>

                <td><strong>{{ $cat->cat_name }}</strong></td>
                <td>{{ $cat->slug }}</td>

                <td>
                    <span class="{{ $cat->status == 'active' ? 'status-active' : 'status-inactive' }}">
                        {{ $cat->status }}
                    </span>
                </td>

                <td class="action">
                    <a href="{{ url('/admin/categories/edit/' . $cat->id) }}" class="edit">Edit</a>
                    <a href="{{ url('/admin/categories/delete/' . $cat->id) }}"
                       class="delete"
                       onclick="return confirm('Delete this category?')">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


</div>

</body>
</html>
