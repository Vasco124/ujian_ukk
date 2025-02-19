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

    <title>Detail</title>
  </head>
  <body>
    <div class="card mt-2">
         <div class="card-body">
            <p class="fs-5">Tekan tambah data buat menambah data</p>
            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#tambah-data">
                    Tambah Data
                </button>
            </div>
            <div class="card-body">
                <?php 
                if(isset($_GET['pesan'])){
                    if($_GET['pesan']=="simpan"){?>
                        <div class="alert alert-success" role="alert">
                            Data Berhasil Di Simpan
                        </div>
                    <?php } ?>
                    <?php if($_GET['pesan']=="update"){?>
                        <div class="alert alert-success" role="alert">
                            Data Berhasil Di Update
                        </div>
                    <?php } ?>
                    <?php if($_GET['pesan']=="hapus"){?>
                        <div class="alert alert-success" role="alert">
                            Data Berhasil Di Hapus
                        </div>
                    <?php } ?>
                    <?php 
                }
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include '../index.php';
                        $no = 1;
                        $data = mysqli_query($index,"select * from produk");
                        while($d = mysqli_fetch_array($data)){
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['namaProduk']; ?></td>
                                <td>Rp. <?php echo $d['harga']; ?></td>
                                <td><?php echo $d['stok']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#edit-data<?php echo $d['produkID']; ?>">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus-data<?php echo $d['produkID']; ?>">
                                        Hapus
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal Edit Data-->
                            <div class="modal fade" id="edit-data<?php echo $d['produkID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="proses_update_barang.php" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Nama Produk</label>
                                                    <input type="hidden" name="ProdukID" value="<?php echo $d['produkID']; ?>">
                                                    <input type="text" name="NamaProduk" class="form-control" value="<?php echo $d['namaProduk']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Harga Produk</label>
                                                    <input type="number" name="Harga" class="form-control" value="<?php echo $d['harga']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Stok Produk</label>
                                                    <input type="number" name="Stok" class="form-control" value="<?php echo $d['stok']; ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Hapus Data-->
                            <div class="modal fade" id="hapus-data<?php echo $d['produkID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="proses_hapus_barang.php">
                                            <div class="modal-body">
                                                <input type="hidden" name="produkID" value="<?php echo $d['produkID']; ?>">
                                                Apakah anda yakin akan menghapus data <b><?php echo $d['namaProduk']; ?></b>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Tambah Data-->
        <div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="simpan_barang.php" method="post">
                        <div class="modal-body">				
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" name="NamaProduk" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Harga Produk</label>
                                <input type="number" name="Harga" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Stok Produk</label>
                                <input type="number" name="Stok" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

