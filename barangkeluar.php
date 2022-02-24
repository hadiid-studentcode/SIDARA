<?php
require 'function.php';


// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
    header("location:index.php");
}

// pagination
// konfigurasi
// $jumlahDataPerHalaman = 5;
// $jumlahData = count(query("SELECT * FROM suplier"));
// $jumlahhalaman = ceil($jumlahData / $jumlahDataPerHalaman);
// $halamanAktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
// $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$barangKeluar = mysqli_query($conn, "SELECT * FROM barang_keluar join orders on barang_keluar.id_order = orders.id_order join barang_masuk on  orders.id_barang_masuk = barang_masuk.id_barang_masuk");


// tambah data orrder

// cek apakah tombol submit sudah ditekan atau belum

if (isset($_POST["tambahdata"])) {

    // cek apakah data berhasil ditambahkan atau tidak

    if (tambahBarangKeluar($_POST) > 0) {
        echo "
            <script>
            alert ('data berhasil ditambahkan !');
            document.location.href = 'barangkeluar.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert ('data gagal  diubah !');
            document.location.href = 'barangkeluar.php';
            </script>
        ";
    }
}


?>

<!doctype html>
<html class="no-js h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SIDARA | SISTEM INFORMASI DATA BARANG</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <link rel="shortcut icon" href="images/logosidara.png">
</head>

<body class="h-100">


    <div class="container-fluid">
        <div class="row">
            <!-- Main Sidebar -->
            <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
                <div class="main-navbar">
                    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                        <a class="navbar-brand w-100 mr-0" href="dashboard.php" style="line-height: 25px;">
                            <div class="d-table m-auto">
                                <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="images/logosidara.png" alt="Shards Dashboard">
                                <span class="d-none d-md-inline ml-1">SIDARA Dashboard</span>
                            </div>
                        </a>
                        <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                            <i class="material-icons">&#xE5C4;</i>
                        </a>
                    </nav>
                </div>

                <div class="nav-wrapper">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard.php">
                                <i class="material-icons">home</i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="suplier.php">
                                <i class="material-icons">vertical_split</i>
                                <span>Data Suplier</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="barangmasuk.php">
                                <i class="material-icons">note_add</i>
                                <span>Data Barang Masuk</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="permintaanbarang.php">
                                <i class="material-icons">table_chart</i>
                                <span>Orders Barang</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="barangkeluar.php">
                                <i class="material-icons">view_module</i>
                                <span>Data Barang Keluar</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="laporan.php">
                                <i class="material-icons">print</i>
                                <span>Laporan</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </aside>
            <!-- End Main Sidebar -->
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <div class="main-navbar sticky-top bg-white">
                    <!-- Main Navbar -->
                    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
                        <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-transparent ">
                                    <li class="breadcrumb-item "><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Barang Keluar</li>


                                </ol>
                            </nav>
                        </form>
                        <ul class="navbar-nav border-left flex-row ">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                    </svg>
                                    <span class="d-none d-md-inline-block">Hai <?= $_SESSION['username']; ?> !</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-small">




                                    <a class="dropdown-item text-danger" href="logout.php">
                                        Logout </a>
                                </div>
                            </li>
                            &nbsp;&nbsp;
                        </ul>

                    </nav>
                </div>
                <!-- / .main-navbar -->
                <div class="main-content-container container-fluid px-4">
                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            <span class="text-uppercase page-subtitle"></span>
                            <h3 class="page-title">Data Barang Keluar</h3>
                        </div>
                    </div>
                    <!-- End Page Header -->
                    <!-- Default Light Table -->
                    <div class="row">
                        <div class="col">
                            <div class="card card-small mb-4">
                                <div class="card-header border-bottom" data-bs-toggle="modal" data-bs-target="#tambahdata">
                                    <button type="button" class="btn btn-primary btn-lg"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
                                            <path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                        </svg> Tambah Barang Keluar</button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="tambahdata" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Keluar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" name="tambahdata"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- form -->
                                                <form action="" method="POST">

                                                    <div class="mb-3">
                                                        <label for="barang" class="form-label">Barang :</label>


                                                        <select name="barang" id="barang" class="form-control">
                                                            <option selected>Choose..</option>
                                                            <?php $barang = mysqli_query($conn, "SELECT id_order,nama_barang, nama_order ,jumlah FROM orders JOIN barang_masuk ON orders.id_barang_masuk = barang_masuk.id_barang_masuk"); ?>
                                                            <?php while ($brg = mysqli_fetch_array($barang)) : ?>
                                                                <option value=<?= $brg["id_order"]; ?>><?= $brg["nama_barang"]; ?> ( Jumlah : <?= $brg["jumlah"]; ?> ) order = <?= $brg['nama_order']; ?> </option>
                                                            <?php endwhile; ?>
                                                        </select>


                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="pengambil" class="form-label">Nama Pengambil :</label>
                                                        <input type="text" class="form-control" id="pengambil" name="pengambil">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="tanggal" class="form-label">Tanggal Barang Keluar :</label>
                                                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                                                    </div>





                                            </div>
                                            <div class="modal-footer" name="tambahdata">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary" name="tambahdata" id="liveAlertBtn">Simpan Data</button>
                                            </div>
                                            </form>
                                            <!-- form -->
                                        </div>
                                    </div>
                                </div>
                                <!-- akhir modal -->
                                <div class="card-body p-0 pb-3 text-center">
                                    <table class="table mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th scope="col" class="border-0">No</th>
                                                <th scope="col" class="border-0">Nama Barang</th>
                                                <th scope="col" class="border-0">Nama Pengambil</th>
                                                <th scope="col" class="border-0">Jumlah</th>
                                                <th scope="col" class="border-0">Keperluan</th>
                                                <th scope="col" class="border-0">Tanggal</th>
                                                <th scope="col" class="border-0">Aksi</th>
                                            </tr>
                                        </thead>
                                        <?php $i = 1; ?>
                                        <?php while ($brg = mysqli_fetch_array($barangKeluar)) : ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?= $brg['nama_barang']; ?></td>
                                                    <td><?= $brg['nama_pengambil']; ?></td>
                                                    <td><?= $brg['jumlah']; ?></td>
                                                    <td><?= $brg['keperluan']; ?></td>
                                                    <td><?= $brg['tanggal']; ?></td>
                                                    <td>
                                                        <div class="d-grid gap-2 d-md-block">
                                                            <a href="hapusBarangKeluar.php?delbk=<?= $brg["id_barang_keluar"]; ?>">
                                                                <button class="btn btn-danger" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-minus" viewBox="0 0 16 16">
                                                                        <path d="M5.5 9a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z" />
                                                                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z" />
                                                                    </svg></button>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                            <?php $i++; ?>
                                        <?php endwhile; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <footer class="main-footer d-flex p-2 px-3 bg-white border-top">

                    <span class="copyright ml-auto my-auto mr-2">Copyright © 2022
                        <a href="https://designrevision.com" rel="nofollow">Sistem Data Barang | SIDARA </a>
                    </span>
                </footer>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
    <script src="scripts/app/app-blog-overview.1.1.0.js"></script>
</body>

</html>