<ul id="chat_list">
	<?=$chat_list ?>
</ul>

<script type="text/javascript">

	var id_mk_sesi = $("#id_mk_sesi").val().trim();
	var cusername = $("#cusername").val().trim();
	var cadmin_level = $("#cadmin_level").val().trim();


	$(document).on("click",".btn_jawab",function(){
		let tid = $(this).prop("id");
		let rid = tid.split("__");
		let id_chat = rid[1];

		let cusername = $("#cusername").val();
		let cadmin_level = $("#cadmin_level").val();
		let pertanyaan = $("#isi_chat__"+id_chat).text();

		let answer = prompt(pertanyaan+"\n\nJawab:"); if(!answer || answer.trim()=="") return;

		var link_ajax = "../ajax_presline/ajax_post_chat_answer.php"
		+"?answer="+answer
		+"&answer_by="+cusername
		+"&id_chat="+id_chat 
		;


		$.ajax({
			url: link_ajax,
			success:function(h){
				if(h.trim()=="1__"){

					$(".btn_post").prop("disabled", true);
					$("#input_chat__normal").val("");
					$("#btn_jawab__"+id_chat).fadeOut();
					$("#durasi_jawab__"+id_chat).fadeOut();

				}else{
					alert(h)
				}
			}
		})
	});


	$(document).on("click",".btn_poll",function(){
		let tid = $(this).prop("id");
		let answer = $(this).text();
		let rid = tid.split("__");

		let idj = rid[1];
		let ridj = idj.split("-");
		let id_chat = ridj[0];
		let answer_index = ridj[1];

		let cusername = $("#cusername").val();
		let cadmin_level = $("#cadmin_level").val();

		let x = confirm("Anda memilih: "+answer+" ?\n\nPerhatian! Merevisi pilihan polling akan mengurangi 1 poin."); if(!x) return;

		var link_ajax = "../ajax_presline/ajax_post_chat_answer_polling.php"
		+"?answer="+answer
		+"&answer_by="+cusername
		+"&id_chat="+id_chat 
		;

		// alert(link_ajax); return;


		$.ajax({
			url: link_ajax,
			success:function(h){
				if(h.trim()=="1__"){


					$(".btn_post").prop("disabled", true);
					$("#input_chat__make_poll").val("");

					console.log("success answer polling: id_chat:"+id_chat+" answer:"+answer);

				}else{
					alert(h)
				}
			}
		})
	});



	$(document).ready(function(){
		// ============================================
		// AUTO-SCROLL CHAT LIST TO BOTTOM
		// ============================================
		var link_ajax1 = "../ajax_presline/ajax_get_last_id_chat.php?id_mk_sesi="+id_mk_sesi;
		const getLastChatId = setInterval(function(){

			var last_id_chat = $("#last_id_chat").val().trim();

			if(document.hidden) return;

			$.ajax({
				url: link_ajax1,
				success:function(a){
					if(a.trim() != last_id_chat){
						console.log("New chat detected: id_chat:"+a+" != "+last_id_chat);

						// add new chat to list
						var link_ajax2 = "../ajax_presline/ajax_get_chat_list.php"
						+"?last_id_chat="+last_id_chat
						+"&id_mk_sesi="+id_mk_sesi
						+"&cusername="+cusername
						+"&cadmin_level="+cadmin_level
						;

						$.ajax({
							url:link_ajax2,
							success:function(b){
								// console.log(b);
								let rb = b.split("____");
								let d = rb[0];
								let id_chats = rb[1];

								// append hasil-ajax ke list chat
								$("#chat_list").append(d);

								// update id_chats
								$("#id_chats").val(id_chats);

								// update last id chat
								$("#last_id_chat").val(a);

								// update scroll position
								$("#blok_chat").scrollTop($("#blok_chat")[0].scrollHeight);

							}
						})

					}else{
						// console.log("NO New chat detected: id_chat:"+a+" == "+last_id_chat);
					}
				}
			})
		}, 3000); //zzz durasi get chat




		// ============================================
		// AUTO-CHECK UPDATE JUMLAH DELETED CHAT
		// ============================================
		var link_ajax3 = "../ajax_presline/ajax_get_jumlah_deleted_chat.php?id_mk_sesi="+id_mk_sesi;
		const getJumlahDeletedChat = setInterval(function(){

			var jumlah_deleted_chat = parseInt($("#jumlah_deleted_chat").val());

			if(document.hidden) return;

			$.ajax({
				url: link_ajax3,
				success:function(z){
					let rz = z.split("__");
					let x = parseInt(rz[0]);
					let id_chats = rz[1];
					if(x != jumlah_deleted_chat){
						let rid_chats = id_chats.split(";");
						console.log("DeleteChat Detected: x:"+x+" != jumlah_deleted_chat:"+jumlah_deleted_chat+" id_chats:"+id_chats+" length:"+rid_chats.length);

						for (var i = 0; i < rid_chats.length-1; i++) {
							if($("#id_chat__"+rid_chats[i]).length) $("#id_chat__"+rid_chats[i]).fadeOut();
						}

						$("#jumlah_deleted_chat").val(rid_chats.length-1);

					}else{
						// console.log("x:"+x+" == jumlah_deleted_chat:"+jumlah_deleted_chat);
					}
				}
			})
		}, 5000);



		// ============================================
		// AUTO-CHECK STATE CHAT :: POINT/LIKES/ANSWERS
		// ============================================
		var link_ajax4 = "../ajax_presline/ajax_get_state_chat.php?id_mk_sesi="+id_mk_sesi;
		const getStateChat = setInterval(function(){

			var state_chats = $("#state_chats").val();

			if(document.hidden) return;

			$.ajax({
				url: link_ajax4,
				success:function(a){
					if(a.trim() != state_chats){
						console.log("state_chats changed. new state arrived.");

						// update every chat
						let id_chats = $("#id_chats").val();
						let rid_chats = id_chats.split(";");
						let ra = a.split(";");
						let sa;
						let new_sa;
						var idc;

						for (var i = 0; i < (ra.length-1); i++) {
							idc = rid_chats[i];
							sa = $("#state_chat__"+idc).text();
							new_sa = ra[i];

							if(sa != new_sa){
								// console.log("Chat ke-"+idc+" "+sa+" != "+ new_sa);

								// update poin/likes/answers
								let r = sa.split("~");
								let s = new_sa.split("~");

								// update point
								if(r[0] != s[0]) $("#chat_point__"+idc).text(s[0]);

								// update likes
								if(r[1] != s[1]) $("#jumlah_likes__"+idc).text(s[1]);

								// update count_answer
								if(r[2] != s[2]) $("#count_answer__"+idc).text(s[2]);

								// update sum_answer_point
								if(r[3] != s[3]) $("#sum_answer_point__"+idc).text(s[3]);


								if(r[2] != s[2] || r[3] != s[3]){
									// update count + konten jawaban

									let id_chat_type = parseInt($("#id_chat_type__"+idc).text());

									// =============================================
									// UPDATE JAWABAN PERTANYAAN
									// =============================================
									if(id_chat_type==2){ //pertanyaan
										let link_ajax5 = "../ajax_presline/ajax_get_chat_answer.php"
										+"?id_chat="+idc
										+"&cadmin_level="+cadmin_level;

										$.ajax({
											url: link_ajax5,
											success:function(n){
												let rn = n.split("____");
												$("#list_jawaban__"+rn[0]).empty();
												$("#list_jawaban__"+rn[0]).append(rn[1]);
											}
										})
									}

									// =============================================
									// UPDATE GRAFIK POLLING
									// =============================================
									if(id_chat_type==3){ //pertanyaan
										let link_ajax5 = "../ajax_presline/ajax_get_chat_answer_polling.php"
										+"?id_chat="+idc
										+"&cusername="+cusername
										+"&cadmin_level="+cadmin_level
										; 

										$.ajax({
											url: link_ajax5,
											success:function(n){
												let rn = n.split("____");

												$("#blok_answer_polling__"+rn[0]).html(rn[1]);
											}

										})
									}

								} 

								// update state chat ini
								$("#state_chat__"+idc).text(new_sa);

							}else{
								// console.log("Chat ke-"+idc+" "+sa+" == "+ new_sa);
							}
						}

						// update new state chats
						$("#state_chats").val(a);


					}else{
						// console.log("state_chats tidak berubah");
					}
				}
			})
		}, 4000);


	});
</script>