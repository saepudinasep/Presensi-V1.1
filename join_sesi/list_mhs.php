<?php 
include '../config.php';
$petunjuk = "<a href='?list_mhs&peserta_only=1'>List Peserta</a> | Untuk menambahkan mahasiswa menjadi peserta MK, silahkan ceklis lalu klik Assign.";
$judul = "List Mahasiswa";
$opsi_btn_class = "";

$sql_peserta = "";
$peserta_only = isset($_GET['peserta_only']) ? $_GET['peserta_only'] : 0;

if($peserta_only){
	$sql_peserta = "
	JOIN tb_kelas_peserta c ON a.username=c.username 
	JOIN tb_kelas d ON c.id_kelas=d.id_kelas 
	JOIN tb_mk_kelas e ON d.id_kelas=e.id_kelas 
	WHERE e.id_mk = $id_mk 
	";

	$petunjuk = "<a href='?list_mhs'>List Mahasiswa</a> | Anda dapat mengeluarkan peserta dengan mengklik Drop.";
	$judul = "List Peserta MK $nama_mk";
	$opsi_btn_class = "hideit";
}

$s = "SELECT 
a.username,
b.nim,
b.nama_mhs,
(SELECT 1 FROM tb_kelas_peserta p 
	JOIN tb_kelas q ON p.id_kelas=q.id_kelas 
	JOIN tb_mk_kelas r ON q.id_kelas=r.id_kelas 
	WHERE r.id_mk = '$id_mk'
	AND p.username = a.username 
 ) as is_peserta_mk 

FROM tb_user a 
JOIN tb_mhs b ON a.username=b.username 
$sql_peserta 
";

$q = mysqli_query($cn, $s) or die(mysqli_error($cn));

$jumlah_mhs = mysqli_num_rows($q);
$tb_header = "";
$captions = [];
$rows = "<td colspan='5' class='alert alert-danger'>Belum ada data mahasiswa.</td>";

if($jumlah_mhs){
	$rows = "";
	$captions = ["No","Check","Username","NIM","Nama","Aksi"];
	$tb_header = "<thead>";
	foreach ($captions as $k=>$v) $tb_header.="<th>$v</th>";
	$tb_header .= "</thead>";

	$i=0;
	while ($d=mysqli_fetch_assoc($q)) {
		$i++;
		$username = $d['username'];
		$nim = $d['nim'];
		$nama_mhs = $d['nama_mhs'];
		$is_peserta_mk = $d['is_peserta_mk'];

		$disable_check = $is_peserta_mk ? "disabled" : "";

		$aksi = $peserta_only ? "Drop" : "Edit | Hapus";

		$rows.= "
		<tr>
		  <td>$i</td>
		  <td>
		    <input type='checkbox' id='mhs_check__$username' class='mhs_check' $disable_check>
		  </td>
		  <td>$username</td>
		  <td>$nim</td>
		  <td>$nama_mhs</td>
		  <td>$aksi</td>
		</tr>
		";
	}
}



?>
































<div id="list_mahasiswa">
	<h3><?=$judul?></h3>
	<p><?=$petunjuk?></p>
	<table class="table table-striped table-hover">
		<?=$tb_header?>
		<?=$rows?>
	</table>
</div>

<div class="<?=$opsi_btn_class ?>">
	<div><input type="" id="checked_usernames"></div>
	<small>Tidak bisa diceklis artinya sudah menjadi Peserta MK <?=$nama_mk?></small>
	<div style="margin-top: 5px;">
		<button class="btn btn-primary">Tambah</button>
		<button class="btn btn-success">Export</button>
		<button class="btn btn-warning">Import</button>
		<button class="btn btn-success">Assign</button>
	</div>
</div>