<?php
// mengaktifkan session pada php
session_start();
// koneksi ke databasae
$conn = mysqli_connect('localhost', 'root', '', 'sidara');

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $row[] = $row;
    }
    return $row;
}

function login($log)
{
    global $conn;
    //   menangkap data yang dikirim dari form login
    $username = $log['username'];
    $password = $log['password'];

    // menyeleksi data user
    $login = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
    // menghitung jumlah data ditemukan
    $cek = mysqli_num_rows($login);
    // cek apakah ditemukan pada database
    if ($cek > 0) {
        $data = mysqli_fetch_assoc($login);
        // cek jika user adalah admin
        if ($data['level'] == 'admin') {
            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['level'] = 'admin';
            // alihkan ke dashboard
            header("Location:dashboard.php");
        } else {
            header("Location:index.php?pesan=gagal");
        }
    } else {
        header("Location:index.php?pesan=gagal");
    }
}

// hapus

function hapusSuplier($idSuplier)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM supplier WHERE id_supplier  = $idSuplier");


    return mysqli_affected_rows($conn);
}
function hapusBarangMasuk($idBarang)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM barang_masuk WHERE id_barang_masuk = $idBarang");


    return mysqli_affected_rows($conn);
}
function hapusOrdersBarang($idOrders)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM orders WHERE id_order = $idOrders");


    return mysqli_affected_rows($conn);
}
function hapusBarangKeluar($idBarangKeluar)
{
    global $conn;
  

    mysqli_query($conn, "DELETE FROM barang_keluar WHERE id_barang_keluar = $idBarangKeluar");


    return mysqli_affected_rows($conn);
}

// akhir

// tambah
function tambahSuplier($data)
{
    global $conn;
    $nama = ($data['nama_supplier']);
    $telp = ($data['notelp_supplier']);
    $alamat = ($data['alamat_supplier']);

    // query insert data
    $query = "INSERT INTO supplier VALUES ('','$nama','$telp','$alamat')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function tambahBarangMasuk($data)
{
    global $conn;
    $supplier = ($data['suplier']);
    $barang = ($data['barang']);
    $stok = ($data['stok']);
    $tanggal = ($data['tanggal']);


    // query insert data
    $query = "INSERT INTO barang_masuk VALUES ('','$supplier','$barang','$stok', '$tanggal')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function tambahOrdersBarang($data)
{
    global $conn;
    $barang = ($data['barang']);
    $diajukan = ($data['diajukan']);
    $jumlah = ($data['jumlah']);
    $keperluan = ($data['keperluan']);


    // query insert data
    $query = "INSERT INTO orders VALUES ('','$barang','$diajukan','$jumlah', '$keperluan')";
   

    // stok barang berkurang
    // sisaStok = jumlah stok - jumlah barang yg diambil
    $data = mysqli_query($conn, "SELECT stok from barang_masuk WHERE id_barang_masuk = $barang");
    $stok = mysqli_fetch_array($data);
    $jumlahStok = $stok['stok'];
    $sisaStok = $jumlahStok - $jumlah;

    $query1 = "UPDATE barang_masuk SET
                stok = '$sisaStok'
                WHERE id_barang_masuk  = $barang
                ";


    mysqli_query($conn, $query);
    mysqli_query($conn, $query1);

    
    return mysqli_affected_rows($conn);
}
function tambahBarangKeluar($data)
{
    global $conn;
    $barangOrder = ($data['barang']);
    $pengambil = ($data['pengambil']);
    $tanggal = ($data['tanggal']);
 


    // query insert data
    $query = "INSERT INTO barang_keluar VALUES ('','$barangOrder','$pengambil','$tanggal')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
// akhir

// ubah
function ubahSuplier($data)
{
    global $conn;
    $idSupplier = ($data['id_supplier']);
    $nama = ($data['nama_supplier']);
    $notelp = ($data['notelp_supplier']);
    $alamat = ($data['alamat_supplier']);
    // ubah data
    $query = "UPDATE supplier SET
                nama_supplier = '$nama',
                no_telp_supplier = '$notelp',
                alamat = '$alamat'
                WHERE id_supplier = $idSupplier
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function ubahBarangMasuk($data)
{
    global $conn;
    $idbarang = ($data['idbarangmasuk']);
    $barang = ($data['namabarang']);
    $stok = ($data['stok']);
    $tanggal = ($data['tanggal']);

    // ubah data
    $query = "UPDATE barang_masuk SET
                nama_barang = '$barang',
                stok = '$stok',
                tanggal = '$tanggal'
                WHERE id_barang_masuk = $idbarang
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// akhir
