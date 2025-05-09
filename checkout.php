<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    session_start();
    include("includes/header.php");
    $cart = $_SESSION['cart'] ?? [];
    $total = 0;
    ?>
    
    <main class="checkout-container">
        <h2>Checkout</h2>
        
        <?php if (empty($cart)): ?>
        <p>Your cart is empty. <a href="index.php">Go to shop</a></p>
        
        <?php else: ?>
            <div class="cart-summary">
                <h3>Order Summary</h3>
                <ul>
                    
                    <?php foreach ($cart as $item): 
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                    ?>
                    
                    <li>
                        <img src="images/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" width="50">
                        <?= $item['name'] ?> (<?= $item['size'] ?>, <?= $item['color'] ?>) × <?= $item['quantity'] ?>  
                        - ₹<?= number_format($subtotal, 2) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <p><strong>Total: ₹<?= number_format($total, 2) ?></strong></p>
        </div>

        <form action="process_order.php" method="POST" class="checkout-form">
            <h3>Shipping Information</h3>
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="text" name="address" placeholder="Shipping Address" required>
            <input type="text" name="city" placeholder="City" required>
            <input type="text" name="zip" placeholder="ZIP Code" required>
            <input type="tel" name="phone" placeholder="Phone Number" required>

            <h3>Payment Method</h3>
            <select name="payment_method" required>
                <option value="cod">Cash on Delivery</option>
                <option value="card">Credit/Debit Card</option>
                <option value="upi">UPI</option>
            </select>

            <button type="submit">Place Order</button>
        </form>
    <?php endif; ?>
</main>

<?php include("includes/footer.php"); ?>


</body>
</html>