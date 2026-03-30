<h1>Edit Categories</h1>

<form action="{{ url('/admin/categories/updateCat/' . $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <table border="0" cellpadding="10" style="background: #f9f9f9; border: 1px solid #ddd; border-radius: 8px;">
        <tr>
            <td><strong>Category Name:</strong></td>
            <td>
                <input type="text" value="{{ $category->cat_name }}" name="cat_name" required
                    placeholder="Enter category name" style="width: 300px; padding: 8px;">
            </td>
        </tr>

        <tr>
            <td><strong>Category Image:</strong></td>

            <td>
                <img src="{{ asset($category->image) }}" width="200" style="border-radius: 5px;">
                <input type="file" name="image" accept="image/*" style="padding: 5px;">
            </td>
        </tr>

        <tr>
            <td><strong>Status:</strong></td>
            <td>
                <select name="status" style="width: 318px; padding: 8px;">
                    <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>
                        Inactive
                    </option>
                </select>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit"
                    style="background: green; color: white; padding: 10px 25px; border: none; cursor: pointer; border-radius: 4px; font-weight: bold;">
                    Update
                </button>
            </td>
        </tr>
    </table>
</form>