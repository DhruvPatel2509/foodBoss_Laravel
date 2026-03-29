<h1>Product Page</h1>


<a href="{{ url('/admin/dashboard') }}">HOME</a>
<a href="{{ url('/admin/products/create') }}">
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
            <th>#</th>
            <th>Image</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Price</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>

                <td>
                    @if($product->image)
                        <img src="{{ asset($product->image) }}" width="160" height="160"
                            style="object-fit: cover; border-radius: 5px;">
                    @else
                        <span style="color: gray;">No Image</span>
                    @endif
                </td>

                <td><strong>{{ $product->name }}</strong></td>

                <td>
                    <span style="background: #e9ecef; padding: 2px 8px; border-radius: 4px; font-size: 13px;">
                        {{ $product->category->cat_name ?? 'N/A' }}
                    </span>
                </td>
                <td style="max-width: 200px;">
                    <small style="color: #666;">
                        {{ $product->description ?? 'No description' }}
                    </small>
                </td>

                <td>₹{{ number_format($product->price, 2) }}</td>

                <td>
                    <span
                        style="color: {{ $product->availability == 'available' ? 'green' : 'red' }}; font-weight: bold;text-transform:capitalize;">
                        {{ $product->availability }}
                    </span>
                </td>

                <td>
                    <a href="{{ url('/admin/products/edit/' . $product->id) }}"
                        style="color: blue; text-decoration: none;">Edit</a>
                    |
                    <a href="{{ url('/admin/products/delete/' . $product->id) }}" style="color: red; text-decoration: none;"
                        onclick="return confirm('Delete this product?')">Delete</a>
                </td>
            </tr>
        @endforeach

        @if($products->isEmpty())
            <tr>
                <td colspan="7" style="text-align: center; color: gray;">No products found.</td>
            </tr>
        @endif
    </tbody>
</table>