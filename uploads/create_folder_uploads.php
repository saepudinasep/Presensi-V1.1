<div id="list_mahasiswa">
	<h3>List Mahasiswa</h3>

	<?php 
	include '../config.php';

	$s = "SELECT * from tb_user ";

	$q = mysqli_query($cn, $s) or die(mysqli_error($cn));

	while ($d=mysqli_fetch_assoc($q)) {
		$folder_uploads = $d['folder_uploads'];

		if(!file_exists($folder_uploads)) {mkdir($folder_uploads); echo "<br>mkdir $folder_uploads";};
	}
	?>



</div>
