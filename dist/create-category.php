<?php
session_start();
include '../db.php';

if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="signin.php"</script>';
}

$page = 'page-user/create-category-content.php';
include 'layout.php';
