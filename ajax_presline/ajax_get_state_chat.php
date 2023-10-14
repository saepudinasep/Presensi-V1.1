<?php 
# ================================================
# SESSION SECURITY
# ================================================
include "cek_sesi_users.php";
$state_chats = "";

$id_mk_sesi = isset($_GET['id_mk_sesi']) ? $_GET['id_mk_sesi'] : die(erjx("id_mk_sesi"));

$s = "SELECT chat_point,
(SELECT COUNT(1) FROM tb_chat_like WHERE id_chat=a.id_chat) as jumlah_likes,
(SELECT COUNT(1) FROM tb_chat_answer WHERE id_chat=a.id_chat) as count_answer,  
(SELECT SUM(chat_point_answer) FROM tb_chat_answer WHERE id_chat=a.id_chat) as sum_point_answer   

FROM tb_chat a 
WHERE id_mk_sesi=$id_mk_sesi 
AND status_chat = 1 
ORDER BY id_chat";
$q = mysqli_query($cn, $s) or die(mysqli_error($cn));

if(mysqli_num_rows($q)){
	while ($d = mysqli_fetch_assoc($q)) {
		$chat_point = $d['chat_point'];
		$jumlah_likes = $d['jumlah_likes'];
		$count_answer = $d['count_answer'];
		$sum_point_answer = $d['sum_point_answer'];

		# ================================================
		# STATE CHAT UNTUK PERUBAHAN POIN/LIKES/ANSWERS
		# ================================================
		# 1. POINTS
		# 2. LIKES
		# 3. COUNT_ANSWER
		# 4. sum_point_answer
		# ================================================
		if($chat_point=="") $chat_point=0;
		if($sum_point_answer=="") $sum_point_answer=0;
		$state_chat = "$chat_point~$jumlah_likes~$count_answer~$sum_point_answer";
		$state_chats.= "$state_chat;";

	}
}

die($state_chats);

?>