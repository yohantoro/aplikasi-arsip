<?php
// sisipkan file connection.php dari folder config
require_once 'config/connection.php';

// cek apakah ada request post
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = "DELETE FROM disposisi WHERE id = " . $id;

    // jika query berhasil dijalankan
    if (mysqli_query($con, $query)) {
        // redirect ke halaman list
        header('location:disposisi_list.php');
    } else {
        die('Error: ' . mysqli_error($con));
    }


}

// return false ketika tidak ada request $_POST
return false;

?>
