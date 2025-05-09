<?php
session_start();
// include("includes/header.php"); 
$cart = $_SESSION['cart'] ?? [];

if (isset($_POST['clear'])) {
    $_SESSION['cart'] = [];
    header("Location: cart.php");
    exit();
}

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header style="padding:5px;"><h1>Your Cart</h1></header>
    <main>
        <?php if (empty($cart)): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
                <?php foreach ($cart as $item): 
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                ?>
                <tr>
                    <td><img src="images/<?= $item['image'] ?>" width="60"></td>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td><?= htmlspecialchars($item['size']) ?></td>
                    <td><?= htmlspecialchars($item['color']) ?></td>
                    <td><?= htmlspecialchars($item['quantity']) ?></td>
                    <td>₹<?= number_format($item['price'], 2) ?></td>
                    <td>₹<?= number_format($subtotal, 2) ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="6"><strong>Total</strong></td>
                    <td><strong>₹<?= number_format($total, 2) ?></strong></td>
                </tr>
            </table>

            <form method="post" style="margin-top: 20px;">
                <button type="submit" name="clear">Clear Cart</button>
                <!-- Checkout Button -->
                <a href="checkout.php"><button type="button">Checkout</button></a>
            </form>
        <?php endif; ?>
    </main>

    <?php include("includes/footer.php"); ?>
</body>
</html>
