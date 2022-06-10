<?php
if(isset($_POST['submit_row'])){
$k_namakota = $_POST['kotabandara'];
$k_namabandara = $_POST['namabandara'];
$k_kodebandara = $_POST['kodebandara'];

for($i=0;$i<count($k_namakota);$i++){
		if($k_namakota[$i]!="" && $k_namabandara[$i]!="" && $k_kodebandara[$i]!="")
  {
		mysqli_query($conn, "INSERT INTO md_bandara VALUES ('','$k_namakota[$i]','$k_namabandara[$i]','$k_kodebandara[$i]')");
		//print $k_namakota[$i] . $k_kodekota[$i]. $k_kodebandara[$i];
		}else{
			echo "<script>alert('Error : Data Belum Diisi'); </script>";
		}
	}
}

if (isset($_GET['del'])){
	$del = $_GET['del'];
	mysqli_query($conn, "DELETE FROM md_bandara WHERE id_bandara='$del'");
	echo "<script> location.replace('admin.php?nav=tambahbandara'); </script>";
}

if (!isset($_GET['jum'])){
	echo "<script> location.replace('?nav=tambahbandara&jum=1'); </script>";
}

?>

	<div class="col-md-12">
		<p class="h1">Tambah Data Bandara</p>
				<form class="mb-4" method="get" action="admin.php"><input type="hidden" name="nav" value="tambahbandara"><button class="btn btn-primary" type="submit" name="jum" value="<?php echo $_GET['jum']+1 ;?>">Tambah Form</button></form>
		<form method="post" action="">
			<table id="employee_table" class="mb-4 col-md-10">
				<tr id="row1">
					<td> <select class="form-control" data-toggle="select2" name="kotabandara[]">
						<option>Pilih Kota</option> 
						<?php 
						$rows = array();
						while ($row = mysqli_fetch_array($kota)){ 
							  $rows[] = $row;
						?> 
						<option value="<?php echo $row['nama_kota']; ?>"><?php echo $row['nama_kota']; ?></option> 
					<?php } ?>
					</select> 
				</td> <td><input class="form-control" type="text" name="namabandara[]" placeholder="Nama Bandara"></td> <td><input class="form-control" type="text" name="kodebandara[]" placeholder="Kode Bandara"></td>
				</tr>
				<?php if (isset($_GET['jum'])){
					$jml = $_GET['jum']-1;
					for($i=0;$i<$jml;$i++){ ?>
						<tr id='row"+$rowno+"'><td> <select class='form-control' data-toggle='select2' name='kotabandara[]'> <option>Pilih Kota</option> <?php foreach($rows as $row){ ?> <option value='<?php echo $row['nama_kota']; ?>'><?php echo $row['nama_kota']; ?></option> <?php } ?> </select> </td> <td><input class='form-control' type='text' name='namabandara[]' placeholder='Nama Bandara'></td> <td><input class='form-control' type='text' name='kodebandara[]' placeholder='Kode Bandara'></td><td><a href="admin.php?nav=tambahbandara&jum=<?php echo $_GET['jum'] -1;?>"><input class='btn btn-danger' type='button' value='DELETE'></a></td></tr>
						<?php }} ?>
			</table>
			<input class="btn btn-success" type="submit" name="submit_row" value="Submit Data">
		</form>
	</div>

	<div class="col-md-12 mt-4">
		Referensi Data : <a href="https://id.wikipedia.org/wiki/Daftar_bandar_udara_tersibuk_di_Indonesia" target="_blank">Wikipedia</a>
	</div>

	<p class="h4 mt-4 bg-success col-md-12 text-white text-center">Data Bandara Yang Sudah Ada</p>
	<div class="table-responsive">
		<table id="datatable" class="table table-bordered nowrap table-striped text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
			<thead class="table table-striped">
				<tr class="bg-soft-info bg-gradient">
					<th>ID Bandara</th>
					<th>Kota</th>
					<th>Nama Bandara</th>
					<th>Kode Bandara</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				while ($databandara = mysqli_fetch_array($bandara)){
				?>
				<tr class="table">
					<th scope="row" class="text-center"><?php echo $databandara['id_bandara']; ?></th>
					<td><?php echo $databandara['kota_bandara']; ?></td>
					<td><?php echo $databandara['nama_bandara']; ?></td>
					<td><?php echo $databandara['kode_bandara']; ?></td>
					<td><a href="admin.php?nav=tambahbandara&del=<?php echo $databandara['id_bandara']; ?>" class="btn btn-danger">Hapus</a></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>