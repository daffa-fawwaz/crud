<?php

require 'function.php';

if (isset($_POST["submit"])) {
    insertData($_POST, "pesanan");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <form action="" method="post" class="w-full max-w-lg p-6 bg-white shadow-md rounded-lg space-y-4">
        <div class="flex flex-col">
            <label for="name" class="mb-1 font-medium text-gray-700">Nama</label>
            <input type="text" name="name-pesanan" id="name" class="border border-gray-300 p-2 rounded-lg">
        </div>

        <div class="flex flex-col">
            <label for="produk" class="mb-1 font-medium text-gray-700">Produk</label>
            <input type="text" name="produk-pesanan" id="produk" class="border border-gray-300 p-2 rounded-lg">
        </div>

        <div class="flex flex-col">
            <label for="jumlah" class="mb-1 font-medium text-gray-700">Jumlah</label>
            <input type="text" name="jumlah-pesanan" id="jumlah" class="border border-gray-300 p-2 rounded-lg">
        </div>

        <div class="flex flex-col">
            <label for="total" class="mb-1 font-medium text-gray-700">Total</label>
            <input type="text" name="total-pesanan" id="total" class="border border-gray-300 p-2 rounded-lg">
        </div>

        <button type="submit" name="submit" class="w-full py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Masukan Pesanan</button>
    </form>
</body>

</html>