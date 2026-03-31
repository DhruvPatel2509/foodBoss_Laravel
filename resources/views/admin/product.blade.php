<h1>Product Page</h1>

<a href="{{ url('/admin/dashboard') }}">HOME</a>
<a href="{{ url('/admin/products/create') }}">
    <button style="background: green; color: white; padding: 10px; cursor: pointer; border: none; border-radius: 4px;">+
        ADD NEW</button>
</a>
<hr>

@if(session('success'))
    <div id="success-alert"
        style="padding: 10px; background: #d4edda; color: #155724; border: 1px solid #c3e6cb; margin-bottom: 10px;">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(function () {
            var element = document.getElementById('success-alert');
            if (element) {
                element.style.display = 'none';
            }
        }, 3000);
    </script>
@endif

<table border="1" width="100%" cellpadding="10"
    style="border-collapse: collapse; text-align: left; font-family: sans-serif;">
    <thead>
        <tr style="background: #f4f4f4;">
            <th>#</th>
            <th>Image</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Price Details</th>
            <th>Discount %</th>
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
                        <img src="{{ asset($product->image) }}" width="80" height="80"
                            style="object-fit: cover; border-radius: 5px; border: 1px solid #ddd;">
                    @else
                        <span style="color: gray; font-size: 12px;">No Image</span>
                    @endif
                </td>

                <td><strong>{{ $product->name }}</strong></td>

                <td>
                    <span style="background: #e9ecef; padding: 2px 8px; border-radius: 4px; font-size: 13px;">
                        {{ $product->category->cat_name ?? 'N/A' }}
                    </span>
                </td>

                <td>
                    @if($product->discount_percent > 0)
                        <span style="text-decoration: line-through; color: #999; font-size: 13px;">
                            ₹{{ number_format($product->price, 2) }}
                        </span><br>
                        <strong style="color: #27ae60;">
                            ₹{{ number_format($product->price - ($product->price * $product->discount_percent / 100), 2) }}
                        </strong>
                    @else
                        <strong>₹{{ number_format($product->price, 2) }}</strong>
                    @endif
                </td>

                <td style="text-align: center;">
                    @if($product->discount_percent > 0)
                        <span
                            style="background: #fff3cd; color: #856404; padding: 3px 8px; border-radius: 10px; font-weight: bold; font-size: 12px; border: 1px solid #ffeeba;">
                            {{ $product->discount_percent }}% OFF
                        </span>
                    @else
                        <span style="color: #ccc;">—</span>
                    @endif
                </td>

                <td>
                    <span
                        style="color: {{ $product->availability == 'available' ? 'green' : 'red' }}; font-weight: bold; text-transform: capitalize;">
                        {{ $product->availability }}
                    </span>
                </td>

                <td>
                    <a href="{{ url('/admin/products/edit/' . $product->id) }}"
                        style="color: blue; text-decoration: none; font-weight: bold;">Edit</a>
                    <span style="color: #ccc;"> | </span>
                    <a href="{{ url('/admin/products/delete/' . $product->id) }}"
                        style="color: red; text-decoration: none; font-weight: bold;"
                        onclick="return confirm('Delete this product?')">Delete</a>
                </td>
            </tr>
        @endforeach

        @if($products->isEmpty())
            <tr>
                <td colspan="8" style="text-align: center; color: gray; padding: 20px;">No products found.</td>
            </tr>
        @endif
    </tbody>
</table>