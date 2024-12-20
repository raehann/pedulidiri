<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">

    <title>Peduli Diri - Tambah Data Perjalanan</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container-catat">
        <form action="proses_catat_perjalanan.php" method="POST" enctype="multipart/form-data" class="catat-user">
            <p class="catat-text">TAMBAH DATA</p>
            <?php 
            session_start();
            include 'koneksi.php';
            $sql = "SELECT * FROM user";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
            <input type="hidden" name="id_user" value="<?= $_SESSION['id']; ?>">
            <input type="hidden" name="nama" value="<?= $_SESSION['nama']; ?>">
            <?php
            }
            }
            ?>
            <div class="input-group">
                <label for="tanggal">Pilih Tanggal:</label>
                <input type="date" placeholder="Masukkan Tanggal" name="tanggal" id="tanggal" required autocomplete="off">
            </div>
            <div class="input-group">
                <label for="waktu" style="margin-top: 15px;">Pilih Waktu:</label>
                <input type="time" placeholder="Masukkan Waktu" name="waktu" id="waktu" required autocomplete="off">
            </div>
            <div class="input-group">
                <label for="lokasi" style="margin-top: 30px;">Masukkan Lokasi:</label>
                <input type="text" placeholder="Masukkan Lokasi" name="lokasi" id="lokasi" required autocomplete="off">
            </div>
            <div class="input-group">
                <label for="deskripsi" style="margin-top: 45px;">Masukkan Deskripsi:</label>
                <input type="text" placeholder="Masukkan Deskripsi" name="deskripsi" id="deskripsi" required autocomplete="off">
            </div>
            <div class="input-group">
                <label for="foto" style="margin-top: 60px;">Unggah Foto:</label>
                <input type="file" name="foto" id="foto" required>
            </div>
            <div class="input-group" style="margin-top: 95px;">
                <button type="submit" style="margin-left: 270px; border-radius: 10px; background-color: #FF9999; width: 100px; border: none; box-shadow: 3px 3px 5px #a71a1a; font-weight:600;"><i class="fa fa-save"></i> SIMPAN</button>
                <button type="reset" style="margin-left: 20px; border-radius: 10px; background-color: #EBE645; border: none; font-weight: 600; width: 150px; box-shadow: 3px 3px 5px #948f00"><i class="fa fa-trash"></i> KOSONGKAN</button>
            </div>
        </form>
        <a onclick="history.back(-1)"><button style="margin-top: 20px; border-radius: 10px; background-color: #5D8BF4; width: 120px; height: 50px; border: none; box-shadow: 3px 3px 5px #084594; font-weight:600;"><i class="fa fa-arrow-left"></i> KEMBALI</button></a>
    </div>
</body>
</html>

