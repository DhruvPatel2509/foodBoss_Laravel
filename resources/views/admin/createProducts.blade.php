<h1>Add New Product</h1>
<form action="{{ url('/admin/products/store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <table border="0" cellpadding="10" style="background: #f9f9f9; border: 1px solid #ddd;">
        <tr>
            <td><strong>Select Category:</strong></td>
            <td>
                <select name="category_id" required style="width: 100%; padding: 8px;">
                    <option value="">-- Choose Category --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td><strong>Product Name:</strong></td>
            <td><input type="text" name="name" required style="width: 300px; padding: 8px;"></td>
        </tr>
        <tr>
            <td><strong>Price (₹):</strong></td>
            <td><input type="number" name="price" value="{{ $user->price ?? '' }}" required
                    style="width: 300px; padding: 8px;">
            </td>
        </tr>
        <tr>
            <td><strong>Discount Percentage (%):</strong></td>
            <td>
                <input type="number" name="discount_percent" value="{{ $product->discount_percent ?? 0 }}" min="0"
                    max="100" style="width: 300px; padding: 8px;">
                <br><small style="color: gray;">Set to 0 if no discount. Example: 10 for 10% off.</small>
            </td>
        </tr>
        <tr>
            <td><strong>Description:</strong></td>
            <td><textarea name="description" style="width: 300px; height: 80px;"></textarea></td>
        </tr>
        <tr>
            <td><strong>Product Image:</strong></td>
            <td><input type="file" name="image" accept="image/*"></td>
        </tr>
        <tr>
            <td><strong>Availability:</strong></td>
            <td>
                <select name="availability" style="width: 100%; padding: 8px;">
                    <option value="available">Available</option>
                    <option value="out_of_stock">Out of Stock</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" style="background: green; color: white; padding: 10px 20px;">SAVE PRODUCT</button>
            </td>
        </tr>
    </table>
</form>