<?php 
# ================================================
# SESSION SECURITY
# ================================================
include "cek_sesi_users.php";
if($status_mk_sesi==0) die("Sesi Perkuliahan telah berakhir. Silahkan Logout dan Pilih kembali sesi perkuliahan yang aktif");

$id_chat = isset($_GET['id_chat']) ? $_GET['id_chat'] : die(erjx("id_chat"));
$cusername = isset($_GET['cusername']) ? $_GET['cusername'] : die(erjx("cusername"));
$cadmin_level = isset($_GET['cadmin_level']) ? $_GET['cadmin_level'] : die(erjx("cadmin_level"));

$id_chat_like = $username."_$id_chat";
$s = "INSERT INTO tb_chat_like 
(id_chat_like, like_by, id_chat) VALUES 
('$id_chat_like','$username','$id_chat')";
$q = mysqli_query($cn, $s);

die("1__");

?>