<?php 
session_start();
if(empty($_SESSION['nik'])) { 
    header("location:login.php");
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">

    <title>Peduli Diri - Dashboard</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container-index">
        <div class="index-user">
            <p class="index-text" style="font-size: 2rem; font-weight: 800;"><i class="fa fa-heartbeat" style="color: red;"></i> 
            PEDULI DIRI</p>
            <p class="greeting-text" style="margin-bottom: 20px;">Halo, <?= $_SESSION['nama']; ?> </p>
            <div class="input-group">
                <a href="catat_perjalanan.php"><button class="btn-index btn-text"><i class="fa fa-edit"></i> Catat Perjalanan</button></a>
            </div>
            <div class="input-group">
                <a href="lihat_perjalanan.php"><button class="btn-index btn-text mt-3"><i class="fa fa-eye"></i> Lihat Catatan Perjalanan</button></a>
            </div>
            <div class="input-group">
                <a href="logout.php"><button class="btn-logout btn-text-logout" style="margin-top: 50px;"><i class="fa fa-power-off"></i> Logout</button></a>
            </div>
            <div class="footer">
                <p style="font-size: 12px;">Copyright &copy; Muhammad Farrel Reyes 2024</p>
            </div>
        </div>
    </div>
</body>
</html>