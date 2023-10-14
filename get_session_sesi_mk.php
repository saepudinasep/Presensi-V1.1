<?php 
// if($parameter=="manage_mk"){include 'manage_mk.php';exit;}

if(!isset($_SESSION['id_mk'])){
	include 'get_session_mk.php';
	exit;
}else{
	$id_mk = $_SESSION['id_mk'];
}




$nama_mk_sesi = "";
if (isset($_SESSION['id_mk_sesi'])){ 
	# =====================================================
	# SESSION MK DAN SESI-MK TELAH SIAP 
	# =====================================================
	$id_mk_sesi = $_SESSION['id_mk_sesi'];

	# =====================================================
	# DATA MK dan MK-SESI-PERKULIAHAN 
	# =====================================================
	$s = "SELECT 
	a.*,
	b.kode_mk, 
	b.singkatan_mk, 
	b.nama_mk 
	FROM tb_mk_sesi a 
	JOIN tb_mk b ON a.id_mk=b.id_mk WHERE a.id_mk_sesi='$id_mk_sesi'";
	$q = mysqli_query($cn, $s) or die(mysqli_error($cn));
	if(mysqli_num_rows($q)==0) die("id_mk:$id_mk tidak ditemukan pada database.");
	$d = mysqli_fetch_assoc($q);
	$kode_mk = $d['kode_mk'];
	$singkatan_mk = $d['singkatan_mk'];
	$nama_mk = $d['nama_mk'];
	$nama_mk_sesi = $d['nama_mk_sesi'];

	$status_mk_sesi = $d['status_mk_sesi'];
	$durasi_kuliah = $d['durasi_kuliah'];
	$start_sesi_kuliah = $d['start_sesi_kuliah'];
	$stop_perkuliahan = $d['stop_perkuliahan'];
	# =====================================================

	$_SESSION['status_mk_sesi'] = $status_mk_sesi;
	# =====================================================


}else{

	# =====================================================
	# NOT ISSET SESI-MK 
	# =====================================================



	# =====================================================
	# USER MENGKLIK PILIH SESI
	# =====================================================
	if(isset($_POST['btn_pilih_sesi'])){
		// $id_mk = $_POST['id_mk'];
		$id_mk_sesi = $_POST['id_mk_sesi'];

		$s = "SELECT status_mk_sesi FROM tb_mk_sesi WHERE id_mk_sesi='$id_mk_sesi'";
		$q = mysqli_query($cn,$s) or die(mysqli_error($cn));
		if(mysqli_num_rows($q)!=1) die("status_mk_sesi tidak ditemukan");
		$d = mysqli_fetch_assoc($q);
		$status_mk_sesi = $d['status_mk_sesi'];
		$_SESSION['id_mk'] = $id_mk;
		$_SESSION['id_mk_sesi'] = $id_mk_sesi;
		$_SESSION['status_mk_sesi'] = $status_mk_sesi;
		echo "<div class='alert alert-success'>Sesi Perkuliahan telah terpilih.<hr>~ id_mk: $id_mk<br>~ id_mk_sesi: $id_mk_sesi<hr><a href='index.php' class='btn btn-primary'>Next to Join Presensi</a></div>";
		echo "<script>location.replace('index.php')</script>";
		exit;
	}

	if(isset($_POST['btn_join_sesi'])){
		$id_mk_sesi = $_POST['btn_join_sesi'];
		echo "<pre>";
		echo var_dump($_SESSION);
		echo "</pre>";

		// exit;

		$s = "SELECT status_mk_sesi FROM tb_mk_sesi WHERE id_mk_sesi='$id_mk_sesi'";
		$q = mysqli_query($cn,$s) or die(mysqli_error($cn));
		if(mysqli_num_rows($q)!=1) die("status_mk_sesi tidak ditemukan");
		$d = mysqli_fetch_assoc($q);
		$status_mk_sesi = $d['status_mk_sesi'];
		$_SESSION['id_mk_sesi'] = $id_mk_sesi;
		$_SESSION['status_mk_sesi'] = $status_mk_sesi;
		echo "<div class='alert alert-success'>Sesi Perkuliahan telah terpilih.<hr>~ id_mk: $id_mk<br>~ id_mk_sesi: $id_mk_sesi<hr><a href='index.php' class='btn btn-primary'>Next to Join Presensi</a></div>";
		// echo "<script>location.replace('index.php')</script>";
		exit;
	}


	# =====================================================
	# TAMPILAN AWAL MEMILIH SESI-MK
	# =====================================================
	$list_mk_sesi = "";

	$s = "SELECT a.*, c.nama_dosen as nama_pengajar   
	FROM tb_mk_sesi a 
	JOIN tb_user b ON a.dosen_pengajar=b.username 
	JOIN tb_dosen c ON b.username=c.username 
	WHERE a.id_mk='$id_mk'
	ORDER BY a.no_subject
	";
	$q = mysqli_query($cn,$s) or die("id_mk:$id_mk tidak ditemukan. ".mysqli_error($cn));
	if(mysqli_num_rows($q)==1) die("Belum ada Sesi-MK pada MK ini.");
	while ($d = mysqli_fetch_assoc($q)) {
		$id_mk_sesi = $d['id_mk_sesi'];
		$no_subject = $d['no_subject'];
		$nama_mk_sesi = $d['nama_mk_sesi'];
		$nama_pengajar = $d['nama_pengajar'];
		$status_mk_sesi = $d['status_mk_sesi'];

		if($status_mk_sesi!=-2){
			$btn_join_sesi = "Undefined.";
			if($status_mk_sesi==0) {$btn_join_sesi = "<button name='btn_join_sesi' value='$id_mk_sesi' class='btn btn-danger btn-sm btn-block' disabled>Berakhir</button>";}
			elseif($status_mk_sesi==1) {$btn_join_sesi = "<button name='btn_join_sesi' value='$id_mk_sesi' class='btn btn-primary btn-sm btn-block'>Join Sesi</button>";}
			elseif($status_mk_sesi==-1) {$btn_join_sesi = "<button name='btn_join_sesi' value='$id_mk_sesi' class='btn btn-warning btn-sm btn-block' onclick='return confirm(\"Kamu ingin masuk ke sesi yang belum dimulai oleh dosen?\")'>Belum Mulai</button>";}
			else{ die("status_mk_sesi: $status_mk_sesi undefined.");}

			$btn_leaderboard = "";
			if($cadmin_level==2) $btn_leaderboard = "<a href='?hapus_mk_sesi&id_mk_sesi=$id_mk_sesi' class='btn btn-danger btn-sm btn-block'>Hapus</a>";
			if($status_mk_sesi==0) $btn_leaderboard = "<a href='?leaderboard&id_mk_sesi=$id_mk_sesi' class='btn btn-success btn-sm btn-block'>Leaderboard</a>";

			$list_mk_sesi .= "
			<div class='row bg_abu2 row_list_mk_sesi'>
				<div class='col-lg-4 point_list'>
					<span class='link_fitur'>$no_subject</span> ~ <span class='link_fitur'>$nama_mk_sesi</span>
				</div>
				<div class='col-lg-4 abu2'>
					<div style='margin:5px 0'>Pengajar: <span class='link_fitur'>$nama_pengajar</span> | <span>11 Juni 2022</span> </div>
				</div>
				<div class='col-lg-4'>
					<div class='row'>
						<div class='col-6'>
							$btn_join_sesi
						</div>
						<div class='col-6'>
							$btn_leaderboard
						</div>
					</div>
				</div>
			</div>
			";
		}
	}

	?>


	<p><small><a href="../logout.php">Logout</a> | Wellcome <?=$cnama_user ?>! Anda Login sebagai <span style="color: darkblue;"><?=$cjenis_user ?></span>. </small></p>
	<h4>Set Sesi Perkuliahan</h4>
	<p style="color:darkblue;">Silahkan Anda pilih dahulu sesi perkuliahan untuk Presensi hari ini.</p>


	<form method="post">

		<div class="wadah" id="list_sesi_kuliah">

			<?=$list_mk_sesi ?>

			<?php if($cadmin_level==2){
				echo "
				<div class='row_list_mk_sesi'>
					<button class='btn btn-success btn-sm'>Tambah Sesi</button>
				</div>
				";
			} ?>

		</div>
	</form>

	<div style="height:100px">&nbsp;</div>







<?php exit(); } ?>