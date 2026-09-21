<?php

require_once "products.php";
require_once "functions.php";

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Information System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f5f7fa;
            color: #222;
        }

        h1 {
            color: #1769aa;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #1769aa;
            color: white;
        }

        .stok-kritis {
            background: #ffe0e0;
        }

        .keterangan {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <h1>Product Information System</h1>

    <p class="keterangan">
        Daftar informasi produk siap pakai dan nilai aset berdasarkan stok.
        Baris berwarna menunjukkan stok kritis (kurang dari 3).
    </p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Total Nilai Stok</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($products as $product): ?>
                <?php
                    $totalNilaiStok = hitungTotalNilaiStok(
                        $product["harga"],
                        $product["stok"]
                    );

                    $kelasBaris = $product["stok"] < 3 ? "stok-kritis" : "";
                ?>

                <tr class="<?= $kelasBaris ?>">
                    <td><?= htmlspecialchars($product["id"]) ?></td>
                    <td><?= htmlspecialchars($product["nama"]) ?></td>
                    <td><?= htmlspecialchars($product["kategori"]) ?></td>
                    <td><?= formatRupiah($product["harga"]) ?></td>
                    <td><?= $product["stok"] ?></td>
                    <td><?= htmlspecialchars($product["deskripsi"]) ?></td>
                    <td><?= formatRupiah($totalNilaiStok) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
