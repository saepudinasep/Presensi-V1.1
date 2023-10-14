<script type="text/javascript">
	$(document).on("click",".btn_aksi",function(){
		let tid = $(this).prop("id");
		let rid = tid.split("__");
		let tipe_aksi = rid[0];
		let id_chat = rid[1];
		let answer_id = rid[1];

		let cusername = $("#cusername").val();
		let cadmin_level = $("#cadmin_level").val();

		// =========================================
		// AKSI DELETE CHAT
		// =========================================
		if(tipe_aksi=="delete_chat"){
			let y = confirm("Yakin untuk delete?"); if(!y) return;
			let link_ajax = "../ajax_presline/ajax_delete_chat.php"
			+"?id_chat="+id_chat
			+"&cusername="+cusername
			+"&cadmin_level="+cadmin_level
			;
			$.ajax({
				url:link_ajax,
				success:function(a){
					if(a.trim()=="1__"){
						$("#id_chat__"+id_chat).removeClass();
						$("#id_chat__"+id_chat).html("<span class='abu'><i>deleted</i></span>");
						console.log("success delete_chat");

					}else{
						alert(a);
					}
				}
			})
			return;
		}

		// =========================================
		// AKSI DELETE ANSWER
		// =========================================
		if(tipe_aksi=="delete_answer"){
			let y = confirm("Yakin untuk menghapus jawaban ini?"); if(!y) return;
			let link_ajax = "../ajax_presline/ajax_delete_answer.php"
			+"?answer_id="+answer_id
			+"&cusername="+cusername
			+"&cadmin_level="+cadmin_level
			;
			$.ajax({
				url:link_ajax,
				success:function(a){
					if(a.trim()=="1__"){
						console.log("success delete_answer");

					}else{
						alert(a);
					}
				}
			})
			return;
		}

		// =========================================
		// AKSI LIKE CHAT
		// =========================================
		if(tipe_aksi=="like_chat"){
			let nama_user = $("#nama_user__"+id_chat).text();
			let y = confirm("Anda menyukai postingan "+nama_user+"?"); if(!y) return;
			let link_ajax = "../ajax_presline/ajax_like_chat.php"
			+"?id_chat="+id_chat
			+"&cusername="+cusername
			+"&cadmin_level="+cadmin_level
			;
			$.ajax({
				url:link_ajax,
				success:function(a){
					if(a.trim()=="1__"){
						console.log("success like_chat");
					}else{
						alert(a);
					}
				}
			})
			return;
		}

		// =========================================
		// AKSI SET POINT
		// =========================================
		if(tipe_aksi=="set_point_chat"){
			let chat_point = prompt("Berapa nilai yang ingin Anda berikan?",10); if(!chat_point) return;
			let link_ajax = "../ajax_presline/ajax_set_chat_point.php"
			+"?id_chat="+id_chat
			+"&cusername="+cusername
			+"&cadmin_level="+cadmin_level
			+"&chat_point="+chat_point
			;
			$.ajax({
				url:link_ajax,
				success:function(a){
					if(a.trim()=="1__"){
						console.log("success set_point_chat");

					}else{
						alert(a);
					}
				}
			})
			return;
		}

		// =========================================
		// AKSI SET POINT ANSWER
		// =========================================
		if(tipe_aksi=="set_point_answer"){
			let chat_point_answer = prompt("Berapa Nilai untuk Jawaban ini?",50); if(!chat_point_answer) return;
			let link_ajax = "../ajax_presline/ajax_set_chat_point_answer.php"
			+"?answer_id="+answer_id
			+"&cusername="+cusername
			+"&cadmin_level="+cadmin_level
			+"&chat_point_answer="+chat_point_answer
			;
			$.ajax({
				url:link_ajax,
				success:function(a){
					if(a.trim()=="1__"){
						console.log("success set_point_answer");

					}else{
						alert(a);
					}
				}
			})
			return;
		}

	});
</script>