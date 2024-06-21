<?php
// Tangkap kiriman data
$kode_kamar = $_POST['kode_kamar'];
$lama_sewa = $_POST['lama_sewa'];
$nama_penyewa = $_POST['nama_penyewa'];

// Set tanggal sewa dan batas akhir sewa
date_default_timezone_set("Asia/Jakarta");
$tanggal_sewa = date('Y-m-d');
$batas_akhir_sewa = date('Y-m-d', strtotime('+' . $lama_sewa . ' month', strtotime($tanggal_sewa)));

// Generate kode sewa
$kode_sewa = $kode_kamar . date('YmdHis');

// Baca biaya sewa per bulan dan hitung total biaya sewa
include "classes/Dml.php";
use classes\Dml;
$obj = new Dml();
$biaya = $obj->select('biaya_sewa')
    ->from_into('kamar')
    ->where("kode_kamar='$kode_kamar'")
    ->get();
$total_biaya_sewa = $lama_sewa * $biaya[0]['biaya_sewa'];

// Susun data dalam bentuk array
$data = array(
    'kode_sewa' => $kode_sewa,
    'kode_kamar' => $kode_kamar,
    'lama_sewa' => $lama_sewa,
    'tanggal_sewa' => $tanggal_sewa,
    'batas_akhir_sewa' => $batas_akhir_sewa,
    'total_biaya_sewa' => $total_biaya_sewa,
    'nama_penyewa' => $nama_penyewa
);

// Simpan data ke dalam tabel
$obj->insert($data)
    ->from_into('transaksi')
    ->create();

// Kembali ke sewa.php
header('location:sewa.php');
?>
