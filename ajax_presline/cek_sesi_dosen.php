<?php 
# ================================================
# SESSION SECURITY
# ================================================
session_start();

function erjx($a){return "Error @ajax\n\nIndex: $a undefined.";}

$username = isset($_SESSION['username'])?$_SESSION['username']:die(erjx("username"));
$admin_level = isset($_SESSION['admin_level'])?$_SESSION['admin_level']:die(erjx("admin_level"));
$id_mk = isset($_SESSION['id_mk'])?$_SESSION['id_mk']:die(erjx("id_mk"));

if($admin_level!=2) die(erjx("Error @cek_sesi_dosen. Hanya dosen yang berhak merequest ke fitur ini."));

$status_mk_sesi = isset($_SESSION['status_mk_sesi'])?$_SESSION['status_mk_sesi']:die(erjx("status_mk_sesi"));
// if($status_mk_sesi==0) die("Sesi Perkuliahan telah berakhir. Silahkan Logout dan Pilih kembali sesi perkuliahan yang aktif");


require_once "../config.php";
?>