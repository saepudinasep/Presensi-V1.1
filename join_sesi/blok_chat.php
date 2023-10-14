<?php 

$disabled_upload = "disabled";
$disabled_tanyakan = $cadmin_level==2 ? "" : "disabled";

$chat_list = "-- Chat Session Started -- ".date("Y-m-d H:i:s");
$last_id_chat = 0;
$last_id_chat_answer = 1;
$bm = "<span style='color:red'><b>*</b></span>";

$tipe_chat_selected = "normal";
$path_icons = "../img/icons";

$img_size="20px";

$img_raise_hand = "<img class='img_aksi' src='$path_icons/raise_hand.png' height='$img_size'>";
$img_answer = "<img class='img_aksi' src='$path_icons/answer.png' height='$img_size'>";
$img_chat = "<img class='img_aksi' src='$path_icons/chat.png' height='$img_size'>";
$img_polling = "<img class='img_aksi' src='$path_icons/polling.png' height='$img_size'>";
$img_tf = "<img class='img_aksi' src='$path_icons/tf.png' height='$img_size'>";
$img_pg = "<img class='img_aksi' src='$path_icons/pg.png' height='$img_size'>";
$img_images = "<img class='img_aksi' src='$path_icons/images.png' height='$img_size'>";

$s = "SELECT 1 FROM tb_chat WHERE status_chat!=1 AND id_mk_sesi='$id_mk_sesi'";
$q = mysqli_query($cn, $s) or die(mysqli_error($cn));
$jumlah_deleted_chat = mysqli_num_rows($q);

?>
<script type="text/javascript">
	$(document).ready(function(){
		// ============================================
		// GLOBAL VARIABEL UNTUK AUTO-FITUR
		// ============================================
		var id_mk_sesi = $("#id_mk_sesi").val().trim();
		var cusername = $("#cusername").val().trim();
		var cadmin_level = $("#cadmin_level").val().trim();
	});
</script>


<!-- ========================================= -->
<!-- KONFIGURASI OPSI CHAT UNTUK DOSEN -->
<!-- ========================================= -->
<?php if($status_mk_sesi!=0) include 'blok_opsi_chat.php'; ?>




<!-- ========================================= -->
<!-- DEBUG VARIABEL -->
<!-- ========================================= -->
<div class="db_var">
	<div>last_id_chat<input id="last_id_chat" value="<?=$last_id_chat?>"></div>
	<div>last_id_chat_answer<input id="last_id_chat_answer" value="<?=$last_id_chat_answer?>"></div>
	<div>jumlah_deleted_chat<input id="jumlah_deleted_chat" value="<?=$jumlah_deleted_chat?>"></div>
	<div>id_chats<input id="id_chats"></div>
	<div>state_chats<input id="state_chats"></div>
	<div>usernames<input id="usernames"></div>
	<div>nilais<input id="nilais"></div>
</div>





<!-- ========================================= -->
<!-- LIST CHATS -->
<!-- ========================================= -->
<div id="blok_chat">
	<?php include 'blok_chat__chat_list.php'; ?>
</div>




<!-- ========================================= -->
<!-- POST CHATS -->
<!-- ========================================= -->
<?php if($status_mk_sesi!=0) include 'blok_chat__post_chat.php'; ?>

<div style="height:200px">&nbsp;</div>























<!-- ============================================ -->
<!-- BUTTON AKSI CLICKED -->
<!-- ============================================ -->
<?php include 'blok_chat__script_btn_aksi.php'; ?>


<script type="text/javascript">
	$(document).ready(function(){
		// ========================================
		// SET TAMPILAN PERTAMA
		// ========================================
		$("#blok_input_post__normal").fadeIn();
	});
</script>

