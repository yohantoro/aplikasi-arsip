<?php
session_start();

require_once 'connection.php';

if (!isset($_SESSION['user'])) {
    header('location:login.php');
}
