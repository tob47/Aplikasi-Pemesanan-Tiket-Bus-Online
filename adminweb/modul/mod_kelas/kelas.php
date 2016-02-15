<?php
$aksi="modul/mod_kelas/aksi_kelas.php";
switch($_GET[act]){

  default:
    echo "<h2>Kelas Bis</h2>
          <input type=button value='Tambah Kelas' 
          onclick=\"window.location.href='?module=kelas&act=tambahkelas';\">
          <table>
          <tr><th>no</th><th>kelas</th><th>jumlah kursi</th><th>aksi</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM kelas ORDER BY id_kelas DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nama_kelas]</td>
			 <td align=center>$r[jumlah_kursi]</td>
             <td><a href=?module=kelas&act=editkelas&id=$r[id_kelas]>Edit</a> | 
	               <a href=$aksi?module=kelas&act=hapus&id=$r[id_kelas]>Hapus</a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
    break;

  case "tambahkelas":
    echo "<h2>Tambah Kelas</h2>
          <form method=POST action='$aksi?module=kelas&act=input'>
          <table>
          <tr><td>Nama Kelas</td><td> : <input type=text name='nama_kelas'></td></tr>
		  <tr><td>Jumlah Kursi</td><td> : <input type=text name='jumlah_kursi'></td></tr>
          <tr><td colspan=2><input type=submit name=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;

  case "editkelas":
    $edit=mysql_query("SELECT * FROM kelas WHERE id_kelas='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h2>Edit Kelas</h2>
          <form method=POST action=$aksi?module=kelas&act=update>
          <input type=hidden name=id value='$r[id_kelas]'>
          <table>
          <tr><td>Nama Kelas</td><td> : <input type=text name='nama_kelas' value='$r[nama_kelas]'></td></tr>
		  <tr><td>Jumlah Kursi</td><td> : <input type=text name='jumlah_kursi' value='$r[jumlah_kursi]'></td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>
