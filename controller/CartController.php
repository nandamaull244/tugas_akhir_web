<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../database/connection.php';
require_once '../model/Cart.php';
require_once '../model/Product.php';

// CEK LOGIN
if (!isset($_SESSION['user'])) {
    header('Location: ../view/auth/login.php');
    exit;
}

$cartModel    = new Cart($pdo);
$productModel = new Product($pdo);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_user   = $_SESSION['user']['id'];
    $id_produk = $_POST['id_produk'];
    $qty = max(1, intval($_POST['qty']));


    // ambil produk
    $product = $productModel->find($id_produk);
    if (!$product) {
        die('Produk tidak ditemukan');
    }

    $harga   = $product['harga'];

    // cek apakah produk sudah ada di cart
    $existing = $cartModel->findByUserAndProduct($id_user, $id_produk);

    if ($existing) {
        // update qty
        $newQty = $existing['qty'] + $qty;
        $cartModel->updateQty($existing['id'], $newQty);
    } else {
        // tambah cart baru
        $cartModel->create([
            'id_user'   => $id_user,
            'id_produk' => $id_produk,
            'qty'       => $qty,
            'harga'     => $harga
        ]);
    }

    $_SESSION['success'] = 'Produk ditambahkan ke cart';
    header('Location:  /tugas_akhir/view/user/cart.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // UPDATE QTY
    if (isset($_POST['update_qty'])) {
        $id  = $_POST['cart_id'];
        $qty = max(1, intval($_POST['qty']));
        $cart->updateQty($id, $qty);
    }

    // DELETE
    if (isset($_POST['delete'])) {
        $cart->delete($_POST['cart_id']);
    }

    header('Location: /tugas_akhir/view/user/cart.php');
    exit;
}
