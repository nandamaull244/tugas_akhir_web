<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

require_once __DIR__ . '/../database/connection.php';
require_once __DIR__ . '/../model/User.php';

$userModel = new User($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = $_POST['action'] ?? '';

    /* ========= CREATE USER ========= */
    if ($action === 'create') {

        $nama     = trim($_POST['nama'] ?? '');
        $email    = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $role     = 'user';

        if ($nama === '' || $email === '' || $password === '') {
            $_SESSION['error'] = 'Semua field wajib diisi';
            header('Location: ../view/admin/users.php');
            exit;
        }

        if ($userModel->findByEmail($email)) {
            $_SESSION['error'] = 'Email sudah terdaftar';
            header('Location: ../view/admin/users.php');
            exit;
        }

        $userModel->create($nama, $email, $password, $role);

        $_SESSION['success'] = 'User berhasil ditambahkan';
        header('Location: ../view/admin/users.php');
        exit;
    }

}
if ($action === 'delete') {

    $id = trim($_POST['id'] ?? '');

    if ($id === '') {
        $_SESSION['error'] = 'ID user tidak ditemukan';
        header('Location: ../view/admin/users.php');
        exit;
    }

    $userModel->deleteUser($id);

    $_SESSION['success'] = 'User berhasil dihapus';
    header('Location: ../view/admin/users.php');
    exit;
}
if ($action === 'edit') {

    $id       = trim($_POST['id'] ?? '');
    $nama     = trim($_POST['nama'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($id === '' || $nama === '' || $email === '') {
        $_SESSION['error'] = 'ID, Nama, dan Email wajib diisi';
        header('Location: ../view/admin/users.php');
        exit;
    }

    $user = $userModel->findByEmail($email);
    if ($user && $user['id'] != $id) {
        $_SESSION['error'] = 'Email sudah terdaftar';
        header('Location: ../view/admin/users.php');
        exit;
    }

    $userModel->updateUser($id, $nama, $email, $password);

    $_SESSION['success'] = 'User berhasil diperbarui';
    header('Location: ../view/admin/users.php');
    exit;
}
