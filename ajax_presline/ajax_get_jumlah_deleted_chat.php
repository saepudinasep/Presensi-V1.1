<?php 
# ================================================
# SESSION SECURITY
# ================================================
include "cek_sesi_users.php";

$id_mk_sesi = isset($_GET['id_mk_sesi']) ? $_GET['id_mk_sesi'] : die(erjx("id_mk_sesi"));
$id_chats = "";

$s = "SELECT id_chat FROM tb_chat WHERE status_chat!=1 AND id_mk_sesi='$id_mk_sesi'";
$q = mysqli_query($cn, $s) or die(mysqli_error($cn));
$jumlah_deleted_chat = mysqli_num_rows($q);
if($jumlah_deleted_chat){
	while ($d=mysqli_fetch_assoc($q)) {
		$id_chat=$d['id_chat'];
		$id_chats.="$id_chat;";
	}
}
die("$jumlah_deleted_chat"."__$id_chats");
?>