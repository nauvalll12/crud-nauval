<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Update Data</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    // Ambil data dari parameter URL browser
    $id = $_GET['id'];

    // Query ambil data dari param jika ada.
    $query = "select * from tb_siswa where] id = '$id'";
    // Hasil Query
    $result = mysqli_query($koneksi, $query);
    foreach ($result as $data) {
        ?>

        <section class="row">
            <div class="col-md-6 offset-md-3 align-self-center">
                <h1 class="text-center mt-4">Form Update Data</h1>
                <form method="POST">
                    <!-- Inputan tersembunyi untuk menyimpan data id yang digunakan untuk mengupdate data -->
                    <input type="hidden" value="<?= $data['id'] ?>" name="id">
                    <div class="mb-3">
                        <label for="inputNis" class="form-label">NIS</label>
                        <input type="number" class="form-control" id="inputNis" value="<?= $data['nis'] ?>" name="nis"
                            placeholder="Masukkan NIS Siswa">
                    </div>
                    <div class="mb-3">
                        <label for="inputNama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="inputNama" value="<?= $data['nama'] ?>" name="nama"
                            placeholder="Masukkan Nama Siswa">
                    </div>
                    <div class="mb-3">
                        <label for="inputKelas" class="form-label">Kelas</label>
                        <input type="text" class="form-control" id="inputKelas" value="<?= $data['kelas'] ?>" name="kelas"
                            placeholder="Masukkan Kelas Siswa">
                    </div>
                    <input name="daftar" type="submit" class="btn btn-primary" value="Update">
                    <a href="index.php" type="button" class="btn btn-info text-white">Kembali</a>
                </form>
            </div>
        </section>

    <?php } ?>

    <?php
    // Buat kondisi jika tombol data diklik
    if (isset($_POST['daftar'])) {
        // Membuat variabel setiap field inputan agar lebih rapi
        $id = $_POST['id'];
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];

        // Membuat Query
        $query = "UPDATE tb_siswa SET nis = '$nis', nama = '$nama', kelas = '$kelas' WHERE id = '$id'";

        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header("location: index.php");
        } else {
            echo "<script>alert('Data gagal diupdate!');</script>";
        }
    }
    ?>
</body>

</html>