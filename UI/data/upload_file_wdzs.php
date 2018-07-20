<?php
require_once 'mutiplefilepackage5.php';

$files=getFiles5();
print_r($files);
$i=0;$data=0;	
foreach($files as $fileInfo){	
$res=uploadFile5($fileInfo,$allowExt=array('jpeg','jpg','png','gif','wbmp'),$maxfile=2097152,$uploadpath='wdupload',$flag=true);	
	$uploadFiles[$i]=$res['dest'];  
$data=$data."||".$uploadFiles[$i];
}

// $count=0;
if ($ywjsc = "1") {
	$upload_filedDir2=$data;
	}else {$upload_filedDir2="";}
?>