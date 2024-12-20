<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">

    <title>Peduli Diri - Register</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container-user">
        <form action="proses_register.php" method="POST" class="login-user">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;"><i class="fa fa-heartbeat" style="color: red;"></i> 
            PEDULI DIRI</p>
            <p class="login-text" style="margin-bottom: 10px;">REGISTER</p>
            <div class="input-group">
                <input type="number" placeholder="Masukkan NIK" name="nik" required autocomplete="off">
            </div>
            <div class="input-group">
                <input type="text" placeholder="Masukkan Nama" name="nama" required autocomplete="off">
            </div>
            <div class="input-group">
                <button name="submit" class="btn" style="font-weight: 600;" >REGISTER</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="login.php">Masuk</a></p>
        </form>
    </div>
</body>
</html>