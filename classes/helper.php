<?php
namespace classes;
class helper{
function mataUang ($mata_uang) {
    $simbol = 'Rp';
    $format = number_format($mata_uang, 2, ',', '.');
    $mata_uang = $simbol.$format;
    return $mata_uang;
}


function tanggal ($tanggal) {
    $bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $thn = substr($tanggal, 0, 4);
    $bln = abs (substr($tanggal, 5, 2));
    $tgl = substr($tanggal, 8, 2);
    $tanggal = $tgl .' '. $bulan[$bln-1] .' '. $thn;
    return $tanggal;
}
}
?>