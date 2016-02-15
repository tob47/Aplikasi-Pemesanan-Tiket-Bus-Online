<?php
$aksi="modul/mod_profil/aksi_profil.php";
switch($_GET[act]){
  // Tampil Profil
  default:
    $sql  = mysql_query("SELECT * FROM modul WHERE id_modul='43'");
    $r    = mysql_fetch_array($sql);

    echo "<h2>Profil Karunia Bakti</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=profil&act=update>
          <input type=hidden name=id value=$r[id_modul]>
          <table>
          <tr><td>Gambar</td><td> : <img src=../foto_banner/$r[gambar]></td></tr>
         <tr><td>Ganti Foto</td><td> : <input type=file size=30 name=fupload></td></tr>
         <tr><td>Isi Profil</td><td><textarea name='isi' style='width: 560px; height: 250px;'>$r[static_content]</textarea></td></tr>
         <tr><td colspan=2><input type=submit value=Update>
                           <input type=button value=Batal onclick=self.history.back()></td></tr>
         </form></table>";
    break;  
}
?>
