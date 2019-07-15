<?php
// sisipkan file connection.php dari folder config
require_once 'config/connection.php';

// cek apakah ada request post
if (isset($_POST)) {

    $namaDepan = $_POST['nama_depan'];
    $namaBelakang = $_POST['nama_belakang'];

    $query = "INSERT INTO petugas (`nama_depan`, `nama_belakang`) VALUES (?, ?)";
    $statement = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($statement, 'ss', $namaDepan, $namaBelakang);

    // jika query berhasil dijalankan
    if (mysqli_stmt_execute($statement)) {
        // redirect ke halaman detail
        header('location:petugas_detail.php?id=' . mysqli_insert_id($con));
    } else {
        die('Error: ' . mysqli_error($con));
    }

}

// return false ketika tidak ada request $_POST
return false;

?>
