<?php
   $name=$_GET['name'];
   echo $name;
   $path="../upload/hzupload/";
   
   if($name=='1.xls'){
   	$exp_name="市优质奖";
  }else if($name=='2.xls'){
   	$exp_name="市示范工地";
  }else if($name=='3.xls'){
   	$exp_name="省优质奖";
  }else if($name=='4.xls'){
   	$exp_name="省优质结构奖";
  }else if($name=='5.xls'){
   	$exp_name="省优秀qc";
  }else if($name=='6.xls'){
   	$exp_name="省绿色施工";
  }else if($name=='7.xls'){
   	$exp_name="东莞市建筑业协会本地会员单位名册";
  }else if($name=='8.xls'){
   	$exp_name="东莞市建筑业协会外地会员单位名册";}
if (!file_exists($path . $name)) { //检查文件是否存在 
echo "文件找不到"; 
exit; 
} else { 
$file = fopen($path . $name,"r"); // 打开文件 person/example1.docx
// 输入文件标签 
	Header("Content-type: application/octet-stream"); 
	Header("Accept-Ranges: bytes"); 
	Header("Accept-Length: ".filesize($path . $name)); 
//	Header("Content-Disposition: attachment; filename=".$top_str.".docx"); 
	Header("Content-Disposition: attachment; filename=".$exp_name.".xls");//下载文件的名称
// 输出文件内容 
echo fread($file,filesize($path . $name)); 
fclose($file); 
exit;} 

?>