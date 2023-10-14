<?php 
# ================================================
# SESSION SECURITY :: DOSEN ONLY
# ================================================
include "cek_sesi_dosen.php";

if($status_mk_sesi==0) die("Sesi Perkuliahan telah berakhir. Silahkan Logout dan Pilih kembali sesi perkuliahan yang aktif");

$answer_id = isset($_GET['answer_id']) ? $_GET['answer_id'] : die(erjx("answer_id"));
$cusername = isset($_GET['cusername']) ? $_GET['cusername'] : die(erjx("cusername"));
$cadmin_level = isset($_GET['cadmin_level']) ? $_GET['cadmin_level'] : die(erjx("cadmin_level"));
$chat_point_answer = isset($_GET['chat_point_answer']) ? $_GET['chat_point_answer'] : die(erjx("chat_point_answer"));

if($cadmin_level!=2 or $admin_level!=2) die("Hanya dosen yang berhak set_point_chat.");

$s = "UPDATE tb_chat_answer SET chat_point_answer=$chat_point_answer WHERE answer_id=$answer_id";
$q = mysqli_query($cn, $s) or die(mysqli_error($cn));

die("1__");

?>