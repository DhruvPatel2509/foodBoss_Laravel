<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Product</title>

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
    transition: 0.3s;
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
    align-items: center;
    margin-bottom: 20px;
}

.title {
    font-size: 26px;
    font-weight: 600;
}

.back-btn {
    text-decoration: none;
    color: #ff4d4d;
    font-size: 14px;
}

/* Form Card */
.form-card {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    max-width: 520px;
    border: 1px solid #eee;
    box-shadow: 0 5px 15px rgba(0,0,0,0.04);
}

/* Inputs */
.form-group {
    margin-bottom: 18px;
}

label {
    display: block;
    margin-bottom: 6px;
    font-weight: 500;
}

input, select, textarea {
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ddd;
    outline: none;
}

input:focus, select:focus, textarea:focus {
    border-color: #ff4d4d;
    box-shadow: 0 0 0 2px rgba(255,77,77,0.1);
}

/* Error */
.error {
    color: red;
    font-size: 12px;
    margin-top: 5px;
}

/* Preview */
.preview img {
    width: 100px;
    margin-top: 10px;
    border-radius: 8px;
}

/* Button */
.btn {
    background: #ff4d4d;
    color: #fff;
    padding: 12px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    width: 100%;
    font-size: 15px;
}

.btn:hover {
    background: #e60000;
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
    <div class="title">Add New Product</div>
    <a href="{{ url('/admin/products') }}" class="back-btn">← Back to Products</a>
</div>

<div class="form-card">

<form action="{{ url('/admin/products/store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="form-group">
    <label>Select Category</label>
    <select name="category_id">
        <option value="">-- Choose Category --</option>
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
        @endforeach
    </select>
    @error('category_id')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label>Product Name</label>
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label>Price (₹)</label>
    <input type="number" name="price" step="0.01" value="{{ old('price') }}">
    @error('price')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label>Description</label>
    <textarea name="description">{{ old('description') }}</textarea>
</div>

<div class="form-group">
    <label>Product Image</label>
    <input type="file" name="image" id="imageInput" accept="image/*">
    <div class="preview" id="preview"></div>
    @error('image')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label>Availability</label>
    <select name="availability">
        <option value="available">Available</option>
        <option value="out_of_stock">Out of Stock</option>
    </select>
</div>

<button type="submit" class="btn">Save Product</button>

</form>

</div>

</div>

<script>
document.getElementById('imageInput').addEventListener('change', function(){
    const preview = document.getElementById('preview');
    preview.innerHTML = '';

    const file = this.files[0];
    if(file){
        const img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        preview.appendChild(img);
    }
});
</script>

</body>
</html>
