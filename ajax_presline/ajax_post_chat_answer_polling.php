<?php 
# ================================================
# SESSION SECURITY
# ================================================
include "cek_sesi_users.php";
if($status_mk_sesi==0) die("Sesi Perkuliahan telah berakhir. Silahkan Logout dan Pilih kembali sesi perkuliahan yang aktif");

$answer_by = isset($_GET['answer_by']) ? $_GET['answer_by'] : die(erjx("answer_by"));
$answer = isset($_GET['answer']) ? $_GET['answer'] : die(erjx("answer"));
$id_chat = isset($_GET['id_chat']) ? $_GET['id_chat'] : die(erjx("id_chat"));

$id_mk_sesi = isset($_SESSION['id_mk_sesi'])?$_SESSION['id_mk_sesi']:die(erjx("id_mk_sesi"));

$id_chat_answer_by = $id_chat."_$answer_by";

$s = "INSERT INTO tb_chat_answer 
(  answer,   id_chat,    answer_by ,id_chat_answer_by, chat_point_answer) VALUES 
('$answer','$id_chat', '$answer_by','$id_chat_answer_by', 10) ON DUPLICATE KEY UPDATE answer='$answer', chat_point_answer=chat_point_answer-1";
// die($s);
$q = mysqli_query($cn, $s) or die(mysqli_error($cn));

die("1__")

?>