<h1>Create New Category</h1>
<a href="{{ url('/admin/categories') }}">Back to List</a>
<hr>

<form action="{{ url('/admin/categories/store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <table border="0" cellpadding="10" style="background: #f9f9f9; border: 1px solid #ddd; border-radius: 8px;">
        <tr>
            <td><strong>Category Name:</strong></td>
            <td>
                <input type="text" name="cat_name" required placeholder="Enter category name"
                    style="width: 300px; padding: 8px;">
            </td>
        </tr>

        <tr>
            <td><strong>Category Image:</strong></td>
            <td>
                <input type="file" name="image" accept="image/*" style="padding: 5px;">
            </td>
        </tr>

        <tr>
            <td><strong>Status:</strong></td>
            <td>
                <select name="status" style="width: 318px; padding: 8px;">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit"
                    style="background: green; color: white; padding: 10px 25px; border: none; cursor: pointer; border-radius: 4px; font-weight: bold;">
                    SAVE CATEGORY
                </button>
            </td>
        </tr>
    </table>
</form>