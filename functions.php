<?php

function hitungTotalNilaiStok($harga, $stok)
{
    return $harga * $stok;
}

function formatRupiah($nilai)
{
    return "Rp " . number_format($nilai, 0, ",", ".");
}
