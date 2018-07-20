<?php
	require("../conn.php");
	$today = date ( "Ymd", time () );
		$gcid1=$_POST["gcid1"];  
        $xggcmc4=$_POST["xggcmc4"];
	    $xggcdz4=$_POST["xggcdz4"];
	    $xgsbrq4=$_POST["xgsbrq4"];
	    $xgcjdw4=$_POST["xgcjdw4"];
	    $xgcjlxr4=$_POST["xgcjlxr4"];
	    $xgcjlxrdh4=$_POST["xgcjlxrdh4"];
	    $xgcjdw5=$_POST["xgcjdw5"];    
	    $xgjzsxm4=$_POST["xgjzsxm4"];
	    $xgjldw4=$_POST["xgjldw4"] ;
	    $xgzjxm4=$_POST["xgzjxm4"];
	    $xggcgm4=$_POST["xggcgm4"];
	    $xgjg4=$_POST["xgjg4"];
	    $xgkgsj4=$_POST["xgkgsj4"]; 
	    $xgjgsj4=$_POST["xgjgsj4"];
	    $xgbeizhu4=$_POST["xgbeizhu4"];
		$gczj2=$_POST["gczj2"];
		$cs2=$_POST["cs2"];
//		$jd2=$_POST["jd2"];
	     
	$sql="select * from 省优质结构奖  where id='$gcid1'";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	$result=$conn->query($sql);	
	if($result->num_rows > 0){
		$sqli = "update 省优质结构奖  set 工程造价='$gczj2',层数='$cs2',工程名称='$xggcmc4',项目地址='$xggcdz4',申报日期='$today',承建单位='$xgcjdw4',施工单位联系人='$xgcjlxr4',施工单位联系人手机='$xgcjlxrdh4',参建单位='$xgcjdw5',建造师项目经理='$xgjzsxm4',监理单位='$xgjldw4',总监='$xgzjxm4',工程规模='$xggcgm4',结构='$xgjg4',开工时间='$xgkgsj4',竣工时间='$xgjgsj4',申报时的主体结构进度='$xgbeizhu4' where id='$gcid1' ";
		
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