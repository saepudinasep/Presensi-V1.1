<?php 
# ================================================
# SESSION SECURITY
# ================================================
include "cek_sesi_users.php";

$id_chat = isset($_GET['id_chat']) ? $_GET['id_chat'] : die(erjx("id_chat"));
// $cusername = isset($_GET['cusername']) ? $_GET['cusername'] : die(erjx("cusername"));
$cadmin_level = isset($_GET['cadmin_level']) ? $_GET['cadmin_level'] : die(erjx("cadmin_level"));

$path_icons = "../img/icons";

$img_size="20px";
$img_delete_answer = "<img class='img_aksi' src='$path_icons/delete.png' height='$img_size'>";
$img_set_point_answer = "<img class='img_aksi' src='$path_icons/set_point_answer.png' height='$img_size'>";



$list_jawaban = "";

$s = "SELECT a.*, 
(SELECT nama_mhs FROM tb_mhs WHERE username=a.answer_by) as nama_answer_by_mhs, 
(SELECT nama_dosen FROM tb_dosen WHERE username=a.answer_by) as nama_answer_by_dosen, 
(SELECT admin_level FROM tb_user WHERE username=a.answer_by) as admlv 
FROM tb_chat_answer a 
WHERE a.id_chat=$id_chat";

$q = mysqli_query($cn,$s) or die(mysqli_error($cn));
if(mysqli_num_rows($q)){
	while ($d=mysqli_fetch_assoc($q)) {
		$answer_id = $d['answer_id'];
		$answer = $d['answer'];
		$answer_by = $d['answer_by'];
		$nama_answer_by_mhs = $d['nama_answer_by_mhs'];
		$nama_answer_by_dosen = $d['nama_answer_by_dosen'];
		$chat_point_answer = $d['chat_point_answer'];
		$admlv = $d['admlv'];

		# ================================================
		# BTN-AKSI HANDLER
		# ================================================
		$link_delete_answer = $cadmin_level==2 ? "<span class='btn_aksi' id='delete_answer__$answer_id'>$img_delete_answer</span>" : "";
		$link_set_point_answer = $cadmin_level==2 ? "<span class='btn_aksi' id='set_point_answer__$answer_id'>$img_set_point_answer</span>" : "";



		if($chat_point_answer=="") $chat_point_answer=0;
		$nama_answer_by = "$nama_answer_by_dosen$nama_answer_by_mhs";

		$li_sty = $answer_by==$username ? " style='padding: 5px; border: solid 1px #ccc; background: #ddf; margin: 5px 0; border-radius: 5px' " : "";

		if($admlv==2) $li_sty = " style='padding: 5px; border: solid 2px blue; background: #dfd; margin: 5px 0; border-radius: 5px' ";



		$list_jawaban.= "
		<li $li_sty>
		  <span class='abu'>
		    ~ <a href='?about&u=$answer_by' target='_blank'>$nama_answer_by</a> 
		    - <span>$chat_point_answer</span> poin $link_set_point_answer - 
		  </span>$answer $link_delete_answer
		</li>
		";

	}
}

die($id_chat."____$list_jawaban");

?>