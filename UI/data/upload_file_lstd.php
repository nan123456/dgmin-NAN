<?php
require_once 'mutiplefilepackage6.php';

$files=getFiles();
print_r($files);
$i=0;$data=0;	
foreach($files as $fileInfo){	
 $res=uploadFile($fileInfo,$allowExt=array('jpeg','jpg','png','gif','wbmp'),$maxfile=2097152,$uploadpath='sfupload',$flag=true);	
	$uploadFiles[$i]=$res['dest'];  
$data=$data."||".$uploadFiles[$i];
}

// $count=0;
if ($ywjsc = "1") {
	$upload_filedDir=$data;
	}else {$upload_filedDir="";}
?>