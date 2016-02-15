
    <div class="title_box">Cek Tiket</div>    
      <div class="border_box"><br><br>
	  <form method=POST action='cektiket.html' >
          
          Tujuan : 
          <select name='tujuan'>
            <option value=0 selected>- Pilih Tujuan -</option>
			<?php
            $tampil=mysql_query("SELECT distinct(tujuan) FROM tiket");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[tujuan]>$r[tujuan]</option>";
            }
			?>
	</select>
          <input type=submit value=Cek>
          </form><br><br>
      </div>
       
    <div class="title_box">Cek Jadwal Keberangkatan</div>  
     <div class="border_box"><br><br>
      <form method=POST action='cekjadwal.html' >
          Tujuan : 
          <select name='tujuan'>
            <option value=0 selected>- Pilih Tujuan -</option>
			<?php
            $tampil=mysql_query("SELECT distinct(tujuan) FROM jadwal");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[tujuan]>$r[tujuan]</option>";
            }
			?>
	</select>
          <input type=submit value=Cek>
          </form><br><br>
       </div>

     <div class="banner_adds"></div>    <div class="banner_adds"></div> <div class="banner_adds"></div> 
