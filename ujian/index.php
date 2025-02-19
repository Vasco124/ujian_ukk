<?php

    //untuk menjalankan database nya
    $host = 'localhost';
    $username = 'root';  
    $password = ''; 
    $dbname = 'kasir_wahyu'; 

    //untuk menjalankan mysql nya
    $index = new mysqli($host, $username, $password, $dbname);

    //untuk melihat koneksi
    if ($index->connect_error) {
        die("Koneksi gagal: " . $index->connect_error);
    }
?>
