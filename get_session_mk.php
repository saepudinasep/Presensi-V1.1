<?php 
if(isset($_POST['btn_pilih_mk'])){
	$id_mk = $_POST['id_mk'];

	$_SESSION['id_mk'] = $id_mk;
	

}else{


	$options_mk = "";

	$s = "SELECT * FROM tb_mk ORDER BY nama_mk";
	$q = mysqli_query($cn, $s) or die(mysqli_error($cn));
	if(mysqli_num_rows($q)==0) die("Belum ada data MK pada database.");
	while ($d = mysqli_fetch_assoc($q)) {
		$id_mk = $d['id_mk'];
		$nama_mk = $d['nama_mk'];
		$options_mk .= "<option value='$id_mk'>$nama_mk</option>";
	}

	?>



	<p><small><a href="../logout.php">Logout</a> | Wellcome <?=$cnama_user ?>! Anda Login sebagai <span style="color: darkblue;"><?=$cjenis_user ?></span>. </small></p>
	<h4>Set Sesi Perkuliahan</h4>
	<p style="color:darkblue;">Silahkan Anda pilih dahulu sesi perkuliahan untuk Presensi hari ini.</p>


	<form method="post">
		
		<div class="form-group">
			<label>Mata Kuliah</label>
			<select class="form-control" id="id_mk" name="id_mk">
				<?=$options_mk ?>
			</select>
		</div>

		<div class="form-group">
			<button class="btn btn-primary btn-block" id="btn_pilih_mk" name="btn_pilih_mk" >Pilih MK</button>
		</div>
	</form>

	<div style="height:100px">&nbsp;</div>
<?php } ?>












