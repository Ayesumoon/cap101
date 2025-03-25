<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inventory.css">
    <title>Inventory</title>
</head>
<body>
    <div class="sidebar">
        <h2>Inventory</h2>
        <p>Welcome back, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'User'; ?>!</p>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="customers.php">Customers</a></li>
                <li><a href="inventory.php"><strong>Inventory</strong></a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="payandtransac.php">Payment & Transactions</a></li>
                <li><a href="storesettings.php">Store Settings</a></li>
                <li><a href="login.php">Log out</a></li>
            </ul>
        </nav>
    </div>
    <div class="main-content">
        <h2>Inventory Management</h2>
        <div class="filters">
            <label>Category: 
                <select>
                    <option value="all">All</option>
                    <option value="electronics">Electronics</option>
                    <option value="clothing">Clothing</option>
                </select>
            </label>
            <label>Date: 
                <input type="date">
            </label>
        </div>
        <table class="inventory-table">
            <thead>
                <tr>
                    <th><i class="fas fa-trash-alt"></i></th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Stocks</th>
                    <th>Price</th>
                    <th>Last Restocked</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>101</td>
                    <td>Example Product</td>
                    <td>Electronics</td>
                    <td>50</td>
                    <td>$100</td>
                    <td>2024-03-01</td>
                    <td>In Stock</td>
                    <td class="actions"><a href="#">Restock</a></td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>102</td>
                    <td>Another Product</td>
                    <td>Clothing</td>
                    <td>30</td>
                    <td>$50</td>
                    <td>2024-02-20</td>
                    <td>Low Stock</td>
                    <td class="actions"><a href="#">Restock</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>