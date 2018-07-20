<?php
require_once 'mutiplefilepackage7.php';

$files=getFiles1();
print_r($files);
$i=0;$data=0;	
foreach($files as $fileInfo){	
 $res=uploadFile1($fileInfo,$allowExt=array('jpeg','jpg','png','gif','wbmp'),$maxfile=2097152,$uploadpath='sfupload',$flag=true);	
	$uploadFiles[$i]=$res['dest'];  
$data=$data."||".$uploadFiles[$i];
}

// $count=0;
if ($ywjsc = "1") {
	$upload_filedDir1=$data;
	}else {$upload_filedDir="";}
?>