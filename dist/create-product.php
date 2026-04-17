<?php
session_start();
include '../db.php';

if ($_SESSION['status_login'] != true) {
  echo '<script>window.location="login.php"</script>';
}

$page = 'create-product-content.php';
include 'layout.php';
