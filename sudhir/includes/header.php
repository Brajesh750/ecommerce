<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$cartCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My E-Commerce Site</title>
    <link rel="stylesheet" href="/styles.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
  <header class="main-header">
        <div class="container">
            <h1><a href="index.php">🛍 UNIFORM ADDA</a></h1>
            <nav>
                <ul class="nav-links">
                    <li><a href="#"><i class="fa fa-home" style="color:aqua; font-size: 36px;"></i></a></li>
                    <li><a href="cart.php"><i class="fa fa-shopping-cart" style="color:aqua; font-size: 36px;"></i><?= $cartCount ?></a></li>
                    <li><a href="#contact"><i class="fa fa-phone" style="color:aqua; font-size: 36px;"></i></a></li>
                    <li><a href="track.php"><i class="fa fa-ship" aria-hidden="true" style="color:aqua; font-size: 36px;" ></i></a></li>
                </ul>
            </nav>
        </div>
    </header>