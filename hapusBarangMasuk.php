<?php


require 'function.php';


// hapus supplier
$idBarang = $_GET["delbrg"];

if (hapusBarangMasuk($idBarang) > 0) {
    echo "
            <script>
            alert ('data berhasil dihapuskan !');
            document.location.href = 'barangmasuk.php';
            </script>
        ";
} else {
    echo "
            <script>
            alert ('data gagal dihapus !');
            document.location.href = 'barangmasuk.php';
            </script>
        ";
}
