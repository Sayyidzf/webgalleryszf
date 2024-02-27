<?php
session_start();
$userid = $_SESSION['userid'];
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
  echo "<script>
alert('Anda belum login!');
location.href='../index.php';
</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Halaman Home</title>
  <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container">
      <a class="navbar-brand" href="index.php">Website Galerry Foto</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
        <div class="navbar-nav me-auto">
          <a href="home.php" class="nav-link">Home</a>
          <a href="album.php" class="nav-link">Album</a>
          <a href="foto.php" class="nav-link">Foto</a>
        </div>
        <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Keluar</a>
      </div>
    </div>
  </nav>

  <div class="container mt-3">
    Album :
    <?php
    $album = mysqli_query($conn, "select * from album where userid='$userid'");
    while ($row = mysqli_fetch_array($album)) { ?>
      <a href="home.php?albumid=<?php echo $row['albumid'] ?>" class="btn btn-outline-primary"><?php echo $row['namaalbum'] ?></a>

    <?php } ?>

    <div class="row">
      <?php
      if (isset($_GET['albumid'])) {
        $albumid = $_GET['albumid'];
        $sql = mysqli_query($conn, "select * from foto where userid='$userid' and albumid='$albumid'");
        while ($data = mysqli_fetch_array($sql)) { ?>
          <div class="col-md-3 mt-2">
            <a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>">

              <div class="card-mb-2" align="center">
                <img src="../asset/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['lokasifile'] ?>" style="height:12rem;">
                <div class="card-footer text-center">
                  <?php
                  $fotoid = $data['fotoid'];
                  $ceksuka = mysqli_query($conn, "select * from likefoto where fotoid='$fotoid' and userid='$userid'");
                  if (mysqli_num_rows($ceksuka) == 1) { ?>
                    <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="batalsuka"><i class="bi bi-heart-fill"></i></a>
                  <?php } else { ?>
                    <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="suka"><i class="bi bi-heart"></i></a>
                  <?php }
                  $like = mysqli_query($conn, "select * from likefoto where fotoid='$fotoid'");
                  echo mysqli_num_rows($like) . 'Suka';
                  ?>
                  <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>"><i class="bi bi-chat-left-dots-fill"></i></i></a>
                  <?php
                  $jmlkomen = mysqli_query($conn, "select * from komentarfoto where fotoid='$fotoid'");
                  echo mysqli_num_rows($jmlkomen) . 'Komentar';
                  ?>
                </div>
              </div>
            </a>


          </div>

        <?php }
      } else {

        $sql = mysqli_query($conn, "select * from foto where userid='$userid'");
        while ($data = mysqli_fetch_array($sql)) {
        ?>
          <div class="col-md-3 mt-2">
            <a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>">

              <div class="card">
                <img src="../asset/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['lokasifile'] ?>" style="height:12rem;">
                <div class="card-footer text-center">

                  <?php
                  $fotoid = $data['fotoid'];
                  $ceksuka = mysqli_query($conn, "select * from likefoto where fotoid='$fotoid' and userid='$userid'");
                  if (mysqli_num_rows($ceksuka) == 1) { ?>
                    <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="batalsuka"><i class="bi bi-heart-fill"></i></a>
                  <?php } else { ?>
                    <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="suka"><i class="bi bi-heart"></i></a>
                  <?php }
                  $like = mysqli_query($conn, "select * from likefoto where fotoid='$fotoid'");
                  echo mysqli_num_rows($like) . 'Suka';
                  ?>
                  <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>"><i class="bi bi-chat-left-dots-fill"></i></i></a>
                  <?php
                  $jmlkomen = mysqli_query($conn, "select * from komentarfoto where fotoid='$fotoid'");
                  echo mysqli_num_rows($jmlkomen) . 'Komentar';
                  ?>
                </div>
              </div>
            </a>


          </div>
      <?php }
      } ?>
    </div>
  </div>


  <footer class=" d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>&copy; UKK RPL 2024 | Sayyid Zainul Fatwa</p>
  </footer>


  <script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
</body>

</html>