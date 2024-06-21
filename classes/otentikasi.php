<?php
namespace classes;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class Otentikasi {
    function cekLogin($akun, $sandi){
        $obj = new Dml ();
        $qU = $obj->select()->from_into('pengguna')
                ->where("akun='$akun'")
                ->get();
        if(count($qU) != 0) {
            //cek sandi
            if($qU[0]['sandi'] === md5($sandi)) {
                $_SESSION['akun'] = $qU[0]['akun'];
                $_SESSION['nama'] = $qU[0]['nama'];
                $_SESSION['kode'] = "inikodeny0ya";
                header('location: sewa.php');
                exit(); // Pastikan untuk keluar dari skrip setelah mengarahkan pengguna
            }
            else {
                echo "Sandi Tidak Sesuai!!";
            }
        }
        else {
            echo "Akun Tidak Ditemukan!";
        }
    }

    function sesiPengguna(){
        if(empty($_SESSION['akun']) || empty($_SESSION['nama']) || $_SESSION['kode'] !== 'inikodeny0ya') {
            header('location: blokir.php');
            exit();
        }
    }

    function gantiSandi($akun, $sandi_lama, $sandi_baru){
        $obj = new DML ();
        $qU = $obj->select()
                  ->from_into('pengguna')
                  ->where("akun='$akun'")
                  ->get();
        if(count($qU) <> 0) {
            if($qU[0]['sandi'] === md5($sandi_lama)) {
                $data = array('sandi'=> md5($sandi_baru));
                $obj->updateData($data)
                    ->from_into('pengguna')
                    ->where("akun='$akun'")
                    ->set();
                header('location: keluar.php');
                exit(); // Pastikan untuk keluar dari skrip setelah mengarahkan pengguna
            }
            else {
                echo "Sandi Lama Tidak Sesuai!";
            }
        }
        else {
            echo "Akun Tidak Ditemukan!";
        }
    }
}
?>
