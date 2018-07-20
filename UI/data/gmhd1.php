<?php
require("../conn.php");
$hdmc1=$_POST["hdmc1"];
$hdzt1=$_POST["hdzt1"];
$hddd1=$_POST["hddd1"];
$hdsj1=$_POST["hdsj1"];
$hdks1=$_POST["hdks1"];
$hdjs1=$_POST["hdjs1"];
$hdlx1=$_POST["hdlx1"];
$hdxz1=$_POST["hdxz1"];
$bz1=$_POST["bz1"];
$bmzrs1=$_POST["bmzrs1"];
$gcid=$_POST["gcid"];
$hdlb1=$_POST["hdlb1"];

$sql="select * from 活动  where id='$gcid'";
	$result=$conn->query($sql);	
	if($result->num_rows > 0){
		$sqli = "update 活动  set 活动类别='$hdlb1',报名总人数='$bmzrs1',活动名称='$hdmc1',活动主题='$hdzt1',活动地点='$hddd1',活动时间='$hdsj1',报名开始时间='$hdks1',报名结束时间='$hdjs1',活动路线='$hdlx1',活动性质='$hdxz1',备注='$bz1' where id ='$gcid' ";
		
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
		header("refresh:0;url=../cygm.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	header("refresh:0;url=../cygm.php");
}
?>