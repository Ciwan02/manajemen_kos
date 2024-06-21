<?php

$kode_sewa = $_GET['kode_sewa'];


include "classes/Dml.php";
use classes\Dml;
$obj = new Dml();
$obj->deleteData()
    ->from_into('sewa')
    ->where("kode_sewa='$kode_sewa'")
    ->del();

header('location:sewa.php');
?>