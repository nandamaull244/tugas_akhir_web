<?php
$title = 'Gridova - Home';
$page = 'home';
$user_name = $_SESSION['user']['nama'];

$content = __DIR__ . '/pages/index.php';

include 'layout/master.php';
