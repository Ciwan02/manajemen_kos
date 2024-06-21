<?php
include "classes/inisialisasi.php";
$otentikasi->sesiPengguna();
?>
<!doctype html>
<html lang="id">
	
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">
	<meta name="author" content="">
	<meta name="description" content="Manajemen kos-kosan">

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
		   <button style="background-color: #555555; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; box-shadow: 0 2px #999;" onclick="window.location.href='sewa_tambah.php';">Tambah</button>
    	</span>
		</h2>

		<table border="1" width="100%" align="center">
			<thead>
				<tr>
					<th>No.</th>
					<th>Kode Sewa</th>
					<th>Nama Kamar</th>
					<th>Kode Kamar</th>
					<th>Ukuran/Fasilitas</th>
					<th>Lama Sewa (bulan)</th>
					<th>Mulai-Sampai</th>
					<th>Total Biaya Sewa</th>
					<th>Nama Penyewa</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
            <?php
			$no = 1;
			use classes\Dml;
			$obj = new Dml();
			$data = $obj->select()->from_into('transaksi')->get();
			foreach ($data as $d) {
			?>
				<tr align="center">
				    <td><?php echo $no;?></td>
                    <td><?php echo $d['kode_sewa'];?></br></td>
				    <td><?php echo $d['nama_kamar'];?></td>
					<td><?php echo $d['kode_kamar'];?></td>
                    <td>
				        <?php echo $d['ukuran'];?> M /<br>
                        <?php echo $d['fasilitas'];?>
                    </td>
                    <td><?php echo $d['lama_sewa'];?></td>
                    <td>
                        <?php echo $helper->tanggal ($d['tanggal_sewa']);?>-<br>
                        <?php echo $helper->tanggal ($d['batas_akhir_sewa']);?>
                    </td>
                    <td><?php echo $helper->mataUang($d['total_biaya_sewa']);?></td>
                    <td><?php echo $d['nama_penyewa'];?></td>
				    <td>
    					<form action="sewa_edit.php" method="get" style="display: inline;">
      						<input type="hidden" name="kode_sewa" value="<?php echo $d['kode_sewa']; ?>">
      						<button style="background-color: #3CB371; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; box-shadow: 0 2px #999;" ><type="submit">Edit</button>
    					</form>
    					<form action="sewa_hapus.php" method="get" style="display: inline;" onsubmit="return confirm('Data yang telah dihapus tidak dapat dikembalikan! \nAnda yakin akan menghapus transaksi ini?');">
        					<input type="hidden" name="kode_sewa" value="<?php echo $d['kode_sewa']; ?>">
        					<button style="background-color: #FF0000; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; box-shadow: 0 2px #999;" ><type="submit">Hapus</button>
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