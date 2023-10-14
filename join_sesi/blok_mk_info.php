<?php 
if($id_mk_sesi!=""){ 
	# ==========================================
	# STATUS SESI KULIAH
	# ==========================================
	# -1 BELUM START
	# 1 BERLANGSUNG
	# 0 SELESAI
	# ==========================================

	# =====================================================
	# OPSI PERKULIAHAN
	# =====================================================
	$max_point_presensi = 1000;
	$min_point_presensi = 100;
	$menit_terlambat = 10;
	$point_presensi = $max_point_presensi;

	$timer_hour = 1;
	$timer_min = 30;
	$timer_sec = "00";

	$point_presensi_cap=100;







	# =====================================================
	# DETIK BERLANGSUNG
	# =====================================================
	$detik_berlangsung = 0;
	if ($start_sesi_kuliah!="") {
		$detik_berlangsung = strtotime(date("Y-m-d H:i:s")) - strtotime($start_sesi_kuliah);

		$jam_durasi_kuliah = date("H",strtotime($durasi_kuliah));
		$menit_durasi_kuliah = date("i",strtotime($durasi_kuliah));
		$detik_durasi_kuliah = date("s",strtotime($durasi_kuliah));

		$detik_sisa = $jam_durasi_kuliah*3600+$menit_durasi_kuliah*60+$detik_durasi_kuliah - $detik_berlangsung;

		$timer_hour = intval($detik_sisa/3600);
		$timer_min = intval(($detik_sisa % 3600)/60);
		$timer_sec = intval($detik_sisa % 60);

		if($timer_hour<0) $timer_hour=0;
		if($timer_min<0) $timer_min=0;
		if($timer_sec<0) $timer_sec=0;

		if($timer_hour==0 and $timer_min==0 and $timer_sec==0){
			$status_mk_sesi=0; //berakhir
			$point_presensi=0;
			$point_presensi_cap=0;
		}else{
			$point_presensi = $max_point_presensi-($detik_berlangsung-600)*9/30;
			if($point_presensi>$max_point_presensi) $point_presensi=$max_point_presensi;
			if($point_presensi<$min_point_presensi) $point_presensi=$min_point_presensi;
			$point_presensi_cap = $point_presensi;

		}
	}else{
		$detik_sisa=0;
		$status_mk_sesi=-1;
		$point_presensi = $max_point_presensi;
		$point_presensi_cap = $max_point_presensi;
	}


	# =====================================================
	# UPDATE STATUS MK SESI JIKA DETIK SISA < 1
	# =====================================================
	if($detik_sisa<1 and $start_sesi_kuliah!=""){
		$status_mk_sesi = 0;
		$_SESSION['status_mk_sesi'] = 0;
		$s = "UPDATE tb_mk_sesi SET status_mk_sesi=0, stop_perkuliahan=CURRENT_TIMESTAMP WHERE id_mk_sesi='$id_mk_sesi'";
		$q = mysqli_query($cn,$s) or die("Auto-Update Status MK Sesi: ".mysqli_error($cn));
	}


	# =====================================================
	# DESAIN AWAL :: MANAGE DESIGN
	# =====================================================
	$hide_poin_presensi = "";
	$class_blok_point_presensi = "";


	$btns_cap = "Start Sesi Kuliah";
	$btns_disabled = "";
	$btns_class = "primary";
	$btns_pre = "Ready?";

	$ket_pengurangan_point = "
	<p align='center' id='ket_pengurangan_point'>
		<small style='color:red'>Dianggap telat dalam: <select id='menit_terlambat'><option>10</option></select> menit</small>
	</p>
	";

	# ===============================================
	# DESAIN MK-INFO FOR DOSEN
	# ===============================================
	if($cadmin_level==2){
		if($status_mk_sesi==0){
			$btns_cap = "Perkuliahan Berakhir";
			$btns_disabled = "disabled";
			$btns_class = "warning";
			$btns_pre = "<a href='../'>Home</a>";
			$ket_pengurangan_point = "";
			$hide_poin_presensi =" hideit ";

		}

		if($status_mk_sesi==1){
			$btns_cap = "Stop Perkuliahan";
			$btns_disabled = "";
			$btns_class = "danger";
			$btns_pre = "Perkuliahan Berlangsung!";
			$ket_pengurangan_point = "";
		}
	}

	# ===============================================
	# DESAIN MK-INFO FOR MHS
	# ===============================================
	$sudah_absen=0;
	$my_poin_presensi = "NULL";
	$id_presensi = $id_mk_sesi."_$cusername";
	$s = "SELECT poin_presensi FROM tb_presensi WHERE id_presensi='$id_presensi'";
	$q = mysqli_query($cn,$s) or die("Desain Kehadiran Mahasiswa error. ".mysqli_error($cn));
	if(mysqli_num_rows($q)==1){
		$sudah_absen=1;
		$d = mysqli_fetch_assoc($q);
		$my_poin_presensi = $d['poin_presensi'];
	}

	if ($cadmin_level==1) {
		if($status_mk_sesi==-1){
			$btns_cap = "Belum Dimulai";
			$btns_disabled = "";
			$btns_class = "info";
		}else	if($status_mk_sesi==1 and $sudah_absen==0){
			$btns_cap = "Saya Hadir";
			$btns_disabled = "";
		}else if($status_mk_sesi==1 and $sudah_absen){
			$btns_cap = "Sudah Absen";
			$btns_disabled = "disabled";
			$btns_class = "info";
			$btns_pre = "Poin Presensi: $my_poin_presensi";
			$ket_pengurangan_point = "";
		}else if($status_mk_sesi==0){
			$btns_cap = "Perkuliahan Berakhir";
			$btns_disabled = "disabled";
			$btns_class = "warning";
			$btns_pre = "Poin Presensi: $my_poin_presensi";
			$ket_pengurangan_point = "";
			$class_blok_point_presensi = " hideit ";
		}
	}

	// echo "<hr>$status_mk_sesi==1 and $sudah_absen==0<hr>";



	$btn_start_sesi_kuliah = "<button class='btn btn-$btns_class btn-block' id='btn_start_sesi_kuliah' $btns_disabled>$btns_cap</button>";
	$blok_btn = "<div><small>$btns_pre</small></div>$btn_start_sesi_kuliah";
















	?>
	<div class="db_var">
		status_mk_sesi <input id="status_mk_sesi" value="<?=$status_mk_sesi?>"><br>
		detik_berlangsung<input id="detik_berlangsung" value="<?=$detik_berlangsung ?>"><br>
			<br>
		xtimer_hour<input id="xtimer_hour" value="<?=$timer_hour ?>"><br>
		xtimer_min<input id="xtimer_min" value="<?=$timer_min ?>"><br>
		xtimer_sec<input id="xtimer_sec" value="<?=$timer_sec ?>"><br>
			<br>
		xpoint_presensi<input id="xpoint_presensi" value="<?=$point_presensi ?>"><br>
		detik_sisa<input id="detik_sisa" value="<?=$detik_sisa ?>"><br>


		
	</div>
	<div class="blok_mk_info wadah">
		<div class="row">
			<div class="col-lg-3">
				<div><small class="abu2">MK:</small></div>
				<span id="nama_mk" class="point_list"><?=$nama_mk?></span>
			</div>
			<div class="col-lg-3">
				<div><small class="abu2">Sesi:</small></div>
				<span id="nama_mk_sesi" class="point_list"><?=$nama_mk_sesi?></span>
			</div>
			<div class="col-lg-3">
				<div><small class="abu2">Berakhir dalam:</small></div>
				<div style="border:solid 1px #ccc; padding:4px; border-radius: 5px; text-align:center">
					<input class="timer" type="text" minlength="1" maxlength="1" style="text-align:center;" value="<?=$timer_hour ?>" id="timer_hour">
					:
					<input class="timer" type="text" minlength="1" maxlength="2" style="text-align:center;" value="<?=$timer_min ?>" id="timer_min">
					:
					<input class="timer" type="text" minlength="1" maxlength="2" style="text-align:center;" value="<?=$timer_sec ?>" id="timer_sec">
				</div>
			</div>
			<div class="col-lg-3">
				<?=$blok_btn ?>
			</div>
			<div class='col-lg-12 <?=$hide_poin_presensi ?>'>
				<div class="wadah <?=$class_blok_point_presensi ?>">
					<h3 align="center">
						Point Presensi: <input id="poin_presensi" value="<?=$point_presensi ?>" class='hideit'> <span id="poin_presensi_cap" style="font-size: 40px; font-family: 'century gothic'; color: darkblue;"><?=$point_presensi_cap ?></span> LP
					</h3>
					<?=$ket_pengurangan_point ?>
				</div>
				
			</div>
		</div>
	</div>



	<script type="text/javascript">
		$(document).ready(function(){

			var id_mk = parseInt($("#id_mk").val());
			var id_mk_sesi = parseInt($("#id_mk_sesi").val());
			var nama_mk = $("#nama_mk").text();
			var nama_sesi_mk = $("#nama_sesi_mk").text();

			var detik_berlangsung= parseInt($("#detik_berlangsung").val());
			// var menit_berlangsung= parseInt($("#menit_berlangsung").val());
			// var jam_berlangsung= parseInt($("#jam_berlangsung").val());

			const timer_sesi_kuliah = setInterval(function(){

				// console.log("Timer is ON");

				if($("#btn_start_sesi_kuliah").text()=="Start Sesi Kuliah"
				 || $("#btn_start_sesi_kuliah").text()=="Perkuliahan Berakhir"
				 || $("#btn_start_sesi_kuliah").text()=="Belum Dimulai"
				 ) return;

				let h = parseInt($("#timer_hour").val());
				let m = parseInt($("#timer_min").val());
				let s = parseInt($("#timer_sec").val());

				if(h == 0 && m == 0 && s == 0){
					location.reload();
					clearInterval(timer_sesi_kuliah);
					return;
				}

				if(s==0 && m==0){
					m=59;
					s=59;
					h--;
				}else if(s==0 && m!=0){
					m--;
					s=59;
				}else	if(m==0 && s==0){
					h--;
					m=59;
				}else{
					s--;
				}



				$("#timer_hour").val(h);
				$("#timer_min").val(m);
				$("#timer_sec").val(s);

				// console.log("h:m:s = "+h+":"+m+":"+s+"")


				let poin_presensi = parseFloat($("#poin_presensi").val());
				// let menit_terlambat = $("#menit_terlambat").val();
				let menit_terlambat = 10; /// zzz debug
				let poin_presensi_cap;

				detik_berlangsung++;

				if(detik_berlangsung>menit_terlambat*60 && poin_presensi>100){ //zzz debug
					// console.log("detik_berlangsung>menit_terlambat*60 && poin_presensi>100 => "+detik_berlangsung+">"+menit_terlambat+"*60 && "+poin_presensi+">100");
					poin_presensi -= (9/30);
					poin_presensi_cap = parseInt(poin_presensi);
					if(poin_presensi_cap<100) poin_presensi_cap=100;

					$("#poin_presensi_cap").text(poin_presensi_cap);

				}else{
					// console.log("else if: "+detik_berlangsung+">"+menit_terlambat+"*60 && "+poin_presensi+">100");
				}
				$("#poin_presensi").val(poin_presensi);
				$("#detik_berlangsung").val(detik_berlangsung);


			},1000);

			// clearInterval(timer_sesi_kuliah);

			// ========================================
			// DOSEN START SESI KULIAH
			// ========================================
			$("#btn_start_sesi_kuliah").click(function(){

				let c = $(this).text();
				if(c=="Stop Perkuliahan"){
					let x = confirm("Yakin untuk menghentikan Sesi Kuliah ?");
					if(!x) return;

					$(this).text("Kuliah Berakhir");
					$(this).prop("disabled", true);

					clearInterval(timer);
					return;
				}
				// alert(1);

				let h = parseInt($("#timer_hour").val());
				let m = parseInt($("#timer_min").val());
				let s = parseInt($("#timer_sec").val());

				let cadmin_level = $("#cadmin_level").val();
				if(cadmin_level=="2"){
					let x = confirm("Yakin untuk Start Sesi Kuliah?\n\n\ndalam durasi "+h+":"+m+" ?"); if(!x) return;
				}else{
					let x = confirm("Yakin untuk Mengikuti Kuliah?"); if(!x) return;
				}

				let durasi_kuliah = ""+h+":"+m+":"+s+"";

				let lz = "../ajax_presline/ajax_start_sesi_kuliah.php"
				+"?durasi_kuliah="+durasi_kuliah
				;

				$.ajax({
					url:lz,
					success:function(h){
						if(h=="1__"){
							$("#btn_start_sesi_kuliah").removeClass();
							if(cadmin_level==2){
								$("#btn_start_sesi_kuliah").addClass("btn btn-danger");
								$("#btn_start_sesi_kuliah").text("Stop Perkuliahan");
							}
							$("#status_mk_sesi").val("1");


							setInterval(timer_sesi_kuliah,1000);
							console.log("setInterval(timer_sesi_kuliah,1000);")

						}else{
							alert(h);
						}
					}
				})
			})

			$(".timer").keyup(function(){
				let timer_hour = parseInt($("#timer_hour").val());
				let timer_min = parseInt($("#timer_min").val());
				let timer_sec = parseInt($("#timer_sec").val());
				$("#durasi").val(timer_hour+":"+timer_min+":"+timer_sec);

				if(isNaN(timer_hour) || isNaN(timer_min) || isNaN(timer_sec)){
					$("#btn_start_sesi_kuliah").prop("disabled",true);
				}else{
					$("#btn_start_sesi_kuliah").prop("disabled",false);
				}
			})


		})
	</script>


<?php } ?>