<?php
include 'koneksi.php';
session_start();
$id = $_POST['id_catatan'];
$tanggal = $_POST['tanggal'];
$waktu = $_POST['waktu'];
$lokasi = $_POST['lokasi'];
$deskripsi = $_POST['deskripsi'];
$existing_foto = $_POST['existing_foto'];
$foto = $_FILES['foto'];

// Check if inputs are empty
if (empty($tanggal)){
    echo "<script>alert('Tanggal belum diisi')</script>";
    echo "<meta http-equiv='refresh' content='1 url=catat_perjalanan.php'>";
    exit;
}
if (empty($waktu)){
    echo "<script>alert('Waktu belum diisi')</script>";
    echo "<meta http-equiv='refresh' content='1 url=catat_perjalanan.php'>";
    exit;
}
if (empty($lokasi)){
    echo "<script>alert('Lokasi belum diisi')</script>";
    echo "<meta http-equiv='refresh' content='1 url=catat_perjalanan.php'>";
    exit;
}
if (empty($deskripsi)){
    echo "<script>alert('Deskripsi belum diisi')</script>";
    echo "<meta http-equiv='refresh' content='1 url=catat_perjalanan.php'>";
    exit;
}

// File upload path
$target_dir = "uploads/";
$target_file = $target_dir . basename($foto["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if a new file is uploaded
if ($foto['size'] > 0) {
    // Check if file is an image
    $check = getimagesize($foto["tmp_name"]);
    if ($check === false) {
        echo "<script>alert('File bukan gambar.')</script>";
        echo "<meta http-equiv='refresh' content='1 url=catat_perjalanan.php'>";
        exit;
    }

    // Check file size
    if ($foto["size"] > 500000) {
        echo "<script>alert('Maaf, file terlalu besar.')</script>";
        echo "<meta http-equiv='refresh' content='1 url=catat_perjalanan.php'>";
        exit;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "<script>alert('Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.')</script>";
        echo "<meta http-equiv='refresh' content='1 url=catat_perjalanan.php'>";
        exit;
    }

    // Attempt to upload file
    if (!move_uploaded_file($foto["tmp_name"], $target_file)) {
        echo "<script>alert('Maaf, terjadi kesalahan dalam mengunggah file.')</script>";
        echo "<meta http-equiv='refresh' content='1 url=catat_perjalanan.php'>";
        exit;
    }
} else {
    $target_file = $existing_foto;
}

// Update data in database
$sql = "UPDATE catatan SET tanggal = '$tanggal', waktu = '$waktu', lokasi = '$lokasi', deskripsi = '$deskripsi', foto = '$target_file' WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data Catatan Perjalanan Berhasil Diubah.');</script>";
    echo "<meta http-equiv='refresh' content='1 url=lihat_perjalanan.php'>";
} else {
    echo "<script>alert('Gagal Mengubah Catatan Perjalanan');</script>";
    echo "<meta http-equiv='refresh' content='1 url=catat_perjalanan.php'>";
}

$conn->close();
?>
