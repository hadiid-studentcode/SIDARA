<?php


require 'function.php';


// hapus supplier
$idBarangKeluar = $_GET["delbk"];

if (hapusBarangKeluar($idBarangKeluar) > 0) {
    echo "
            <script>
            alert ('data berhasil dihapuskan !');
            document.location.href = 'barangkeluar.php';
            </script>
        ";
} else {
    echo "
            <script>
            alert ('data gagal dihapus !');
            document.location.href = 'barangkeluar.php';
            </script>
        ";
}
