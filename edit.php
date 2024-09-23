<html>
<title>Tambah data ijazah</title>
<style>
    h3 {
        text-align: center;
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

<h3>Edit data ijazah</h3>

<?php
    include "koneksi.php";

    $kode = $_GET['kode'];
    $data = mysqli_query($koneksi, "SELECT * FROM Siswa WHERE NIS='$kode'");
    while($row = mysqli_fetch_array($data)) {
?>

<form action="" method="post">
<table align="center">
    <tr>
        <td width="160"> Nis </td>
        <td><input type="text" name="Nis" placeholder="Masukan Nis" value="<?php echo $row['NIS']; ?>" size="50"></td>
    </tr>
    <tr>
        <td> Nama </td>
        <td><input type="text" name="Nama" placeholder="Masukan Nama" size="50" value="<?php echo $row['NAMA']; ?>"></td>
    </tr> 
    <tr>
        <td> Tempat tanggal lahir</td>
        <td><input type="text" name="Tempat_tanggal_lahir" placeholder="Masukan Tempat tanggal lahir" size="50" value="<?php echo $row['TEMPAT_TANGGAL_LAHIR']; ?>"></td>
    </tr>   
    <tr>
        <td> Jenis kelamin </td>
        <td><input type="text" name="Jenis_kelamin" placeholder="Masukan Jenis kelamin" size="50" value="<?php echo $row['JENIS_KELAMIN']; ?>"></td>
    </tr>   
    <tr>
        <td> Alamat </td>
        <td><input type="text" name="Alamat" placeholder="Masukan Alamat" size="50" value="<?php echo $row['ALAMAT']; ?>"></td>
    </tr>   
    <tr>
        <td> Kompetensi keahlian </td>
        <td><input type="text" name="Kompetensi_keahlian" placeholder="Masukan Kompetensi keahlian" size="50" value="<?php echo $row['KOMPETENSI_KEAHLIAN']; ?>"></td>
    </tr>   
    <tr>
        <td> Tanggal lulus </td>
        <td><input type="text" name="Tanggal_lulus" placeholder="Masukan Tanggal lulus" size="50" value="<?php echo $row['TANGGAL_LULUS']; ?>"></td>
    </tr>   
    <tr>
        <td> Nomor ijazah </td>
        <td><input type="text" name="Nomor_ijazah" placeholder="Masukan Nomor ijazah" size="50" value="<?php echo $row['NO_IJAZAH']; ?>"></td>
    </tr> 
    <tr>
        <td></td>
        <td>
            <input type="submit" value="Edit" name="edit">
            <input type="reset" value="Batal" name="batal">
        </td>
    </tr>       
</table>
</form>
<?php
}
?>

<?php
if(isset($_POST['edit'])){
    mysqli_query($koneksi, "UPDATE Siswa SET 
        NAMA = '$_POST[Nama]',
        TEMPAT_TANGGAL_LAHIR = '$_POST[Tempat_tanggal_lahir]',
        JENIS_KELAMIN = '$_POST[Jenis_kelamin]',
        ALAMAT = '$_POST[Alamat]',
        KOMPETENSI_KEAHLIAN = '$_POST[Kompetensi_keahlian]',
        TANGGAL_LULUS = '$_POST[Tanggal_lulus]',
        NO_IJAZAH = '$_POST[Nomor_ijazah]'
        WHERE NIS = '$_POST[Nis]'");

    if(mysqli_affected_rows($koneksi) > 0){
        header("location:tampil.php");
    } else {
        header("location:tambah.php");
    }

    echo '<div class="pesan">Data ijazah baru sudah disimpan</div>';
}
?>
</html>
