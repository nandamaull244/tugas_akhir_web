<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

$user_id = $_SESSION['user']['id'];

$query = "
    SELECT projects.nama_project, projects.deskripsi, users.nama
    FROM projects
    JOIN users ON projects.user_id = users.id
    WHERE users.id = $user_id
";

$result = mysqli_query($conn, $query);
?>

<h3>Data Project Saya</h3>

<table border="1" cellpadding="10">
<tr>
    <th>Nama Project</th>
    <th>Deskripsi</th>
    <th>Dibuat Oleh</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) : ?>
<tr>
    <td><?= $row['nama_project']; ?></td>
    <td><?= $row['deskripsi']; ?></td>
    <td><?= $row['nama']; ?></td>
</tr>
<?php endwhile; ?>
</table>

<a href="dashboard.php">Kembali</a>