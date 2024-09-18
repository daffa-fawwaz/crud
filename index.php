<?php

require 'function.php';
// var_dump($koneksi);

$i = 1;
$x = 1;

$products = getData("SELECT * FROM produk");
$kategoris = getData("SELECT * FROM kategori");
$pesanans = getData("SELECT * FROM pesanan")

// var_dump($products);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-4">

        <!-- Produk Table -->
        <div class="my-8">
            <table class="min-w-full border-collapse border border-gray-300 bg-white rounded-lg shadow-md">
                <thead>
                    <tr>
                        <th class="border-b border-gray-300 p-4 bg-blue-600 text-white text-left">No</th>
                        <th class="border-b border-gray-300 p-4 bg-blue-600 text-white text-left">Nama Produk</th>
                        <th class="border-b border-gray-300 p-4 bg-blue-600 text-white text-left">Harga</th>
                        <th class="border-b border-gray-300 p-4 bg-blue-600 text-white text-left">Stok</th>
                        <th class="border-b border-gray-300 p-4 bg-blue-600 text-white text-left">Deskripsi</th>
                        <th class="border-b border-gray-300 p-4 bg-blue-600 text-white text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <td class="border-b border-gray-300 p-4 text-center"><?= $i ?></td>
                            <td class="border-b border-gray-300 p-4"><?= $product["nama"] ?></td>
                            <td class="border-b border-gray-300 p-4"><?= $product["harga"] ?></td>
                            <td class="border-b border-gray-300 p-4"><?= $product["stok"] ?></td>
                            <td class="border-b border-gray-300 p-4"><?= $product["deskripsi"] ?></td>
                            <td class="border-b border-gray-300 p-4 text-center">
                                <a href="update-product.php?id=<?= $product["id"] ?>" class="text-blue-600 hover:underline">Ubah</a> |
                                <a href="hapus-product.php?id=<?= $product["id"] ?>" class="text-red-600 hover:underline">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Add Product Button -->
        <div class="bg-red-500 text-center p-4 mx-auto my-4 rounded-lg shadow-lg">
            <a href="tambah-product.php" class="text-white font-bold text-lg">Masukan produk baru</a>
        </div>

        <!-- Kategori Produk -->
        <h1 class="text-center text-blue-600 text-3xl font-bold my-8">Kategori Produk</h1>

        <div class="flex flex-wrap gap-5 justify-center">
            <?php foreach ($kategoris as $kategori) : ?>
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-lg">
                    <a href="#">
                        <img class="rounded-t-lg h-48 w-full object-cover" src="image/<?= $kategori["image"] ?>" alt="<?= htmlspecialchars($kategori["nama"]) ?>" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold text-gray-900"><?= htmlspecialchars($kategori["nama"]) ?></h5>
                        </a>
                        <p class="mb-3 text-gray-700"><?= htmlspecialchars($kategori["deskripsi"]) ?></p>
                        <div class="text-gray-700 font-semibold">
                            <a href="update-kategori.php?id=<?= $kategori["id"] ?>" class="text-blue-600 hover:underline">Ubah</a> |
                            <a href="hapus-kategori.php?id=<?= $kategori["id"] ?>" class="text-red-600 hover:underline">Hapus</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Add Kategori Button -->
        <div class="bg-red-500 text-center p-4 mx-auto my-4 rounded-lg shadow-lg">
            <a href="tambah-kategori.php" class="text-white font-bold text-lg">Masukan kategori baru</a>
        </div>

        <!-- Pesanan Table -->
        <div class="my-8">
            <table class="min-w-full border-collapse border border-gray-300 bg-white rounded-lg shadow-md">
                <thead>
                    <tr>
                        <th class="border-b border-gray-300 p-4 bg-blue-600 text-white text-left">NO</th>
                        <th class="border-b border-gray-300 p-4 bg-blue-600 text-white text-left">Nama Pelanggan</th>
                        <th class="border-b border-gray-300 p-4 bg-blue-600 text-white text-left">Produk Pesanan</th>
                        <th class="border-b border-gray-300 p-4 bg-blue-600 text-white text-left">Jumlah</th>
                        <th class="border-b border-gray-300 p-4 bg-blue-600 text-white text-left">Total Harga</th>
                        <th class="border-b border-gray-300 p-4 bg-blue-600 text-white text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pesanans as $pesanan) : ?>
                        <tr>
                            <td class="border-b border-gray-300 p-4 text-center"><?= $x ?></td>
                            <td class="border-b border-gray-300 p-4"><?= $pesanan["name"] ?></td>
                            <td class="border-b border-gray-300 p-4"><?= $pesanan["produk"] ?></td>
                            <td class="border-b border-gray-300 p-4"><?= $pesanan["jumlah"] ?></td>
                            <td class="border-b border-gray-300 p-4"><?= $pesanan["total"] ?></td>
                            <td class="border-b border-gray-300 p-4 text-center">
                                <a href="update-pesanan.php?id=<?= $pesanan["id"] ?>" class="text-blue-600 hover:underline">Ubah</a> |
                                <a href="hapus-pesanan.php?id=<?= $pesanan["id"] ?>" class="text-red-600 hover:underline" onclick="return confirm('Yakin Ingin Menghapus')">Hapus</a>
                            </td>
                        </tr>
                        <?php $x++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Add Pesanan Button -->
        <div class="bg-red-500 text-center p-4 mx-auto my-4 rounded-lg shadow-lg">
            <a href="tambah-pesanan.php" class="text-white font-bold text-lg">Masukan pesanan baru</a>
        </div>

    </div>

</body>

</html>