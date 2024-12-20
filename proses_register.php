<?php 
error_reporting(0);
include 'koneksi.php';

$nik = $_POST['nik'];
$nama_lengkap = $_POST['nama'];

$query = mysqli_query($conn, "SELECT * FROM user WHERE nik = $nik " );

if (empty($nik)){
    echo "<script>alert('NIK belum diisi')</script>";
    echo "<meta http-equiv='refresh' content='1 url=register.php'>";
    }else
    if (empty($nama_lengkap)){
    echo "<script>alert('Nama belum diisi')</script>";
    echo "<meta http-equiv='refresh' content='1 url=register.php'>";
    }else 
    if($query->num_rows > 0) {
    echo "<script>alert('NIK sudah terdaftar')</script>";
    echo "<meta http-equiv='refresh' content='1 url=register.php'>";
    }else {
        $daftar = mysqli_query($conn, "INSERT INTO user (nik ,nama) values ('$nik','$nama_lengkap')");
    if ($daftar){
    echo "<script>alert('Pendaftaran Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='1 url=login.php'>";
    }else{
    echo "<script>alert('Pendaftaran Gagal')</script>";
    echo "<meta http-equiv='refresh' content='1 url=register.php'>";
    }
    
}

?>