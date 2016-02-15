<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus jadwal
if ($module=='jadwal' AND $act=='hapus'){
  mysql_query("DELETE FROM jadwal WHERE id_jadwal='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input jadwal
elseif ($module=='jadwal' AND $act=='input'){

    mysql_query("INSERT INTO jadwal
                            VALUES('',
								   '$_POST[tujuan]',
                                   '$_POST[jam]')");
  header('location:../../media.php?module='.$module);
  
}

// Update jadwal
elseif ($module=='jadwal' AND $act=='update'){

    mysql_query("UPDATE jadwal SET 
								   tujuan = '$_POST[tujuan]',
                                   jam       = '$_POST[jam]'
                             WHERE id_jadwal   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  
}
}
?>
