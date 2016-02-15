<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_jadwal/aksi_jadwal.php";
switch($_GET[act]){
  // Tampil jadwal
  default:
    echo "<h2>Jadwal</h2>
          <input type=button value='Tambah Jadwal' onclick=\"window.location.href='?module=jadwal&act=tambahjadwal';\">
          <table>
          <tr><th>no</th><th>tujuan</th><th>jam</th><th>aksi</th></tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT * FROM jadwal ORDER BY id_jadwal DESC LIMIT $posisi,$batas");
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $harga=format_rupiah($r[harga_jadwal]);
      echo "<tr><td>$no</td>
                <td>$r[tujuan]</td>
                <td align=center>$r[jam]</td>
		            <td><a href=?module=jadwal&act=editjadwal&id=$r[id_jadwal]>Edit</a> | 
		                <a href='$aksi?module=jadwal&act=hapus&id=$r[id_jadwal]'>Hapus</a></td>
		        </tr>";
      $no++;
    }
    echo "</table>";

    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM jadwal"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>Hal: $linkHalaman</div><br>";
 
    break;
  
  case "tambahjadwal":
    echo "<h2>Tambah Jadwal</h2>
          <form method=POST action='$aksi?module=jadwal&act=input' >
          <table>
          <tr><td width=100>Tujuan</td>     <td> : <input type=text name='tujuan' size=30></td></tr>
          <tr><td>Jam</td>     <td> : <input type=text name='jam' size=10></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
    
  case "editjadwal":
    $edit = mysql_query("SELECT * FROM jadwal WHERE id_jadwal='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit jadwal</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=jadwal&act=update>
          <input type=hidden name=id value=$r[id_jadwal]>
          <table>
	<tr><td width=100>Tujuan</td>     <td> : <input type=text name='tujuan' size=30 value=$r[tujuan]></td></tr>
          <tr><td>Jam</td>     <td> : <input type=text name='jam' value=$r[jam] size=10></td></tr>
          
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
    break;  
}
}
?>
