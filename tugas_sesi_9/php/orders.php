<?php

include 'koneksi.php';

$product_id = $_POST['product_id'] ?? '';
$jumlah     = $_POST['jumlah'] ?? '';

if ($product_id == '' || $jumlah == '') {
    die("Semua data harus diisi!");
}

// Ambil data produk
$getProduk = mysqli_query(
    $conn,
    "SELECT * FROM products WHERE id = '$product_id'"
);

$produk = mysqli_fetch_assoc($getProduk);

if (!$produk) {
    die("Produk tidak ditemukan!");
}

// Cek apakah produk sudah ada di cart
$cekOrder = mysqli_query(
    $conn,
    "SELECT * FROM orders WHERE product_id = '$product_id'"
);

if(mysqli_num_rows($cekOrder) > 0){

    $orderLama = mysqli_fetch_assoc($cekOrder);

    $quantityBaru = $orderLama['quantity'] + $jumlah;

    mysqli_query(
        $conn,
        "UPDATE orders
         SET quantity = '$quantityBaru'
         WHERE product_id = '$product_id'"
    );

} else {

    mysqli_query(
        $conn,
        "INSERT INTO orders
        (user_id, product_id, quantity)
        VALUES
        (1, '$product_id', '$jumlah')"
    );
}

// pindah ke cart
header("Location: ../pages/cart.php");
exit;