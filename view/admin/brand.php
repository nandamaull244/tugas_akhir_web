<?php
session_start();
if($_SESSION['admin_logged_in'] !== true){
    header('Location: ../auth/login.php');
    message('error', 'Please log in as admin to access the admin dashboard.');
    exit;
}
$title = 'Brand';
$page = 'brand';

$admin_name = 'Admin';
$admin_photo = '../../assets/logo.png';

$content = __DIR__ . '/pages/brand-content.php';

include 'layout/master.php';
