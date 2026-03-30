<!DOCTYPE html>

<html>
<head>
    <title>Login - Food App</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', sans-serif;
    }

    body {
        height: 100vh;
        background: linear-gradient(135deg, #ff6b6b, #ff9f43);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-container {
        width: 100%;
        max-width: 400px;
    }

    .login-box {
        background: #fff;
        padding: 40px 30px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        text-align: center;
    }

    .logo {
        font-size: 32px;
        color: #ff6b6b;
        margin-bottom: 10px;
    }

    .tagline {
        font-size: 14px;
        color: #777;
        margin-bottom: 30px;
    }

    .input-group {
        margin-bottom: 20px;
    }

    .input-group input {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ddd;
        outline: none;
        transition: 0.3s;
    }

    .input-group input:focus {
        border-color: #ff6b6b;
        box-shadow: 0 0 5px rgba(255,107,107,0.5);
    }

    .login-btn {
        width: 100%;
        padding: 12px;
        background: #ff6b6b;
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    .login-btn:hover {
        background: #ff4757;
    }

    .footer-text {
        margin-top: 20px;
        font-size: 13px;
        color: #888;
    }
</style>

</head>
<body>

<div class="login-container">
    <div class="login-box">
        <h1 class="logo">🍔 Foodie</h1>
        <p class="tagline">Delicious food delivered to you</p>

    <form action="/loginProcess" method="post">
        @csrf

        <div class="input-group">
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <button type="submit" class="login-btn">Login</button>
    </form>

    <p class="footer-text">New here? Sign up now</p>
</div>

</div>

</body>
</html>
