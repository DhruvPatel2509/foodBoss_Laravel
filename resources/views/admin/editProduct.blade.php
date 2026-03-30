<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Product</title>

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

.back-btn {
    color: #ff4d4d;
    text-decoration: none;
}

/* Card */
.form-card {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    max-width: 520px;
    border: 1px solid #eee;
}

/* Inputs */
.form-group {
    margin-bottom: 18px;
}

label {
    display: block;
    margin-bottom: 6px;
}

input, select, textarea {
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ddd;
}

input:focus, select:focus, textarea:focus {
    border-color: #ff4d4d;
}

/* Error */
.error {
    color: red;
    font-size: 12px;
    margin-top: 5px;
}

/* Image preview */
.preview img {
    width: 100px;
    border-radius: 8px;
    margin-top: 10px;
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
}
</style>

</head>

<body>

<div class="sidebar">
    <div class="logo">🍔 Admin</div>
    <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
    <a href="{{ url('/admin/categories') }}">Categories</a>
    <a href="{{ url('/admin/products') }}">Products</a>
</div>

<div class="main">

<div class="header">
    <div class="title">Edit Product</div>
    <a href="{{ url('/admin/products') }}" class="back-btn">← Back</a>
</div>

<div class="form-card">

<form action="{{ url('/admin/products/update/' . $product->id) }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="form-group">
    <label>Category</label>
    <select name="category_id">
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                {{ $cat->cat_name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Product Name</label>
    <input type="text" name="name" value="{{ old('name', $product->name) }}">
    @error('name')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label>Description</label>
    <textarea name="description">{{ old('description', $product->description) }}</textarea>
</div>

<div class="form-group">
    <label>Price</label>
    <input type="number" name="price" value="{{ old('price', $product->price) }}">
    @error('price')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label>Current Image</label>

```
@if($product->image)
    <img src="{{ asset($product->image) }}" width="100">
@endif

<input type="file" name="image" id="imageInput">

<div class="preview" id="preview"></div>

<small style="color: gray;">Leave blank to keep current image</small>
```

</div>

<div class="form-group">
    <label>Status</label>
    <select name="availability">
        <option value="available" {{ $product->availability == 'available' ? 'selected' : '' }}>Available</option>
        <option value="out_of_stock" {{ $product->availability == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
    </select>
</div>

<button type="submit" class="btn">Update Product</button>

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
