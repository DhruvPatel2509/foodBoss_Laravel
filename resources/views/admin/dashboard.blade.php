<h1>ADMIN PANEL</h1>
<h2> Welcome {{ Auth::user()->name }}</h2>

<h2>
    <a href="{{ url('/admin/categories') }}">Categories</a>
</h2>

<h2>
    <a href="{{ url('/admin/products') }}">Products</a>
</h2>

<h2>
    <a href="{{ url('/admin/orders') }}">Orders</a>
</h2>

<h2>
    <a href="{{ url('/admin/users') }}">Users</a>
</h2>