<?php include("config.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Pendaftaran Siswa Baru | SMK Coding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #FFE599;
        }
        table{
            background-color: white;
            border-radius: 10px;
        }
    </style>
</head>

<body class="p-5">
    <header>
        <h2>List Pendaftar</h2>
    </header>

    <nav>
        <a class="btn btn-dark" href="form-daftar.php">Tambah Baru</a>
    </nav>

    <br>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Sekolah Asal</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $sql = "SELECT * FROM calon_siswa";
            $query = mysqli_query($db, $sql);

            while ($siswa = mysqli_fetch_array($query)) {
                echo "<tr>";

                echo "<td>" . $siswa['id'] . "</td>";
                echo "<td>" . $siswa['nama'] . "</td>";
                echo "<td style='width: 20%'>" . $siswa['alamat'] . "</td>";
                echo "<td>" . $siswa['jenis_kelamin'] . "</td>";
                echo "<td>" . $siswa['agama'] . "</td>";
                echo "<td>" . $siswa['sekolah_asal'] . "</td>";

                echo "<td>";
                echo "<a class='btn btn-dark mx-1' href='form-edit.php?id=" . $siswa['id'] . "'>Edit</a>";
                echo "<a class='btn btn-danger' href='hapus.php?id=" . $siswa['id'] . "'>Hapus</a>";
                echo "</td>";

                echo "</tr>";
            }
            ?>

        </tbody>
    </table>

    <h5>Total: <?php echo mysqli_num_rows($query) ?></h5>

</body>

</html>