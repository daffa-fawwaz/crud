<?php

require 'function.php';


$id = $_GET["id"];
$kategori = showData($id, "kategori");

if (isset($_POST["submit"])) {
    updateData($_POST, $id, "kategori");
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
    <title>Update Product</title>
    <!-- Link to Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <form action="" method="post" class="w-full max-w-lg p-6 bg-white shadow-lg rounded-lg space-y-4">
        <h1 class="text-2xl font-bold text-gray-900 mb-6 text-center">Update Product</h1>

        <div class="flex flex-col">
            <label for="nama" class="mb-2 font-medium text-gray-700">Nama</label>
            <input type="text" name="nama-kategori" id="nama" value="<?= $kategori[0]["nama"] ?>" class="border border-gray-300 p-2 rounded-lg">
        </div>

        <div class="flex flex-col">
            <label for="deskripsi" class="mb-2 font-medium text-gray-700">Deskripsi</label>
            <input type="text" name="deskripsi-kategori" id="deskripsi" value="<?= $kategori[0]["deskripsi"] ?>" class="border border-gray-300 p-2 rounded-lg">
        </div>

        <div class="flex flex-col">
            <label for="image" class="mb-2 font-medium text-gray-700">Image URL</label>
            <input type="text" name="image-kategori" id="image" value="<?= $kategori[0]["image"] ?>" class="border border-gray-300 p-2 rounded-lg">
        </div>

        <button type="submit" name="submit" class="w-full py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">Update Product</button>
    </form>

</body>

</html>