<?php
if(isset($_POST['submit_row'])){

$k_namakota = $_POST['namakota'];
$k_kodekota = $_POST['kodekota'];

for($i=0;$i<count($k_namakota);$i++){
	if($k_namakota[$i]!="" && $k_kodekota[$i]!="")
  {
		mysqli_query($conn, "INSERT INTO md_kota VALUES ('','$k_namakota[$i]','$k_kodekota[$i]')");
		//print $k_namakota[$i] . $k_kodekota[$i];
		}else{
			echo "<script>alert('Error : Data Belum Diisi'); </script>";
		}
	}
}

if (isset($_GET['del'])){
	$del = $_GET['del'];
	mysqli_query($conn, "DELETE FROM md_kota WHERE id_kota='$del'");
	echo "<script> location.replace('admin.php?nav=tambahkota'); </script>";
}
?>

<script type="text/javascript">
function add_row()
{
 $rowno=$("#employee_table tr").length;
 $rowno=$rowno+1;
 $("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td><input class='form-control' type='text' name='namakota[]' placeholder='Nama Kota'></td><td><input class='form-control' type='text' name='kodekota[]' placeholder='Kode Kota'></td><td><input class='btn btn-danger' type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')></td></tr>");
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}
</script>
	<div class="col-md-12">
		<p class="h1">Tambah Data Kota</p>
		<form method="post" action="">
			<table class="mb-4" id="employee_table">
				<tr id="row1">
					<td><input class="form-control" type="text" name="namakota[]" placeholder="Nama Kota"></td>
					<td><input class="form-control" type="text" name="kodekota[]" placeholder="Kode Kota"></td>
				</tr>
			</table>
			<input class="btn btn-primary" type="button" onclick="add_row();" value="Tambah Form">
			<input class="btn btn-success" type="submit" name="submit_row" value="Submit Data">
		</form>
	</div>

	<div class="col-md-12 mt-4">
		Referensi Data : <a href="https://id.wikipedia.org/wiki/Daftar_bandar_udara_tersibuk_di_Indonesia" target="_blank">Wikipedia</a>
	</div>

<p class="h4 mt-4 bg-success col-md-12 text-white text-center">Data Kota Yang Sudah Ada</p>
	<div class="table-responsive">
		<table id="datatable" class="table table-bordered nowrap table-striped text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
			<thead class="table table-striped">
				<tr class="bg-soft-info bg-gradient">
					<th>ID Kota</th>
					<th>Nama Kota</th>
					<th>Kode Kota</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$tampilkota = mysqli_query($conn, "SELECT * FROM md_kota"); 
				while ($datakota = mysqli_fetch_array($tampilkota)){
				?>
				<tr class="table">
					<th scope="row" class="text-center"><?php echo $datakota['id_kota']; ?></th>
					<td><?php echo $datakota['nama_kota']; ?></td>
					<td><?php echo $datakota['kode_kota']; ?></td>
					<td><a href="admin.php?nav=tambahkota&del=<?php echo $datakota['id_kota']; ?>" class="btn btn-danger">Hapus</a></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>