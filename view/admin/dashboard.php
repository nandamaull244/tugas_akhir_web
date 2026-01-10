<?php
if($_SESSION['admin_logged_in'] !== true){
    header('Location: ../auth/login.php');
    message('error', 'Please log in as admin to access the admin dashboard.');
    exit;
}
$title = 'Dashboard';
$page = 'dashboard';

$admin_name = 'Admin';
$admin_photo = '../../assets/logo.png';

$content = __DIR__ . '/pages/dashboard-content.php';

include 'layout/master.php';
