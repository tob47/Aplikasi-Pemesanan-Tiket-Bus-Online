<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
    echo "<h2>Ganti Password</h2>
          <form method=POST action=modul/mod_password/aksi_password.php>
          <table>
          <tr><td>Masukkan Password Lama</td><td> : <input type=password name='pass_lama'></td></tr>
          <tr><td>Masukkan Password Baru</td><td> : <input type=password name='pass_baru'></td></tr>
          <tr><td>Masukkan Lagi Password Baru</td><td> : <input type=password name='pass_ulangi'></td></tr>
          <tr><td colspan=2><input type=submit value=Proses>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
}
?>
