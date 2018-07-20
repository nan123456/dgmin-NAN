<?php
	require("../conn.php");
	$today4 = date ( "Ymd", time () );
	$today = date ( "Ymdhi", time () );//获取系统当前时间
//在数据库中查询当日是否已经有编号产生，如果有返回最大值的那一条
	$sqli="select Id1  from 市示范工地  order by Id1 DESC limit 1 ";
	$result = $conn->query($sqli);
	while($row = $result->fetch_assoc()) {
		$old=$row["Id1"];
	}
	$old=str_replace('ss','',$old);
	$today1 = mb_substr($old, 0, mb_strlen($old) - 3);
	
	
	if($today==$today1){
    	$bianhao=$old+1;
	} else //否则直接在当日的上一个编号上增加1 
	{
	 	$bianhao= str_pad ( $today, 11, 0, STR_PAD_RIGHT ) + 1;
	}	

     	$bh="ss".$bianhao;
		$hybjm=$_POST["hybjm"];
		$gcfl=$_POST["gcfl"];  
		$gczt=$_POST["gczt"];
        $gcmc=$_POST["gcmc"];
	    $gcdz=$_POST["gcdz"];
	    $sbrq=$_POST["sbrq"];
	    $cjdw=$_POST["cjdw"];
	    $cjlxr=$_POST["cjlxr"];    
	    $cjlxrdh=$_POST["cjlxrdh"];
	    $cjdw1=$_POST["cjdw1"]; 
	    $cjlxr1=$_POST["cjlxr1"];
	    $cjlxrdh1=$_POST["cjlxrdh1"];
	    $jzsxm=$_POST["jzsxm"] ; 
	    $jldw=$_POST["jldw"]; 
	    $zjxm=$_POST["zjxm"];
	    $gc=$_POST["gc"];
	    $kgrq=$_POST["kgrq"];
		$zczh=$_POST["zczh"];
	    $gm=$_POST["gm"];
	    $jg=$_POST["jg"];
	    
	    $jgsj=$_POST["jgsj"];
	    $beizhu=$_POST["beizhu"]; 
	    $jzszzh=$_POST["jzszzh"];
	    $zyzzgzh=$_POST["zyzzgzh"];
	    $jldwlxr=$_POST["jldwlxr"];
	    $jldwlxrdh=$_POST["jldwlxrdh"];
	    $sc=$_POST["sc"];
		$xc=$_POST["xc"];
	    $xxjd=$_POST["xxjd"];
	    $upload_filedDir=$_POST["picture"];
		$upload_filedDir1=$_POST["picture1"];

//		$fileInput=$_POST["fileInput"];
//      $fileInput1=$_POST["fileInput1"];
//		 $count=0;
//if ($ywjsc = "1") 
//	{$kgbgfjsc1=$_FILES["fileInput"]["name"];
//	$upload_file= iconv("UTF-8", "GB2312//TRANSLIT", $_FILES["fileInput"]["name"]);
//	$upload_file1= iconv("UTF-8", "GB2312//TRANSLIT", $_FILES["fileInput1"]["name"]);
//	
//	$upload_filedDir= (strtotime(".$sjcc."))."(_)".iconv("GB2312//TRANSLIT", "UTF-8", $upload_file);
//	$upload_filedDir1= (strtotime(".$sjcc."))."(_)".iconv("GB2312//TRANSLIT", "UTF-8", $upload_file1);
//	
//	$upload_filedName=iconv("GB2312//TRANSLIT", "UTF-8", $upload_file);
//	}
//	
//	else {$upload_filedDir="";} 
		if($gcmc=="" or $gcdz=="" or $cjdw=="" or $cjlxr=="" or $cjlxrdh=="" or $cjdw1=="" or $cjlxr1=="" or $cjlxrdh1=="" or $jzsxm=="" or $jldw=="" or $zjxm=="" or $gc=="" or $gm=="" or $jgsj=="" or $beizhu=="" or $jzszzh=="" or $zyzzgzh=="" or $jldwlxr=="" or $jldwlxrdh=="" or $sc=="" or $xc=="" or $xxjd==""){
		echo "<script>alert('请填写必填信息');</script>" ;
	    header("refresh:0;url=../ssfgd.php");
		}else{
	
	    
	    	$sql= "INSERT INTO 市示范工地(开工日期,注册证号,会员标记码,工程分类,工程状态,工程名称,项目地址,申报日期,承建单位,施工单位联系人,施工单位联系人手机,参建单位,参建单位联系人,参建单位联系人电话,建造师项目经理,监理单位,总监,建筑面积,规模,结构,竣工时间,备注,建造师证证号,执业证资格证号,监理联系人,监理联系人电话,上层,下层,工程形象进度,Id1,绿色通道,中标通知书) values('$kgrq','$zczh','$hybjm','$gcfl','$gczt','$gcmc','$gcdz','$today4','$cjdw','$cjlxr','$cjlxrdh','$cjdw1','$cjlxr1','$cjlxrdh1','$jzsxm','$jldw','$zjxm','$gc','$gm','$jg','$jgsj','$beizhu','$jzszzh','$zyzzgzh','$jldwlxr','$jldwlxrdh','$sc','$xc','$xxjd','$bh','$upload_filedDir','$upload_filedDir1')";
 			if($conn->query($sql) === TRUE){
				echo "保存成功";
//				$jsonresult = "success";
 				echo "<script>alert('在桌面生成申报表');</script>";
				$a=substr($today4,0,4);$b=substr($today4,4,2);$c=substr($today4,6,2);
				
				$V1=$gcmc;
			 	$V2=$cjdw;	
			 	$V3=$jldw;	
			 	$V4=$cjdw1;	
			 	$V5=$a;	
			 	$V6=$b;	
			 	$V7=$c;	
			 	$V8=$gcdz;	
			 	$V9=$xxjd;	
			 	$V10=$jg;	
			 	$V11=$gc;	
			 	$V12=$sc;	
			 	$V13=$xc;	
			 	$V14=$kgrq;	
			 	$V15=$jgsj;	
			 	$V16=$jzsxm;
			 	$V17=$zczh;	
			 	$V18=$cjlxr;	
			 	$V19=$cjlxrdh;	
			 	$V20=$jldwlxr;	
			 	$V21=$jldwlxrdh;
				
				require_once '../PHPWord.php';	
			 	$PHPWord = new PHPWord();

				$document = $PHPWord->loadTemplate('../hyrhdata/sfgd.docx');
				//print_r($document);
				$document->setValue('V1',$V1);
				$document->setValue('V2',$V2);
				$document->setValue('V3',$V3);
				$document->setValue('V4',$V4);
				$document->setValue('V5',$V5);
				$document->setValue('V6',$V6);
				$document->setValue('V7',$V7);
				$document->setValue('V8',$V8);
				$document->setValue('V9',$V9);
				$document->setValue('V10',$V10);
				$document->setValue('V11',$V11);
				$document->setValue('V12',$V12);
				$document->setValue('V13',$V13);
				$document->setValue('V14',$V14);
				$document->setValue('V15',$V15);
				$document->setValue('V16',$V16);
				$document->setValue('V17',$V17);
				$document->setValue('V18',$V18);
				$document->setValue('V19',$V19);
				$document->setValue('V20',$V20);
				$document->setValue('V21',$V21);
				
				$save=$today.iconv("UTF-8", "GB2312//TRANSLIT","市示范工地申报表.docx");
				$document->save("C:/Users/Administrator/Desktop/".$save);
					header("refresh:0;url=../ssfgd.php");
				}else{
					echo "Error: " . $sql . "<br>" . $conn->error;
//					$jsonresult = "error";
					header("refresh:0;url=../ssfgd.php");
				}
			}
$conn->close();		

?>