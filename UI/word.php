<?php 
class excel 
{  
/* 
@GNU:GPL 
@author axgle <axgle@yahoo.com.cn> 
@date 2005.4.20 
*/ 

function start() 
{ 
ob_start(); 
print'<html xmlns:o="urn:schemas-microsoft-com:office:office" 
xmlns:w="urn:schemas-microsoft-com:office:excel" 
xmlns="http://www.w3.org/TR/REC-html40"><body><table width=1004" border="1" border-style="solid" cellspacing="0" cellpadding="0" style="margin:0 auto;">'; 

} 

function save($path) 
{ 

print "</table></body></html>"; 
$data = ob_get_contents(); 

ob_end_clean(); 

$this->wirtefile ($path,$data); 
} 

function wirtefile ($fn,$data) 
{ 

$fp=fopen($fn,"wb"); 
fwrite($fp,$data); 
fclose($fp); 
} 

} 

?> 