<?php
session_start();

require_once 'config/connection.php';

if ($_POST) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $query = "SELECT * FROM `user` WHERE `username` = '$username'";
    $result = mysqli_query($con, $query);

    if (!$result) { // jika query gagal
        /* Aplikasi berhenti dan menampilkan error */
        die(mysqli_error($con));
    }

    if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $data['password'])) {
                $_SESSION['user']['id'] = $data['id'];
                $_SESSION['user']['name'] = $data['username'];

                header('location:index.php');
            } else {
                header('location:login.php?error_message=Invalid username or password!');
            }
        }
    } else {
        header('location:login.php?error_message=Invalid username or password!');
    }

}

?>
