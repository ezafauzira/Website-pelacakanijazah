<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data ijazah</title>
</head>

<style type="text/css">
    h2 {
        text-align: center;
    }

    table {
        width: 900px;
        height: auto;
        border: 1px solid black;
        margin-bottom: 100px;
    }

    table th {
        color: white;
    }

    th, td {
        padding: 10px;
        border: 1px solid black;
    }

    h2 {
        margin-top: 100px;
    }

    h4 {
        width: 490px;
        text-align: center;
        margin-bottom: 15px;
    }

    h4 a {
        padding: 10px;
        color: white;
        background: limegreen;
        border: 1px solid black;
        text-decoration: none;
    }

    h4 a:hover {
        background: transparent;
        color: black;
    }
</style> 

<body>

    <h2>DATA IJAZAH</h2>

    <h4><a href="tambah.php">Tambah data ijazah</a></h4>

    <table align="center">
        <tr bgcolor="#2d0ba">
            <th>Nis</th>
            <th>Nama</th>
            <th>Tempat tanggal lahir</th>
            <th>Jenis kelamin</th>
            <th>Alamat</th>
            <th>Kompetensi keahlian</th>
            <th>Tanggal lulus</th>
            <th>Nomor ijazah</th>
            <th>Opsi</th>
        </tr>
        <?php
        include "koneksi.php";
        $no = 1;
        $data = mysqli_query($koneksi, "select * from Siswa");
        while ($row = mysqli_fetch_array($data)){
        ?>
        <tr>
            
            <td><?php echo $row['NIS']; ?></td>
            <td><?php echo $row['NAMA']; ?></td>
            <td><?php echo $row['TEMPAT_TANGGAL_LAHIR']; ?></td>
            <td><?php echo $row['JENIS_KELAMIN']; ?></td>
            <td><?php echo $row['ALAMAT']; ?></td>
            <td><?php echo $row['KOMPETENSI_KEAHLIAN']; ?></td>
            <td><?php echo $row['TANGGAL_LULUS']; ?></td>
            <td><?php echo $row['NO_IJAZAH']; ?></td>
            <td>
                <a href="edit.php?kode=<?php echo $row['NIS']; ?>">Edit</a>
                <a href="hapus.php?kode=<?php echo $row['NIS']; ?>" 
                    onclick="return confirm('Apakah anda yakin ingin menghapus data ijazah ini?')"> hapus</a>
            </td>
        </tr>
        <?php
        }
        ?>
