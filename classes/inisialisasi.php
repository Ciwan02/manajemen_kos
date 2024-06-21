<?php
// Pastikan untuk menggunakan namespace yang benar
include_once 'koneksi.php';
include_once 'Dml.php';
include_once 'otentikasi.php';
include_once 'helper.php';

use classes\koneksi;
use classes\Dml;
use classes\otentikasi;
use classes\helper;

// Membuat objek dari kelas yang di-include
$koneksi = new koneksi();
$obj = new Dml();
$otentikasi = new otentikasi();
$helper = new helper();
?>
