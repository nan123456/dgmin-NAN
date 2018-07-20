<?php

require("../conn.php");

	


	$today = date ( "Ymd", time () );//获取系统当前时间
//在数据库中查询当日是否已经有编号产生，如果有返回最大值的那一条
	$sqli="select Id1  from 省优秀QC  order by Id1 DESC limit 1 ";
	$result = $conn->query($sqli);
	if($result->num_rows>0){
		while($row = $result->fetch_assoc()) {
			$old=$row["Id1"];
		}
		$old=str_replace('qc','',$old);
		$today1 = mb_substr($old, 0, mb_strlen($old) - 3);
	}else{
		$old = "";
		$today1 = "";
	}
	
	
	if($today==$today1){
	
	
    	$bianhao=$old+1;
	
	} else //否则直接在当日的上一个编号上增加1 
	{
	
	 	$bianhao= str_pad ( $today, 11, 0, STR_PAD_RIGHT ) + 1;
	}	

     	$bh="qc".$bianhao;	
	
		$hybjm=$_POST["hybjm"];
		$gcfl=$_POST["gcfl"];  
		$gczt=$_POST["gczt"];
        $gcmc=$_POST["gcmc"];
	    $gcdz=$_POST["gcdz"]; 
	    $sbrq=$_POST["sbrq"];
	    $cjdw=$_POST["cjdw"];
	    $cjlxr=$_POST["cjlxr"];    
	    $cjlxrdh=$_POST["cjlxrdh"];
	    $xzmc=$_POST["xzmc"] ;
	    $ktmc=$_POST["ktmc"]; 
	    $ktlx=$_POST["ktlx"];
	    $ktksrq=$_POST["ktksrq"];
	    $ktjsrq=$_POST["ktjsrq"];
	    $fbr=$_POST["fbr"];
	    $txdz=$_POST["txdz"];
	    $email=$_POST["email"]; 
	    $beizhu=$_POST["beizhu"]; 
	    $upload_filedDir=$_POST["picture"];
		
		if($gcmc=="" or $gcdz=="" or $cjdw=="" or $cjlxr=="" or $cjlxrdh=="" or $xzmc=="" or $ktmc=="" or $ktlx=="" or $ktksrq=="" or $ktjsrq=="" or $fbr=="" or $txdz=="" or $email=="" or $beizhu==""){
			echo "<script>alert('请填写必填信息');</script>" ;
	    	header("refresh:2;url=../syzqc.php");
		}else{
			
	    	$sql= "INSERT INTO 省优秀qc(会员标记码,工程分类,工程状态,工程名称,项目地址,申报日期,承建单位,施工单位联系人,施工单位联系人手机,小组名称,课题名称,课题类型,课题开始日期,课题结束日期,发表人,通讯地址,email,备注,Id1,通知书或合同) values('$hybjm','$gcfl','$gczt','$gcmc','$gcdz','$today','$cjdw','$cjlxr','$cjlxrdh','$xzmc','$ktmc','$ktlx','$ktksrq','$ktjsrq','$fbr','$txdz','$email','$beizhu','$bh','$upload_filedDir')";
 			if($conn->query($sql) === TRUE){
			echo "保存成功";
//	echo $upload_filedDir;
//	$jsonresult = "success";
			header("refresh:0;url=../syzqc.php");
		}else{
		echo "Error: " . $sql . "<br>" . $conn->error;
//	$jsonresult = "error";
		header("refresh:0;url=../syzqc.php");
		}
	}
$conn->close();		

?>
