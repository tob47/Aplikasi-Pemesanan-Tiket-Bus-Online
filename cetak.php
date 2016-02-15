<?php
error_reporting(0);
session_start();
include "config/koneksi.php";
include "pdf/fpdf.php";

function format_rupiah($angka){
  $rupiah=number_format($angka,0,',','.');
  return $rupiah;
}

$pdf = new FPDF();
$pdf->AddPage();

$pdf->setFont('Arial','B',16);
$pdf->setXY(20,10); $pdf->cell(30,6,'Bukti Transaksi Pemesanan Tiket PO. Karunia Bakti Tasikmalaya');
$pdf->setFont('Arial','B',10);
$sql = mysql_query("SELECT * FROM orders_detail,tiket,orders,kustomer 
                                 WHERE orders_detail.id_tiket=tiket.id_tiket 
								 AND orders.id_orders=orders_detail.id_orders
								 AND orders.id_kustomer=kustomer.id_kustomer
                                 AND orders.id_orders='$_GET[id]'");
$data = mysql_fetch_array($sql);
$pdf->setXY(20,20); $pdf->cell(50,6,'Nama ');$pdf->cell(50,6,': '.$data[nama_lengkap]);
$pdf->setXY(20,26); $pdf->cell(50,6,'Alamat ');$pdf->cell(50,6,': '.$data[alamat]);
$pdf->setXY(20,32); $pdf->cell(50,6,'Telpon');$pdf->cell(50,6,': '.$data[telpon]);
$pdf->setXY(20,38); $pdf->cell(50,6,'No Orders ');$pdf->cell(50,6,': '.$_GET[id]);
$pdf->setXY(20,44); $pdf->cell(50,6,'Data pesanan tiket Anda adalah sebagai berikut:');
$y_initial = 58;
$y_axis1 = 52;
$pdf->setFont('Arial','',10);
$pdf->setFillColor(233,233,233);
$pdf->setY($y_axis1);
$pdf->setX(20);

$pdf->cell(7,6,'NO',1,0,'C',1);
$pdf->cell(30,6,'TIKET',1,0,'C',1);
$pdf->cell(20,6,'JUMLAH',1,0,'C',1);
$pdf->cell(30,6,'NO KURSI',1,0,'C',1);
$pdf->cell(30,6,'HARGA',1,0,'C',1);
$pdf->cell(30,6,'SUB TOTAL',1,0,'C',1);
$y = $y_initial + $row;
$sql2 = mysql_query("SELECT * FROM orders_detail,tiket,orders,kustomer 
                                 WHERE orders_detail.id_tiket=tiket.id_tiket 
								 AND orders.id_orders=orders_detail.id_orders
								 AND orders.id_kustomer=kustomer.id_kustomer
                                 AND orders.id_orders='$_GET[id]'");
$no = 0;
$row = 6;
$nokursi = "";
		$s2=mysql_query("SELECT dk.no_kursi FROM detail_kursi dk,orders_detail od,orders o where od.id_orders=dk.id_orders and o.id_orders=od.id_orders and o.id_orders='$_GET[id]' ORDER BY dk.no_kursi");
		while ($r2=mysql_fetch_array($s2)){
			$nokursi .= $r2['no_kursi'].",";
		}
while ($data2 = mysql_fetch_array($sql2))
{
$subtotal    = ($data2[harga_tiket]) * $data2[jumlah];

   $total       = $subtotal;
   $subtotal_rp = format_rupiah($subtotal);    
   $total_rp    = format_rupiah($total);    
   $harga       = format_rupiah($data2[harga_tiket]);
	$no++;
	$pdf->setY($y);
	$pdf->setX(20);
	$pdf->cell(7,6,$no,1,0,'C');
	$pdf->cell(30,6,$data2['nama_tiket'],1,0,'L');
	$pdf->cell(20,6,$data2['jumlah'],1,0,'C');
	$pdf->cell(30,6,$nokursi,1,0,'C');
	$pdf->cell(30,6,$harga,1,0,'C');
	$pdf->cell(30,6,$subtotal_rp,1,0,'R');
	$y = $y + $row;
}
$pdf->setXY(135,$y+5);
$pdf->cell(30,6,'Total : Rp. '.$total_rp);
$tgl = date("d-m-Y  H:m:i");
$pdf->setXY(20,$y+10);
$pdf->cell(30,6,'Tanggal Transaksi : '.$tgl);
$pdf->Output();

?>