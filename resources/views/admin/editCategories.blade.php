<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>

```
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
        padding: 40px;
    }

    .title {
        font-size: 26px;
        margin-bottom: 20px;
    }

    .back {
        display: inline-block;
        margin-bottom: 20px;
        text-decoration: none;
        color: #ff4d4d;
    }

    /* Form Card */
    .form-card {
        max-width: 520px;
        padding: 30px;
        border-radius: 15px;
        background: rgba(255,255,255,0.6);
        backdrop-filter: blur(10px);
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: 500;
    }

    input, select {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #ddd;
        outline: none;
        transition: 0.3s;
    }

    input:focus, select:focus {
        border-color: #ff4d4d;
        box-shadow: 0 0 5px rgba(255,77,77,0.3);
    }

    /* Image preview */
    .preview {
        margin-bottom: 10px;
    }

    .preview img {
        width: 120px;
        border-radius: 8px;
        display: block;
        margin-bottom: 10px;
    }

    .btn {
        background: #ff4d4d;
        color: #fff;
        padding: 12px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        width: 100%;
        font-size: 15px;
        transition: 0.3s;
    }

    .btn:hover {
        background: #e60000;
    }
</style>
```

</head>

<body>

```
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

    <div class="title">Edit Category</div>

    <a href="{{ url('/admin/categories') }}" class="back">← Back to Categories</a>

    <div class="form-card">
        <form action="{{ url('/admin/categories/updateCat/' . $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="cat_name" value="{{ $category->cat_name }}" required>
            </div>

            <div class="form-group">
                <label>Category Image</label>

                <div class="preview">
                    @if($category->image)
                        <img src="{{ asset($category->image) }}">
                    @endif
                </div>

                <input type="file" name="image" accept="image/*">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn">Update Category</button>
        </form>
    </div>

</div>
```

</body>
</html>
