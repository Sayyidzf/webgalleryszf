<?php
include 'koneksi.php';
session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = mysqli_query($conn, "select * from user where username='$username' and password= '$password' ");

$cek = mysqli_num_rows($sql);

if ($cek > 0) {
    $data = mysqli_fetch_array($sql);

    $_SESSION['userid'] = $data['userid'];
    $_SESSION['namalengkap'] = $data['namalengkap'];
    $_SESSION['status'] = 'login';
    echo "<script>
        alert('Login berhasil');
        location.href='../admin/index.php';
        </script>";
} else {
    echo "<script>
    alert('Usernama atau password Salah!');
    location.href='../login.php';
    </script>";
}
