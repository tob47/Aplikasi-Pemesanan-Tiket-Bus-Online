<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_tiket/aksi_tiket.php";
switch($_GET[act]){
  // Tampil tiket
  default:
    echo "<h2>Tiket</h2>
          <input type=button value='Tambah Tiket' onclick=\"window.location.href='?module=tiket&act=tambahtiket';\">
          <table>
          <tr><th>no</th><th>nama tiket</th><th>kelas</th><th>tujuan</th><th>harga tiket</th><th>aksi</th></tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT * FROM tiket join kelas using(id_kelas) ORDER BY id_tiket DESC LIMIT $posisi,$batas");
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $harga=format_rupiah($r[harga_tiket]);
      echo "<tr><td>$no</td>
                <td>$r[nama_tiket]</td>
                <td align=center>$r[nama_kelas]</td>
				<td align=center>$r[tujuan]</td>
                <td align=center>$harga</td>
		            <td><a href=?module=tiket&act=edittiket&id=$r[id_tiket]>Edit</a> | 
		                <a href='$aksi?module=tiket&act=hapus&id=$r[id_tiket]'>Hapus</a></td>
		        </tr>";
      $no++;
    }
    echo "</table>";

    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM tiket"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>Hal: $linkHalaman</div><br>";
 
    break;
  
  case "tambahtiket":
    echo "<h2>Tambah Tiket</h2>
          <form method=POST action='$aksi?module=tiket&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td width=100>Nama Tiket</td>     <td> : <input type=text name='nama_tiket' size=30></td></tr>
          <tr><td>Kelas</td>  <td> : 
          <select name='id_kelas'>
            <option value=0 selected>- Pilih kelas -</option>";
            $tampil=mysql_query("SELECT * FROM kelas ORDER BY nama_kelas");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_kelas]>$r[nama_kelas]</option>";
            }
    echo "</select></td></tr>
	<tr><td width=100>Tujuan</td>     <td> : <input type=text name='tujuan' size=30></td></tr>
          <tr><td>Harga Tiket</td>     <td> : <input type=text name='harga_tiket' size=10></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
    
  case "edittiket":
    $edit = mysql_query("SELECT * FROM tiket WHERE id_tiket='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit tiket</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=tiket&act=update>
          <input type=hidden name=id value=$r[id_tiket]>
          <table>
          <tr><td width=70>Nama Tiket</td>     <td> : <input type=text name='nama_tiket' size=30 value='$r[nama_tiket]'></td></tr>
          <tr><td>Kelas</td>  <td> : <select name='id_kelas'>";
 
          $tampil=mysql_query("SELECT * FROM kelas ORDER BY nama_kelas");
          if ($r[id_kelas]==0){
            echo "<option value=0 selected>- Pilih kelas -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_kelas]==$w[id_kelas]){
              echo "<option value=$w[id_kelas] selected>$w[nama_kelas]</option>";
            }
            else{
              echo "<option value=$w[id_kelas]>$w[nama_kelas]</option>";
            }
          }
    echo "</select></td></tr>
	<tr><td width=100>Tujuan</td>     <td> : <input type=text name='tujuan' size=30 value=$r[tujuan]></td></tr>
          <tr><td>Harga Tiket</td>     <td> : <input type=text name='harga_tiket' value=$r[harga_tiket] size=10></td></tr>
          
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
    break;  
}
}
?>
