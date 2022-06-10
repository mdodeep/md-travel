<?php
$randomchar = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz";
$kd_ps = substr(str_shuffle($randomchar), 0,5);
$kd_pn = substr(str_shuffle($randomchar), 0,4);

if(isset($_POST['tambahdata'])){
$t_maskapai = $_POST['maskapai'];
$t_kelas = $_POST['kelas'];
$t_berangkat = $_POST['bandara_berangkat'];
$t_tiba = $_POST['bandara_tiba'];
$t_tglb = $_POST['tanggal_berangkat'];
$t_tglt = $_POST['tanggal_tiba'];
$t_jamb = $_POST['jam_berangkat'];
$t_jamt = $_POST['jam_tiba'];
$t_harga = $_POST['harga'];
$t_kuota = $_POST['kuota'];
$t_kodepst = $_POST['kode_pesawat'];
$t_kodepsn = $_POST['kode_pesan'];
$time = strtotime($t_tglt);
$t_exp = date('Y-m-d',$time);
		
		$insertdata = mysqli_query($conn, "INSERT INTO md_jadwal (nama_maskapai,logo_maskapai,kode_pesawat,kelas,bandara_berangkat,tgl_berangkat,jam_berangkat,bandara_tiba,tgl_tiba,jam_tiba,harga,kuota,kode_pesan,tgl_exp) VALUES ('$t_maskapai','$t_maskapai','$t_kodepst','$t_kelas','$t_berangkat','$t_tglb','$t_jamb','$t_tiba','$t_tglt','$t_jamt','$t_harga','$t_kuota','$t_kodepsn','$t_exp')");
		echo "<script> location.replace('admin.php?nav=tambahjadwal'); </script>";
	}

if (isset($_GET['del'])){
	$del = $_GET['del'];
	mysqli_query($conn, "DELETE FROM md_jadwal WHERE id_jadwal='$del'");
	echo "<script> location.replace('admin.php?nav=tambahjadwal'); </script>";
}
?>

	<div class="col-md-12">
		<p class="h1">Tambah Data Jadwal</p>
		<form method="post" action="">
			<table id="employee_table" class="mb-4 col-md-10">
				<tr id="row1">
					<td class="pb-4"> 
						<select class="form-control" data-toggle="select2" name="maskapai">
							<option>--- Pilih Maskapai ---</option> 
							<?php $raws = array(); while ($raw = mysqli_fetch_array($maskapai)){ $raws[] = $raw; ?> 
								<option value="<?php echo $raw['nama_maskapai']; ?>"><?php echo $raw['nama_maskapai']; ?></option> 
							<?php } ?>
						</select>
					</td>

					<td class="pb-4"> 
						<select class="form-control" data-toggle="select2" name="kelas">
							<option>--- Pilih Kelas ---</option>
							<option value="Bisnis">Bisnis</option>
							<option value="Ekonomi">Ekonomi</option>
						</select>
					</td>

				</tr>

				<tr>
					<td class="pb-4"> 
						<select class="form-control" data-toggle="select2" name="bandara_berangkat">
							<option>--- Pilih Bandara Berangkat ---</option> 
							<?php 
							$rows = array();
							while ($row = mysqli_fetch_array($bandara)){ 
								$rows[] = $row;
								?> 
								<option value="<?php echo $row['nama_bandara']; ?>"><?php echo $row['nama_bandara']; ?></option> 
							<?php } ?>
						</select> 
					</td> 
					<td class="pb-4"> 
						<select class="form-control" data-toggle="select2" name="bandara_tiba">
							<option>--- Pilih Bandara Tujuan ---</option> 
							<?php foreach($rows as $row){ ?>
								<option value="<?php echo $row['nama_bandara']; ?>"><?php echo $row['nama_bandara']; ?></option> 
							<?php } ?>
						</select> 
					</td> 
				</tr>

				<tr>
					<td class="pb-4">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Tanggal Berangkat" data-date-format="dd MM yyyy" id="datepicker-autoclose" name="tanggal_berangkat">
							<div class="input-group-append">
								<span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
							</div>
						</div>
					</td>
					<td class="pb-4">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Tanggal Tiba" data-date-format="dd MM yyyy" id="datepicker-autoclose2" name="tanggal_tiba">
							<div class="input-group-append">
								<span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td class="pb-4">
						<div class="input-group">
							<input id="timepicker4" type="text" class="form-control" name="jam_berangkat">
							<div class="input-group-append">
								<span class="input-group-text"><i class="mdi mdi-clock"></i></span>
							</div>
						</div>
						<small>Jam Berangkat</small>
					</td>
					<td class="pb-4">
						<div class="input-group">
							<input id="timepicker2" type="text" class="form-control" name="jam_tiba">
							<div class="input-group-append">
								<span class="input-group-text"><i class="mdi mdi-clock"></i></span>
							</div>
						</div>
						<small>Jam Tiba</small>
					</td>
				</tr>

				<tr>
					<td class="pb-4"><input class="form-control" type="number" name="harga" placeholder="Harga Tiket" min="0"></td> 
					<td class="pb-4"><input class="form-control" type="number" name="kuota" placeholder="Kuota Tiket" min="0"></td>
				</tr>
				<tr>
					<td><input class="form-control" type="text" name="kode_pesawat" value="<?php echo $kd_ps; ?>"><small>Kode Pesawat (Otomatis)</small></td>
					<td><input class="form-control" type="text" name="kode_pesan" value="<?php echo $kd_pn; ?>"><small>Kode Pesan (Otomatis)</small></td>
				</tr>
			</table>
			<input class="btn btn-success" type="submit" name="tambahdata" value="Submit Data">
		</form>
	</div>

	<div class="col-md-12 mt-4">
		Referensi Data : <a href="https://id.wikipedia.org/wiki/Daftar_bandar_udara_tersibuk_di_Indonesia" target="_blank">Wikipedia</a>
	</div>

	<p class="h4 mt-4 bg-success col-md-12 text-white text-center">Data Jadwal Yang Sudah Ada</p>
	<div class="table-responsive">
		<table id="datatable" class="table table-bordered nowrap table-striped text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
			<thead class="table table-striped">
				<tr class="bg-soft-info bg-gradient">
					<th>ID Jadwal</th>
					<th>Maskapai</th>
					<th>Kode Pesawat</th>
					<th>Kelas Pesawat</th>
					<th>Berangkat Dari</th>
					<th>Tiba Di</th>
					<th>Kuota Tiket</th>
					<th>Harga Tiket</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				while ($datajadwal = mysqli_fetch_array($jadwal)){
				?>
				<tr class="table">
					<th scope="row" class="text-center"><p class="mt-4"><?php echo $datajadwal['id_jadwal']; ?></p></th>
					<td>
						<p class="mt-4"><?php echo "<img src='assets/images/maskapai/".$datajadwal['logo_maskapai'].".png' height='20'/>"; ?></p>
						<?php echo $datajadwal['nama_maskapai']; ?>
							
						</td>
					<td><p class="mt-4"><?php echo $datajadwal['kode_pesawat']; ?></p></td>
					<td><p class="mt-4"><?php echo $datajadwal['kelas']; ?></p></td>
					<td>
						<p><?php echo $datajadwal['bandara_berangkat']; ?></p>
						<p><?php echo $datajadwal['tgl_berangkat']; ?></p>
						<p>Jam : <?php echo $datajadwal['jam_berangkat']; ?></p>
					</td>
					<td>
						<p><?php echo $datajadwal['bandara_tiba']; ?></p>
						<p><?php echo $datajadwal['tgl_tiba']; ?></p>
						<p>Jam : <?php echo $datajadwal['jam_tiba']; ?></p>
					</td>
					<td><p class="mt-4"><?php echo $datajadwal['kuota']; ?></p></td>
					<td><p class="mt-4"><?php echo " Rp " . number_format($datajadwal['harga'],0,',','.');?>
					</p></td>
					<td><p class="mt-4"><a href="admin.php?nav=tambahjadwal&del=<?php echo $datajadwal['id_jadwal']; ?>" class="btn btn-danger">Hapus</a></p></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>