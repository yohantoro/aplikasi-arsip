<?php
// sisipkan file connection.php dari folder config
require_once 'config/connection.php';

// cek apakah ada request post
if (isset($_POST)) {

    $namaDepan = $_POST['nama_depan'];
    $namaBelakang = $_POST['nama_belakang'];

    // https://www.w3schools.com/php/php_mysql_prepared_statements.asp
    // jika ada $_GET['id'] => update
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "UPDATE petugas SET
            `nama_depan` = ?,
            `nama_belakang` = ?
        WHERE `id` = ?";

        $statement = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($statement, 'ssi', $namaDepan, $namaBelakang, $id);
        $redirectKey = $id;
    }
    // jika tidak => create
    else {
        $query = "INSERT INTO petugas (`nama_depan`, `nama_belakang`) VALUES (?, ?)";
        $statement = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($statement, 'ss', $namaDepan, $namaBelakang);
        $redirectKey = mysqli_insert_id($con);
    }

    // jika query berhasil dijalankan
    if (mysqli_stmt_execute($statement)) {

        // redirect ke halaman detail
        header('location:petugas_detail.php?id=' . $redirectKey);
        // echo $lastId;
    } else {

    }


}

// return false ketika tidak ada request $_POST
return false;

?>
