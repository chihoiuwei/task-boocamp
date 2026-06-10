<?php

include '../php/koneksi.php';

$query = mysqli_query(
    $conn,
    "SELECT
        orders.id,
        orders.quantity,
        products.nama_produk,
        products.image,
        products.harga
    FROM orders
    JOIN products
    ON orders.product_id = products.id
    ORDER BY orders.id DESC"
);


$subtotal = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="../css/card.css" />
</head>
<body>
    

<div class="cart-container">

    <!-- Header -->
    <div class="cart-header">

        <h1>Shopping Cart</h1>

        <a href="index.php" title="Back to Home">
            <img src="../img/Group.png" width="30">
        </a>

    </div>

    <!-- Item 1 -->
    <?php while($row = mysqli_fetch_assoc($query)) { $subtotal += ($row['quantity'] * $row['harga']);?>
     

    <div class="cart-item">
        <div class="cart-left">
            <img src="../img/<?= $row['image'] ?>"class="cart-img" >

            <div class="cart-info">
                <h4>
                    <?= $row['nama_produk'] ?>
                </h4>

                <p>
                    <?= $row['quantity'] ?> x
                    <span class="cart-price">
                        Rp <?= number_format($row['harga'],0,',','.') ?>
                    </span>
                </p>

            </div>
        </div>

        <a
            href="../php/delete_orders.php?id=<?= $row['id'] ?>"
            class="delete-btn"
            onclick="return confirm('delete product from cart?')"
        >
            ×
        </a>

    </div>

    <?php } ?>

    


    <!-- Subtotal -->
   <div class="subtotal">
    <h3>Subtotal</h3>
    <h3 class="price"> Rp <?= number_format($subtotal,0,',','.') ?> </h3>

</div>
    <!-- Footer -->
    <div class="cart-footer" style="display: flex; justify-content: center;">
        <a href="#">Checkout</a>
    </div>

</div>

</body>
</html>