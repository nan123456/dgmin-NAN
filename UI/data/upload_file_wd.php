<?php
require_once 'mutiplefilepackage3.php';

$files=getFiles3();
print_r($files);
$i=0;$data=0;	
foreach($files as $fileInfo){	
$res=uploadFile3($fileInfo,$allowExt=array('jpeg','jpg','png','gif','wbmp'),$maxfile=2097152,$uploadpath='wdupload',$flag=true);	
	$uploadFiles[$i]=$res['dest'];  
$data=$data."||".$uploadFiles[$i];
}

// $count=0;
if ($ywjsc = "1") {
	$upload_filedDir=$data;
	}else {$upload_filedDir="";}
?>