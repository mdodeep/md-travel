<?php
if (isset($_POST['input'])){
	if($_FILES["file_image"]["name"] !='') // check file sudah dipilih atau belum
	{
		$allowed_ext = array("jpg","png"); // extension file yang di ijinkan
		$ext_1 = explode('.', $_FILES["file_image"]["name"]); // upload file ext
		$ext = end($ext_1);

		if(in_array($ext, $allowed_ext))// check untuk validextension extension
		{
			if($_FILES["file_image"]["size"]<1000000) // check ukuran gambar sesuai tidak
			{
			$name = $_POST['namamsk'] . '.' . $ext; // rename nama file gambar
			$dbnama = $_POST['namamsk'];
			$path = "assets/images/maskapai/". $name; // image upload path
			move_uploaded_file($_FILES["file_image"]["tmp_name"], $path);
			mysqli_query($conn, "INSERT INTO md_maskapai VALUES ('','$dbnama','$name')");
			}else{
				echo '<script>alert("Ukuran Gambar Terlalu Besar")</script>';
			}
		
		}else{
			echo '<script>alert("Tidak Sesuai Image File")</script>';
		}
	}else{
		echo '<script>alert("Silahkan pilih file gambar")</script>';
	}
}

if (isset($_GET['del'])){
	$del = $_GET['del'];
	mysqli_query($conn, "DELETE FROM md_maskapai WHERE id_maskapai='$del'");
	echo "<script> location.replace('admin.php?nav=tambahmaskapai'); </script>";
}
?>
<div class="col-md-12">
	<form method="post" action="" enctype="multipart/form-data">
<label class="mt-4">Pilih Logo Maskapai :</label> <input type="file" class="filestyle" data-btnClass="btn-primary" name="file_image">
<label class="mt-4">Masukan Nama Maskapai :</label> <input class="form-control" type="text" name="namamsk">
<button class="btn btn-success mt-4" type="submit" name="input">Tambah Maskapai</button>
</form>
<p class="mt-4">Referensi Data : <a href="https://id.wikipedia.org/wiki/Daftar_maskapai_penerbangan_Indonesia" target="_blank">Wikipedia</a>
</div>

<p class="h4 mt-4 bg-success col-md-12 text-white text-center">Data Maskapai Yang Sudah Ada</p>
	<div class="table-responsive">
		<table id="datatable" class="table table-bordered nowrap table-striped text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
			<thead class="table table-striped">
				<tr class="bg-soft-info bg-gradient">
					<th>ID Maskapai</th>
					<th>Nama Maskapai</th>
					<th>Logo Maskapai</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$tampilmaskapai = mysqli_query($conn, "SELECT * FROM md_maskapai"); 
				while ($datamaskapai = mysqli_fetch_array($tampilmaskapai)){
				?>
				<tr class="table">
					<th scope="row" class="text-center"><?php echo $datamaskapai['id_maskapai']; ?></th>
					<td><?php echo $datamaskapai['nama_maskapai']; ?></td>
					<td><?php echo "<img src='assets/images/maskapai/".$datamaskapai['logo_maskapai']."' height='20'/>"; ?></td>
					<td><a href="admin.php?nav=tambahmaskapai&del=<?php echo $datamaskapai['id_maskapai']; ?>" class="btn btn-danger">Hapus</a></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>