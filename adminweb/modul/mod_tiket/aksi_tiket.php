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

// Hapus tiket
if ($module=='tiket' AND $act=='hapus'){
  mysql_query("DELETE FROM tiket WHERE id_tiket='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input tiket
elseif ($module=='tiket' AND $act=='input'){

    mysql_query("INSERT INTO tiket
                            VALUES('',
                                   '$_POST[nama_tiket]',
                                   '$_POST[id_jenis]',
								   '$_POST[harga_tiket]',
                                   '$_POST[tujuan]')");
  header('location:../../media.php?module='.$module);
  
}

// Update tiket
elseif ($module=='tiket' AND $act=='update'){

    mysql_query("UPDATE tiket SET nama_tiket = '$_POST[nama_tiket]',
                                   id_jenis = '$_POST[id_jenis]',
								   tujuan = '$_POST[tujuan]',
                                   harga_tiket       = '$_POST[harga_tiket]'
                             WHERE id_tiket   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  
}
}
?>
