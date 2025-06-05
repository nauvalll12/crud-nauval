<?php

include "koneksi.php";

$id = $_GET['id'];
$query = "delete from tb_siswa where id = '$id'";
$result = mysqli_query($koneksi, $query);
if ($result) {
    header("location: index.php");
} else {
    echo "Gagal menghapus data.";
}
?>