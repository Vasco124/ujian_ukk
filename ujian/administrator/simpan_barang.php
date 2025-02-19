<?php 
// koneksi database
include '../index.php';

// menangkap data yang di kirim dari form
$NamaProduk = $_POST['namaProduk'];
$Harga = $_POST['harga'];
$Stok = $_POST['Stok'];

// menginput data ke database
mysqli_query($index,"insert into produk values('','$namaProduk','$harga','$stok')");

// mengalihkan halaman kembali ke barang.php
header("location:barang.php?pesan=simpan");

?>