<?php
session_start();
include 'koneksi.php';
$nik = $_POST['nik'];
$nama_lengkap = $_POST['nama'];

if (empty($nik)){
    echo "<script>alert('NIK belum diisi')</script>";
    echo "<meta http-equiv='refresh' content='1 url=login.php'>";
    }else if (empty($nama_lengkap)){
    echo "<script>alert('Nama belum diisi')</script>";
    echo "<meta http-equiv='refresh' content='1 url=login.php'>";
    }else{
    $login = mysqli_query($conn, "select * from user where nik='$nik' and nama='$nama_lengkap'");
    $cek = mysqli_num_rows($login);
    }

    if ($cek > 0) {
        $user = mysqli_fetch_assoc($login);
        $_SESSION['id'] = $user['id_user'];
        $_SESSION['nik'] = $nik;
        $_SESSION['nama'] = $nama_lengkap;
        $_SESSION['status'] = "login";
        header('location: index.php');
    }else {
        echo "<script>alert('NIK dan Nama Tidak Sesuai')
        window.location.href = 'login.php';
        </script>";
    }
?>