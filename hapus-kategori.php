<?php

require 'function.php';

$id = $_GET["id"];

if (deleteKategori($id) > 0) {
    echo "<script>
        alert('kategori Berhasil Dihapus');
        document.location.href = 'index.php';
        </script>";
} else {
    echo "<script>
    alert('Kategori Gagal Dihapus');
    document.location.href = 'index.php';
    </script>";
}
