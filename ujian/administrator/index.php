<?php
include "navbar.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
        <div class="card mt-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                Data Barang
                                <?php
                                include '../index.php';
                                $data_produk = mysqli_query($index,"SELECT * FROM produk");
                                $jumlah_produk = mysqli_num_rows($data_produk);
                                ?>
                                <h3><?php echo $jumlah_produk; ?></h3>
                                <a href="barang.php" class="btn btn-outline-warning btn-sm">Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                Data Pembelian
                                <?php
                                include '../index.php';
                                $data_penjualan = mysqli_query($index,"SELECT * FROM penjualan");
                                $jumlah_penjualan = mysqli_num_rows($data_penjualan);
                                ?>
                                <h3><?php echo $jumlah_penjualan; ?></h3>
                                <a href="pembelian.php" class="btn btn-outline-warning btn-sm">Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                Data Pengguna
                                <?php
                                include '../index.php';
                                $data_petugas = mysqli_query($index,"SELECT * FROM users");
                                $jumlah_petugas = mysqli_num_rows($data_petugas);
                                ?>
                                <h3><?php echo $jumlah_petugas; ?></h3>
                                <a href="data_pengguna.php" class="btn btn-outline-warning btn-sm">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
