<?php
include "classes/inisialisasi.php";
$otentikasi->sesiPengguna();
use classes\Dml; 
$kode_sewa = $_GET['kode_sewa'];
$obj = new Dml();
$data = $obj->select()
            ->from_into('sewa')
            ->where ("kode_sewa='$kode_sewa'")
            ->get();
$sewa = $data; 
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">
    <meta name="author" content="">
    <meta name="description" content="">

    <title>Aplikasi Manajemen Kos</title>
</head>
<body>
    <header align="center">
        <h1>Manajemen Kos</h1>
        <p>
        <button style="background-color: #4CAF50; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; box-shadow: 0 4px #999;" onclick="window.location.href='sewa.php';">Transaksi</button>
		<button style="background-color: #4CAF50; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; box-shadow: 0 4px #999;" onclick="window.location.href='kamar.php';">Kamar</button>
			:::
			<button style="background-color: #32CD32; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; box-shadow: 0 4px #999;" onclick="window.location.href='ganti_sandi.php';"><?php echo $_SESSION['nama']; ?></button>
            <button style="background-color: #f44336; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; box-shadow: 0 4px #999;" onclick="window.location.href='keluar.php';">Keluar</button>
		</p>
        <hr>
    </header>

    <main>
        <h2>
            Transaksi
            <span style="float:right">
        	<button style="background-color: #FF6347; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; box-shadow: 0 2px #999;" onclick="window.location.href='sewa.php';">Batal</button>
    	</span>
        </h2>
        <form action="sewa_update.php" method="post">
            <table border="0" width="100%" align="center">
                <tbody>
                    <tr>
                        <td align="right">Kode Sewa</td>
                        <td>
                            <input type="text" name="kode_sewa" readonly value="<?php echo $data[0]['kode_sewa']?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Tanggal Sewa</td>
                        <td>
                            <input type="text" name="tanggal_sewa" readonly value="<?php echo $data[0]['tanggal_sewa']?>">
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" align="right">Kode Kamar
                        </td>
                        <td width="50%">
                            <select name="kode_kamar" required>
                                <option value="">--Pilih Kamar--</option>
                                <?php
                                $obj = new Dml();
                                $data_kamar = $obj->select()->from_into('kamar')->order('kode_kamar ASC')->get();
                                foreach ($data_kamar as $d) {
                                    $semula = ($d['kode_kamar'] == $data[0]['kode_kamar']) ? "selected" : "";
                                ?>
                                    <option value="<?php echo $d['kode_kamar']; ?>" <?php echo $semula; ?>>
                                        <?php echo $d['kode_kamar']; ?>/<?php echo $d['nama_kamar']; ?>
                                        (<?php echo $d['biaya_sewa']; ?>)
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Lama Sewa</td>
                        <td>
                            <input type="number" placeholder="Lama Sewa" size="5" name="lama_sewa" required value="<?php echo $data[0]['lama_sewa']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Nama Penyewa</td>
                        <td>
                            <input type="text" placeholder="Nama Penyewa" size="20" name="nama_penyewa" required value="<?php echo $data[0]['nama_penyewa']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        <input  style="background-color: #32CD32; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; box-shadow: 0 2px #999;"type="submit" value="Update" name="update">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </main>
   
</body>
</html>
