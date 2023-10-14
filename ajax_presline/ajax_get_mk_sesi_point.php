<?php 
# ================================================
# SESSION SECURITY
# ================================================
include "cek_sesi_users.php";

$id_mk_sesi = isset($_GET['id_mk_sesi']) ? $_GET['id_mk_sesi'] : die(erjx("id_mk_sesi"));

$pengali_jumlah_likes = 1; //zzz debug

$s = "SELECT 
a.username,
a.poin_presensi,
b.nama_mhs,
COALESCE((
	SELECT SUM(chat_point) FROM tb_chat 
	WHERE chat_by=a.username 
	AND status_chat=1 
	AND id_mk_sesi='$id_mk_sesi'),0) as sum_chat_point, 
COALESCE((
	SELECT COUNT(1) FROM tb_chat_like c  
	JOIN tb_chat d ON c.id_chat=d.id_chat 
	WHERE d.chat_by=a.username 
	AND d.status_chat=1 
	AND d.id_mk_sesi='$id_mk_sesi'),0)*$pengali_jumlah_likes as likes_point, 
COALESCE((
	SELECT SUM(b.chat_point_answer) FROM tb_chat_answer b 
	JOIN tb_chat c ON b.id_chat=c.id_chat 
	WHERE c.id_mk_sesi='$id_mk_sesi'  
	AND b.answer_by=a.username  
	AND c.status_chat=1 
	),0) as sum_chat_point_answer,
    
COALESCE((
	SELECT SUM(chat_point) FROM tb_chat 
	WHERE chat_by=a.username 
	AND status_chat=1 
	AND id_mk_sesi='$id_mk_sesi'),0) +  
COALESCE((
	SELECT COUNT(1) FROM tb_chat_like c  
	JOIN tb_chat d ON c.id_chat=d.id_chat 
	WHERE d.chat_by=a.username 
	AND d.status_chat=1 
	AND d.id_mk_sesi='$id_mk_sesi'),0) * $pengali_jumlah_likes +  
COALESCE((
	SELECT SUM(b.chat_point_answer) FROM tb_chat_answer b 
	JOIN tb_chat c ON b.id_chat=c.id_chat 
	WHERE c.id_mk_sesi='$id_mk_sesi'  
	AND b.answer_by=a.username  
	AND c.status_chat=1 
	),0)+a.poin_presensi as sum_all 

FROM tb_presensi a 
JOIN tb_mhs b ON a.username=b.username 
WHERE a.id_mk_sesi ='$id_mk_sesi' 
ORDER BY sum_all DESC
";

// die($s);
$q = mysqli_query($cn, $s) or die(mysqli_error($cn));
$jumlah_hadir = mysqli_num_rows($q);
if($jumlah_hadir == 0) die("Tidak ada yang hadir pada id_mk_sesi:$id_mk_sesi<hr>$s");

$my_rank=0;
$usernames="";
$namas="";
$values="";
$my_point=0;
$i=0;
while ($d=mysqli_fetch_assoc($q)) {
	$i++;
	$dusername = $d['username'];
	$dnama_mhs = $d['nama_mhs'];
	// $poin_presensi = $d['poin_presensi'];
	// $sum_chat_point = $d['sum_chat_point'];
	// $likes_point = $d['likes_point'];
	// $sum_chat_point_answer = $d['sum_chat_point_answer'];
	$sum_all = $d['sum_all'];


	if($dusername==$username) {$my_rank = $i;}
	if($dusername==$username) {$my_point = $sum_all;}

	$usernames.="$dusername;";
	$values.="$sum_all;";
	$namas.="$dnama_mhs;";
	// if($i>=5) break;
}

$arr_sum = array_sum(explode(";",$values));

die($my_point."__$my_rank"."__$jumlah_hadir"."__$usernames"."__$values"."__$arr_sum"."__$namas");


?>