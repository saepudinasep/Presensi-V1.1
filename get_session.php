<?php 
if (isset($_SESSION['username'])){ 
	$is_login = 1;
	$cusername = $_SESSION['username'];
	$cnama_user = $_SESSION['nama_user'];
	$cadmin_level = $_SESSION['admin_level'];
	$cjenis_user = $_SESSION['jenis_user'];
	$cfolder_uploads = $_SESSION['folder_uploads'];

	# ========================================================================
	# WAJIB UBAH DEFAULT PASSWORD
	# ========================================================================
	include 'get_current_pass.php';
	if ($cusername == $cpassword)	$password_sama=1;
}
?>