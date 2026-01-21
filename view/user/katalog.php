<?php
$title = 'Gridova - Katalog';
$page = 'product';
$user_name = $_SESSION['user']['nama'];

$content = __DIR__ . '/pages/katalog-content.php';
include 'layout/master.php';
