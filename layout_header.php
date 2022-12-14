<?php

// sisipkan file connection.php di folder config
include 'config/app.php';

?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/app/style.css">
    <link rel="stylesheet" href="assets/themes/flatly/bootstrap.min.css">

    <title>Arsip</title>

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Arsip</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-surat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Surat</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-surat">
                            <a class="dropdown-item" href="smasuk_list.php">Surat Masuk</a>
                            <a class="dropdown-item" href="skeluar_list.php">Surat Keluar</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="disposisi_list.php">Disposisi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-referensi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Referensi</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-referensi">
                            <a class="dropdown-item" href="petugas_list.php">Petugas</a>
                            <a class="dropdown-item" href="user_list.php">User</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main role="main" class="container">

        <?php if (isset($_SESSION['user'])) : ?>
            <p class="text-right">
                <small>Anda login sebagai <?= $_SESSION['user']['name'] ?></small>
            </p>
        <?php endif; ?>