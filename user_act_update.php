<?php

require 'config/connection.php';

if (isset($_POST)) {
    // echo "<pre>"; var_dump($_POST); exit;
    $id = $_POST['id'];
    $petugas_id = $_POST['petugas_id'];
    $username = $_POST['username'];
    $password = (trim($_POST['password']) == null) ? null : password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "UPDATE user SET petugas_id = $petugas_id, username = '$username'";
    if ($password != null) {
        $query .= ", password = '$password'";
    }
    $query .= " WHERE id = " . $id;

    if (mysqli_query($con, $query)) {
        header('location:user_detail.php?id=' . $id);
    } else {
        die(mysqli_error($con));
    }
}

?>
