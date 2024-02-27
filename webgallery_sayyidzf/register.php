<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Website Galerry Foto</title>
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
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

                </div>
                <a href="register.php" class="btn btn-outline-primary m-1">Daftar</a>
                <a href="login.php" class="btn btn-outline-success m-1">Masuk</a>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body bg-light">
                        <div class="text-center">
                            <h5>Daftar akun baru</h5>
                        </div>
                        <form action="config/proses_register.php" method="POST">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" required class="form-control">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" required class="form-control">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" required class="form-control">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="namalengkap" required class="form-control">
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" required class="form-control">
                            <div class="d-grid mt-2">
                                <button class="btn btn-primary" type="submit" name="kirim">DAFTAR</button>
                            </div>
                        </form>
                        <hr>
                        <p>Sudah punya akun? <a href="login.php">Login disini!!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
        <p>&copy; UKK RPL 2024 | Sayyid Zainul Fatwa</p>
    </footer>


    <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
</body>

</html>