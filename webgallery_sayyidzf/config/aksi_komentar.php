<?php
include "koneksi.php";
session_start();

if (isset($_POST['tambah'])) {
    $namaalbum = $_POST['namaalbum'];
    $deskripsi = $_POST['deskripsi'];
    $tanggaldibuat = date("Y-m-d");
    $userid = $_SESSION['userid'];

    $sql = mysqli_query($conn, "INSERT INTO album VALUES('', '$namaalbum' , '$deskripsi' , '$tanggaldibuat','$userid')");

    echo "<script>
    alert('Data berhasil disimpan!');
location.href='../admin/album.php';
</script>";
}

if (isset($_POST['edit'])) {
    $albumid = $_POST['albumid'];
    $namaalbum = $_POST['namaalbum'];
    $deskripsi = $_POST['deskripsi'];
    $tanggaldibuat = date("Y-m-d");
    $userid = $_SESSION['userid'];

    $sql = mysqli_query($conn, "update album set namaalbum='$namaalbum', deskripsi='$deskripsi', tanggaldibuat='$tanggaldibuat' where albumid='$albumid'");

    echo "<script>
    alert('Data berhasil diperbaharui!');
location.href='../admin/album.php';
</script>";
}

if (isset($_POST['hapus'])) {
    $komentarid = $_GET['komentarid'];

    $sql = mysqli_query($conn, "delete from komentarfoto where komentarid='$komentarid' ");

    echo "<script>
    alert('Data berhasil dihapus!');
location.href='../admin/index.php';
</script>";
}
