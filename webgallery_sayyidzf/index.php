<?php
session_start();

include 'config/koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
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
          <a href="config/aksi_belumlogin.php" class="nav-link">Home</a>
          <a href="config/aksi_belumlogin.php" class="nav-link">Album</a>
          <a href="config/aksi_belumlogin.php" class="nav-link">Foto</a>

        </div>
        <a href="register.php" class=" btn btn-outline-primary m-1">Daftar</a>
        <a href="login.php" class=" btn btn-outline-success m-1">Login</a>
      </div>
    </div>
  </nav>

  <div class="container mt-3">
    <div class="row">
      <?php
      $sql = mysqli_query($conn, "select * from foto inner join user on foto.userid=user.userid inner join album on foto.albumid=album.albumid");
      while ($data = mysqli_fetch_array($sql)) {
      ?>
        <div class="col-md-3 mt-2">
          <a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>">

            <div class=" card-mb-2" align="center">
              <img src="asset/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>" style="height:12rem;">
              <div class="card-footer text-center">
                <?php
                $fotoid = $data['fotoid'];
                $ceksuka = mysqli_query($conn, "select * from likefoto where fotoid='$fotoid'");
                if (mysqli_num_rows($ceksuka) == 1) { ?>
                  <a href="config/aksi_belumlogin.php" type="submit" name="batalsuka"><i class="bi bi-heart"></i></i></a>
                <?php } else { ?>
                  <a href="config/aksi_belumlogin.php" type="submit" name="suka"><i class="bi bi-heart"></i></i></a>
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

          <!-- Modal -->
          <div class="modal fade" id="komentar<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-8">
                      <img src="asset/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
                    </div>
                    <div class=" col-md-4">
                      <div class="m-2">
                        <div class="overflow-auto">
                          <div class="sticky-top">
                            <strong><?php echo $data['judulfoto'] ?></strong><br>
                            <span class="badge bg-secondary"><?php echo $data['namalengkap'] ?></span>
                            <span class="badge bg-secondary"><?php echo $data['tanggalunggah'] ?></span>
                            <span class="badge bg-primary"><?php echo $data['namaalbum'] ?></span>
                          </div>
                          <hr>
                          <p align="left">
                            <?php echo $data['deskripsifoto'] ?>
                          </p>
                          <hr>
                          <?php
                          $fotoid = $data['fotoid'];
                          $komentar = mysqli_query($conn, "select * from komentarfoto inner join user on komentarfoto.userid=user.userid where komentarfoto.fotoid='$fotoid'");
                          while ($row = mysqli_fetch_array($komentar)) {
                          ?>
                            <p align="left">
                              <strong><?php echo $data['namalengkap'] ?></strong>
                              <?php echo $row['isikomentar'] ?>
                            </p>
                          <?php } ?>
                          <hr>
                          <div class="sticky-bottom">
                            <form action="config/aksi_belumlogin.php" method="post">
                              <div class="input-group">
                                <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                <input type="text" name="isikomentar" class="form-control" placeholder="Tambah Komentar">
                                <div class="input-group-prepend">
                                  <button type="submit" name="kirimkomentar" class="btn btn-outline-primary"><i class="bi bi-send-fill"></i></button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      <?php } ?>
    </div>
  </div>


  <footer class=" d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>&copy; UKK RPL 2024 | Sayyid Zainul Fatwa</p>
  </footer>
  <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
</body>

</html>q