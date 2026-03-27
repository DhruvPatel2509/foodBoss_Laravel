<h1>Login Page</h1>

<form action="/loginProcess" method="post">
    @csrf
    email: <input type="email" name="email">
    <br>
    <br>
    password: <input type="password" name="password">
    <br>
    <br>
    <button type="submit">LOGIN</button>
</form>