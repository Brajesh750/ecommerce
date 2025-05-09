<?php
session_start();
include("includes/header.php");

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle add to cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_name'])) {
    $item = [
        'name' => $_POST['product_name'],
        'price' => $_POST['product_price'],
        'image' => $_POST['product_image'],
        'size'  => $_POST['product_size'],
        'color' => $_POST['product_color'],
        'quantity' => $_POST['product_quantity']
    ];

    $_SESSION['cart'][] = $item;
    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Store</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="page.css">
    </head>
  <body>
    <script type="text/javascript" src="script.js"></script>
  </body>
</head>
<body>

<section id="home">
        <div class="home_page ">
             <div class="home_img "> 
                <img src="https://i.postimg.cc/t403yfn9/home2.jpg" alt="img ">
            </div>
            <div class="home_txt ">
                <p class="collectio ">UNIFORM COLLECTION</p>
                <h2>Collage - Uniform<br>Collection 2025</h2>
                <div class="home_label ">
                    <p>A specialist label creating luxury essentials. Ethically crafted<br>with an unwavering commitment to exceptional quality.</p>
                </div>
                <button><a href="#sellers">SHOP NOW</a><i class='bx bx-right-arrow-alt'></i></button>
            </div>
        </div>
    </section>
    <?php include("includes/main.php"); ?>

    

    <main id="sellers">
        <h2>Top Seller Products</h2>
        <div class="product-grid">
            <?php
            $products = [
                ["name" => "Boy Jersey", "price" => 299, "image" => "Jersey1.jpg", "sizes" => ["S", "M", "L"], "colors" => ["Red", "Blue","Black"],],
                ["name" => "Boy jacket", "price" => 699, "image" => "Boy_jacket.jpg", "sizes" => ["S", "M", "L"], "colors" => ["Black", "Gray","Nevy Blue"]],
                ["name" => "Girl Jersey", "price" => 399, "image" => "Jersey3.jpg", "sizes" => ["S", "M", "L"], "colors" => ["White", "red" ,"Sky Blue"]],
                ["name" => "Girl jacket", "price" => 699, "image" => "Girl_jacket.jpg", "sizes" => ["S", "M", "L"], "colors" => ["Black", "Gray","Nevy Blue"]],
                ["name" => "Girl Jersey", "price" => 209, "image" => "Jersey4.jpg", "sizes" => ["S", "M", "L"], "colors" => ["Black", "Gray","Nevy Blue"]],
                ["name" => "Thread Logo", "price" => 99, "image" => "Logo.jpg", "sizes" => ["S", "M"], "colors" => ["Black", "Gray","Nevy Blue"]],
                ["name" => "Boy Shirt", "price" => 599, "image" => "Boy_Shirt.jpg", "sizes" => ["S", "M", "L"], "colors" => ["Black", "Gray","Nevy Blue"]],
                ["name" => "Girl Shirt", "price" => 599, "image" => "Girl_shirt.jpg", "sizes" => ["S", "M", "L"], "colors" => ["Black", "Gray","Nevy Blue"]],
           
            ];

            foreach ($products as $product): ?>
                <div class="product">
                    <img src="images/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                    <h3><?= $product['name'] ?></h3>
                    <p>Price: ₹<?= number_format($product['price'], 2) ?></p>
                    <form method="POST">
                        <input type="hidden" name="product_name" value="<?= $product['name'] ?>">
                        <input type="hidden" name="product_price" value="<?= $product['price'] ?>">
                        <input type="hidden" name="product_image" value="<?= $product['image'] ?>">

                        <label>Size:
                            <select name="product_size">
                                <?php foreach ($product['sizes'] as $size): ?>
                                    <option value="<?= $size ?>"><?= $size ?></option>
                                <?php endforeach; ?>
                            </select>
                        </label><br>

                        <label>Color:
                            <select name="product_color">
                                <?php foreach ($product['colors'] as $color): ?>
                                    <option value="<?= $color ?>"><?= $color ?></option>
                                <?php endforeach; ?>
                            </select>
                        </label><br>

                        <label>Quantity:
                            <input type="number" name="product_quantity" value="1" min="1">
                        </label><br>

                        <button type="submit">Add to Cart</button>
                    </form>
                </div>

            <?php endforeach; ?>
        </div>
    </main>

    <main id="sellers">
        <h2>Jersey</h2>
        <div class="product-grid">
            <?php
            $products = [
                ["name" => "Boy Jersey", "price" => 299, "image" => "Jersey1.jpg", "sizes" => ["S", "M", "L"], "colors" => ["Red", "Blue","Black"],],
                ["name" => "BoyJersey", "price" => 349, "image" => "Jersey2.jpg", "sizes" => ["S", "M", "L"], "colors" => ["Black", "Gray","Nevy Blue"]],
                ["name" => "Girl Jersey", "price" => 399, "image" => "Jersey3.jpg", "sizes" => ["S", "M", "L"], "colors" => ["White", "red" ,"Sky Blue"]],
                ["name" => "Girl Jersey", "price" => 299, "image" => "Jersey4.jpg", "sizes" => ["S", "M", "L"], "colors" => ["Black", "Gray","Nevy Blue"]],
           
            ];

            foreach ($products as $product): ?>
                <div class="product">
                    <img src="images/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                    <h3><?= $product['name'] ?></h3>
                    <p>Price: ₹<?= number_format($product['price'], 2) ?></p>
                    <form method="POST">
                        <input type="hidden" name="product_name" value="<?= $product['name'] ?>">
                        <input type="hidden" name="product_price" value="<?= $product['price'] ?>">
                        <input type="hidden" name="product_image" value="<?= $product['image'] ?>">

                        <label>Size:
                            <select name="product_size">
                                <?php foreach ($product['sizes'] as $size): ?>
                                    <option value="<?= $size ?>"><?= $size ?></option>
                                <?php endforeach; ?>
                            </select>
                        </label><br>

                        <label>Color:
                            <select name="product_color">
                                <?php foreach ($product['colors'] as $color): ?>
                                    <option value="<?= $color ?>"><?= $color ?></option>
                                <?php endforeach; ?>
                            </select>
                        </label><br>

                        <label>Quantity:
                            <input type="number" name="product_quantity" value="1" min="1">
                        </label><br>

                        <button type="submit">Add to Cart</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <?php include("includes/sidebar.php"); ?>
</body>
</html>