<?php
require_once '../database/connection.php';
require_once '../model/Brand.php';

$brandModel = new Brand($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'create') {
        $nama_brand = $_POST['nama_brand'];
        $brandModel->create($nama_brand);
        $_SESSION['success'] = "Brand created successfully.";
        header("Location: /tugas_akhir/view/admin/brand.php");
        exit();
    } elseif ($action === 'edit') {
        $id = $_POST['id'];
        $nama_brand = $_POST['nama_brand'];
        $brandModel->updateBrand($id, $nama_brand);
        $_SESSION['success'] = "Brand updated successfully.";
        header("Location: /tugas_akhir/view/admin/brand.php");
        exit();
    } elseif ($action === 'delete') {
        $id = $_POST['id'];
        $brandModel->deleteBrand($id);
        $_SESSION['success'] = "Brand deleted successfully.";
        header("Location: /tugas_akhir/view/admin/brand.php");
        exit();
    }
}