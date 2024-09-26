<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "toko_online";

$koneksi = mysqli_connect($server, $username, $password, $database);

if (!$koneksi) {
    echo "koneksi gagal";
}


// NGAMBIL DATA TABEL DARI DATABASE 
function getData($table)
{
    global $koneksi;

    $query = "SELECT * FROM $table";
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// LOGIN

function login($data)
{
    global $koneksi;

    $username = $data["username"];
    $password = $data["password"];


    $query = "SELECT * FROM user WHERE username = '$username' ";
    $result = mysqli_query($koneksi, $query);

    // CEK APAKAH USERNAME SAMA DENGAN YG DI TABEL
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // CEK PASSWORD
        if (password_verify($password, $row["password"])) {
            echo "<script>
        alert('Anda Berhasil Login');
        document.location.href = 'index.php';
        </script>";
        } else {
            echo "<script>
            alert('Anda Gagal Login');
            </script>";
        }
    }
}




// INSERT DATA KE TABEL DATABASE
function insertData($data, $table)
{
    global $koneksi;

    if ($table == "produk") {
        $namaProduk = $data["nama-produk"];
        $harga = $data["harga-produk"];
        $stok = $data["stok-produk"];
        $deskripsiProduk = $data["deskripsi-produk"];

        $query = "INSERT INTO $table VALUES(null, '$namaProduk', '$harga', '$stok', '$deskripsiProduk')";
    }

    if ($table == "kategori") {
        $nameKategori = $data["nama-kategori"];
        $deskripsiKategori = $data["deskripsi-kategori"];
        $image = $data["image-kategori"];

        $query = "INSERT INTO $table VALUES(null, '$nameKategori', '$deskripsiKategori', '$image')";
    }

    if ($table == "pesanan") {
        $namePesanan = $data["name-pesanan"];
        $produk = $data["produk-pesanan"];
        $jumlah = $data["jumlah-pesanan"];
        $total = $data["total-pesanan"];

        $query = "INSERT INTO $table VALUES(null, '$namePesanan', '$produk', '$jumlah', '$total')";
    }


    mysqli_query($koneksi, $query);

    if (mysqli_affected_rows($koneksi) > 0) {
        echo
        "<script>
        alert('Data Berhasil Dimasukan');
        document.location.href = 'index.php'
        </script>";
    } else {
        echo "Data Gagal Dimasukan";
    }

    // DELETE 

    function delete($id, $table)
    {
        global $koneksi;
        $query = "DELETE FROM $table WHERE id = $id";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }
}


function updateData($data, $id, $table)
{
    global $koneksi;

    if ($table == "produk") {
        $namaProduk = $data["nama-produk"];
        $harga = $data["harga-produk"];
        $stok = $data["stok-produk"];
        $deskripsiProduk = $data["deskripsi-produk"];

        $query = "UPDATE $table SET 
        nama = '$namaProduk', 
        harga = '$harga', 
        stok = '$stok', 
        deskripsi = '$deskripsiProduk' 
        WHERE id = $id";
    }

    if ($table == "kategori") {
        $namaKategori = $data["nama-kategori"];
        $deskripsiKategori = $data["deskripsi-kategori"];
        $image = $data["image-kategori"];

        $query = "UPDATE $table SET
         nama = '$namaKategori', 
         deskripsi = '$deskripsiKategori', 
         image = '$image' 
         WHERE id = $id";
    }

    if ($table == "pesanan") {
        $namePesanan = $data["name-pesanan"];
        $produk = $data["produk-pesanan"];
        $jumlah = $data["jumlah-pesanan"];
        $total = $data["total-pesanan"];

        $query = "UPDATE $table SET 
        name = '$namePesanan', 
        produk = '$produk', 
        jumlah = '$jumlah', 
        total = '$total' 
        WHERE id = $id";
    }

    mysqli_query($koneksi, $query);
}



function register($data)
{
    global $koneksi;

    $username = $data["username"];
    $password = $data["password"];
    $password2 = $data["password2"];

    // CEK APAKAH USERNAME ADA
    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
        alert('Username Sudah Ada');
       </script>";
        return false;
    }



    // CEK PASSWORD 1 DAN 2 APAKAH SAMA
    if ($password !== $password2) {
        echo " 
        <script>
        alert('Konfirmasi Password salah')
       </script>";
        return false;
    } else {
        header("Location: login.php");
    }

    // GANTI PASSWORD MENJADI TULISAN GK JELAS
    $password = password_hash($password, PASSWORD_DEFAULT);

    // MASUKAN USERNAME DAN PASSWORD BARU KE TABEL
    $query = "INSERT INTO user VALUES('', '$username', '$password')";
    mysqli_query($koneksi, $query);
}


// UPDATE
function showData($id, $table)
{
    global $koneksi;

    $query = "SELECT * FROM $table WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}



