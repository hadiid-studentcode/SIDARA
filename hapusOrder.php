<?php


require 'function.php';


// hapus supplier
$idOrder = $_GET["delorder"];

if (hapusOrdersBarang($idOrder) > 0) {
    echo "
            <script>
            alert ('data berhasil dihapuskan !');
            document.location.href = 'permintaanbarang.php';
            </script>
        ";
} else {
    echo "
            <script>
            alert ('data gagal dihapus !');
            document.location.href = 'permintaanbarang.php';
            </script>
        ";
}
