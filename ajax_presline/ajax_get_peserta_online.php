<?php 
# ================================================
# SESSION SECURITY
# ================================================
include "cek_sesi_dosen.php";
$detik_toleransi_offline = 60;

$id_mk = isset($_GET['id_mk']) ? $_GET['id_mk'] : die(erjx("id_mk"));



$s = "SELECT 

b.username,
f.nama_mhs,
f.nama_panggilan,
b.folder_uploads,

TIME_TO_SEC(TIMEDIFF(CURTIME(), b.last_time_activity)) as beda_detik 


FROM tb_kelas_peserta a 
JOIN tb_user b ON a.username=b.username 
JOIN tb_kelas c ON a.id_kelas=c.id_kelas 
JOIN tb_mk_kelas d ON c.id_kelas=d.id_kelas 
JOIN tb_mk e ON d.id_mk=e.id_mk 
JOIN tb_mhs f ON b.username=f.username 
WHERE e.id_mk= $id_mk 
ORDER BY f.nama_mhs 
";

	// die($s);

$q = mysqli_query($cn, $s) or die(mysqli_error($cn));
$jumlah_mk_mhs = mysqli_num_rows($q);
$jumlah_mhs_online = 0;

if($jumlah_mk_mhs){
	$img_mhs = "";
	$i=0;
	while ($d=mysqli_fetch_assoc($q)) {
		$i++;
		$username = $d['username'];
		$nama_mhs = ucwords(strtolower($d['nama_mhs']));
		$nama_panggilan = ucwords(strtolower($d['nama_panggilan']));
		$folder_uploads = $d['folder_uploads'];
		$beda_detik = $d['beda_detik'];

		// $nama_panggilan = $nama_panggilan=="" ? substr($nama_mhs, 0,10) : $nama_panggilan;
		$nama_panggilan = $nama_mhs;

		$x = "../uploads/$folder_uploads/_profile.jpg";
		$y = "../img/icons/student.png";
		$img_profil_filename = file_exists($x) ? $x : $y;

		//debug
		// $img_profil_filename = $x;

		$not_online = ($beda_detik >= 0 and $beda_detik < $detik_toleransi_offline and $beda_detik!=null) ? "" : "not_online";
		if($not_online=="") $jumlah_mhs_online++;
		$img_profil = "<img class='img_profil $not_online' src='$img_profil_filename' height='50px'>";
		$link_mhs_about = "
		<a href='../../about/about_mhs.php?username=$username' target='_blank'>
		$nama_panggilan <br>$beda_detik
		</a>";

		$div_img_profil = "<div class='mhs_avatar text-center'>$img_profil<br><p class='mhs_label'>$link_mhs_about</p></div>";
		$img_mhs .= $div_img_profil;

	}
}

die("1__".$jumlah_mhs_online."__".$img_mhs);

?>