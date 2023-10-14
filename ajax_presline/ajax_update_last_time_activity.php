<?php 
# ================================================
# SESSION SECURITY
# ================================================
include "cek_sesi_mhs.php";

$username = isset($_GET['username']) ? $_GET['username'] : die(erjx("username"));
$last_time_activity = isset($_GET['last_time_activity']) ? $_GET['last_time_activity'] : die(erjx("last_time_activity"));
$s = "UPDATE tb_user 
SET last_time_activity = '$last_time_activity' 
WHERE username='$username'";

// die($s);

$q = mysqli_query($cn, $s) or die(mysqli_error($cn));

die("1__")

?>