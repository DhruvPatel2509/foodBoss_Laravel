<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            margin: 0;
            background: linear-gradient(120deg, #fdfbfb, #ebedee);
        }

        /* Sidebar (FIXED - no gap) */
        .sidebar {
            width: 220px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(12px);
            border-right: 1px solid rgba(0, 0, 0, 0.05);
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            color: #ff4d4d;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            padding: 12px;
            margin-bottom: 10px;
            text-decoration: none;
            color: #444;
            border-radius: 8px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: #ff4d4d;
            color: #fff;
            transform: translateX(5px);
        }

        /* Main Content */
        .main {
            margin-left: 220px;
            /* IMPORTANT FIX */
            padding: 30px;
        }

        /* Topbar */
        .topbar {
            display: flex;
            justify-content: flex-end;
            position: relative;
        }

        .profile {
            cursor: pointer;
            padding: 10px 15px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            transition: 0.3s;
        }

        .profile:hover {
            background: rgba(255, 255, 255, 0.9);
        }

        /* Dropdown */
        .dropdown {
            position: absolute;
            right: 0;
            top: 50px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            display: none;
            min-width: 150px;
            z-index: 100;
            animation: fadeIn 0.3s ease;
        }

        .dropdown a {
            display: block;
            padding: 12px;
            text-decoration: none;
            color: #333;
        }

        .dropdown a:hover {
            background: #f5f5f5;
        }

        /* Dashboard */
        .title {
            margin-top: 20px;
            font-size: 26px;
            margin-bottom: 25px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            padding: 25px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            margin-bottom: 10px;
        }

        .card p {
            color: #777;
            margin-bottom: 15px;
        }

        .card a {
            text-decoration: none;
            color: #ff4d4d;
            font-weight: 500;
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Mobile */
        @media(max-width: 768px) {
            .sidebar {
                width: 180px;
            }

            .main {
                margin-left: 180px;
            }
        }
    </style>

</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">🍔 Food Admin</div>

        <a href="{{ url('/admin/categories') }}">📂 Categories</a>
        <a href="{{ url('/admin/products') }}">🍔 Products</a>
        <a href="{{ url('/admin/orders') }}">🧾 Orders</a>
    </div>

    <!-- Main -->
    <div class="main">

        <!-- Topbar -->
        <div class="topbar">
            <div class="profile" onclick="toggleDropdown()">
                {{ Auth::user()->name }} ⬇
            </div>

            <div class="dropdown" id="dropdown">
                <a href="#">Profile</a>
                <a href="{{ url('/logout') }}">Logout</a>
            </div>
        </div>

        <!-- Dashboard -->
        <div class="title">Dashboard</div>

        <div class="grid">
            <div class="card">
                <h3>Categories</h3>
                <p>Manage food categories</p>
                <a href="{{ url('/admin/categories') }}">Open →</a>
            </div>

            <div class="card">
                <h3>Products</h3>
                <p>Add or edit items</p>
                <a href="{{ url('/admin/products') }}">Open →</a>
            </div>

            <div class="card">
                <h3>Orders</h3>
                <p>Track all orders</p>
                <a href="{{ url('/admin/orders') }}">Open →</a>
            </div>
        </div>

    </div>

    <script>
        function toggleDropdown() {
            let d = document.getElementById("dropdown");
            d.style.display = d.style.display === "block" ? "none" : "block";
        }

        window.onclick = function (e) {
            if (!e.target.closest('.profile')) {
                document.getElementById("dropdown").style.display = "none";
            }
        }
    </script>

</body>

</html>