<?php
session_start();
include 'koneksi.php';
$fotoid = $_GET['fotoid'];
$userid = $_SESSION['userid'];

$ceksuka = mysqli_query($conn, "select * from likefoto where fotoid='$fotoid' and userid='$userid'");

if (mysqli_num_rows($ceksuka) == 1) {
    while ($row = mysqli_fetch_array($ceksuka)) {
        $likeid = $row['likeid'];
        $sql = mysqli_query($conn, "delete from likefoto where likeid='$likeid'");
        echo "<script>
location.href='../admin/index.php';
</script>";
    }
} else {
    $tanggallike = date('Y-m-d');
    $sql = mysqli_query($conn, "insert into likefoto values('','$fotoid','$userid','$tanggallike')");
    echo "<script>
location.href='../admin/index.php';
</script>";
}
