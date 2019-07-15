<?php

const HOST          = 'localhost';
const DB_NAME       = 'smk_arsip';
const DB_USERNAME   = 'root';
const DB_PASSWORD   = 'roottoor321';

$con = mysqli_connect(HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (mysqli_connect_errno()) {
    die('Gagal menghubungkan ke database. Error: ' . mysqli_connect_error());
}
