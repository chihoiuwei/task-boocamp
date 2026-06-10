<?php

include 'koneksi.php';

$id = $_GET['id'];

$get = mysqli_query(
    $conn,
    "SELECT * FROM orders WHERE id = '$id'"
);

$data = mysqli_fetch_assoc($get);

if($data){

    if($data['quantity'] > 1){

        $qtyBaru = $data['quantity'] - 1;

        mysqli_query(
            $conn,
            "UPDATE orders
             SET quantity = '$qtyBaru'
             WHERE id = '$id'"
        );

    }else{

        mysqli_query(
            $conn,
            "DELETE FROM orders
             WHERE id = '$id'"
        );
    }
}

header("Location: ../pages/cart.php");
exit;