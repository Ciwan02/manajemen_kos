<?php
//Tangkap data kode kamar
$kode_kamar = $_POST['kode_kamar'];
//Tangkap data sekaligus buat array
$data = array (
    'nama_kamar' => $_POST['nama_kamar'],
    'ukuran' => $_POST['ukuran'],
    'fasilitas' => $_POST['fasilitas'],
    'biaya_sewa' => $_POST['biaya_sewa']
);
//Sertakan, instance, method chaining CREATE DATA
include "classes/Dml.php";
use classes\Dml;
$obj = new Dml();
$obj->updateData($data)
    ->from_into('kamar')
    ->where ("kode_kamar='$kode_kamar'")
    ->set();
//Kembali
header('location:kamar.php');
?>