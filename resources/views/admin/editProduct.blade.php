<h1>Edit Product</h1>
<a href="{{ url('/admin/products') }}">Back to List</a>
<hr>

<form action="{{ url('/admin/products/update/' . $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <table border="0" cellpadding="10" style="background: #f9f9f9; border: 1px solid #ddd; border-radius: 8px;">
        <tr>
            <td><strong>Category:</strong></td>
            <td>
                <select name="category_id" required style="width: 318px; padding: 8px;">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->cat_name }}
                        </option>
                    @endforeach
                </select>
            </td>
        </tr>

        <tr>
            <td><strong>Product Name:</strong></td>
            <td>
                <input type="text" name="name" value="{{ $product->name }}" required
                    style="width: 300px; padding: 8px;">
            </td>
        </tr>

        <tr>
            <td><strong>Description:</strong></td>
            <td>
                <textarea name="description"
                    style="width: 300px; height: 80px; padding: 8px;">{{ $product->description }}</textarea>
            </td>
        </tr>

        <tr>
            <td><strong>Price:</strong></td>
            <td>
                <input type="number" name="price" value="{{ $product->price }}" step="0.01" required
                    style="width: 300px; padding: 8px;">
            </td>
        </tr>

        <tr>
            <td><strong>Current Image:</strong></td>
            <td>
                @if($product->image)
                    <img src="{{ asset($product->image) }}" width="100" style="display: block; margin-bottom: 10px;">
                @endif
                <input type="file" name="image" accept="image/*">
                <br><small style="color: gray;">Leave blank to keep current image</small>
            </td>
        </tr>

        <tr>
            <td><strong>Availability:</strong></td>
            <td>
                <select name="availability" style="width: 318px; padding: 8px;">
                    <option value="available" {{ $product->availability == 'available' ? 'selected' : '' }}>Available
                    </option>
                    <option value="out_of_stock" {{ $product->availability == 'out_of_stock' ? 'selected' : '' }}>Out of
                        Stock</option>
                </select>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit"
                    style="background: blue; color: white; padding: 10px 25px; border: none; cursor: pointer; border-radius: 4px;">
                    UPDATE PRODUCT
                </button>
            </td>
        </tr>
    </table>
</form>