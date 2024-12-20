<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <title>Peduli Diri - Ubah Data Perjalanan</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <style>
        .file-input-preview {
            display: flex;
            align-items: center;
            gap: 10px;
            border: none;
            outline: none;
        }

        .preview-img {
            width: 130px;
            height: 100px;
            object-fit: cover;
            margin-top: 10px;
            border: none;
        }

        .input-group {
            border: none;
            outline: none;
        }
    </style>
</head>
<body>
<div class="container-catat">
    <form action="proses_ubah.php" method="POST" class="catat-user" enctype="multipart/form-data">
        <p class="catat-text">UBAH DATA</p>
        <?php
            include 'koneksi.php';
            $id_catatan = $_GET['id'];
            $data = mysqli_query($conn, "SELECT * FROM catatan WHERE id= ". $id_catatan);
            while($d = mysqli_fetch_array($data)) {
        ?>
        <div class="input-group">
            <input type="hidden" name="id_catatan" value="<?= $id_catatan ?>">
            <label for="tanggal">Pilih Tanggal:</label>
            <input type="date" value="<?= $d['tanggal']; ?>" name="tanggal" id="tanggal" required autocomplete="off" data-default="<?= $d['tanggal']; ?>">
        </div>
        <div class="input-group">
            <label for="waktu" style="margin-top: 15px;">Pilih Waktu:</label>
            <input type="time" value="<?= $d['waktu']; ?>" placeholder="Masukkan Waktu" name="waktu" id="waktu" required autocomplete="off" data-default="<?= $d['waktu']; ?>">
        </div>
        <div class="input-group">
            <label for="lokasi" style="margin-top: 30px;">Masukkan Lokasi:</label>
            <input type="text" value="<?= $d['lokasi']; ?>" placeholder="Masukkan Lokasi" name="lokasi" id="lokasi" required autocomplete="off" data-default="<?= $d['lokasi']; ?>">
        </div>
        <div class="input-group">
            <label for="deskripsi" style="margin-top: 45px;">Masukkan Deskripsi:</label>
            <input type="text" value="<?= $d['deskripsi']; ?>" placeholder="Masukkan Deskripsi" name="deskripsi" id="deskripsi" required autocomplete="off" data-default="<?= $d['deskripsi']; ?>">
        </div>
        <div class="input-group">
            <label for="foto" style="margin-top: 60px;">Pilih Foto:</label>
            <div class="file-input-preview">
                <input type="file" name="foto" id="foto" style="margin-top: 10px;" onchange="previewFile()">
                <img id="previewImg" src="<?= $d['foto']; ?>" alt="Foto Perjalanan" class="preview-img">
                <input type="hidden" name="existing_foto" value="<?= $d['foto']; ?>">
            </div>
        </div>
        <div class="input-group" style="margin-top: 160px;">
            <button type="submit" style="margin-left: 270px; border-radius: 10px; background-color: #FF9999; width: 100px; border: none; box-shadow: 3px 3px 5px #a71a1a; font-weight:600;"><i class="fa fa-save"></i> UBAH</button>
            <button type="button" id="resetButton" style="margin-left: 20px; border-radius: 10px; background-color: #EBE645; border: none; font-weight: 600; width: 150px; box-shadow: 3px 3px 5px #948f00"><i class="fa fa-trash"></i> KOSONGKAN</button>
        </div>
        <?php 
            } 
        ?>
    </form>
    <a onclick="history.back(-1)"><button style="margin-top: 10px; border-radius: 10px; background-color: #5D8BF4; width: 120px; height: 50px; border: none; box-shadow: 3px 3px 5px #084594; font-weight:600;"><i class="fa fa-arrow-left"></i> KEMBALI</button></a>
</div>

<script>
    function previewFile() {
        const preview = document.getElementById('previewImg');
        const file = document.getElementById('foto').files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function () {
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    // Reset form values to initial state
    document.getElementById('resetButton').addEventListener('click', function() {
        const form = document.querySelector('.catat-user');
        form.querySelectorAll('input[type="text"], input[type="date"], input[type="time"]').forEach(input => {
            input.value = input.getAttribute('data-default');
        });

        // Reset the file input and preview image
        document.getElementById('foto').value = '';
        document.getElementById('previewImg').src = document.querySelector('input[name="existing_foto"]').value;
    });
</script>

</body>
</html>
