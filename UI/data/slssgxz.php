<?php
	require("../conn.php");
	    session_start();
	    $yhtag = $_SESSION["yhtag"];
		$today = date ( "Ymd", time () );//获取系统当前时间
//在数据库中查询当日是否已经有编号产生，如果有返回最大值的那一条
		$sqli="select Id1  from 省绿色施工  order by Id1 DESC limit 1 ";
		$result = $conn->query($sqli);
		while($row = $result->fetch_assoc()) {
			$old=$row["Id1"];
		}
		$old=str_replace('sl','',$old);
		$today1 = mb_substr($old, 0, mb_strlen($old) - 3);
	
	
	if($today==$today1){
	
    	$bianhao=$old+1;
	}
 	else //否则直接在当日的上一个编号上增加1 
	{
	
	 	$bianhao= str_pad ( $today, 11, 0, STR_PAD_RIGHT ) + 1;
	}	

     	$bh="sl".$bianhao;
	

	
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
	    $jzsxm=$_POST["jzsxm"] ;
	    $jldw=$_POST["jldw"]; 
	    $zjxm=$_POST["zjxm"];
	    $gcgm=$_POST["gcgm"];
	    $jg=$_POST["jg"];
	    $kgsj=$_POST["kgsj"];
	    $jgsj=$_POST["jgsj"];
	    $beizhu=$_POST["beizhu"]; 
		$sc=$_POST["sc"]; 
		$xc=$_POST["xc"]; 
			$sql= "INSERT INTO 省绿色施工(会员标记码,工程分类,工程状态,工程名称,项目地址,申报日期,承建单位,施工单位联系人,施工单位联系人手机,建造师项目经理,监理单位,总监,工程规模,结构,开工时间,竣工时间,备注,Id1,上层,下层) values('$hybjm','$gcfl','$gczt','$gcmc','$gcdz','$today','$cjdw','$cjlxr','$cjlxrdh','$jzsxm','$jldw','$zjxm','$gcgm','$jg','$kgsj','$jgsj','$beizhu','$bh','$sc','$xc')";
 			if ($conn->query($sql) === TURE) {
    			echo "保存成功";
			} else {
    			echo "Error: " . $sql . "<br>" . $conn->error;
			}
$conn->close();
?>