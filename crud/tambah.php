<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tambah Data</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <section class="row">
        <div class="col-md-6 offset-md-3 align-self-center">
            <h1 class="text-center mt-4">Form Tambah Data</h1>
            <form method="POST">
                <div class="mb-3">
                    <label for="inputNis" class="form-label">NIS</label>
                    <input type="number" class="form-control" id="inputNis" name="nis" placeholder="Masukkan NIS Siswa">
                </div>
                <div class="mb-3">
                    <label for="inputNama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="inputNama" name="nama"
                        placeholder="Masukkan Nama Siswa">
                </div>
                <div class="mb-3">
                    <label for="inputKelas" class="form-label">Kelas</label>
                    <input type="text" class="form-control" id="inputKelas" name="kelas"
                        placeholder="Masukkan Kelas Siswa">
                </div>
                <input name="daftar" type="submit" class="btn btn-primary" value="Tambah">
                <a href="index.php" type="button" class="btn btn-info text-white">Kembali</a>
            </form>
        </div>
    </section>

    <?php
    // Buat kondisi jika tombol daftar diklik
    if (isset($_POST['daftar'])) {
        // Membuat variabel untuk setiap field inputan agar kodingan lebih rapi
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];

        // Membuat query
        $query = "insert into tb_siswa (nis, nama, kelas) VALUES ('$nis', '$nama', '$kelas')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header("Location: index.php");
        } else {
            echo "<script>alert('Data gagal ditambahkan');</script>";
        }
    }
    ?>
</body>

</html>