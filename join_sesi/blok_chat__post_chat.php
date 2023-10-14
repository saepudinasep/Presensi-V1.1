<div class="db_var">
	<div>tipe_chat_selected<input id="tipe_chat_selected" value="<?=$tipe_chat_selected?>"></div>
	<div>chat_opsi<input id="chat_opsi"></div>
</div>
<div style="margin:10px 0 50px 0">
	<div style="margin: 5px 0; display: flex; font-size: small;" id="menu_btn_chat">
		<div class="tipe_chat active_chat_btn" id="tipe_chat__normal"><?=$img_chat?> Normal Chat</div>
		<div class="tipe_chat " id="tipe_chat__tanyakan"><?=$img_raise_hand?> Bertanya</div> 
		<!-- <div class="tipe_chat " id="tipe_chat__jawab"><?=$img_answer?> Jawab</div>  -->
		<div class="tipe_chat " id="tipe_chat__upload"><?=$img_images?> Upload</div>
		<?php if($cadmin_level==2){ ?>
			<div class="tipe_chat " id="tipe_chat__make_poll"><?=$img_polling?> Polling</div> 
			<div class="tipe_chat " id="tipe_chat__post_tf"><?=$img_tf?> TF</div> 
			<div class="tipe_chat " id="tipe_chat__post_pg"><?=$img_pg?> PG</div>
		<?php } ?>
	</div>

	<table width="100%" class="blok_input_post" id="blok_input_post__normal">
		<tr>
			<td>
				<input type="text"  class="form-control isi_chat" id="isi_chat__normal">
			</td>
			<td width="80px">
				<button class="btn btn-success btn-block btn_post" id="btn_post__normal">Post</button>
			</td>
		</tr>
	</table>

	<div class="blok_input_post wadah" id="blok_input_post__tanyakan">
		<div class="form-group">
			<div style="display: grid; grid-template-columns: 130px 70px auto; grid-gap: 10px;">
				<div>Durasi Menjawab:</div>
				<div>
					<input type="text" class="form-control text-center" id="durasi_jawab" value="1200" maxlength="3" minlength="2">
				</div>
				<div>
					detik
				</div>
			</div>
		</div>
		<div class="form-group">
			<div style="display: grid; grid-template-columns: auto 80px; grid-gap: 10px;">
				<div>
					<input type="text"  class="form-control isi_chat" id="isi_chat__tanyakan" <?=$disabled_tanyakan ?>>

				</div>
				<div>
					<button class="btn btn-success btn-block btn_post" id="btn_post__tanyakan" disabled="">Tanyakan</button>

				</div>
			</div>
		</div>

	</div>

	<table width="100%" class="blok_input_post" id="blok_input_post__upload">
		<tr>
			<td>
				<input type="file"  class="form-control"  <?=$disabled_upload ?>>
			</td>
			<td width="80px">
				<button class="btn btn-success btn-block btn_post" id="btn_post__upload" disabled="">Upload</button>
			</td>
		</tr>
	</table>

	<?php if($cadmin_level==2){ ?>
		<div class="blok_input_post wadah" id="blok_input_post__make_poll">
			<div class="form-group">
				<label>Durasi Polling <?=$bm?></label>
				<input type="text"  class="form-control" id="durasi_polling" value="600">
			</div>
			<div class="form-group">
				<label>Pertanyaan Polling <?=$bm?></label>
				<input type="text"  class="form-control isi_chat" id="isi_chat__make_poll">
			</div>
			<div class="form-group wadah" id="blok_opsi_polling" style="padding-left: 20px;">
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label>Opsi 1 <?=$bm?></label>
							<input type="text" class="form-control opsi_polling" id="opsi_polling__1">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Opsi 2 <?=$bm?></label>
							<input type="text" class="form-control opsi_polling" id="opsi_polling__2">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Opsi 3</label>
							<input type="text" class="form-control opsi_polling" id="opsi_polling__3">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Opsi 4</label>
							<input type="text" class="form-control opsi_polling" id="opsi_polling__4">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Opsi 5</label>
							<input type="text" class="form-control opsi_polling" id="opsi_polling__5">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Opsi 6</label>
							<input type="text" class="form-control opsi_polling" id="opsi_polling__6">
						</div>
					</div>
				</div>

				<!-- <div class="form-group">
					<button class="btn btn-success btn-sm">Tambah Opsi</button> 
					<button class="btn btn-success btn-sm">Hapus Opsi</button>
				</div> -->
			</div>
			<div class="form-group">
				<button class="btn btn-primary btn-block btn_post" id="btn_post__make_poll" >Make Poll</button>
			</div>
		</div>


	<table width="100%" class="blok_input_post" id="blok_input_post__post_tf">
		<tr>
			<td>
				<input type="text"  class="form-control">
			</td>
			<td width="80px">
				<button class="btn btn-success btn-block btn_post" id="btn_post__post_tf" disabled="">Post TF</button>
			</td>
		</tr>
	</table>

	<table width="100%" class="blok_input_post" id="blok_input_post__post_pg">
		<tr>
			<td>
				<input type="text"  class="form-control">
			</td>
			<td width="80px">
				<button class="btn btn-success btn-block btn_post" id="btn_post__post_pg" disabled="">Post PG</button>
			</td>
		</tr>
	</table>

	<?php } ?>

</div>














<script type="text/javascript">
	$(document).ready(function(){

		$(".isi_chat").keyup(function(){
			let val = $(this).val();
			let tid = $(this).prop("id");
			let rid = tid.split("__");
			let tipe_chat = rid[1];

			if(val.length>2){
				$("#btn_post__"+tipe_chat).prop("disabled", false);
			}else{
				$("#btn_post__"+tipe_chat).prop("disabled", true);
			}

		})

		// ============================================
		// TIPE CHAT SELECTED
		// ============================================
		$(".tipe_chat").click(function(){
			let tid = $(this).prop("id");
			let rid = tid.split("__");
			let id = rid[1];

			$(".tipe_chat").removeClass("active_chat_btn");
			$(this).addClass("active_chat_btn");

			$(".blok_input_post").hide();
			$("#blok_input_post__"+id).fadeIn();

			$("#tipe_chat_selected").val(id);

			if(id=="normal" || id=="tanyakan") $("#chat_opsi").val("");

		});


		// ============================================
		// ALL BUTTON POST CLICKED
		// ============================================
		$(".btn_post").click(function(){
			let tid = $(this).prop("id");
			let rid = tid.split("__");
			let id = rid[1];
			let chat_opsi = $("#chat_opsi").val();

			// alert(id); return;

			var isi_chat = $("#isi_chat__"+id).val();
			var durasi_jawab = 0;
			let cusername = $("#cusername").val().trim();
			if(isi_chat=="") {alert("Nothing to post."); return;}

			// validasi untuk tanyakan
			if(id=="tanyakan"){
				durasi_jawab = $("#durasi_jawab").val();
			}

			// validasi untuk polling
			if(id=="make_poll"){
				isi_chat = $("#isi_chat__make_poll").val();
				durasi_jawab = $("#durasi_polling").val();
				if($("#isi_chat__make_poll").val().trim().length < 10) {
					alert("Pertanyaan Polling minimal 10 karakter.");
					return;
				}
				if($("#opsi_polling__1").val().trim().length==0 || $("#opsi_polling__2").val().trim().length==0){
					alert("Silahkan isi minimal 2 Opsi Polling!");
					return;
				}
			}


			var link_ajax = "../ajax_presline/ajax_post_chat.php"
			+"?isi_chat="+isi_chat
			+"&u="+cusername
			+"&chat_type="+id
			+"&chat_opsi="+chat_opsi
			+"&durasi_jawab="+durasi_jawab
			;

			// alert(link_ajax); return;


			$.ajax({
				url: link_ajax,
				success:function(h){
					if(h.trim()=="1__"){

						$(".btn_post").prop("disabled", true);
						$("#isi_chat__normal").val("");

					}else{
						alert(h)
					}
				}
			})

		});


		// ============================================
		// OPSI POLLING TYPING
		// ============================================
		$(".opsi_polling").keyup(function(){
			let opsi = [];
			let chat_opsi = "";
			for (var i = 1; i <= 6; i++) {
				opsi[i] = $("#opsi_polling__"+i).val();
				chat_opsi += opsi[i]+"__;";
			}

			$("#chat_opsi").val(chat_opsi);
		})

	})
</script>