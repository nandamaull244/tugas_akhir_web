<?php
$title = 'Grifdova - Home';
$page = 'home';
$user_name = $_SESSION['user']['nama'];

$content = __DIR__ . '/pages/detail-content.php';

include 'layout/master.php';
