<?php
//	 header('content-type:text/html;charset=utf-8');
	 function getFiles3(){
	 	$i=0;
		$_FILES4=array($_FILES['myfile3']);
		foreach($_FILES4 as $file){
		if(is_string($file['name'])){
			$files[$i]=$file;
			$i++;
		}elseif(is_array($file['name'])){
			foreach($file['name'] as $key=>$val){
			   $files[$i]['name']=$file['name'][$key];
			   $files[$i]['type']=$file['type'][$key];
			   $files[$i]['tmp_name']=$file['tmp_name'][$key];	
			   $files[$i]['error']=$file['error'][$key];
			   $files[$i]['size']=$file['size'][$key];
			   $i++;		
			}
		}
		
	 }
	 return $files;
	
	 }
	function uploadFile3($fileInfo,$allowExt=array('jpeg','jpg','png','gif','wbmp'),$maxfile=2097152,$uploadpath='upload',$flag=true){
    if($fileInfo ['error']>0){
  	//匹配错误信息;
  	echo '失败！！！';
	
  	}
	//判断文件大小;
//	 $maxfile=2097152;//2M=1024*1024*2;允许上传的最大值;

  if ($fileInfo ['size']>$maxfile){
     echo '上传文件过大';
  }
  
  //ext=strtolower(end(explode('.',$filename)));               //检测文件扩展名;
  $ext=pathinfo($fileInfo ['name'],PATHINFO_EXTENSION);
//$allowExt=array('jpeg','jpg','png','gif','wbmp');                 //或这种
  if(!in_array($ext,$allowExt)){                               //检查文件是否符合类型,否则输出exit;
//		echo "<script language=javascript>alert('非法文件类型');history.back();</script>";
        echo '非法文件'; 
  }
  if($flag){
  	if(!getimagesize($fileInfo ['tmp_name'])){
  		echo '不是图片类型';
  	}
  }
  //判断文件是否通过HTTP POST 方式上传上来的
  if(!is_uploaded_file($fileInfo ['tmp_name'])){
  	echo '文件不是通过HTTP POST 方式上传上来的';
  }
  //扩展名，保证同名不会被覆盖
  //@错误抑制符
  $upload_file=md5(uniqid(microtime(true),true)).'.'.$ext;
//echo $upload_file;
// 如果没有 upload 目录，你需要创建它，upload 目录权限为 0777
// $uploadpath='upload';
 $destination=$uploadpath.'/'.$upload_file;
 
if(!file_exists("$uploadpath")){
	mkdir("$uploadpath",0777,true);
	chmod("$uploadpath",0777);
}
//把临时文件转移到目录下
   
    
   if(@move_uploaded_file($fileInfo ['tmp_name'], $destination)){
//	 	echo '文件上传成功';
	   $res['dest']=$destination;
	   return $res;
	  $ywjsc = "1";
	 }else{
	 	echo '文件上传失败';
	 }
  }
	
	
	?>