<?php

include("config.php");

// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: list-siswa.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM calon_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Formulir Edit Siswa | SMK Coding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        textarea {
            width: 100%;
        }
        input.a {
            width: 100%;
        }
        body {
            background-image: linear-gradient(120deg, #FFE599 0%, #F1C232 100%);
        }
    </style>
</head>

<body>
    <div class="d-flex min-vh-100 flex-column aligns-items-center justify-content-center">
        <div class="container p-0 card shadow border-0 rounded" style="max-width: 30rem;">
            <div class="card-header text-white bg-dark bg">
                <h3>Formulir Edit Siswa</h3>
            </div>
            <form action="proses-edit.php" method="POST" class="form-group">
                <div class="form-group mt-3 mx-2">
                    <input class = "a" type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />
                    <label for="nama">Nama: </label><br>
                    <input class = "a" type="text" name="nama" placeholder="nama lengkap" size="55" value="<?php echo $siswa['nama'] ?>" />
                </div>
                <div class="form-group mt-3 mx-2">
                    <p>
                        <label for="alamat">Alamat: </label><br>
                        <textarea name="alamat"><?php echo $siswa['alamat'] ?></textarea>
                    </p>
                </div>
                <div class="form-group mt-3 mx-2">
                    <p>
                        <label for="jenis_kelamin">Jenis Kelamin: </label>
                        <?php $jk = $siswa['jenis_kelamin']; ?>
                        <br>
                        <label><input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked" : "" ?>> Laki-laki</label>
                        <label><input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked" : "" ?>> Perempuan</label>
                    </p>
                </div>
                <div class="form-group mt-3 mx-2">
                    <p>
                        <label for="agama">Agama: </label><br>
                        <?php $agama = $siswa['agama']; ?>
                        <select name="agama">
                            <option <?php echo ($agama == 'Islam') ? "selected" : "" ?>>Islam</option>
                            <option <?php echo ($agama == 'Kristen') ? "selected" : "" ?>>Kristen</option>
                            <option <?php echo ($agama == 'Hindu') ? "selected" : "" ?>>Hindu</option>
                            <option <?php echo ($agama == 'Budha') ? "selected" : "" ?>>Budha</option>
                            <option <?php echo ($agama == 'Atheis') ? "selected" : "" ?>>Atheis</option>
                        </select>
                    </p>
                </div>

                <div class="form-group mt-3 mx-2 my-4">
                    <p>
                        <label for="sekolah_asal">Sekolah Asal: </label><br>
                        <input class = "a" size="55" type="text" name="sekolah_asal" placeholder="nama sekolah" value="<?php echo $siswa['sekolah_asal'] ?>" />
                    </p>
                </div>

                <div class="form-group mt-3 mx-2 my-4">
                    <input class = "a btn btn-dark" type="submit" value="Simpan" name="simpan" />
                </div>

            </form>
        </div>
    </div>

</body>

</html>