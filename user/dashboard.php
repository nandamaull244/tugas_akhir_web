<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
?>

<h2>Dashboard User</h2>
<p>Halo, <?= $_SESSION['user']['nama']; ?></p>

<ul>
    <li><a href="data.php">Lihat Data Gridova</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>