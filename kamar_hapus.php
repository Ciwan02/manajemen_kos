<?php
//Tangkap kiriman GET kode_kamr
$kode_kamar = $_GET['kode_kamar'];

//Instance object dan hapus data
include "classes/Dml.php";
use classes\Dml;
$obj = new Dml();

//Hapus data dari tabel kamar
$obj->deleteData()
    ->from_into('kamar')
    ->where("kode_kamar='$kode_kamar'")
    ->del();

//Hapus data dari tabel sewa
$obj->deleteData()
    ->from_into('sewa')
    ->where("kode_kamar='$kode_kamar'")
    ->del();


header('location:kamar.php');
?>