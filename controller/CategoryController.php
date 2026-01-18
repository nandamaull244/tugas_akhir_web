<?php
require_once '../database/connection.php';
require_once '../model/Category.php';

$categoryModel = new Category($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'create') {
        $nama = $_POST['nama_kategori'];
        $categoryModel->create($nama);
        $_SESSION['success'] = "Kategori berhasil ditambahkan.";
        header("Location: /tugas_akhir/view/admin/category.php");
        exit();
    } elseif ($action === 'delete') {
        $id = $_POST['id'];
        $categoryModel->deleteCategory($id);
        $_SESSION['success'] = "Kategori berhasil dihapus.";
        header("Location: /tugas_akhir/view/admin/category.php");
        exit();
    } elseif ($action === 'edit') {
        $id = $_POST['id'];
        $nama = $_POST['nama_kategori'];
        $categoryModel->updateCategory($id, $nama);
        $_SESSION['success'] = "Kategori berhasil diperbarui.";
        header("Location: /tugas_akhir/view/admin/category.php");
        exit();
    }
}