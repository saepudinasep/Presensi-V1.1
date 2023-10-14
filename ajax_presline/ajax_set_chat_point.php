<?php 
# ================================================
# SESSION SECURITY :: DOSEN ONLY
# ================================================
include "cek_sesi_dosen.php";

if($status_mk_sesi==0) die("Sesi Perkuliahan telah berakhir. Silahkan Logout dan Pilih kembali sesi perkuliahan yang aktif");

$id_chat = isset($_GET['id_chat']) ? $_GET['id_chat'] : die(erjx("id_chat"));
$cusername = isset($_GET['cusername']) ? $_GET['cusername'] : die(erjx("cusername"));
$cadmin_level = isset($_GET['cadmin_level']) ? $_GET['cadmin_level'] : die(erjx("cadmin_level"));
$chat_point = isset($_GET['chat_point']) ? $_GET['chat_point'] : die(erjx("chat_point"));

if($cadmin_level!=2 or $admin_level!=2) die("Hanya dosen yang berhak set_point_chat.");

$s = "UPDATE tb_chat SET chat_point=$chat_point WHERE id_chat=$id_chat";
$q = mysqli_query($cn, $s) or die(mysqli_error($cn));

die("1__");

?>