<?php
// sisipkan file connection.php dari folder config
require_once 'config/connection.php';

// cek apakah ada request post
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    
    $query = "DELETE FROM petugas WHERE `id` = ?";

    $statement = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($statement, 'i', $id);

    // jika query berhasil dijalankan
    if (mysqli_stmt_execute($statement)) {
        // redirect ke halaman list
        header('location:petugas_list.php');
    } else {
        die('Error: ' . mysqli_error($con));
    }


}

// return false ketika tidak ada request $_POST
return false;

?>
