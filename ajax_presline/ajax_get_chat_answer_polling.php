<?php 
# ================================================
# SESSION SECURITY
# ================================================
include "cek_sesi_users.php";


$id_chat = isset($_GET['id_chat']) ? $_GET['id_chat'] : die(erjx("id_chat"));
$cusername = isset($_GET['cusername']) ? $_GET['cusername'] : die(erjx("cusername"));
$cadmin_level = isset($_GET['cadmin_level']) ? $_GET['cadmin_level'] : die(erjx("cadmin_level"));

$s = "SELECT chat_opsi,durasi_jawab, chat_date FROM tb_chat WHERE id_chat=$id_chat";
$q = mysqli_query($cn,$s) or die(mysqli_error($cn));
$d = mysqli_fetch_assoc($q);
$chat_opsi = $d['chat_opsi'];
$durasi_jawab = $d['durasi_jawab'];
$chat_date = $d['chat_date'];

$sisa_waktu = $durasi_jawab=="" ? 0 : strtotime($chat_date) - strtotime("now") + $durasi_jawab;
$waktu_habis = $sisa_waktu>0 ? "" : "<div style='color:red; text-align:center'><i>Waktu habis.</i></div>";


$script_timer = $sisa_waktu>0 ? "
	<script>
		let durasi_jawab__$id_chat = document.getElementById('durasi_jawab__$id_chat');

		let dj$id_chat = parseInt(durasi_jawab__$id_chat.innerHTML);

		if(dj$id_chat){
			let timer$id_chat = setInterval(function(){
				console.log('durasi_jawab__$id_chat timed out.');
				if(dj$id_chat<1){
					$('#durasi_jawab__$id_chat').removeClass();
					$('#durasi_jawab__$id_chat').html(\"<p style='text-align:center; color:red'>Waktu habis.</p>\");
					$('.btn_polling').prop('disabled',true);
					clearInterval(timer$id_chat);
					return;
				}

				dj$id_chat--;
				durasi_jawab__$id_chat.innerHTML=dj$id_chat;
			},1000);
		}
	</script>
	" : "";


# ================================================
# CHAT POLLING
# ================================================
$blok_polling = "<div class='blok_polling' id='blok_polling__$id_chat'>";
$btn_polling = "<button class='btn btn-primary btn-sm btn_polling' id='btn_polling__$id_chat'>polling</button>";

$blok_polling .= "<div class='blok_answer_polling' id='blok_answer_polling__$id_chat'>$waktu_habis";

# LOOPING OPSI POLLING
$ro = explode("__;", $chat_opsi);

$s2 = "SELECT 
(SELECT COUNT(1) FROM tb_chat_answer WHERE answer='$ro[0]' AND id_chat=$id_chat) as count_poll1, 
(SELECT COUNT(1) FROM tb_chat_answer WHERE answer='$ro[1]' AND id_chat=$id_chat) as count_poll2, 
(SELECT COUNT(1) FROM tb_chat_answer WHERE answer='$ro[2]' AND id_chat=$id_chat) as count_poll3, 
(SELECT COUNT(1) FROM tb_chat_answer WHERE answer='$ro[3]' AND id_chat=$id_chat) as count_poll4, 
(SELECT COUNT(1) FROM tb_chat_answer WHERE answer='$ro[4]' AND id_chat=$id_chat) as count_poll5, 
(SELECT COUNT(1) FROM tb_chat_answer WHERE answer='$ro[5]' AND id_chat=$id_chat) as count_poll6,
(SELECT answer FROM tb_chat_answer WHERE answer_by='$cusername' AND id_chat=$id_chat) as my_answer, 
(SELECT chat_point_answer FROM tb_chat_answer WHERE answer_by='$cusername' AND id_chat=$id_chat) as my_point     
";
// die($id_chat."____$s2");
$q2 = mysqli_query($cn,$s2) or die(mysqli_error($cn));
$d2 = mysqli_fetch_assoc($q2);
$count_poll[1] = intval($d2['count_poll1']);
$count_poll[2] = intval($d2['count_poll2']);
$count_poll[3] = intval($d2['count_poll3']);
$count_poll[4] = intval($d2['count_poll4']);
$count_poll[5] = intval($d2['count_poll5']);
$count_poll[6] = intval($d2['count_poll6']);
$my_answer = $d2['my_answer'];
$my_point = $d2['my_point'];

// $count_poll[1] = 12;
// $count_poll[2] = 36;
// $count_poll[3] = 66;
// $count_poll[4] = 5;
// $count_poll[5] = 0;
// $count_poll[6] = 0;


$max_poll = max($count_poll);
$sum_poll = array_sum($count_poll);

if($sum_poll){
	$persen_poll[1] = intval($count_poll[1] / $max_poll * 100);
	$persen_poll[2] = intval($count_poll[2] / $max_poll * 100);
	$persen_poll[3] = intval($count_poll[3] / $max_poll * 100);
	$persen_poll[4] = intval($count_poll[4] / $max_poll * 100);
	$persen_poll[5] = intval($count_poll[5] / $max_poll * 100);
	$persen_poll[6] = intval($count_poll[6] / $max_poll * 100);

	$persen_sum_poll[1] = intval($count_poll[1] / $sum_poll * 100);
	$persen_sum_poll[2] = intval($count_poll[2] / $sum_poll * 100);
	$persen_sum_poll[3] = intval($count_poll[3] / $sum_poll * 100);
	$persen_sum_poll[4] = intval($count_poll[4] / $sum_poll * 100);
	$persen_sum_poll[5] = intval($count_poll[5] / $sum_poll * 100);
	$persen_sum_poll[6] = intval($count_poll[6] / $sum_poll * 100);
}else{
	// MENCEGAH DIV BY ZERO
	for ($i=1; $i <=6 ; $i++) { 
		$persen_poll[$i] = 0;
		$persen_sum_poll[$i] = 0;
	}
}

for ($i=0; $i < count($ro)-1; $i++) {

	if($ro[$i]=="") break;
	$polling_saya = ($ro[$i] == $my_answer) ? "polling_saya" : "";


	$blok_polling.="<div class='row_poll $polling_saya'>";
	$j = $i+1; 
	$btn_poll = ($cadmin_level==2 or $sisa_waktu<1) ? $ro[$i] : "<button class='btn btn-success btn-sm btn-block btn_poll' id='btn_poll__$id_chat-$j'>$ro[$i]</button>";
	$blok_polling.= "
		<div>
		  $btn_poll
		</div>
	";

	// HITUNG POLLING VALUE
	$blok_polling.= "
		<div class='count_poll'>
		  &nbsp;$count_poll[$j]
		</div>
		<div class='count_poll text-right'>
		  $persen_sum_poll[$j]%
		</div>
		<div class='grafik_poll__$id_chat' id='grafik_poll__$id_chat-$j'>
		  <div class='bar_polling' style='width:$persen_poll[$j]%'>&nbsp;</div>
		</div>
	";

	$blok_polling.="</div>";

}

$kamu_memilih = $cadmin_level==2 ? "" : "<div><small>Kamu memilih: $my_answer | $my_point poin</small></div>";

$blok_polling.="
		$kamu_memilih
  </div>
</div>
";

die($id_chat."____$blok_polling");

?>