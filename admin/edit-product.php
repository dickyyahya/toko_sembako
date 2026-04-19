<?php
session_start();
include '../db.php';

if ($_SESSION['status_login'] != true) {
  echo '<script>window.location="signin.php"</script>';
}

$page = 'page-admin/edit-product-content.php';
include 'layout.php';
