<?php
require("lib/nusoap.php");
?>
<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_order/aksi_order.php";
switch($_GET[act]){
  // Tampil Order
  default:
    echo "<h2>Order</h2>
          <table>
          <tr><th>no.order</th><th>nama kustomer</th><th>tgl. order</th><th>jam</th><th>status</th><th>aksi</th></tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT * FROM orders,kustomer WHERE orders.id_kustomer=kustomer.id_kustomer ORDER BY id_orders DESC LIMIT $posisi,$batas");
  
    while($r=mysql_fetch_array($tampil)){
      $tanggal=tgl_indo($r[tgl_order]);
      echo "<tr><td align=center>$r[id_orders]</td>
                <td>$r[nama_lengkap]</td>
                <td>$tanggal</td>
                <td>$r[jam_order]</td>
                <td>$r[status_order]</td>
		            <td><a href=?module=order&act=detailorder&id=$r[id_orders]>Detail</a></td></tr>";
      $no++;
    }
    echo "</table>";

    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM orders"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>Hal: $linkHalaman</div><br>";
    break;
  
    
  case "detailorder":
    $edit = mysql_query("SELECT * FROM orders,kustomer WHERE orders.id_kustomer=kustomer.id_kustomer AND id_orders='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
    $tanggal=tgl_indo($r[tgl_order]);
    
    if ($r[status_order]=='Baru'){
        $pilihan_status = array('Baru', 'Lunas');
    }
    elseif ($r[status_order]=='Lunas'){
        $pilihan_status = array('Lunas', 'Batal');    
    }
    else{
        $pilihan_status = array('Baru', 'Lunas', 'Batal');    
    }

    $pilihan_order = '';
    foreach ($pilihan_status as $status) {
	   $pilihan_order .= "<option value=$status";
	   if ($status == $r[status_order]) {
		    $pilihan_order .= " selected";
	   }
	   $pilihan_order .= ">$status</option>\r\n";
    }

    echo "<h2>Detail Order</h2>
          <form method=POST action=$aksi?module=order&act=update>
          <input type=hidden name=id value=$r[id_orders]>

          <table>
          <tr><td>No. Order</td>        <td> : $r[id_orders]</td></tr>
          <tr><td>Tgl. & Jam Order</td> <td> : $tanggal & $r[jam_order]</td></tr>
          <tr><td>Status Order      </td><td>: $r[status_order]
          </td></tr>
          </table></form>";

  // tampilkan rincian tiket yang di order
  $sql2=mysql_query("SELECT * FROM orders_detail, tiket 
                     WHERE orders_detail.id_tiket=tiket.id_tiket 
                     AND orders_detail.id_orders='$_GET[id]'");
  $nokursi = "";
		$s2=mysql_query("SELECT dk.no_kursi FROM detail_kursi dk,orders_detail od,orders o where od.id_orders=dk.id_orders and o.id_orders=od.id_orders and o.id_orders='$_GET[id]' ORDER BY dk.no_kursi");
		while ($r2=mysql_fetch_array($s2)){
			$nokursi .= $r2['no_kursi'].",";
		}
  echo "<table border=0 width=500>
        <tr><th>Nama Tiket</th><th>Jumlah</th><th>No Kursi</th><th>Harga Tiket</th><th>Sub Total</th></tr>";
  
  while($s=mysql_fetch_array($sql2)){
 
   $subtotal    = ($s[harga_tiket]) * $s[jumlah];

    $total       = $subtotal;
    $subtotal_rp = format_rupiah($subtotal);    
    $total_rp    = format_rupiah($total);    
    $harga       = format_rupiah($s[harga_tiket]);

    echo "<tr><td>$s[nama_tiket]</td><td align=center>$s[jumlah]</td><td align=center>$nokursi</td>
              <td align=right>$harga</td><td align=right>$subtotal_rp</td></tr>";
  }

  $grandtotal    = $total; 

  $grandtotal_rp  = format_rupiah($grandtotal);    

echo "
      <tr><td colspan=4 align=right>Grand Total        Rp. : </td><td align=right><b>$grandtotal_rp</b></td></tr>
      </table>";


  // tampilkan data kustomer
  echo "<table border=0 width=500>
        <tr><th colspan=2>Data Kustomer</th></tr>
        <tr><td>Nama Kustomer</td><td> : $r[nama_lengkap]</td></tr>
        <tr><td>Alamat Pengiriman</td><td> : $r[alamat]</td></tr>
        <tr><td>No. Telpon/HP</td><td> : $r[telpon]</td></tr>
        <tr><td>Email</td><td> : $r[email]</td></tr>
        </table>";

    break;  
}
}
?>
