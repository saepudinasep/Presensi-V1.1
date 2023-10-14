<?php 
# ================================================
# SESSION SECURITY
# ================================================
include "cek_sesi_dosen.php";

$id_mk = isset($_GET['id_mk']) ? $_GET['id_mk'] : die(erjx("id_mk"));
$id_mk_sesi = isset($_GET['id_mk_sesi']) ? $_GET['id_mk_sesi'] : die(erjx("id_mk_sesi"));
$durasi = isset($_GET['durasi']) ? $_GET['durasi'] : die(erjx("durasi"));

$id_sesi_kuliah = "$username"."_$id_room"."_$id_mk_sesi";

$s = "INSERT INTO tb_sesi_kuliah (

id_sesi_kuliah,
durasi,
id_room,
start_by,
id_mk_sesi

) VALUES (

'$id_sesi_kuliah',
'$durasi',
'$id_room',
'$username',
'$id_mk_sesi'

)";

$q = mysqli_query($cn, $s) or die(mysqli_error($cn));

echo "1__";


?>