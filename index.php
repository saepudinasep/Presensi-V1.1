<?php 
session_start();
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "";
$password_sama = 0;

include 'config.php';

# ========================================================================
# LOGIN PROCESS
# ========================================================================
$is_login=0;
$pesan_login="";
if (isset($_POST['username'])){ 
	$username = strip_tags($_POST['username']);
	$password = strip_tags($_POST['password']);

	$s = "SELECT a.admin_level,a.folder_uploads,  
	(SELECT nama_mhs FROM tb_mhs WHERE username=a.username) as nama_mhs,
	(SELECT nama_dosen FROM tb_dosen WHERE username=a.username) as nama_dosen 
	FROM tb_user a 
	WHERE username='$username' AND password='$password'";
	$q = mysqli_query($cn,$s) or die(mysqli_error($cn));
	if(mysqli_num_rows($q)==1){
		$d = mysqli_fetch_assoc($q);

		$admin_level = $d['admin_level'];
		$folder_uploads = $d['folder_uploads'];
		$nama_mhs = ucwords(strtolower($d['nama_mhs']));
		$nama_dosen = ucwords(strtolower($d['nama_dosen']));
		$jenis_user = $admin_level==2 ? "Dosen" : "Mahasiswa";
		$nama_user = $admin_level==2 ? $nama_dosen : $nama_mhs;


		$_SESSION['username'] = $username;
		$_SESSION['nama_user'] = $nama_user;
		$_SESSION['admin_level'] = $admin_level;
		$_SESSION['jenis_user'] = $jenis_user;
		$_SESSION['folder_uploads'] = $folder_uploads;

  }else{
  	$pesan_login = "Maaf, username dan password tidak cocok.";
  }

}
# ========================================================================
# END LOGIN PROCESS
# ========================================================================


# ========================================================================
# GET SESSION VARIABLES
# ========================================================================
include 'get_session.php';


if($pesan_login!="") $pesan_login = "<div class='alert alert-danger'>$pesan_login</div>";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PRESLINE</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<?php include 'styles.php'; ?>
</head>
<body>
	<div class="container">
		<div style="margin-top:15px">
			<span style="font-size: 24pt">PRESLINE</span>
			<span> ~ PRESENSI PERKULIAHAN ONLINE ~ PRODUK DOSEN</span><br>
			 <small>DETEKSI KEAKTIFAN MAHASISWA DAN PRESENSI PERKULIAHAN ONLINE DENGAN GAMIFIED CHAT-ROOMS APPS</small>
		</div>
		
		<hr>




		<?php if($is_login){ 

			# ===========================================================
			# BLOK WELCOME LOGGED USER
			# ===========================================================
			include 'welcome_logged_user.php';

			# ===========================================================
			# JIKA PASSWORD MASIH DEFAULT
			# ===========================================================
			if($password_sama){
				echo "
				<p class='red'>Password masih default.</p>
				<h2 class='rekom'>Ubah dulu password nya !!</h2>";
				include 'ubah_pass.php';
				exit();
			}




			# ===========================================================
			# INCLUDE JOIN SESI STYLES
			# ===========================================================
			include 'join_sesi/blok_chat__styles.php'; 


			# ===========================================================
			# JIKA BELUM PUNYA FOTO PROFIL
			# ===========================================================
			$path_folder = "uploads/$cfolder_uploads";
			$path_profile = "$path_folder/_profile.jpg";
			$punya_profil = file_exists($path_profile) ? 1 : 0;


			# ===========================================================
			# TAWARAN MENGUBAH PROFIL (OPSIONAL)
			# ===========================================================
			if($punya_profil){ 
				echo "
				<div id='blok_foto_saya' class='wadah text-center'>
					Foto Profile kamu:
					<div>
						<img src='$path_profile' class='foto_profil'>
					</div>
					<p><small class='abu'><a href='?'>Home</a> | Untuk mengubahnya silahkan <a href='?aksi=ubah_profil'>Replace</a> dengan foto baru!</small></p>
					<a class='btn btn-success btn-sm' href='join_sesi/'>Join Sesi</a>
				</div>
				";
			}


			if(!$punya_profil or $aksi=="ubah_profil"){
				# ===========================================================
				# JIKA PROFIL BELUM ADA ATAU REQUEST UBAH PROFIL
				# ===========================================================
				include 'upload_profil.php';
				exit;
			}


			# ===========================================================
			# BELUM MEMILIH MATA KULIAH
			# ===========================================================
			if(isset($_SESSION['id_mk'])){
				echo "belum memilih MK";
				exit;
			}


			# ===========================================================
			# READY TO JOIN PRESENSI
			# ===========================================================

		}else{ 

			# ===========================================================
			# BELUM LOGIN
			# ===========================================================
			include 'login.php';
		} ?>

	</div>

</body>
</html>