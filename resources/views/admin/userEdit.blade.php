<h1>Edit User: {{ $user->name }}</h1>
<a href="{{ url('/admin/users') }}">Back to List</a>
<hr>

<form action="{{ url('/admin/user/update/' . $user->id) }}" method="POST">
    @csrf
    <table border="0" cellpadding="10"
        style="background: #f9f9f9; border: 1px solid #ddd; border-radius: 8px; width: 500px;">
        <tr>
            <td><strong>Full Name:</strong></td>
            <td>
                <input type="text" name="name" value="{{ $user->name }}" required style="width: 100%; padding: 8px;">
            </td>
        </tr>

        <tr>
            <td><strong>Email Address:</strong></td>
            <td>
                <input type="email" name="email" value="{{ $user->email }}" required style="width: 100%; padding: 8px;">
            </td>
        </tr>

        <tr>
            <td><strong>User Role:</strong></td>
            <td>
                <select name="role" style="width: 100%; padding: 8px;">
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </td>
        </tr>



        <tr>
            <td></td>
            <td>
                <button type="submit"
                    style="background: #2c3e50; color: white; padding: 10px 25px; border: none; cursor: pointer; border-radius: 4px; width: 100%;">
                    UPDATE USER DATA
                </button>
            </td>
        </tr>
    </table>
</form>