<?php
require 'function.php';
// jumlah supplier
$supplier = mysqli_query($conn, "SELECT * from supplier ");
$jumlahSupplier = mysqli_num_rows($supplier);
// jumlah barang
$barang = mysqli_query($conn, "SELECT * from barang_masuk ");
$jumlahBarang = mysqli_num_rows($barang);
// jumlah barang keluar
$barangKeluar = mysqli_query($conn, "SELECT * from barang_keluar ");
$jumlahBarangKeluar = mysqli_num_rows($barangKeluar);
// jumlah order barang
$oderBarang = mysqli_query($conn, "SELECT * from orders ");
$jumlahOrderBarang = mysqli_num_rows($oderBarang);
// jumlah user
$user = mysqli_query($conn, "SELECT * from users ");
$jumlahUser = mysqli_num_rows($user);

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
  header("location:index.php");
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
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>


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
              <span class="text-uppercase page-subtitle">Dashboard</span>

            </div>
          </div>
          <!-- End Page Header -->
          <!-- Small Stats Blocks -->
          <div class="row">
            <div class="col-lg col-md-6 col-sm-6 mb-4">
              <div class="stats-small stats-small--1 card card-small">

                <div class="card-body p-0 d-flex">

                  <div class="d-flex flex-column m-auto">
                    <a href="barangmasuk.php">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase"> Data Supplier</span>
                        <h6 class="stats-small__value count my-3"> <?php echo "$jumlahSupplier"; ?></h6>
                      </div>
                    </a>
                  </div>
                  <canvas height="120" class="blog-overview-stats-small-1"></canvas>

                </div>

              </div>
            </div>
            <div class="col-lg col-md-6 col-sm-6 mb-4">
              <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                  <div class="d-flex flex-column m-auto">
                    <a href="barangmasuk.php"></a>
                    <div class="stats-small__data text-center">
                      <span class="stats-small__label text-uppercase">Data Barang Masuk</span>
                      <h6 class="stats-small__value count my-3"><?php echo "$jumlahBarang"; ?></h6>
                    </div>

                  </div>
                  <canvas height="120" class="blog-overview-stats-small-2"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg col-md-4 col-sm-6 mb-4">
              <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                  <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                      <span class="stats-small__label text-uppercase">Data Barang Keluar</span>
                      <h6 class="stats-small__value count my-3"><?php echo "$jumlahBarangKeluar"; ?></h6>
                    </div>

                  </div>
                  <canvas height="120" class="blog-overview-stats-small-3"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg col-md-4 col-sm-6 mb-4">
              <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                  <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                      <span class="stats-small__label text-uppercase">Data Permintaan Barang</span>
                      <h6 class="stats-small__value count my-3"><?php echo "$jumlahOrderBarang"; ?></h6>
                    </div>

                  </div>
                  <canvas height="120" class="blog-overview-stats-small-4"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg col-md-4 col-sm-12 mb-4">
              <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                  <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                      <span class="stats-small__label text-uppercase">User</span>
                      <h6 class="stats-small__value count my-3"><?php echo "$jumlahUser"; ?></h6>
                    </div>

                  </div>
                  <canvas height="120" class="blog-overview-stats-small-5"></canvas>
                </div>
              </div>
            </div>
          </div>
          <!-- End Small Stats Blocks -->

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