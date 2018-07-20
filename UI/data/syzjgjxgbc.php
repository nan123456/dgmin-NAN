<?php
	require("../conn.php");
	$today = date ( "Ymd", time () );
		$gcid=$_POST["gcid"];  
        $xggcmc=$_POST["xggcmc"];
	    $xggcdz=$_POST["xggcdz"];
	    $xgsbrq=$_POST["xgsbrq"];
	    $xgcjdw=$_POST["xgcjdw"];
	    $xgcjlxr=$_POST["xgcjlxr"];
	    $xgcjlxrdh=$_POST["xgcjlxrdh"];
	    $xgcjdw1=$_POST["xgcjdw1"];    
	    $xgjzsxm=$_POST["xgjzsxm"];
	    $xgjldw=$_POST["xgjldw"] ;
	    $xgzjxm=$_POST["xgzjxm"];
	    $xggcgm=$_POST["xggcgm"];
	    $xgjg=$_POST["xgjg"];
	    $xgkgsj=$_POST["xgkgsj"]; 
	    $xgjgsj=$_POST["xgjgsj"];
	    $xgbeizhu=$_POST["xgbeizhu"];
	    $gczj1=$_POST["gczj1"]; 
		$cs1=$_POST["cs1"];
//		$jd1=$_POST["jd1"];
		
	$sql="select * from 省优质结构奖  where id='$gcid'";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	$result=$conn->query($sql);	
	if($result->num_rows > 0){
		$sqli = "update 省优质结构奖  set 工程造价='$gczj1',层数='$cs1',工程名称='$xggcmc',项目地址='$xggcdz',申报日期='$today',承建单位='$xgcjdw',施工单位联系人='$xgcjlxr',施工单位联系人手机='$xgcjlxrdh',参建单位='$xgcjdw1',建造师项目经理='$xgjzsxm',监理单位='$xgjldw',总监='$xgzjxm',工程规模='$xggcgm',结构='$xgjg',开工时间='$xgkgsj',竣工时间='$xgjgsj',申报时的主体结构进度='$xgbeizhu' where id='$gcid' ";
		
		if($conn->query($sqli)){
			$jsonresult = "success";
		}else{
			$jsonresult = "error";
		}	
	}else{
		$jsonresult='1';				
	}
	if ($conn->query($sql) === TRUE) {
    echo "修改成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	
?>