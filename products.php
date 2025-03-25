<?php
session_start();
require 'conn.php'; // Database connection
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="products.css">
    <title>Products</title>
</head>
<body>
    <div class="sidebar">
        <h2>Products</h2>
        <p>Welcome back, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'User'; ?>!</p>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><strong><a href="products.php">Products</a></strong></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="customers.php">Customers</a></li>
                <li><a href="inventory.php">Inventory</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="payandtransac.php">Payment & Transactions</a></li>
                <li><a href="storesettings.php">Store Settings</a></li>
                <li><a href="login.php">Log out</a></li>
            </ul>
        </nav>
    </div>
    <div class="main-content">
        <h2>Products</h2>
        <br>
        <button class="button" onclick="location.href='add_product.php'">+ Create New Product</button>
        <table class="product-table">
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Product ID</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Stocks</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Fetch products from the database -->
                <?php
                $sql = "SELECT products.*, categories.category_name 
                        FROM products 
                        LEFT JOIN categories ON products.category_id = categories.category_id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td><img src='" . htmlspecialchars($row['image_url']) . "' alt='Product Image' style='width:50px; height:50px;'></td>
                            <td>" . htmlspecialchars($row['product_name']) . "</td>
                            <td>" . htmlspecialchars($row['description']) . "</td>
                            <td>" . $row['product_id'] . "</td>
                            <td>$" . number_format($row['price'], 2) . "</td>
                            <td>" . htmlspecialchars($row['category_name']) . "</td>
                            <td>" . $row['stocks'] . "</td>
                            <td>
                                <a href='edit_product.php?id=" . $row['product_id'] . "'>
                                    <button class='edit-button'>Edit</button>
                                </a>
                                <a href='delete_product.php?id=" . $row['product_id'] . "' onclick='return confirm(\"Are you sure you want to delete this product?\")'>
                                    <button class='delete-button'>Delete</button>
                                </a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' style='text-align: center;'>No products available</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
