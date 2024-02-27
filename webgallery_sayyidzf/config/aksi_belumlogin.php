<?php
session_start();
include 'koneksi.php';
echo "<script>
alert('Anda belum login!');
location.href='../index.php';
</script>";
