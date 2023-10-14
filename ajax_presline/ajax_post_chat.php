<?php 
# ================================================
# SESSION SECURITY
# ================================================
include "cek_sesi_users.php";

if($status_mk_sesi==0) die("Sesi Perkuliahan telah berakhir. Silahkan Logout dan Pilih kembali sesi perkuliahan yang aktif");

$chat_by = isset($_GET['u']) ? $_GET['u'] : die(erjx("u"));
$isi_chat = isset($_GET['isi_chat']) ? $_GET['isi_chat'] : die(erjx("isi_chat"));
$chat_type = isset($_GET['chat_type']) ? $_GET['chat_type'] : die(erjx("chat_type"));
$chat_opsi = isset($_GET['chat_opsi']) ? $_GET['chat_opsi'] : die(erjx("chat_opsi"));
$durasi_jawab = isset($_GET['durasi_jawab']) ? $_GET['durasi_jawab'] : die(erjx("durasi_jawab"));

$id_mk_sesi = isset($_SESSION['id_mk_sesi'])?$_SESSION['id_mk_sesi']:die(erjx("id_mk_sesi"));

$id_chat_type = 1;
if($chat_type=="tanyakan") $id_chat_type = 2; 
if($chat_type=="make_poll") $id_chat_type = 3; 

$chat_opsi = $chat_opsi==""?"NULL":"'$chat_opsi'";
$durasi_jawab = $durasi_jawab>0 ? "'$durasi_jawab'" : "NULL";

$s = "INSERT INTO tb_chat 
(  id_chat_type,   isi_chat,    chat_by,    id_mk_sesi,  chat_opsi, durasi_jawab) VALUES 
('$id_chat_type','$isi_chat', '$chat_by', '$id_mk_sesi', $chat_opsi,$durasi_jawab)";

// die($s);

$q = mysqli_query($cn, $s) or die(mysqli_error($cn));

die("1__")

?>