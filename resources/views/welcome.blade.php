<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', sans-serif;
    }

    body {
        background: #fff;
    }

    /* Navbar */
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 60px;
        border-bottom: 1px solid #eee;
    }

    .logo {
        font-size: 26px;
        font-weight: bold;
        color: #ff4d4d;
    }

    .login-btn {
        text-decoration: none;
        padding: 8px 18px;
        border: 1px solid #ff4d4d;
        border-radius: 6px;
        color: #ff4d4d;
        transition: 0.3s;
    }

    .login-btn:hover {
        background: #ff4d4d;
        color: #fff;
    }

    /* Main Section */
    .main {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 60px;
        height: 80vh;
    }

    .text {
        max-width: 50%;
    }

    .text h1 {
        font-size: 48px;
        margin-bottom: 20px;
        color: #222;
    }

    .text p {
        font-size: 18px;
        color: #666;
        margin-bottom: 30px;
    }

    .start-btn {
        padding: 12px 25px;
        background: #ff4d4d;
        color: #fff;
        border: none;
        border-radius: 6px;
        text-decoration: none;
        font-size: 16px;
        transition: 0.3s;
    }

    .start-btn:hover {
        background: #e60000;
    }

    /* Image */
    .image img {
        width: 500px;
    }

    /* Footer */
    .footer {
        text-align: center;
        padding: 15px;
        color: #aaa;
        font-size: 14px;
    }

    /* Responsive */
    @media(max-width: 900px) {
        .main {
            flex-direction: column;
            text-align: center;
        }

        .text {
            max-width: 100%;
        }

        .image img {
            width: 300px;
            margin-top: 20px;
        }
    }
</style>

</head>

<body>

```
<!-- Navbar -->
<div class="navbar">
    <div class="logo">🍔 Foodie</div>
    <a href="/login" class="login-btn">Login</a>
</div>

<!-- Main -->
<div class="main">
    <div class="text">
        <h1>Hungry?</h1>
        <p>Order your favorite food from top restaurants near you.</p>
        <a href="/login" class="start-btn">Order Now</a>
    </div>

    <div class="image">
        <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" alt="food">
    </div>
</div>

<!-- Footer -->
<div class="footer">
    © 2026 Foodie
</div>

</body>
</html>
