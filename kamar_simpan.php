<?php

//Tangkap data sekaligus buat array
$data = array (
    'kode_kamar' => $_POST['kode_kamar'],
    'nama_kamar' => $_POST['nama_kamar'],
    'ukuran' => $_POST['ukuran'],
    'fasilitas' => $_POST['fasilitas'],
    'biaya_sewa' => $_POST['biaya_sewa']
);
//Sertakan, instance, method chaining CREATE DATA
include "classes/Dml.php";
use classes\Dml;
$obj = new Dml();
$obj->insert($data)->from_into('kamar')->create();
//Kembali
header('location:kamar.php');
?>