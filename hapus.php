<?php

require 'function.php';

$id = $_GET["id"];

if (delete($id, "produk") > 0) {
    echo "<script>
        alert('Data Berhasil Dihapus');
        document.location.href = 'index.php';
        </script>";
} else {
    echo "<script>
    alert('Data Gagal Dihapus');
    document.location.href = 'index.php';
    </script>";
}

if (delete($id, "kategori") > 0) {
    echo "<script>
        alert('Data Berhasil Dihapus');
        document.location.href = 'index.php';
        </script>";
} else {
    echo "<script>
    alert('Data Gagal Dihapus');
    document.location.href = 'index.php';
    </script>";
}

if (delete($id, "pesanan") > 0) {
    echo "<script>
        alert('Data Berhasil Dihapus');
        document.location.href = 'index.php';
        </script>";
} else {
    echo "<script>
    alert('Data Gagal Dihapus');
    document.location.href = 'index.php';
    </script>";
}
