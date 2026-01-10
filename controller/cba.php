<?php
//untuk proteksi halaman
if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit();
}
//untuk mulai session dan koneksi
session_start();

//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "tugas_akhir");

//login user
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])){
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            header("Location: ../view/user/index.php");
            exit();
        } else {
            echo "<script>alert('Incorrect password.');</script>";
        }
    }
}