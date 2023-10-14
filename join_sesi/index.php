<?php 
session_start();
// session_destroy(); exit();
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "";

if($aksi=="leave" and isset($_SESSION['id_mk_sesi'])){
	unset($_SESSION['id_mk_sesi']);
	echo "<script>location.replace('../')</script>";
	exit;
}



# =====================================================
# DATABASE CONNECTION
# =====================================================
require_once "../config.php";

# =====================================================
# GET SESSION VARIABLES
# =====================================================
include '../get_session.php';

# =====================================================
# WHEN SESSION LOST
# =====================================================
if (!isset($_SESSION['username'])){ 
	echo "<script>location.replace('../')</script>";
	echo "Waktu sesi telah habis.<hr><a href='../'>Relogin</a>";
	exit();
}

$path_profile = "../uploads/$cfolder_uploads/_profile.jpg";
if(!file_exists($path_profile)){
	header('location: ../');
	exit();
}

$title = $cadmin_level==2 ? "LecturePRESLINE v.1" : "StudentPRESLINE v.1";

# =====================================================
# INITIAL OPSI DOSEN VARIABLES
# =====================================================
$detik_toleransi_offline = 60; 
$jumlah_deleted_chat = 0;



# =====================================================
# STYLES GLOBAL
# =====================================================
include 'blok_chat__styles.php';


# =====================================================
# ID-MK SESSION
# =====================================================
$id_mk = isset($_SESSION['id_mk']) ? $_SESSION['id_mk'] : "";


# =====================================================
# DATABASE VARIABLES
# =====================================================
# =====================================================
# JUMLAH PESERTA TERDAFTAR
# =====================================================
if($id_mk!=""){
	$s = "SELECT a.username 
	FROM tb_kelas_peserta a 
	JOIN tb_kelas b ON a.id_kelas=b.id_kelas 
	JOIN tb_mk_kelas c ON b.id_kelas=c.id_kelas 
	JOIN tb_mk d ON d.id_mk=c.id_mk 
	WHERE d.id_mk = $id_mk";
	$q = mysqli_query($cn, $s) or die(mysqli_error($cn));
	$jumlah_mk_mhs = mysqli_num_rows($q);

	if($jumlah_mk_mhs==0) die("Belum ada list-peserta untuk id_mk:$id_mk.. atau list-kelas belum di-assign pada MK ini.<hr>Silahkan Anda <a href='?assign_peserta'>Assign Peserta</a> dahulu.");
}










# =====================================================
# MANAGE URI
# =====================================================
$a = $_SERVER['REQUEST_URI'];
if (!strpos($a, "?")) $a.="?";
if (!strpos($a, "&")) $a.="&";

$b = explode("?", $a);
$c = explode("&", $b[1]);
$parameter = $c[0];























































# ===========================================================
# HTML START
# ===========================================================
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?=$title?></title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script src="../js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/presline2.css">
</head>
<body bgcolor="#fcc">






	<div class="container" style="padding-top: 10px;">
		
		<?php 
		# ==============================================
		# GET-SESI-MK
		# ==============================================
		include '../get_session_sesi_mk.php';
		?>

		<h3><a href="../"><img class="img_zoom" src="../img/icons/home_presline.png" height="40px"></a> <span>Presline Session</span></h3>
		<p><a href="?aksi=leave" onclick="return confirm('Anda ingin leave sesi kuliah?')"><span class="link_fitur">Leave</span></a> | 
			Halo <?=$cnama_user ?>! Anda sedang Join Sesi: <?=$nama_mk_sesi ?></p>


		<div class="db_var">
			<?php var_dump($_SESSION); ?>
			<br>id_mk <input id="id_mk" value="<?=$id_mk?>">
			<br>cusername <input id="cusername" value="<?=$cusername?>">
			<br>cadmin_level <input id="cadmin_level" value="<?=$cadmin_level?>">
			<br>id_mk_sesi <input id="id_mk_sesi" value="<?=$id_mk_sesi?>">
			<br>durasi_kuliah <input id="durasi_kuliah" value="<?=$durasi_kuliah?>">
			<br>start_sesi_kuliah <input id="start_sesi_kuliah" value="<?=$start_sesi_kuliah?>">
			<br>stop_perkuliahan <input id="stop_perkuliahan" value="<?=$stop_perkuliahan?>">
		</div>

		<?php
		# ==============================================
		# INCLUDE PARAMETER CUSTOM-PAGE
		# ==============================================
		if($parameter!=""){
			if(file_exists("$parameter.php")){
				include "$parameter.php";
			}else{
				include 'na.php';
			}
			die("</div></body></html>");
		}else{

			# ==============================================
			# INCLUDE DEFAULT JOIN-SESI
			# ==============================================

			# ==============================================
			# MK INFO
			# ==============================================
			include 'blok_mk_info.php';

			if($cadmin_level==2){
				# ==============================================
				# AVATAR PESERTA MAHASISWA
				# ==============================================
				include 'blok_avatar_mhs.php';
			}

			$id_mk_sesi = isset($_SESSION['id_mk_sesi']) 
			? $_SESSION['id_mk_sesi'] : die("blok_chat :: id_mk_sesi not set.");

			# ================================================================
			# BLOK MY POINT
			# ================================================================
			include 'blok_my_point.php';

			# ================================================================
			# BLOK CHAT
			# ================================================================
			include 'blok_chat.php';
		}


		?>

	</div>

</body>
</html>
















































<?php if($cadmin_level==1){ ?>
	<!-- ================================================ -->
	<!-- ALL SET :: USERNAME & MK OK -->
	<!-- ================================================ -->
	<div class="blok_login_as">
		<table width="100%">
			<tr>
				<td>
					<a href="../" onclick="return confirm('Back to home?')">Home</a> | 
					Login as: <?=$cusername ?> :: Welcome <?=$cnama_user ?> !!
				</td>
				<td align="right">
					<small><i>Last Activity: <span id="last_time_activity">...</span></i></small>
				</td>
			</tr>
		</table>
	</div>


	<!-- ================================================ -->
	<!-- AUTO-UPDATE ONLINE-STATUS :: last_time_activity -->
	<!-- ================================================ -->
	<script type="text/javascript">
		$(document).ready(function(){
			var id_mk = $("#id_mk").val();
			var cusername = $("#cusername").val();
			var saat_ini;
			var detik_ini;
			var menit_ini;
			var jam_ini;
			var last_time_activity;
			var link_ajax = "../ajax_presline/ajax_update_last_time_activity.php?username="+cusername;

			const x = setInterval(function(){

				if(document.hidden) {
					//alert("Pastikan Page ini ini selalu aktif untuk mengupdate last_time_activity Anda. \n\nJika last_time_activity melebihi 60 detik maka Anda dianggap offline."); 
					return;}

				saat_ini = new Date();
				jam_ini = saat_ini.getHours();
				menit_ini = saat_ini.getMinutes();
				detik_ini = saat_ini.getSeconds();
				last_time_activity = jam_ini+":"+menit_ini+":"+detik_ini;

				$.ajax({
					url: link_ajax+"&last_time_activity="+last_time_activity,
					success: function(h){
						if(h.trim() == "1__"){
							$("#last_time_activity").text(last_time_activity);
							// alert("Sukses");
						}else{
							clearInterval(x);
							alert(h);
							return;
						}
					}
				})



			}, 2500);
		})

	</script>
	<?php } ?>