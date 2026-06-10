<?php

include 'koneksi.php';

$query = mysqli_query(
    $conn,
    "SELECT * FROM products"
);

$products = [];

while($row = mysqli_fetch_assoc($query)){
    $products[] = [
        "name" => $row["nama_produk"],
        "price" => "Rp " . number_format($row["harga"]),
        "category" => strtolower($row["kategori"]),
        "image" => "../img/" . $row["image"]
    ];
}

header('Content-Type: application/json');
echo json_encode($products);