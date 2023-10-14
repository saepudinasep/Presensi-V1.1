<?php 
$s = "SELECT password FROM tb_user WHERE username='$cusername'";
$q = mysqli_query($cn,$s) or die("Check password gagal. ".mysqli_error($cn));
if(mysqli_num_rows($q)==0) die("Check password return NULL.");
$d = mysqli_fetch_assoc($q);
$cpassword = $d['password'];
?>