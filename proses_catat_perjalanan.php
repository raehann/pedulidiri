<?php
include 'koneksi.php';
session_start();
$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$waktu = $_POST['waktu'];
$lokasi = $_POST['lokasi'];
$deskripsi = $_POST['deskripsi'];
$foto = $_FILES['foto'];

// Check if inputs are empty
if (empty($tanggal)) {
    echo "<script>alert('Tanggal belum diisi')</script>";
    echo "<meta http-equiv='refresh' content='1 url=catat_perjalanan.php'>";
    exit;
}
if (empty($waktu)) {
    echo "<script>alert('Waktu belum diisi')</script>";
    echo "<meta http-equiv='refresh' content='1 url=catat_perjalanan.php'>";
    exit;
}
if (empty($lokasi)) {
    echo "<script>alert('Lokasi belum diisi')</script>";
    echo "<meta http-equiv='refresh' content='1 url=catat_perjalanan.php'>";
    exit;
}
if (empty($deskripsi)) {
    echo "<script>alert('Deskripsi belum diisi')</script>";
    echo "<meta http-equiv='refresh' content='1 url=catat_perjalanan.php'>";
    exit;
}

// File upload path
$target_dir = "uploads/";
$target_file = $target_dir . basename($foto["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file is an image
$check = getimagesize($foto["tmp_name"]);
if ($check === false) {
    echo "<script>alert('File bukan gambar.')</script>";
    echo "<meta http-equiv='refresh' content='1 url=catat_perjalanan.php'>";
    exit;
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "<script>alert('Maaf, file sudah ada.')</script>";
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

// Insert data into database
$sql = "INSERT INTO catatan (id_user, nama, tanggal, waktu, lokasi, deskripsi, foto) VALUES ('$id_user', '$nama', '$tanggal', '$waktu', '$lokasi', '$deskripsi', '$target_file')";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data Catatan Perjalanan Berhasil Disimpan.');
    window.location.assign('lihat_perjalanan.php');</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
