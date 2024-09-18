<?php

require 'function.php';

$id = $_GET["id"];

if (deletePesanan($id) > 0) {
    echo "<script>
        alert('Pesanan Berhasil Dihapus');
        document.location.href = 'index.php';
        </script>";
} else {
    echo "<script>
    alert('Pesanan Gagal Dihapus');
    document.location.href = 'index.php';
    </script>";
}
