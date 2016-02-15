<?php
if($_GET['module']=='home'){
	echo "<span class='current'>Home</span>";
}
elseif($_GET['module']=='profilkami'){
	echo "<span class='current'>Profil</span>";
}
elseif($_GET['module']=='carabeli'){
	echo "<span class='current'>Cara Pembelian</span>";
}
elseif($_GET['module']=='semuaproduk'){
	echo "<span class='current'>Semua Produk</span>";
}
elseif($_GET['module']=='keranjangbelanja'){
	echo "<span class='current'>Keranjang Belanja</span>";
}
elseif($_GET['module']=='hubungikami'){
	echo "<span class='current'>Hubungi Kami</span>";
}
elseif($_GET['module']=='hubungiaksi'){
	echo "<span class='current'>Hubungi Kami</span>";
}
elseif($_GET['module']=='hasilcari'){
	echo "<span class='current'>Hasil Pencarian</span>";
}
elseif($_GET['module']=='selesaibelanja'){
	echo "<span class='current'>Data Pembeli</span>";
}
elseif($_GET['module']=='simpantransaksi'){
	echo "<span class='current'>Transaksi Selesai</span>";
}
elseif($_GET['module']=='simpantransaksimember'){
	echo "<span class='current'>Transaksi Selesai</span>";
}
elseif($_GET['module']=='lupapassword'){
	echo "<span class='current'>Lupa Password</span>";
}
elseif($_GET['module']=='detailproduk'){
	$detail	=mysql_query("SELECT * FROM produk,kategori    
                      WHERE kategori.id_kategori=produk.id_kategori 
                      AND id_produk='$_GET[id]'");
	$d		= mysql_fetch_array($detail);
	echo "<span class=judul_head><a href='home'>Home</a> &#187; <a href=kategori-$d[id_kategori]-$d[kategori_seo].html>$d[nama_kategori]</a> &#187; $d[nama_produk]</span>";
}
elseif($_GET['module']=='detailkategori'){
	$detail	=mysql_query("SELECT nama_kategori from kategori where id_kategori='$_GET[id]'");
	$d		= mysql_fetch_array($detail);
	echo "<span class=judul_head><a href='home'>Home</a> &#187; $d[nama_kategori]</span>";
}
?>
