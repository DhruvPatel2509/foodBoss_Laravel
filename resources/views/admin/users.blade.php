<h1>Users Management</h1>
<button><a href="{{ url('/admin/dashboard') }}">Back</a></button>
<hr>
<table border="1" width="100%" cellpadding="10" style="border-collapse: collapse; text-align: left; background: #fff;">
    <thead>
        <tr style="background: #f4f4f4;">
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Joined Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><strong>{{ $user->name }}</strong></td>
                <td>{{ $user->email }}</td>
                <td>
                    <span
                        style="padding: 5px 10px; border-radius: 4px; color: white; text-transform: capitalize; font-size: 12px; font-weight: bold; background: {{ $user->role == 'admin' ? '#e67e22' : '#3498db' }};">
                        {{ $user->role }}
                    </span>
                </td>
                <td>
                    {{ $user->created_at ? $user->created_at->format('d M Y, h:i A') : 'N/A' }}
                </td>
                <td>
                    <a href="{{ url('/admin/userEdit/' . $user->id) }}" style="color: blue; text-decoration: none;">Edit</a>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>