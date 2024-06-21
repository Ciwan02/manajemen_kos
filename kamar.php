<?php
include "classes/inisialisasi.php";
$otentikasi->sesiPengguna();
$obj = new classes\Dml(); 
?>

<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">
	<meta name="author" content="">
	<meta name="description" content="Manajemen Kos-kosan">

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
		Kamar
		<span style="float:right">
		<button style="background-color: #001f3f; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; box-shadow: 0 2px #999;" onclick="window.location.href='kamar_tambah.php';">Tambah</button>
    	</span>
		</h2>
	
		<table border="1" width="100%" align="center">
			<thead>
				<tr>
					<th>No.</th>
					<th>Kode Kamar</th>
					<th>Nama Kamar</th>
					<th>Ukuran</th>
					<th>Fasilitas</th>
					<th>Biaya Sewa (per bulan)</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			$data = $obj->select()->from_into('kamar')->get();
			foreach ($data as $d) {
			?>
				<tr align="center">
					<td><?php echo $no;?></td>
					<td><?php echo $d['kode_kamar'];?></td>
					<td><?php echo $d['nama_kamar'];?></td>
					<td><?php echo $d['ukuran'];?> M</td>
					<td><?php echo $d['fasilitas'];?></td>
					<td><?php echo $helper->mataUang($d['biaya_sewa']);?></td>
					<td>
						<form action="kamar_edit.php" method="get" style="display: inline;">
      						<input type="hidden" name="kode_kamar" value="<?php echo $d['kode_kamar']; ?>">
      						<button style="background-color: #3CB371; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; box-shadow: 0 2px #999;" type="submit">Edit</button>
    					</form>
    						<form action="kamar_hapus.php" method="get" style="display: inline;" onsubmit="return confirm('Data yang telah dihapus tidak dapat dikembalikan! \nAnda yakin akan menghapus transaksi ini?');">
        					<input type="hidden" name="kode_kamar" value="<?php echo $d['kode_kamar']; ?>">
        					<button style="background-color: #FF0000; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; box-shadow: 0 2px #999;" type="submit">Hapus</button>
    					</form>					
					</td>
				</tr>
			<?php
				$no++;
			}
			?>
			</tbody>
		</table>
		<p>
			Catatan:
			<ul>
				<li>Data terbaru tampil di atas
				<li>Data yang dihapus tidak dapat dikembalikan
			</ul>
		</p>
	</main>
	
</body>
</html>
