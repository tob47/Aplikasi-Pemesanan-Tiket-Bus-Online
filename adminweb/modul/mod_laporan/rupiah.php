<?php
function rp($uang){
  $rp = "";
  $digit = strlen($uang);
  
  while($digit > 3)
  {
    $rp = "." . substr($uang,-3) . $rp;
    $lebar = strlen($uang) - 3;
    $uang  = substr($uang,0,$lebar);
    $digit = strlen($uang);  
  }
  $rp = $uang . $rp . ",-";
  return $rp;
}
?>
