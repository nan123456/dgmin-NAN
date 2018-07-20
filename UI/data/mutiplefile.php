<?php
	include_once 'mutiplefilepackage.php';
	require("../conn.php");

	 header('content-type:text/html;charset=utf-8');
	 
	 
	$today = date ( "Ymd", time () );//获取系统当前时间
//在数据库中查询当日是否已经有编号产生，如果有返回最大值的那一条
	$sqli="select Id1  from 市优质奖  order by Id1 DESC limit 1 ";
	$result = $conn->query($sqli);
	while($row = $result->fetch_assoc()) {
		$old=$row["Id1"];
	}
	$old=str_replace('sy','',$old);
	$today1 = mb_substr($old, 0, mb_strlen($old) - 3);
	
	
if($today==$today1){
	
	
    $bianhao=$old+1;
	
} else //否则直接在当日的上一个编号上增加1 
{
	
	 $bianhao= str_pad ( $today, 11, 0, STR_PAD_RIGHT ) + 1;
}	

     $bh="sy".$bianhao;


		$hybjm=$_POST["hybjm"];
		$gcfl=$_POST["gcfl"];  
		$gczt=$_POST["gczt"];
        $gcmc=$_POST["gcmc"];
	    $gcdz=$_POST["gcdz"];
	    $sbrq=$_POST["sbrq"];
	    $cjdw=$_POST["cjdw"];
	    $cjlxr=$_POST["cjlxr"];    
	    $cjlxrdh=$_POST["cjlxrdh"];
	    $jzsxm=$_POST["jzsxm"] ;
	    $cjdw1=$_POST["cjdw1"];
	    $cjlxr1=$_POST["cjlxr1"];
	    $cjlxrdh1=$_POST["cjlxrdh1"]; 
	    $jldw=$_POST["jldw"]; 
	    $zjxm=$_POST["zjxm"];
	    $jllxr=$_POST["jllxr"];
	    $jllxrdh=$_POST["jllxrdh"];
	    $mj=$_POST["mj"];
		$gm=$_POST["gm"];
	    $jg=$_POST["jg"];
	    $sc=$_POST["sc"];
	    $xc=$_POST["xc"];
	    $jgg=$_POST["jgg"];
		$ys=$_POST["ys"];
	    $beizhu=$_POST["beizhu"];

$fileInput3=$_POST["fileInput3"];
$fileInput4=$_POST["fileInput4"]; 
	 
$files=getFiles();
	$i=0;$data=0;	
	foreach($files as $fileInfo){		
	  $res=uploadFile($fileInfo,$allowExt=array('jpeg','jpg','png','gif','wbmp'),$maxfile=2097152,$uploadpath='squpload',$flag=true);	
	$uploadFiles[$i]=$res['dest'];  
$data=$data."||".$uploadFiles[$i];
}

// $count=0;
if ($ywjsc = "1") {
	$upload_filedDir=$data;
	}else {$upload_filedDir="";}


$sql="INSERT INTO 市优质奖(会员标记码,工程分类,工程状态,工程名称,项目地址,申报日期,承建单位,承建联系人,承建联系人电话,建造师姓名,参建单位,参建联系人姓名,参建联系人电话,监理单位,项目总监姓名,监理联系人姓名,监理联系人电话,面积,规模,结构,上层,下层,竣工验收,备案时间,备注,Id1,验收报告,监督报告,备案证) values ('$hybjm','$gcfl','$gczt','$gcmc','$gcdz','$sbrq','$cjdw','$cjlxr','$cjlxrdh','$jzsxm','$cjdw1','$cjlxr1','$cjlxrdh1','$jldw','$zjxm','$jllxr','$jllxrdh','$mj','$gm','$jg','$sc','$xc','$jgg','$ys','$beizhu','$bh','$upload_filedDir','$upload_filedDir1','$upload_filedDir2')";
if($conn->query($sql) === TRUE){
	echo "保存成功";

//	header("refresh:0;url=../login.php");
}else{
	echo "Error: " . $sql . "<br>" . $conn->error;

//	header("refresh:0;url=../login.php");
}
$conn->close();		




	
   
	
?>