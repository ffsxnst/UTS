<?php
	//ini Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "datakamar";

	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

	if(isset($_POST['bsimpan']))
	{
		//ini buat ubah data kamar
		if($_POST['bsimpan'] == "edit")
		{
			//ini data yg mau diedit
			$edit = mysqli_query($koneksi, "UPDATE datakamar set
											 	no_kamar = '$_POST[tno_kamar]',
											 	nama_anggota = '$_POST[tnama_anggota]',
												program_studi = '$_POST[tprogram_studi]',
											 	angkatan = '$_POST[tangkatan]'
											 WHERE id_kamar = '$_GET[id]'
										   ");
			if($edit) //kalo edit/updatenya berhasil ada notifnya
			{
				echo "<script>
						alert('Data berhasil diupdate');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Update data gagal');
						document.location='index.php';
				     </script>";
			}
		}
		else
		{
			//Data bakal disimpen yg baru
			$simpan = mysqli_query($koneksi, "INSERT INTO datakamar (no_kamar, nama_anggota, program_studi, angkatan)
										  VALUES ('$_POST[tno_kamar]', 
										  		 '$_POST[tnama_anggota]', 
										  		 '$_POST[tprogram_studi]', 
										  		 '$_POST[tangkatan]')
										 ");
			if($simpan) //kalo simpen sukses dapet notif
			{
				echo "<script>
						alert('Data berhasil disimpan');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Data gagal disimpan');
						document.location='index.php';
				     </script>";
			} //echo tu kaya eksekusi di java ato println
		}


		
	}


	//ini buat bikin notif yg ada di tab, kalo misal mau di ok in
	if(isset($_GET['hal']))
	{
		//buat ubah datanya
		if($_GET['hal'] == "edit")
		{
			//ini buat nampilin data yng diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM datakamar WHERE id_kamar = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{

				$vno_kamar = $data['no_kamar'];
				$vnama_anggota = $data['nama_anggota'];
				$vprogram_studi = $data['program_studi'];
				$vangkatan = $data['angkatan'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//ini buat apus data 
			$hapus = mysqli_query($koneksi, "DELETE FROM datakamar WHERE id_kamar = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Data berhasil dihapus');
						document.location='index.php';
				     </script>";
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>DATA KAMAR</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<!-- h itu header di web -->
	<h1 class="text-center">DATA KAMAR</h1> 
	<!-- h1 bakal jadi yg paling gede, soalnya dia pertama -->
	<h2 class="text-center">UNIVERSITAS DARUSSALAM GONTOR KAMPUS MANTINGAN</h2>
	<!-- h2 dan seterusnya bakal jadi lebih kecil dari yg sebelum2nya semua, soalnya dibawahnya -->


	<!-- Awal Card Form -->
	<div class="card mt-3">
	  <div class="card-header bg-primary text-white">
	    Form Pendataan Anggota Kamar
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>Nama Gedung dan Nomor Kamar</label>
	    		<input type="text" name="tno_kamar" value="<?=@$vno_kamar?>" class="form-control" placeholder="Masukkan nama gedung dan nomor kamar" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Nama</label>
	    		<input type="text" name="tnama_anggota" value="<?=@$vnama_anggota?>" class="form-control" placeholder="Masukkan nama anda" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Program Studi</label>
	    		<select class="form-control" name="tprogram_studi">
	    			<!-- option ini buat bikin pilihan2 yg ada di formnya -->

	    			<option value="<?=@$vprogram_studi?>"><?=@$vprogram_studi?></option>
	    			<option value="Teknik Informatika">Teknik Informatika</option>
	    			<option value="Hubungan Internasional">Hubungan Internasional</option>
	    			<option value="Perbandingan Madzhab">Perbandingan Madzhab</option>
	    			<option value="Pendidikan Agama Islam">Pendidikan Agama Islam</option>
	    			<option value="Ilmu Quran dan Tafsir">Ilmu Quran dan Tafsir</option>
	    			<option value="Agroteknologi">Agroteknologi</option>
	    			<option value="Ekonomi Islam">Ekonomi Islam</option>
	    			<option value="Hukum Ekonomi Syariah">Hukum Ekonomi Syariah</option>
	    			<option value="Manajemen Bisnis">Manajemen Bisnis</option>
	    			<option value="Tadris Bahasa Inggris">Tadris Bahasa Inggris</option>
	    			<option value="Pendidikan Bahasa Arab">Pendidikan Bahasa Arab</option>
	    			<option value="Farmasi">Farmasi</option>
	    			<option value="Gizi">Gizi</option>

	    		</select>

	    	</div>

	    	<div class="form-group">
	    		<label>Angkatan</label>
	    		<select class="form-control" name="tangkatan">
	    			<option value="<?=@$vangkatan?>"><?=@$vangkatan?></option>
	    			<option value="Survival">Survival</option>
	    			<option value="Inspiring">Inspiring</option>
	    			<option value="Guardian">Guardian</option>
	    			<option value="Prominent">Prominent</option>
	    		</select>
	    	</div>
	    	<!-- bikin button buat tombol yg ada di situ -->
	    	<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
	    	<button type="reset" class="btn btn-danger" name="breset">Buang</button>

	    </form>
	  </div>
	</div>
	<!-- Akhir Card Form -->



	<!-- Awal Card Tabel -->
	<div class="card mt-3">
	  <div class="card-header bg-success text-white">
	    Data Anggota Kamar

	    <!-- div itu buat bikin tabel -->
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">

	    	<!-- tr itu buat bikin tabel row -->

	    	<!-- th itu buat bikin kolom-->
	    	<tr>
	    		<th class="text-center">No.</th>
	    		<th class="text-center">Nomor Kamar</th>
	    		<th class="text-center">Nama</th>
	    		<th class="text-center">Program Studi</th>
	    		<th class="text-center">Angkatan</th>
	    		<th class="text-center">Aksi</th>

	    		<!-- dipakein textcenter biar ketengah tulisannya-->
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from datakamar order by id_kamar desc");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td class="text-center"><?=$no++;?></td>
	    		<td><?=$data['no_kamar']?></td>
	    		<td><?=$data['nama_anggota']?></td>
	    		<td class="text-center"><?=$data['program_studi']?></td>
	    		<td class="text-center"><?=$data['angkatan']?></td>
	    		<td>
	    			<a href="index.php?hal=edit&id=<?=$data['id_kamar']?>" class="btn btn-warning" > EDIT </a>
	    			<a href="index.php?hal=hapus&id=<?=$data['id_kamar']?>" 
	    			   onclick="return confirm('Apa yakin untuk menghapus data?')" class="btn btn-danger"> DELETE </a>

	    			   <!-- td itu buat tabel data, yg buat isinya th. kaya buat nyambungin sql -->
	    		</td>
	    	</tr>
	    <?php endwhile; //ini buat yg terakhirnya dikasih endwhile ?>
	    </table>

	  </div>
	</div>
	<!-- Akhir Card Tabel -->

</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>