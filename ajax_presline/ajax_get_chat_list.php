<?php 
# ================================================
# SESSION SECURITY
# ================================================
include "cek_sesi_users.php";

$id_mk_sesi = isset($_GET['id_mk_sesi']) ? $_GET['id_mk_sesi'] : die(erjx("id_mk_sesi"));
$last_id_chat = isset($_GET['last_id_chat']) ? $_GET['last_id_chat'] : die(erjx("last_id_chat"));
$cusername = isset($_GET['cusername']) ? $_GET['cusername'] : die(erjx("cusername"));
$cadmin_level = isset($_GET['cadmin_level']) ? $_GET['cadmin_level'] : die(erjx("cadmin_level"));

$waktu_habis = "<div style='color:red; text-align:center'><i>Waktu habis.</i></div>";

# ================================================
# CREATE ALL ID-CHATS
# ================================================
$id_chats = "";
$s = "SELECT id_chat FROM tb_chat WHERE id_mk_sesi=$id_mk_sesi AND status_chat = 1 ORDER BY id_chat";
// die($s);
$q = mysqli_query($cn,$s) or die(mysqli_error($cn));
if(mysqli_num_rows($q)){
	while ($d=mysqli_fetch_assoc($q)) {
		$id_chat = $d['id_chat'];
		$id_chats.="$id_chat;";
	}
}


# ================================================
# CREATE LIST-CHATS
# ================================================
$chat_list = "";
$path_icons = "../img/icons";

$img_student = "<img class='img_profil' src='$path_icons/student.png' height='50px'>";
$img_student_p = "<img class='img_profil' src='$path_icons/student_p.png' height='50px'>";

$img_size="20px";
$img_delete = "<img class='img_aksi' src='$path_icons/delete.png' height='$img_size'>";
$img_medal = "<img class='img_aksi' src='$path_icons/medal.png' height='$img_size'>";
$img_like = "<img class='img_aksi' src='$path_icons/like.png' height='$img_size'>";
$img_reply = "<img class='img_aksi' src='$path_icons/reply.png' height='$img_size'>";
$img_set_point = "<img class='img_aksi' src='$path_icons/set_point.png' height='$img_size'>";
$img_set_point_answer = "<img class='img_aksi' src='$path_icons/set_point_answer.png' height='$img_size'>";

$img_raise_hand = "<img class='img_aksi' src='$path_icons/raise_hand.png' height='$img_size'>";
$img_chat = "<img class='img_aksi' src='$path_icons/chat.png' height='$img_size'>";
$img_polling = "<img class='img_aksi' src='$path_icons/polling.png' height='$img_size'>";
$img_tf = "<img class='img_aksi' src='$path_icons/tf.png' height='$img_size'>";
$img_pg = "<img class='img_aksi' src='$path_icons/pg.png' height='$img_size'>";
$img_images = "<img class='img_aksi' src='$path_icons/images.png' height='$img_size'>";

$img_chat_type[1] = "";
$img_chat_type[2] = $img_raise_hand;
$img_chat_type[3] = $img_polling;
$img_chat_type[4] = $img_tf;
$img_chat_type[5] = $img_pg;
$img_chat_type[6] = $img_images;


$s = "SELECT a.*,
b.admin_level,
b.folder_uploads,
(SELECT nama_mhs FROM tb_mhs WHERE username=a.chat_by) as nama_mhs, 
(SELECT gender FROM tb_mhs WHERE username=a.chat_by) as gender, 
(SELECT nama_dosen FROM tb_dosen WHERE username=a.chat_by) as nama_dosen,
(SELECT COUNT(1) FROM tb_chat_answer WHERE answer_by='$cusername' AND id_chat=a.id_chat) as sy_sdh_jawab    

FROM tb_chat a 
JOIN tb_user b ON a.chat_by=b.username 
WHERE id_mk_sesi=$id_mk_sesi 
AND id_chat > $last_id_chat 
AND status_chat = 1 
ORDER BY id_chat";

// die($s);

$q = mysqli_query($cn, $s) or die(mysqli_error($cn));

if(mysqli_num_rows($q)){
	while ($d = mysqli_fetch_assoc($q)) {
		$id_chat = $d['id_chat'];
		$id_chat_type = $d['id_chat_type'];
		$isi_chat = $d['isi_chat'];
		$chat_by = $d['chat_by'];
		$chat_date = $d['chat_date'];
		$chat_opsi = $d['chat_opsi'];
		$durasi_jawab = $d['durasi_jawab'];
		$admin_level = $d['admin_level'];
		$nama_mhs = $d['nama_mhs'];
		$nama_dosen = $d['nama_dosen'];
		$folder_uploads = $d['folder_uploads'];
		$gender = $d['gender'];
		$sy_sdh_jawab = $d['sy_sdh_jawab'];

		# ================================================
		# GLOBAL VARIABEL HANDLER
		# ================================================
		$is_own_chat = $chat_by==$cusername ? 1 : 0;
		$last_id_chat = $id_chat;
		$level_chat = $admin_level==2 ? "chat_dosen" : "chat_mhs";
		$chat_aku = $is_own_chat ? "chat_aku" : "";
		$show_nama = $admin_level==2 ? "[Dosen - $nama_dosen]" : "$nama_mhs";

		$chat_time = date("H:i", strtotime($chat_date));

		# ================================================
		# CHAT_BY / NAMA USER HANDLER
		# ================================================
		$link_nama = "<a href='?about&u=$username' target='_blank' id='nama_user__$id_chat'>$show_nama</a> $img_chat_type[$id_chat_type] - ";



		# ================================================
		# IMG PROFILE HANDLER
		# ================================================
		$img_student_show = strtoupper($gender)=="P" ? $img_student_p : $img_student;

		if($cadmin_level==2 or $admin_level==2 or $chat_by==$cusername){
			$path_profile = "../uploads/$folder_uploads/_profile.jpg";
			$img_profile = "<img class='img_profil' src='$path_profile'>";
			$img_student_show = file_exists($path_profile) ? $img_profile : $img_student;
		}


		# ================================================
		# BTN-AKSI HANDLER
		# ================================================
		$link_delete = ($is_own_chat or $cadmin_level==2) ? "<span class='btn_aksi' id='delete_chat__$id_chat'>$img_delete</span>" : "";
		$link_medal = ($is_own_chat or $admin_level==2 or $cadmin_level==1) ? "" : "<span class='btn_aksi' id='medal_chat__$id_chat'>$img_medal</span>";
		$link_like = ($is_own_chat or $admin_level==2) ? "" : "<span class='btn_aksi' id='like_chat__$id_chat'>$img_like</span>";
		$link_reply = $is_own_chat ? "" : "<span class='btn_aksi' id='reply_chat__$id_chat'>$img_reply</span>";
		// $link_set_point = ($is_own_chat or $cadmin_level==1) ? "" : "<span class='btn_aksi' id='set_point_chat__$id_chat'>$img_set_point</span>";
		$link_set_point = ($cadmin_level==1) ? "" : "<span class='btn_aksi' id='set_point_chat__$id_chat'>$img_set_point</span>";
		$link_set_point_answer = $is_own_chat ? "" : "<span class='btn_aksi' id='set_point_answer__$id_chat'>$img_set_point_answer</span>";

		$link_reply = ""; //zzz debug



		# ================================================
		# CHAT TYPE HANDLER
		# ================================================
		$chat_special = $id_chat_type==1 ? "" : "chat_special";
		$isi_chat_khusus = $id_chat_type==1 ? "" : "isi_chat_khusus";

		# ================================================
		# CHAT PERTANYAAN
		# ================================================
		$sisa_waktu = $durasi_jawab=="" ? 0 : strtotime($chat_date) - strtotime("now") + $durasi_jawab;

		$blok_jawab = "";
		if($id_chat_type==2){
			$blok_jawab = "<div class='blok_jawab' id='blok_jawab__$id_chat'>";
			$btn_jawab = "<button class='btn btn-primary btn-sm btn_jawab' id='btn_jawab__$id_chat'>Jawab</button>";
			if($cadmin_level==1 and ($sy_sdh_jawab or $is_own_chat)) $btn_jawab="";

			if($sisa_waktu<1 and $cadmin_level==1) $btn_jawab = $waktu_habis;

			$blok_jawab .= "
			  <div class='blok_jawaban' id='blok_jawaban__$id_chat'>
			  	<div>$btn_jawab</div>
			    Dijawab oleh:
			    <ul class='list_jawaban' id='list_jawaban__$id_chat'>
			    </ul>
			  </div>
			</div>
			";
		}


		# ================================================
		# CHAT POLLING
		# ================================================
		$blok_polling = $id_chat_type==3 ? "
		<div class='blok_answer_polling' id='blok_answer_polling__$id_chat'>isi_blok_answer_polling</div>" : "";



		# ================================================
		# STATE CHAT UNTUK PERUBAHAN POIN/LIKES/ANSWERS
		# ================================================
		# 1. POINTS
		# 2. LIKES
		# 3. COUNT_ANSWER
		# 4. sum_answer_point
		# ================================================
		$state_chat = "0~0~999~0";



		# ================================================
		# DURASI CHAT
		# ================================================

		$blok_durasi_jawab = ($id_chat_type==1 or $sisa_waktu<1 or $sy_sdh_jawab)  ? "" : "<div class='durasi_jawab wadah' id='durasi_jawab__$id_chat'>$sisa_waktu</div>";


		if($sisa_waktu>0 and !$sy_sdh_jawab){
			$blok_durasi_jawab.= "
			<script>
				let durasi_jawab__$id_chat = document.getElementById('durasi_jawab__$id_chat');

				let dj$id_chat = parseInt(durasi_jawab__$id_chat.innerHTML);

				if(dj$id_chat){
					let timer$id_chat = setInterval(function(){
						console.log('durasi_jawab__$id_chat timed out.');
						if(dj$id_chat<1){
							$('#durasi_jawab__$id_chat').removeClass();
							$('#durasi_jawab__$id_chat').html(\"<p style='text-align:center; color:red'>Waktu habis.</p>\");
							clearInterval(timer$id_chat);
							return;
						}

						dj$id_chat--;
						durasi_jawab__$id_chat.innerHTML=dj$id_chat;
					},1000);
				}
			</script>
			";
		}


		# ================================================
		# LIST OUTPUT
		# ================================================
		$gap_poin = $admin_level==2 ? "" : " poin ~ ";
		$gap_likes = $admin_level==2 ? "" : " likes ";
		$jumlah_likes = $admin_level==2 ? "" : 0;
		$chat_point = $admin_level==2 ? "" : 0;

		$chat_list.= "
		<li class='chat $level_chat $chat_aku $chat_special' id='id_chat__$id_chat'>
		  <table>
		  	<tr>
		  		<td>
		  			<td style='padding-right: 10px;'>
		  				$img_student_show
		  			</td>
		  			<td>
		  			  <span class='abu'>
			  			  <span class='hideita' id='zzz__$id_chat'>$id_chat</span> 
		  					$link_nama  
		  					$chat_time -    
		  					<span id='chat_point__$id_chat'>$chat_point</span> $gap_poin
		  					<span id='jumlah_likes__$id_chat'>$jumlah_likes</span> $gap_likes   
		  					$link_set_point 
		  					$link_medal 
		  					$link_like 
		  					$link_reply 
		  					$link_delete 
		  				</span>
		  				<div class='chat_body'>
		  					<div class='isi_chat $isi_chat_khusus' id='isi_chat__$id_chat'>$isi_chat</div>
		  					$blok_durasi_jawab 
		  					<span class='hideita' id='state_chat__$id_chat'>$state_chat</span> 
		  					<span class='hideita' id='id_chat_type__$id_chat'>$id_chat_type</span> 
		  					$blok_jawab 
		  					$blok_polling 


		  				</div>
		  			</td>
		  		</td>
		  	</tr>
		  </table>

		</li>
		";

	}
}

die($chat_list."____$id_chats");

?>