<?php
    session_start();
    // Sample order data
    $orders = [
        ["order_id" => "1001", "customer_id" => "C001", "products" => "Product A, Product B", "total" => "$120.00", "status" => "Pending", "payment" => "Credit Card", "date" => "2025-03-24"],
        ["order_id" => "1002", "customer_id" => "C002", "products" => "Product C", "total" => "$45.00", "status" => "Shipped", "payment" => "PayPal", "date" => "2025-03-23"]
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="orders.css">
    <title>Orders</title>
</head>
<body>
    <div class="sidebar">
        <h2>Orders</h2>
        <p>Welcome back, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'User'; ?>!</p>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="products.php">Products</a></li>
                <li><strong><a href="orders.php">Orders</a></strong></li>
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
        <div class="header">Orders</div>
        <br>
        <label for="status">Status:</label>
        <select id="status">
            <option value="all">All</option>
            <option value="pending">Pending</option>
            <option value="shipped">Shipped</option>
        </select>
        <label for="date">Date:</label>
        <input type="date" id="date">
        
        <table class="order-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer ID</th>
                    <th>Product(s)</th>
                    <th>Total Amount</th>
                    <th>Order Status</th>
                    <th>Payment Method</th>
                    <th>Order Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) { ?>
                    <tr>
                        <td><?php echo $order['order_id']; ?></td>
                        <td><?php echo $order['customer_id']; ?></td>
                        <td><?php echo $order['products']; ?></td>
                        <td><?php echo $order['total']; ?></td>
                        <td class="status <?php echo strtolower($order['status']); ?>"><?php echo $order['status']; ?></td>
                        <td><?php echo $order['payment']; ?></td>
                        <td><?php echo $order['date']; ?></td>
                        <td class="actions">
                            <button class="view-button">View</button>
                            <button class="update-button">Update</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
