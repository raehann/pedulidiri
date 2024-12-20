<?php 
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <title>Peduli Diri - Lihat Catatan Perjalanan</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="data_table/datatable.css">
</head>
<body>
<div class="container-lihat" style="width:1050px;">
        <div class="lihat-user">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;"><i class="fa fa-heartbeat" style="color: red;"></i> PEDULI DIRI</p>
            <p class="lihat-text" style="margin-bottom: 10px;"><i class="fa fa-pencil-alt"></i> Catatan Perjalanan <?= $_SESSION['nama']; ?></p>

            <table style="margin-top: 20px;">
                <td><a href="index.php"><button style="background-color: #FF9999;  width: 100px; height: 30px; border: none; box-shadow: 3px 3px 5px #a71a1a; font-weight:600; border-radius: 7px;"><i class="fa fa-home"></i> HOME</button></a></td>
                <td><select class="custom-select" name="urut" id="urut" onclick="urutkan(this)" style="height: 27px; border-radius: 4px; text-align:center; margin-left: 210px; margin-top:5px;">
                    <option value="1">Tanggal</option>
                    <option value="2">Waktu</option>
                    <option value="3">Lokasi</option>
                    <option value="4">Deskripsi</option>
                </select></td>
                <td><button type="submit" style=" margin-left:5px; margin-top: 5px; background-color: #90E0EF;  width: 90px; height: 27px; border: none; box-shadow: 2px 2px 6px #1572A1; font-weight:600; border-radius:4px;"><i class="fa fa-sort"></i> Urutkan</button></td>
                <td><a href="catat_perjalanan.php"><button style="margin-left:338px; background-color: #FF9999;  width: 150px; height: 30px; border: none; box-shadow: 3px 3px 5px #a71a1a; font-weight:600; border-radius: 7px;"><i class="fa fa-plus-circle"></i> TAMBAH DATA</button></a></td>
            </table>

            <table id="myTable" class="table table-bordered" cellspacing="0" style="margin-top: 20px;">
                <thead class="thead-dark" style="text-align: center;">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Lokasi</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $id = $_SESSION['id'];
                $data = mysqli_query($conn, "SELECT catatan.*, user.nama FROM catatan INNER JOIN user ON catatan.id_user = user.id_user WHERE catatan.id_user = $id");
                while($d = mysqli_fetch_array($data)) {
                ?>
                <tr style="text-align: center; font-weight:500;">
                    <td><?= $no++; ?></td>
                    <td><?= $d['tanggal']; ?></td>
                    <td><?= $d['waktu']; ?></td>
                    <td><?= $d['lokasi']; ?></td>
                    <td><?= $d['deskripsi']; ?></td>
                    <td>
                        <?php if ($d['foto']): ?>
                            <img src="<?= $d['foto']; ?>" alt="Foto Perjalanan" style="width: 100px; height: 100px; object-fit: cover;">
                        <?php else: ?>
                            Tidak ada foto
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="ubah.php?id=<?= $d['id']; ?>"><button class="btn btn-primary" style="color:black; background-color: #F2FA5A;  width: 100px; height: 35px; border: none; box-shadow: 2px 2px 5px #F0A500; font-weight:600; border-radius: 7px;"><i class="fa fa-edit"></i> UBAH</button></a> |
                        <a href="hapus.php?id=<?= $d['id']; ?>" onclick="return confirm('Yakin ingin menghapus catatan?')"><button class="btn btn-danger" style="color:black; background-color: #FC4F4F; width: 100px; height: 35px; border: none; box-shadow: 2px 2px 5px #890F0D; font-weight:600; border-radius: 7px;"><i class="fa fa-trash-alt"></i> HAPUS</button></a>
                    </td>
                </tr>
                <?php 
                }
                ?>
                </tbody>
            </table>
            <script src="assets/js/main.js"></script>
        </div>
    </div>
</body>
</html>
