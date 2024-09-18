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
function getData($query)
{
    global $koneksi;

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
function insertDataProduct($data)
{
    global $koneksi;

    $nama = $data["nama"];
    $harga = $data["harga"];
    $stok = $data["stok"];
    $deskripsi = $data["deskripsi"];

    $query = "INSERT INTO produk VALUES(null, '$nama', '$harga', '$stok', '$deskripsi')";

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
}

function register($data)
{
    global $koneksi;

    $username = $data["username"];
    $password = $data["password"];
    $password2 = $data["password2"];


    // CEK PASSWORD 1 DAN 2 APAKAH SAMA
    if ($password !== $password2) {
        echo " 
        <script>
        alert('Gagal login')
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

function addKategori($data)
{
    global $koneksi;

    $nama = $data["nama"];
    $deskripsi = $data["deskripsi"];
    $image = $data["image"];

    $query = "INSERT INTO kategori VALUES(null, '$nama', '$deskripsi', '$image')";

    mysqli_query($koneksi, $query);

    if (mysqli_affected_rows($koneksi) > 0) {
        echo
        "<script>
        alert('Data Berhasil Dimasukan');
        document.location.href = 'index.php'
        </scrip>";
    } else {
        echo "Data Gagal Dimasukan";
    }
}

function addPesanan($data)
{
    global $koneksi;

    $name = $data["name"];
    $produk = $data["produk"];
    $jumlah = $data["jumlah"];
    $total = $data["total"];

    $query = "INSERT INTO pesanan VALUES(null, '$name', '$produk', '$jumlah', '$total')";
    mysqli_query($koneksi, $query);
}

// DELETE PRODUCT

function deleteProduct($id)
{
    global $koneksi;
    $query = "DELETE FROM produk WHERE id = $id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function deletekategori($id)
{
    global $koneksi;
    $query = "DELETE FROM kategori WHERE id = $id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function deletePesanan($id)
{
    global $koneksi;
    $query = "DELETE FROM pesanan WHERE id = $id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// UPDATE PRODUCT 
function showProduct($id)
{
    global $koneksi;

    $query = "SELECT * FROM produk WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function updateProduct($data, $id)
{
    global $koneksi;

    $nama = $data["nama"];
    $harga = $data["harga"];
    $stok = $data["stok"];
    $deskripsi = $data["deskripsi"];

    $query = "UPDATE produk SET nama = '$nama', harga = '$harga', stok = '$stok', deskripsi = '$deskripsi' WHERE id = $id";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function showKategori($id)
{
    global $koneksi;

    $query = "SELECT * FROM kategori WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function showPesanan($id)
{
    global $koneksi;

    $query = "SELECT * FROM pesanan WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function updateKategori($data, $id)
{
    global $koneksi;

    $nama = $data["nama"];
    $deskripsi = $data["deskripsi"];
    $image = $data["image"];

    $query = "UPDATE kategori SET nama = '$nama', deskripsi = '$deskripsi', image = '$image' WHERE id = $id";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function updatePesanan($data, $id)
{
    global $koneksi;

    $nama = $data["name"];
    $produk = $data["produk"];
    $jumlah = $data["jumlah"];
    $total = $data["total"];

    $query = "UPDATE pesanan SET name = '$nama', produk = '$produk', jumlah = '$jumlah', total = '$total' WHERE id = $id";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
