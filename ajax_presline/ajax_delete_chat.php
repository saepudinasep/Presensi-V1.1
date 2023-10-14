<?php 
# ================================================
# SESSION SECURITY
# ================================================
include "cek_sesi_users.php";

if($status_mk_sesi==0) die("Sesi Perkuliahan telah berakhir. Silahkan Logout dan Pilih kembali sesi perkuliahan yang aktif");


$id_chat = isset($_GET['id_chat']) ? $_GET['id_chat'] : die(erjx("id_chat"));
$cusername = isset($_GET['cusername']) ? $_GET['cusername'] : die(erjx("cusername"));
$cadmin_level = isset($_GET['cadmin_level']) ? $_GET['cadmin_level'] : die(erjx("cadmin_level"));

$s = "SELECT chat_by FROM tb_chat WHERE id_chat=$id_chat";
$q = mysqli_query($cn, $s) or die(mysqli_error($cn));
if(mysqli_num_rows($q)==0) die("id_chat:$id_chat tidak ada.");
$d=mysqli_fetch_assoc($q);
$chat_by=$d['chat_by'];

$is_own_chat = $chat_by==$cusername ? 1 : 0;
$status_chat = $is_own_chat ? 0 : -1;

// die("username:$username 
// 	\nchat_by:$chat_by 
// 	\nis_own_chat:$is_own_chat 
// 	\nstatus_chat:$status_chat 
// 	\ncusername:$cusername 
// 	\ncadmin_level:$cadmin_level");

if(!$is_own_chat and $cadmin_level==1) die("Hanya dosen yang berhak menghapus chat mahasiswa lain.");


$s = "UPDATE tb_chat SET status_chat=$status_chat WHERE id_chat=$id_chat";
$q = mysqli_query($cn, $s) or die(mysqli_error($cn));

die("1__");

?>