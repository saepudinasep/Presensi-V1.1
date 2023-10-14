<?php 
if(isset($_POST['btn_upload_profil'])){

	if(!file_exists($path_folder)) mkdir($path_folder);

	if(file_exists($path_profile)){
		rename($path_profile, $path_profile."_".date("YmdHis").".jpg");
	}

	$tmp_name = $_FILES['input_profil']['tmp_name'];

	if(move_uploaded_file($tmp_name, $path_profile)){

	}

}



?>
<!-- <hr> -->
<!-- <p>Agar kamu dapat bergabung pada Join Sesi, kamu wajib upload foto profile kamu.</p> -->
<div class="alert alert-success">Silahkan upload foto profil! <div><small>Foto profil kamu tidak bersifat public (friends-only)</small></div></div>

<form method="post" enctype="multipart/form-data">
	<div class="form-group" id="blok_upload_profil">
		<div>
			<small>
				Gunakan gambar JPG berukuran antara 30 s.d 200kb, terlihat wajah, boleh formal, boleh pose bebas!
			</small>
		</div>
		<div>&nbsp;</div>
		<div class="blok_inpu_profil">
			<input type="file" name="input_profil" accept="image/jpg, image/jpeg">
		</div>
		<div>
			<button class="btn btn-primary btn-block" name="btn_upload_profil">Upload</button>
		</div>
		<div>
			<span><small id="lihat_contoh">Lihat Contoh</small></span>
			<div id="blok_contoh_profil">
				<div><img src="img/profiles/example1.jpg" class="foto_profil"></div>
				<div><img src="img/profiles/example2.jpg" class="foto_profil"></div>
				<div><img src="img/profiles/example3.jpg" class="foto_profil"></div>
				<div><img src="img/profiles/example4.jpg" class="foto_profil"></div>
			</div>
		</div>
		
	</div>
</form>

<div style="height:200px">&nbsp;</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#lihat_contoh").click(function(){
			$("#blok_contoh_profil").slideToggle();
		});

		$("#lihat_contoh").click();
	})
</script>