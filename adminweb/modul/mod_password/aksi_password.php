<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";

$r=mysql_fetch_array(mysql_query("SELECT * FROM admins"));

$pass_lama=md5($_POST[pass_lama]);
$pass_baru=md5($_POST[pass_baru]);

if (empty($_POST[pass_baru]) OR empty($_POST[pass_lama]) OR empty($_POST[pass_ulangi])){
  echo "<p align=center>Anda harus mengisikan semua data pada form Ganti Password.<br />"; 
  echo "<a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a></p>";
}
else{ 
// Apabila password lama cocok dengan password admin di database
if ($pass_lama==$r[password]){
  // Pastikan bahwa password baru yang dimasukkan sebanyak dua kali sudah cocok
  if ($_POST[pass_baru]==$_POST[pass_ulangi]){
    mysql_query("UPDATE admins SET password = '$pass_baru'");
    header('location:../../media.php?module=home');
  }
  else{
    echo "<p align=center>Password baru yang Anda masukkan sebanyak dua kali belum cocok.<br />"; 
    echo "<a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a></p>";  
  }
}
else{
  echo "<p align=center>Anda salah memasukkan Password Lama Anda.<br />"; 
  echo "<a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a></p>";
}
}
}
?>
