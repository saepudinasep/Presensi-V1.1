<style type="text/css">
	#my_rank{
		font-size: 40px;
		color: blue;
		padding: 5px 8px;
		font-family: 'century gothic';
		/*border: solid 1px #ccc;*/
		/*border-radius: 5px;*/
		/*background: linear-gradient(white,yellow);*/
	}
	#my_point{
		font-size: 20px;
		color: darkblue;
	}

	#blok_my_rank_point{
		display: grid;
		grid-template-columns: 170px 140px 170px auto;
	}

	#blok_my_rank_point div{
		/*border: solid 1px red;*/
		position: relative;
	}

	#toggle_leaderboard{
		font-family: 'century gothic';
		cursor: pointer;
		transition: .2s;
	}

	#toggle_leaderboard:hover{
		letter-spacing: 1px;
		border: solid 1px #ccc;
		background: lightyellow;
		border-radius: 5px;
		padding: 5px;
	}

	.row_ldb{
		display: grid;
		grid-template-columns: 40px auto 100px;
		max-width: 400px;
		transition: .2s;
		cursor: pointer;
		margin-bottom: 3px;
		border-radius: 5px;
	}
	.row_ldb:hover{
		letter-spacing: 1px;
		font-weight: bold;
		border: solid 2px red;
	}

	.row_ldb div{
		/*border: solid 1px red;*/
		padding: 5px;
	}

	#leaderboard{
		font-family: 'century gothic';
	}

	.rank_1{
		font-size: bolder;
		background: #FFC0CB;
	}

	.rank_2{
		font-size: bold;
		background: #ADD8E6;
	}

	.rank_3{
		font-size: normal;
		background: #CCFFCC;
	}

	.rank_n{
		font-size: smaller;
		background: #FFFEE6;
	}

	.my_ldb{
		border: solid 3px blue;
		margin-left: 10px;
		font-weight: bold;
		color: blue;
	}
</style>

<?php 
# ======================================
# SESAIN CONTROL
# ======================================
$class_blok_my_rank = $cadmin_level==1 ? "" : " hideit ";
$class_blok_my_point = $cadmin_level==1 ? "" : " hideit ";

$class_blok_leaderboard = "";
if($status_mk_sesi==-1){
	$class_blok_leaderboard = " hideit ";
	$class_blok_my_rank = " hideit ";
	$class_blok_my_point = " hideit ";
}

?>
<div id="blok_my_rank_point">

	<div id="blok_my_rank" class="<?=$class_blok_my_rank ?>">
		<span class="abu">Rank:</span> <span id="my_rank"></span> of <span id="jumlah_hadir"></span>
	</div>
	<div id="blok_my_point" class="<?=$class_blok_my_point ?>">
		<div style="position: absolute; bottom:8px">
			<span class="abu">My Point:</span> <span id="my_point"></span> LP
		</div>
	</div>

	<div id="blok_leaderboard" class="<?=$class_blok_leaderboard ?>">
		<!-- <div style="position: absolute; bottom:8px"> -->
		<div>
			<div id="toggle_leaderboard">
				<table>
					<tr>
						<td style="padding:18px 10px 0 5px">
							<img class="img_zoom" src="../img/icons/leaderboard.png" height="25px"> 
							
						</td>
						<td style="padding-top:25px">
							<span id="toggle_cap">Leaderboard</span>
							
						</td>
					</tr>

				</table>
			</div>
		</div>

	</div>
	
</div>

<div id="leaderboard" class="wadah hideit">
	<div class='row_ldb rank_1'>
		<div><img id="img_ldb_1" class='img_zoom' src='../img/icons/rank_1.png' height='25px'></div>
		<div id="nama_ldb_1">-</div>
		<div><span id="poin_ldb_1">-</span> LP</div>
	</div>
	<div class="row_ldb rank_2 my_ldb">
		<div><img id="img_ldb_2" class="img_zoom" src="../img/icons/rank_2.png" height="25px"></div>
		<div id="nama_ldb_2">-</div>
		<div><span id="poin_ldb_2">-</span> LP</div>
	</div>
	<div class="row_ldb rank_3">
		<div><img id="img_ldb_3" class="img_zoom" src="../img/icons/rank_3.png" height="25px"></div>
		<div id="nama_ldb_3">-</div>
		<div><span id="poin_ldb_3">-</span> LP</div>
	</div>
	<div class="row_ldb rank_n">
		<div><img id="img_ldb_4" class="img_zoom" src="../img/icons/rank_n.png" height="25px"></div>
		<div id="nama_ldb_4">-</div>
		<div><span id="poin_ldb_4">-</span> LP</div>
	</div>
	<div class="row_ldb rank_n">
		<div><img id="img_ldb_5" class="img_zoom" src="../img/icons/rank_n.png" height="25px"></div>
		<div id="nama_ldb_5">-</div>
		<div><span id="poin_ldb_5">-</span> LP</div>
	</div>
</div>

<div class="db_var">
	<input id="sum_point_ldb">
</div>


<script type="text/javascript">

	$(document).on("click","#toggle_leaderboard",function(){
		$("#leaderboard").slideDown();
		if($("#toggle_cap").text()!="Leaderboard"){
			$("#toggle_cap").text("Leaderboard");
			$("#leaderboard").slideUp();
		}else{
			$("#toggle_cap").text("Hide Ldb");
			$("#leaderboard").slideDown();
		}
	});

	$(document).on("click",".row_ldb",function(){
		$("#leaderboard").slideUp();
		$("#toggle_cap").text("Leaderboard");
	});

	$(document).ready(function(){
		let id_mk_sesi = $("#id_mk_sesi").val();
		let link_ajax_gmp = "../ajax_presline/ajax_get_mk_sesi_point.php?id_mk_sesi="+id_mk_sesi;
		const getMyPoint = setInterval(function(){

			$.ajax({
				url:link_ajax_gmp,
				success:function(a){
					let ra = a.split("__");
					let my_point = ra[0];
					let my_rank = ra[1];
					let jumlah_hadir = ra[2];
					let usernames = ra[3];
					let nilais = ra[4];
					let arr_sum = ra[5];
					let namas = ra[6];

					let sum_point_ldb = $("#sum_point_ldb").text();

					$("#my_point").text(my_point);
					$("#my_rank").text(my_rank);
					$("#jumlah_hadir").text(jumlah_hadir);
					$("#usernames").val(usernames);
					$("#nilais").val(nilais);

					if($("#toggle_cap").text() != "Leaderboard" && sum_point_ldb!=arr_sum) {
						// console.log("Update Leaderboard: sum_point_ldb!=arr_sum : "+sum_point_ldb+"!="+arr_sum+"");

						let nama = namas.split(";");
						let u = usernames.split(";");
						let n = nilais.split(";");
						let leaderboard = "";
						let j;
						let k;
						let my_ldb;
						let cusername = $("#cusername").val();
						let cnama;

						for (var i = 0; i < u.length-1; i++) {
							j=i+1;
							k = i>2 ? "n" : j;

							my_ldb = u[i] == cusername ? "my_ldb" : "";
							cnama = (i >= 5 && u[i] != cusername) ? "***" : nama[i];

							leaderboard += ""
							+"<div class='row_ldb rank_"+k+" "+my_ldb+"'>"
								+"<div><img class='img_zoom' src='../img/icons/rank_"+k+".png' height='25px'></div>"
								+"<div>"+cnama+"</div>"
								+"<div>"+n[i]+" LP</div>"
							+"</div>"
							;
						}

						$("#leaderboard").html(leaderboard);
						$("#sum_point_ldb").val(arr_sum);

					}else{
						// console.log("sum_point_ldb==arr_sum");
					}
				}
			})
		},3000);

		
		
	})
</script>