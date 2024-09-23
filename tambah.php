<html>
<title>Tambah data ijazah</title>
<style>
    h3 {
        text-align: center;
        padding-top: 50px;
    }

    table {
        width: 700px;
        height: 450px;
        border: 1px solid black;
    }

    table td input {
        padding: 7px;
        font-size: 14px;
    }

    input[type="submit"]:hover,
    input[type="reset"]:hover {
        background: transparent;
        color: black;
    }

    input[type="submit"],
    input[type="reset"] {
        width: 20%;
        background: red;
        color: white;
        border: 1px solid black;
    }

    .pesan {
        text-align: center;
        margin-top: 20px;
        font-weight: bold;
        font-size: 16px;
        color: green;
    }

</style>

<h3> Tambah data ijazah </h3>

<form action="" method="post">
    <table align="center">
        <tr>
            <td width="160"> Nis </td>
            <td><input type="text" name="Nis" placeholder="Masukan Nis" size="50" required></td>
        </tr>
        <tr>
            <td> Nama </td>
            <td><input type="text" name="Nama" placeholder="Masukan Nama" size="50" required></td>
        </tr> 
        <tr>
            <td> Tempat tanggal lahir</td>
            <td><input type="text" name="Tempat_tanggal_lahir" placeholder="Masukan Tempat tanggal lahir" size="50" required></td>
        </tr>   
        <tr>
            <td> Jenis kelamin </td>
            <td><input type="text" name="Jenis_kelamin" placeholder="Masukan Jenis kelamin" size="50" required></td>
        </tr>   
        <tr>
            <td> Alamat </td>
            <td><input type="text" name="Alamat" placeholder="Masukan Alamat" size="50" required></td>
        </tr>   
        <tr>
            <td> Kompetensi keahlian </td>
            <td><input type="text" name="Kompetensi_keahlian" placeholder="Masukan Kompetensi keahlian" size="50" required></td>
        </tr>   
        <tr>
            <td> Tanggal lulus </td>
            <td><input type="text" name="Tanggal_lulus" placeholder="Masukan Tanggal lulus" size="50" required></td>
        </tr>   
        <tr>
            <td> Nomor ijazah </td>
            <td><input type="text" name="Nomor_ijazah" placeholder="Masukan Nomor ijazah" size="50" required></td>
        </tr> 
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Simpan" name="proses">
                <input type="reset" value="batal" name="batal">
            </td>
        </tr>       
    </table>
</form>

<?php
include "koneksi.php";

if(isset($_POST['proses'])){
    $nis = $_POST['Nis'];
    $cek_nis = mysqli_query($koneksi, "SELECT * FROM Siswa WHERE NIS='$nis'");
    
    if(mysqli_num_rows($cek_nis) > 0) {
        echo '<div class="pesan" style="color: red;"> Nis sudah terpakai, masukan Nis yang lain</div>';
    } else {
        mysqli_query($koneksi, "INSERT INTO Siswa SET 
            NIS = '$_POST[Nis]',
            NAMA = '$_POST[Nama]',
            TEMPAT_TANGGAL_LAHIR = '$_POST[Tempat_tanggal_lahir]',
            JENIS_KELAMIN = '$_POST[Jenis_kelamin]',
            ALAMAT = '$_POST[Alamat]',
            KOMPETENSI_KEAHLIAN = '$_POST[Kompetensi_keahlian]',
            TANGGAL_LULUS = '$_POST[Tanggal_lulus]',
            NO_IJAZAH = '$_POST[Nomor_ijazah]'");
    
        if(mysqli_affected_rows($koneksi) > 0){
            header("location:tampil.php");
        } else {
            header("location:tambah.php");
        }

        echo '<div class="pesan">Data ijazah baru sudah disimpan</div>';
    }
}
?>

</html>
