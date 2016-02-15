<?php 
  error_reporting(0);
  session_start();	
  include "config/koneksi.php";
	include "config/fungsi_indotgl.php";
	include "config/class_paging.php";
	include "config/fungsi_combobox.php";
	include "config/library.php";
  include "config/fungsi_autolink.php";
  include "config/fungsi_rupiah.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PO Karunia Bakti Tasikmalaya</title>
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow">
<meta name="description" content="<?php include "dina_meta1.php"; ?>">
<meta name="keywords" content="<?php include "dina_meta2.php"; ?>">
<meta http-equiv="Copyright" content="PO Karunia Bakti Tasikmalaya">
<meta name="author" content="Irham">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="7">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">
<link href="style.css" rel="stylesheet" type="text/css" />

<link href="lightbox/themes/default/jquery.lightbox.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="jquery-1.4.js"></script>
<script type="text/javascript" src="lightbox/jquery.lightbox.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
		    $('.lightbox').lightbox();		    
		});
  </script>

</head>

<body>
<div id="main_container">
	<div class="top_bar">
    	         
  </div>
  
	<div id="header"></div>

  <div id="main_content"> 
       <div id="menu_tab">
            <div class="left_menu_corner"></div>
              <ul class="menu">
		            <li><a href="index.php" class="nav1">Home</a></li>
                <li class="divider"></li>
		            <li><a href="profil-kami.html" class="nav2">Profil</a></li>
                <li class="divider"></li>
		            <li><a href="cara-pemesanan.html" class="nav3">Cara Pemesanan Tiket</a></li>
                <li class="divider"></li>
		            <li><a href="hubungi-kami.html" class="nav6">Hubungi Kami</a></li>        
                <li class="divider"></li>
              </ul>
            <div class="right_menu_corner"></div>
          </div><!-- end of menu tab -->

  <div class="crumb_navigation">
    Anda sedang berada di: <?php include "breadcrumb.php";?>
  </div>        
        
  <div class="left_content"> 
      <?php include "kiri.php";?>         
  </div>
   
   <div class="center_content">
      <?php include "tengah.php";?>           
   </div>
   
   <div class="right_content">
      <?php include "kanan.php";?>                
   </div><!-- end of right content -->   
            
   </div><!-- end of main content -->
   
   <div class="footer">
        <div class="left_footer">
        
        </div>
        
        <div class="center_footer">
        Copyright &copy; 2013. All Rights Reserved.<br />
        <a href="#" title="PO Karunia Bakti Tasikmalaya">PO Karunia Bakti Tasikmalaya</a><br />
        
        </div>
        
        <div class="right_footer">
        </div>   
   </div>                 

</div>
<!-- end of main_container -->
<div style="visibility: hidden; position: absolute;"><div></div></div>
</body>
</html>
