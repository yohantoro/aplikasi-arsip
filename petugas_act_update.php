<?php
// sisipkan file connection.php dari folder config
require_once 'config/connection.php';

// cek apakah ada request post
if (isset($_POST)) {

    $id = $_POST['id'];
    $namaDepan = $_POST['nama_depan'];
    $namaBelakang = $_POST['nama_belakang'];

    // https://www.w3schools.com/php/php_mysql_prepared_statements.asp
    $query = "UPDATE petugas SET
        `nama_depan` = ?,
        `nama_belakang` = ?
    WHERE `id` = ?";

    $statement = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($statement, 'ssi', $namaDepan, $namaBelakang, $id);
    $redirectKey = $id;

    // jika query berhasil dijalankan
    if (mysqli_stmt_execute($statement)) {
        // redirect ke halaman detail
        header('location:petugas_detail.php?id=' . $id);
    } else {
        die('Error: ' . mysqli_error($con));
    }


}

// return false ketika tidak ada request $_POST
return false;

?>
