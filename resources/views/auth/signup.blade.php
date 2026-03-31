<div
    style="max-width: 400px; margin: 50px auto; padding: 20px; background: #f9f9f9; border: 1px solid #ddd; border-radius: 8px; font-family: sans-serif;">
    <h1 style="text-align: center; color: #333;">Sign Up</h1>
    <hr>

    <form action="{{ url('/signupProcess') }}" method="post">
        @csrf
        <table border="0" cellpadding="10" style="width: 100%;">
            <tr>
                <td>
                    <strong>Full Name</strong><br>
                    <input type="text" name="name" required style="width: 100%; padding: 8px; margin-top: 5px;"
                        placeholder="Enter your name">
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Email Address</strong><br>
                    <input type="email" name="email" required style="width: 100%; padding: 8px; margin-top: 5px;"
                        placeholder="name@example.com">
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Password</strong><br>
                    <input type="password" name="password" required style="width: 100%; padding: 8px; margin-top: 5px;"
                        placeholder="Create a password">
                </td>
            </tr>
            <input type="hidden" name="role" value="user">

            <tr>
                <td>
                    <button type="submit"
                        style="width: 100%; background: #28a745; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">
                        CREATE ACCOUNT
                    </button>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">
                    <small>Already have an account? <a href="{{ url('/login') }}">Login here</a></small>
                </td>
            </tr>
        </table>
    </form>
</div>