<!DOCTYPE html>
<html>

<head>
    <title>Pendaftaran Siswa Baru | SMK Coding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-image: linear-gradient(120deg, #FFE599 0%, #F1C232 100%);
        }
    </style>
</head>

<body class="d-flex min-vh-100 flex-column aligns-items-center justify-content-center text-center">
    <header>
        <h3>Pendaftaran Siswa Baru</h3>
        <h1>SMK Coding</h1>
    </header>

    <div class="container p-0 card shadow border-0 rounded" style="max-width: 30rem;">
        <div class="card-header bg">
            <h3>Menu</h3>
        </div>
        <nav>
            <div class="px-3 border-top py-4 text-center">
                <a href="form-daftar.php" class="btn btn-dark">Daftar Baru</a>
                <a href="list-siswa.php" class="btn btn-dark">List Pendaftar</a>
            </div>
        </nav>
        <?php if (isset($_GET['status'])) : ?>
            <p>
                <?php
                if ($_GET['status'] == 'sukses') {
                    echo "Pendaftaran siswa baru berhasil!";
                } else {
                    echo "Pendaftaran gagal!";
                }
                ?>
            </p>
        <?php endif; ?>

</body>

</html>