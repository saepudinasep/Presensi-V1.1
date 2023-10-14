<?php if($id_mk_sesi!=""){ ?>
	<style type="text/css">
	#mhs_avatars{
		display: flex;
		width: 100%;
		/*border: solid 1px blue;*/
		/*overflow-x: scroll;*/ 
		flex-wrap: wrap;
	}

	.mhs_avatar{
		/*border: solid 1px #ddd;*/
		margin: 10px;
		width: 90px;
	}

	#blok_mhs{
		height: 300px;
		overflow: auto;
	}
</style>

<div id="blok_mhs">
	<table width="100%">
		<tr>
			<td style="padding-right: 10px; border-right: solid 1px #ccc; text-align: center; vertical-align: top;" width="150px">
				<style type="text/css">
				#jumlah_mhs_online{
					border: solid 1px #ccc;
					padding: 0px 15px 5pt 15px;
					margin: 0;
					font-size: 35px;
					border-radius: 20px;
					background: linear-gradient(#fff,#cfc);
					color: #080;
				}
			</style>
			<p id="jumlah_mhs_online">0</p>
			<p id="total_mhs">of <?=$jumlah_mk_mhs ?> Players</p>
		</td>
		<td style="padding: 0 10px">
			<div id="mhs_avatars">
				<!-- <?=$img_mhs ?> -->
			</div>
		</td>
	</tr>
</table>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		// ========================================
		// AUTO-UPDATE GET PESERTA ONLINE
		// ========================================
		let id_mk = $("#id_mk").val();
		let link_ajax = `../ajax_presline/ajax_get_peserta_online.php?id_mk=${id_mk}`;
		const getPesertaOnline = setInterval(function(){

			if(document.hidden) return;

			$.ajax({
				url: link_ajax,
				success:function(a){
					// $("#debug1").text(a);
					let h = a.trim().split("__");
					let sukses = parseInt(h[0]);
					let jumlah_mhs_online = parseInt(h[1]);
					let mhs_avatars = h[2];

					$("#mhs_avatars").html(mhs_avatars);
					$("#jumlah_mhs_online").html(jumlah_mhs_online);
					// alert("success");
				}
			})
		}, 5000);

	})
</script>
<?php } ?>