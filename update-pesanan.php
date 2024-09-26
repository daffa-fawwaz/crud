<?php

require 'function.php';

$id = $_GET["id"];
$pesanan = showData($id, "pesanan");
// var_dump($pesanan);

if (isset($_POST["submit"])) {
    updateData($_POST, $id, "pesanan");
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

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pesanan</title>
    <!-- Link to Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <form action="" method="post" class="w-full max-w-lg p-6 bg-white shadow-lg rounded-lg space-y-4">
        <h1 class="text-2xl font-bold text-gray-900 mb-6 text-center">Update Pesanan</h1>

        <div class="flex flex-col">
            <label for="name" class="mb-2 font-medium text-gray-700">Nama</label>
            <input type="text" name="name-pesanan" id="name" value="<?= $pesanan[0]["name"] ?>" class="border border-gray-300 p-2 rounded-lg">
        </div>

        <div class="flex flex-col">
            <label for="produk" class="mb-2 font-medium text-gray-700">Produk</label>
            <input type="text" name="produk-pesanan" id="produk" value="<?= $pesanan[0]["produk"] ?>" class="border border-gray-300 p-2 rounded-lg">
        </div>

        <div class="flex flex-col">
            <label for="jumlah" class="mb-2 font-medium text-gray-700">Jumlah</label>
            <input type="text" name="jumlah-pesanan" id="jumlah" value="<?= $pesanan[0]["jumlah"] ?>" class="border border-gray-300 p-2 rounded-lg">
        </div>

        <div class="flex flex-col">
            <label for="total" class="mb-2 font-medium text-gray-700">Total</label>
            <input type="text" name="total-pesanan" id="total" value="<?= $pesanan[0]["total"] ?>" class="border border-gray-300 p-2 rounded-lg">
        </div>

        <button type="submit" name="submit" class="w-full py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">Update Pesanan</button>
    </form>

</body>

</html>