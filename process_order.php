<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Here you'd typically save to database, send email, etc.

    // For now, we just clear the cart and show success message
    $_SESSION['cart'] = [];
    echo "<h2>Thank you! Your order has been placed.</h2>";
    echo "<p><a href='index.php'>Continue Shopping</a></p>";
} else {
    header("Location: checkout.php");
    exit();
}
