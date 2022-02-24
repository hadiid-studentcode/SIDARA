<?php


require 'function.php';


// hapus supplier
$idSuplier = $_GET["dels"];

if (hapusSuplier($idSuplier) > 0) {
    echo "
            <script>
            alert ('data berhasil dihapuskan !');
            document.location.href = 'suplier.php';
            </script>
        ";
} else {
    echo "
            <script>
            alert ('data gagal dihapus !');
            document.location.href = 'suplier.php';
            </script>
        ";
}


?>