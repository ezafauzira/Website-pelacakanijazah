<?php

include "koneksi.php";

$kode = $_GET['kode'];
$hapus  = mysqli_query($koneksi, "delete from Siswa where NIS='$kode'");

if ($hapus) {
    header("location:tampil.php");
} else {
    echo "Data gagal disimpan";
}

?>