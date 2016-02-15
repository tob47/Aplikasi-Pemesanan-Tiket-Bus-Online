<?php
      $sql2 = mysql_query("select meta_keyword from modul where id_modul='43'");
      $j2   = mysql_fetch_array($sql2);
		  echo "$j2[meta_keyword]";
?>
