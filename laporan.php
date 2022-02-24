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
                                    <li class="breadcrumb-item active" aria-current="page">Laporan</li>


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
                                    <span class="d-none d-md-inline-block">Hai <?php echo $_SESSION['username']; ?> !</span>
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
                            <h3 class="page-title">Laporan</h3>
                        </div>
                    </div>
                    <!-- End Page Header -->
                    <!-- Default Light Table -->
                    <!-- barang Masuk -->
                    <div class="row">
                        <div class="col">
                            <div class="card card-small mb-4">
                                <div class="card-header border-bottom">
                                    <a href="cetakBarangMasuk.php" target="_blank">
                                        <button type="button" class="btn btn-primary btn-lg"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                                            </svg> Cetak Barang Masuk</button>
                                    </a>
                                </div>
                                <div class="card-body p-0 pb-3 text-center">
                                    <table class="table mb-0">
                                        <thead class="bg-light">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- barang keluar -->
                    <div class="row">
                        <div class="col">
                            <div class="card card-small mb-4">
                                <div class="card-header border-bottom">
                                    <a href="cetakBarangKeluar.php" target="_blank">
                                        <button type="button" class="btn btn-primary btn-lg"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                                            </svg> Cetak Barang Keluar</button>
                                    </a>
                                </div>
                                <div class="card-body p-0 pb-3 text-center">
                                    <table class="table mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th scope="col" class="border-0">No</th>
                                                <th scope="col" class="border-0">Nama Barang</th>
                                                <th scope="col" class="border-0">Nama Pengaju</th>
                                                <th scope="col" class="border-0">Qty</th>
                                                <th scope="col" class="border-0">Keperluan</th>
                                                <th scope="col" class="border-0">Tanggal</th>

                                            </tr>
                                        </thead>
                                        <?php $barangKeluar = mysqli_query($conn, "SELECT * FROM barang_keluar join orders on barang_keluar.id_order = orders.id_order join barang_masuk on  orders.id_barang_masuk = barang_masuk.id_barang_masuk"); ?>
                                        <?php $i = 1; ?>
                                        <?php while ($keluar = mysqli_fetch_array($barangKeluar)) : ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $keluar['nama_barang']; ?></td>
                                                    <td><?= $keluar['nama_order']; ?></td>
                                                    <td><?= $keluar['jumlah']; ?></td>
                                                    <td><?= $keluar['keperluan']; ?></td>
                                                    <td><?= $keluar['tanggal']; ?></td>

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