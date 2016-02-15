<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
error_reporting(0);

include "class.ezpdf.php";
include "../../../config/koneksi.php";
include "rupiah.php";
  
$pdf = new Cezpdf();
 
// Set margin dan font
$pdf->ezSetCmMargins(3, 3, 3, 3);
$pdf->selectFont('fonts/Courier.afm');

$all = $pdf->openObject();

// Tampilkan logo
$pdf->setStrokeColor(0, 0, 0, 1);

// Teks di tengah atas untuk judul header
$pdf->addText(150, 820, 16,'<b>Laporan Penjualan Tiket Harian</b>');
$pdf->addText(170, 800, 14,'<b>PO Karunia Bakti Tasikmalaya</b>');
// Garis atas untuk header
$pdf->line(10, 795, 578, 795);

// Garis bawah untuk footer
$pdf->line(10, 50, 578, 50);
// Teks kiri bawah
$pdf->addText(30,34,8,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));

$pdf->closeObject();

// Tampilkan object di semua halaman
$pdf->addObject($all, 'all');

$sekarang=date('Y-m-d');

// Query untuk merelasikan kedua tabel di filter berdasarkan tanggal
$sql = mysql_query("SELECT orders.id_orders as faktur,DATE_FORMAT(tgl_order, '%d-%m-%Y') as tanggal,
                    nama_tiket,jumlah,harga_tiket 
                    FROM orders, orders_detail, tiket  
                    WHERE (orders_detail.id_tiket=tiket.id_tiket) 
                    AND (orders_detail.id_orders=orders.id_orders)
                    AND (orders.status_order='Lunas') 
                    AND (orders.tgl_order='$sekarang')");
$jml = mysql_num_rows($sql);

if ($jml > 0){
$i = 1;
while($r = mysql_fetch_array($sql)){
  $quantityharga=rp($r[jumlah]*$r[harga_tiket]);
  $hargarp=rp($r[harga_tiket]); 
  $faktur=$r[faktur];
  
  $data[$i]=array('<b>No</b>'=>$i, 
                  '<b>Faktur</b>'=>$faktur, 
                  '<b>Nama Tiket</b>'=>$r[nama_tiket], 
                  '<b>Jumlah</b>'=>$r[jumlah], 
                  '<b>Harga</b>'=>$hargarp,
                  '<b>Sub Total</b>'=>$quantityharga);
	$total = $total+($r[jumlah]*$r[harga_tiket]);
	$totqu = $totqu + $r[jumlah];
  $i++;
}

$pdf->ezTable($data, '', '', '');

$tot=rp($total);
$pdf->ezText("\n\n                           Total keseluruhan : Rp. {$tot}");

// Penomoran halaman
$pdf->ezStartPageNumbers(320, 15, 8);
$pdf->ezStream();
}
else{
  $skrg=date('d-M-Y');
  echo "Tidak ada transaksi/order pada Tanggal <b>$skrg</b><br /><br />
       <input type=button value=Kembali onclick=self.history.back()>";
}
}
?>
