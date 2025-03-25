<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="users.css">
    <title>Users</title>
</head>
<body>
    <div class="sidebar">
        <h2>Dashboard</h2>
        <p>Welcome back, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'User'; ?>!</p>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="customers.php">Customers</a></li>
                <li><a href="inventory.php">Inventory</a></li>
                <li><a href="users.php"><strong>Users</strong></a></li>
                <li><a href="payandtransac.php">Payment & Transactions</a></li>
                <li><a href="storesettings.php">Store Settings</a></li>
                <li><a href="login.php">Log out</a></li>
            </ul>
        </nav>
    </div>
    <div class="main-content">
        <h2>Users</h2>
        <div class="filters">
            <select name="status">
                <option value="">Status:</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
            <select name="date_joined">
                <option value="">Date Joined:</option>
            </select>
            <button class="add-user">+ Add User</button>
        </div>
        <table class="users-table">
            <thead>
                <tr>
                <th><i class="fas fa-trash-alt"></i></th>
                    <th>User ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Last Logged In</th>
                    <th>Logged Out</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>001</td>
                    <td>John Doe</td>
                    <td>johndoe@example.com</td>
                    <td>Admin</td>
                    <td>Active</td>
                    <td>2025-03-20</td>
                    <td>2025-03-21</td>
                    <td><a href="#">View/Edit/Delete</a></td>
                </tr>
                <!-- More rows can be dynamically added here -->
            </tbody>
        </table>
    </div>
</body>
</html>
