<?php

require 'function.php';

if (isset($_POST["submit"])) {
    insertData($_POST, "produk");

    // var_dump($_POST);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Product</title>
    <!-- Link to Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <form action="" method="post" class="w-full max-w-lg p-6 bg-white shadow-lg rounded-lg space-y-4">
        <h1 class="text-2xl font-bold text-gray-900 mb-6 text-center">Tambah Product</h1>

        <div class="flex flex-col">
            <label for="nama" class="mb-2 font-medium text-gray-700">Nama</label>
            <input type="text" name="nama-produk" id="nama" class="border border-gray-300 p-2 rounded-lg">
        </div>

        <div class="flex flex-col">
            <label for="harga" class="mb-2 font-medium text-gray-700">Harga</label>
            <input type="text" name="harga-produk" id="harga" class="border border-gray-300 p-2 rounded-lg">
        </div>

        <div class="flex flex-col">
            <label for="stok" class="mb-2 font-medium text-gray-700">Stok</label>
            <input type="text" name="stok-produk" id="stok" class="border border-gray-300 p-2 rounded-lg">
        </div>

        <div class="flex flex-col">
            <label for="deskripsi" class="mb-2 font-medium text-gray-700">Deskripsi</label>
            <input type="text" name="deskripsi-produk" id="deskripsi" class="border border-gray-300 p-2 rounded-lg">
        </div>

        <button type="submit" name="submit" class="w-full py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">Masukan Product</button>
    </form>
</body>

</html>