<?php
require_once 'mutiplefilepackage2.php';

$files=getFiles2();
print_r($files);
	$i=0;$data=0;	
	foreach($files as $fileInfo){	
	  $res=uploadFile2($fileInfo,$allowExt=array('jpeg','jpg','png','gif','wbmp'),$maxfile=2097152,$uploadpath='squpload',$flag=true);	
	$uploadFiles[$i]=$res['dest'];  
$data=$data."||".$uploadFiles[$i];
}

// $count=0;
if ($ywjsc = "1") {
	$upload_filedDir2=$data;
	}else {$upload_filedDir2="";}
?>