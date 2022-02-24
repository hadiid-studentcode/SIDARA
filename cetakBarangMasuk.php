<?php

require 'function.php';


// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
    header("location:index.php");
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/logosidara.png">
    
    <title>Cetak Barang Keluar</title>
</head>

<body class="container">
    <h3>Barang Masuk</h3>

    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col" class="border-0">No</th>
                <th scope="col" class="border-0">Suplier</th>
                <th scope="col" class="border-0">Nama Barang</th>
                <th scope="col" class="border-0">Qty</th>
                <th scope="col" class="border-0">Tanggal</th>

            </tr>
        </thead>
        <?php $barang = mysqli_query($conn, "SELECT * FROM barang_masuk join supplier on barang_masuk.id_supplier = supplier.id_supplier"); ?>
        <?php $i = 1; ?>
        <?php while ($masuk = mysqli_fetch_array($barang)) : ?>
            <tbody>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $masuk['nama_supplier']; ?></td>
                    <td><?= $masuk['nama_barang']; ?></td>
                    <td><?= $masuk['stok']; ?></td>
                    <td><?= $masuk['tanggal']; ?></td>

                </tr>

            </tbody>
            <?php $i++; ?>
        <?php endwhile; ?>
    </table>
    <script>
        window.print();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>