<?php
	
	require("../conn.php");
	


	 $today4 = date ( "Ymd", time () );
	$today = date ( "Ymdhi", time () );//获取系统当前时间
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
		$zczh=$_POST["zczh"];
		$jclx=$_POST["jclx"];
		$kcdw=$_POST["kcdw"];
		$sjdw=$_POST["sjdw"];
		$kgrq=$_POST["kgrq"];
	    $jg=$_POST["jg"];
	    $sc=$_POST["sc"];
	    $xc=$_POST["xc"];
	    $jgg=$_POST["jgg"];
		$ys=$_POST["ys"];
	    $beizhu=$_POST["beizhu"];

		$upload_filedDir=$_POST["picture"];
		$upload_filedDir1=$_POST["picture1"];
		$upload_filedDir2=$_POST["picture2"];
		//$myfile1=$_POST["myfile1"];
		//$fileInput4=$_POST["fileInput4"]; 
	 
	if($zczh=="" or $jclx=="" or $kcdw=="" or $sjdw=="" or $kgrq=="" or $gcmc=="" or $gcdz=="" or $cjdw=="" or $cjlxr=="" or $cjlxrdh=="" or $jzsxm=="" or $cjdw1=="" or $cjlxr1=="" or $jldw=="" or $zjxm=="" or $jllxr=="" or $jllxrdh=="" or $mj=="" or $gm=="" or $sc=="" or $xc=="" or $jgg=="" or $ys=="" or $beizhu==""){
	 	echo "<script>alert('请填写必填信息');</script>" ;
	    header("refresh:2;url=../gctz.php");
	}else{


	$sql="INSERT INTO 市优质奖(注册证号,基础类型,勘察单位,设计单位,开工日期,会员标记码,工程分类,工程状态,工程名称,项目地址,申报日期,承建单位,承建联系人,承建联系人电话,建造师姓名,参建单位,参建联系人姓名,参建联系人电话,监理单位,项目总监姓名,监理联系人姓名,监理联系人电话,面积,规模,结构,上层,下层,竣工验收,备案时间,备注,Id1,验收报告,监督报告,备案证)values ('$zczh','$jclx','$kcdw','$sjdw','$kgrq','$hybjm','$gcfl','$gczt','$gcmc','$gcdz','$today4','$cjdw','$cjlxr','$cjlxrdh','$jzsxm','$cjdw1','$cjlxr1','$cjlxrdh1','$jldw','$zjxm','$jllxr','$jllxrdh','$mj','$gm','$jg','$sc','$xc','$jgg','$ys','$beizhu','$bh','$upload_filedDir','$upload_filedDir1','$upload_filedDir2')";
	
	if($conn->query($sql) === TRUE){
		echo "保存成功";
	    echo "<script>alert('在桌面生成申报表');</script>";
		$a=substr($today4,0,4);$b=substr($today4,4,2);$c=substr($today4,6,2);
		
		$V1=$gcmc;
	 	$V2=$cjdw;	
	 	$V3=$jzsxm;	
	 	$V4=$zczh;	
	 	$V5=$cjdw1;	
	 	$V6=$a;	
	 	$V7=$b;	
	 	$V8=$c;	
	 	$V9=$gcdz;	
	 	$V10=$mj;	
	 	$V11=$sc;	
	 	$V12=$xc;	
	 	$V13=$gm;	
	 	$V14=$jclx;	
	 	$V15=$jg;	
	 	$V16=$kcdw;
	 	$V17=$sjdw;	
	 	$V18=$cjlxr;	
	 	$V19=$cjlxrdh;	
	 	$V20=$jldw;	
	 	$V21=$zjxm;	
	 	$V22=$jllxr;	
	 	$V23=$jllxrdh;	
	 	$V24=$kgrq;	
		$V25=$jgg;
		$V26=$ys;
		$V27=$beizhu;
		require_once '../PHPWord.php';	
	 	$PHPWord = new PHPWord();
	
		$document = $PHPWord->loadTemplate('../hyrhdata/syzj.docx');
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
		$document->setValue('V22',$V22);
		$document->setValue('V23',$V23);
		$document->setValue('V24',$V24);
		$document->setValue('V25',$V25);
		$document->setValue('V26',$V26);
		$document->setValue('V27',$V27);
		$save=$today.iconv("UTF-8", "GB2312//TRANSLIT","市优质奖申报表.docx");
		$document->save("C:/Users/Administrator/Desktop/".$save);
			header("refresh:0;url=../gctz.php");
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		
			header("refresh:0;url=../gctz.php");
		}
	}
	$conn->close();		
	
?>