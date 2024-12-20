<?php 
$id_catatan = $_GET['id'];

include 'koneksi.php';
$query = mysqli_query($conn, "DELETE FROM catatan where id = $id_catatan");

if($query) { ?>
    <script>
        alert('Catatan Perjalanan Berhasil Dihapus');
        window.location.assign('lihat_perjalanan.php');
    </script>
    <?php }
    else { ?>
        <script>
            alert('Catatan Perjalanan Gagal Dihapus');
            window.location.assign('lihat_perjalanan.php');
        </script>
        <?php 
        } 
?>