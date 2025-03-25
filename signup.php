<?php
require 'conn.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $status_id = 1; // Default to 'Active'

    // Insert data into database (include status_id)
    $sql = "INSERT INTO customers (first_name, last_name, email, phone, password_hash, address, status_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $first_name, $last_name, $email, $phone, $password, $address, $status_id);
    
    if ($stmt->execute()) {
        echo "Registration successful. <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
    <h2>Sign Up</h2>
    <form method="post">
        <label>First Name:</label>
        <input type="text" name="first_name" required>
        <br>
        <label>Last Name:</label>
        <input type="text" name="last_name" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <label>Phone:</label>
        <input type="text" name="phone" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <label>Address:</label>
        <textarea name="address" required></textarea>
        <br>
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>
