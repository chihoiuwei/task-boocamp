<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nama_produk = trim($_POST['nama_produk']);
    $jumlah = trim($_POST['jumlah']);

    if(empty($nama_produk) || empty($jumlah)){
        echo "Semua data harus diisi!";
    } else {

        echo "<h2>Produk Berhasil Ditambahkan</h2>";

        echo "Produk : " . $nama_produk . "<br>";
        echo "Jumlah : " . $jumlah . "<br>";
    }
}
?>