<h1>Categories Page</h1>

<a href="{{ url('/admin/categories/create') }}">
    <button style="background: green; color: white; padding: 10px;cursor:pointer;">+ ADD NEW</button>
</a>

<hr>
@if(session('success'))
    <div id="success-alert"
        style="padding: 10px; background: #d4edda; color: #155724; border: 1px solid #c3e6cb; margin-bottom: 10px;">
        {{ session('success') }}
    </div>

    <script>
        // Wait 3 seconds (3000ms) then hide the div
        setTimeout(function () {
            var element = document.getElementById('success-alert');
            if (element) {
                element.style.display = 'none';
            }
        }, 1000);
    </script>
@endif


<table border="1" width="100%" cellpadding="10" style="border-collapse: collapse; text-align: left;">
    <thead>
        <tr style="background: #f4f4f4;">
            <th>ID</th>
            <th>Image</th>
            <th>Category Name</th>
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
                        <img src="{{ asset($cat->image) }}" width="200" style="border-radius: 5px;">
                    @else
                        <span style="color: gray; font-size: 12px;">No Image</span>
                    @endif
                </td>
                <td><strong>{{ $cat->cat_name }}</strong></td>
                <td><code>{{ $cat->slug }}</code></td>
                <td>
                    <span
                        style="color: {{ $cat->status == 'active' ? 'green' : 'red' }}; font-weight: bold; text-transform: capitalize;">
                        {{ $cat->status}}
                    </span>
                </td>
                <td>
                    <a href="{{ url('/admin/categories/edit/' . $cat->id) }}"
                        style="color: blue; text-decoration: none;">Edit</a>
                    |
                    <a href="{{ url('/admin/categories/delete/' . $cat->id) }}" style="color: red; text-decoration: none;"
                        onclick="return confirm('Delete this category?')">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>