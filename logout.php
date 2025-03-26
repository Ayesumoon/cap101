<?php
session_start();
require 'conn.php'; // Database connection

if (isset($_SESSION["user_id"])) {
    $admin_id = $_SESSION["user_id"];

    // **Update last_logged_out timestamp**
    $updateLogout = "UPDATE adminusers SET last_logged_out = NOW() WHERE admin_id = ?";
    $stmt = $conn->prepare($updateLogout);
    $stmt->bind_param("i", $admin_id);
    $stmt->execute();
    $stmt->close();
}

// Destroy session and redirect
session_unset();
session_destroy();

header("Location: login.php");
exit;
?>
