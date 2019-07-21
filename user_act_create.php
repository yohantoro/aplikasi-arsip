<?php

require 'config/connection.php';

if (isset($_POST)) {
    // echo "<pre>"; print_r($_POST); exit;

    $petugas_id = $_POST['petugas_id'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO user (petugas_id, username, password)
        VALUES ($petugas_id, '$username', '$password')";

    if (mysqli_query($con, $query)) {
        header('location:user_detail.php?id=' . mysqli_insert_id($con));
    } else {
        die(mysqli_error($con));
    }
}

?>
