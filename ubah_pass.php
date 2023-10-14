<?php
$err_upas = ""; 
$pass_lama = ""; 
$pass_baru = ""; 
$pass_baru2 = ""; 
if(isset($_POST['btn_ubah_pass'])){
	$pass_lama = $_POST['pass_lama'];
	$pass_baru = $_POST['pass_baru'];
	$pass_baru2 = $_POST['pass_baru2'];


	# ===========================================================
	# VALIDASI UBAH PASSWORD
	# ===========================================================
	if($pass_lama!=$cpassword) {$err_upas = "Password lama tidak sama dengan database.";}
	elseif($pass_baru!=$pass_baru2) {$err_upas = "Password baru tidak match.";}
	elseif(strlen($pass_baru)<6 or strlen($pass_baru)>20) $err_upas = "Panjang password harus antara 6 s.d 20 karakter!";

	# ===========================================================
	# QUERY UBAH PASSWORD
	# ===========================================================
	$s = "UPDATE tb_user SET password='$pass_baru' WHERE username='$cusername'";
	$q = mysqli_query($cn,$s) or die("gagal mengubah password. ".mysqli_error($cn));

	if($q){
		echo "
		<div class='alert alert-success'>
		  <h2>Ubah password berhasil !</h2><hr>Harap dicatat agar tidak lupa.<hr>
		  <a href='index.php' class='btn btn-primary'>OK</a>
		</div>
		";
		// echo "<script>alert('Ubah password berhasil.\n\nHarap dicatat agar tidak lupa.')</script>";
		// header("location: index.php");
		exit;
	}


}



if($err_upas!="") $err_upas = "<p class='alert alert-danger'>$err_upas</p>";
echo "$err_upas";
?>

<form method="post">

	<div class="form-group">
		<label>Password Lama</label>
		<input type="password" required="" minlength="3" maxlength="20" name="pass_lama" class="form-control" value="<?=$pass_lama?>">
	</div>

	<div class="form-group">
		<label>Password Baru</label>
		<input type="password" required="" minlength="6" maxlength="20" name="pass_baru" class="form-control" value="<?=$pass_baru?>">
	</div>

	<div class="form-group">
		<label>Konfirmasi Password</label>
		<input type="password" required="" minlength="6" maxlength="20" name="pass_baru2" class="form-control" value="<?=$pass_baru2?>">
	</div>

	<div class="form-group">
		<button name="btn_ubah_pass">Ubah Password</button>
	</div>
</form>