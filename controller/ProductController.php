<?php
session_start();
require_once __DIR__ . '/../database/connection.php';
require_once __DIR__ . '/../model/Product.php';

$product = new Product($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    /* UPLOAD IMAGE */
    $imagePath = null;
    if (!empty($_FILES['gambar']['name'])) {
        $dir = '../assets/products/';
        if (!is_dir($dir)) mkdir($dir, 0777, true);

        $filename = time() . '_' . $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], $dir . $filename);
        $imagePath = 'assets/products/' . $filename;
    }

    /* CREATE */
    if ($action === 'create') {
        $product->create([
            'nama_produk'  => $_POST['nama_produk'],
            'harga'        => $_POST['harga'],
            'stok_produk'  => $_POST['stok_produk'],
            'is_available' => $_POST['stok_produk'] > 0 ? 1 : 0,
            'deskripsi'    => $_POST['deskripsi'],
            'id_kategori'  => $_POST['id_kategori'],
            'id_brand'     => $_POST['id_brand'],
            'id_gambar'    => $imagePath
        ]);

        $_SESSION['success'] = 'Produk berhasil ditambahkan';
        header('Location: ../view/admin/products.php');
        exit;
    }

    /* UPDATE */
    if ($action === 'update') {
        $product->update($_POST['id'], [
            'nama_produk'  => $_POST['nama_produk'],
            'harga'        => $_POST['harga'],
            'stok_produk'  => $_POST['stok_produk'],
            'is_available' => $_POST['stok_produk'] > 0 ? 1 : 0,
            'deskripsi'    => $_POST['deskripsi'],
            'id_kategori'  => $_POST['id_kategori'],
            'id_brand'     => $_POST['id_brand'],
            'id_gambar'    => $imagePath ?? $_POST['old_image']
        ]);

        $_SESSION['success'] = 'Produk berhasil diupdate';
        header('Location: ../view/admin/products.php');
        exit;
    }

    /* DELETE */
    if ($action === 'delete') {
        $product->delete($_POST['id']);
        $_SESSION['success'] = 'Produk berhasil dihapus';
        header('Location: ../view/admin/products.php');
        exit;
    }
}
