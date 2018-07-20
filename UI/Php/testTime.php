<?php
//$timestamp =date("Y-m-d H:i:s",time()); 
date_default_timezone_set('Asia/Shanghai');
$timestamp=time();
$hours = date('H',$timestamp); 
$minutes = date('i',$timestamp); 
$seconds =date('s',$timestamp);
$month = date('m',$timestamp);
$day =  date('d',$timestamp);
$stamp= $month.$day.$hours.$minutes.$seconds;
print_r($stamp);
?> 