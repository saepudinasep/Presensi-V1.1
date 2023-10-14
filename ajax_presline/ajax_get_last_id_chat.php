<?php 
# ================================================
# SESSION SECURITY
# ================================================
include "cek_sesi_users.php";

$id_mk_sesi = isset($_GET['id_mk_sesi']) ? $_GET['id_mk_sesi'] : die(erjx("id_mk_sesi"));



$s = "SELECT id_chat from tb_chat 
WHERE id_mk_sesi='$id_mk_sesi' 
AND status_chat=1 
ORDER BY id_chat DESC LIMIT 1";

	// die($s);

$q = mysqli_query($cn, $s) or die(mysqli_error($cn));
$jumlah_rows = mysqli_num_rows($q);

if($jumlah_rows!=1) die("No data chat detected.");

$d = mysqli_fetch_assoc($q);
$id_chat = $d['id_chat'];
die($id_chat);

?>