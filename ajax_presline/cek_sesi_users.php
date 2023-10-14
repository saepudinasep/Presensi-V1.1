<?php 
# ================================================
# SESSION SECURITY
# ================================================
session_start();

function erjx($a){return "Error Cek-Sesi-Mhs @ajax\n\nIndex: $a undefined.";}

$username = isset($_SESSION['username'])?$_SESSION['username']:die(erjx("username"));
$admin_level = isset($_SESSION['admin_level'])?$_SESSION['admin_level']:die(erjx("admin_level"));
if($admin_level<1) die(erjx("Silahkan Anda login terlebih dahulu untuk mengakses fitur ini."));

$id_mk = isset($_SESSION['id_mk'])?$_SESSION['id_mk']:die(erjx("id_mk"));

$status_mk_sesi = isset($_SESSION['status_mk_sesi'])?$_SESSION['status_mk_sesi']:die(erjx("status_mk_sesi"));



require_once "../config.php";
?>