<?php
// Tangkap kiriman data
$kode_sewa = $_POST['kode_sewa'];
$tanggal_sewa = $_POST['tanggal_sewa'];
$kode_kamar = $_POST['kode_kamar'];
$lama_sewa = $_POST['lama_sewa'];
$nama_penyewa = $_POST['nama_penyewa'];

// Set batas akhir sewa
date_default_timezone_set("Asia/Jakarta");
$batas_akhir_sewa = date('Y-m-d', strtotime('+' . $lama_sewa . ' month', strtotime($tanggal_sewa)));


// Baca data kamar
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
    'kode_kamar' => $kode_kamar,
    'lama_sewa' => $lama_sewa,
    'batas_akhir_sewa' => $batas_akhir_sewa,
    'total_biaya_sewa' => $total_biaya_sewa,
    'nama_penyewa' => $nama_penyewa
);

// Simpan data ke dalam tabel
$obj->updateData($data)
    ->from_into('sewa')
    ->where ("kode_sewa='$kode_sewa'")
    ->set();

// Kembali ke sewa.php
header('location:sewa.php');
?>
