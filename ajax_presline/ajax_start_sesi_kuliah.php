<?php 
# ================================================
# SESSION SECURITY
# ================================================
include "cek_sesi_users.php";

$id_mk = isset($_SESSION['id_mk']) ? $_SESSION['id_mk'] : die(erjx("id_mk"));
$id_mk_sesi = isset($_SESSION['id_mk_sesi']) ? $_SESSION['id_mk_sesi'] : die(erjx("id_mk_sesi"));
$durasi_kuliah = isset($_GET['durasi_kuliah']) ? $_GET['durasi_kuliah'] : die(erjx("durasi_kuliah"));

if($admin_level==2){
	$s = "UPDATE tb_mk_sesi SET durasi_kuliah='$durasi_kuliah', start_sesi_kuliah=CURRENT_TIMESTAMP,status_mk_sesi=1 WHERE id_mk_sesi='$id_mk_sesi'
	";
	$q = mysqli_query($cn, $s) or die(mysqli_error($cn));
	$_SESSION['status_mk_sesi'] = 1;

	die("1__");
}elseif($admin_level==1){


	if($status_mk_sesi!=1) die("Perkuliahan belum dimulai. Tunggu hingga dosen melakukan Start.");

	# =====================================================
	# HITUNG POIN PRESENSI UNTUK MHS 
	# =====================================================

	# =====================================================
	# DATA MK dan MK-SESI-PERKULIAHAN 
	# =====================================================
	$s = "SELECT * FROM tb_mk_sesi a WHERE a.id_mk_sesi='$id_mk_sesi'";
	$q = mysqli_query($cn, $s) or die(mysqli_error($cn));
	if(mysqli_num_rows($q)==0) die("id_mk:$id_mk tidak ditemukan pada database.");
	$d = mysqli_fetch_assoc($q);

	$durasi_kuliah = $d['durasi_kuliah'];
	$start_sesi_kuliah = $d['start_sesi_kuliah'];
	$stop_perkuliahan = $d['stop_perkuliahan'];
	# =====================================================

	$poin_presensi = 0;
	$max_point_presensi = 1000;
	$min_point_presensi = 100;

	$detik_berlangsung = strtotime(date("Y-m-d H:i:s")) - strtotime($start_sesi_kuliah);

	$jam_durasi_kuliah = date("H",strtotime($durasi_kuliah));
	$menit_durasi_kuliah = date("i",strtotime($durasi_kuliah));
	$detik_durasi_kuliah = date("s",strtotime($durasi_kuliah));

	$detik_sisa = $jam_durasi_kuliah*3600+$menit_durasi_kuliah*60+$detik_durasi_kuliah - $detik_berlangsung;

	$timer_hour = intval($detik_sisa/3600);
	$timer_min = intval(($detik_sisa % 3600)/60);
	$timer_sec = intval($detik_sisa % 60);

	if($timer_hour<0) $timer_hour=0;
	if($timer_min<0) $timer_min=0;
	if($timer_sec<0) $timer_sec=0;

	if($timer_hour==0 and $timer_min==0 and $timer_sec==0){
		$status_mk_sesi=0; //berakhir
		$poin_presensi=0;

		die("Wah maaf, sepertinya sesi perkuliahan sudah berakhir.");
	}else{
		$poin_presensi = $max_point_presensi-($detik_berlangsung-600)*9/30;
		// die("$poin_presensi");
		if($poin_presensi>$max_point_presensi) $poin_presensi=$max_point_presensi;
		if($poin_presensi<$min_point_presensi) $poin_presensi=$min_point_presensi;
	}



	# =====================================================
	# SAYA ABSEN 
	# =====================================================
	$id_presensi = $id_mk_sesi."_$username";
	$s = "INSERT INTO tb_presensi 
	(id_presensi, id_mk_sesi, username, poin_presensi) VALUES 
	('$id_presensi', '$id_mk_sesi', '$username',  '$poin_presensi')
	";

	// die("$s<hr>
	// 	timer_hour:$timer_hour\n
	// 	timer_min:$timer_min\n
	// 	timer_sec:$timer_sec\n
	// 	poin_presensi:$poin_presensi\n
	// 	");

	$q = mysqli_query($cn, $s) or die(mysqli_error($cn));

	die("1__");
}


?>