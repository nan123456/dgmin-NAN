<?php
	//引入连接数据库文件
//	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
//	$sjc=$timestr;
//		$sjcc =strtotime(".$sjc.");
//		$file=$_POST["file"];
	require("../conn.php");
	    $id2=$_POST["id2"];
	    $hyzt3="通过";
	    $wdzh=$_POST["wdzh"];
	    $wdmm=$_POST["wdmm"];
		$whybh=$_POST["whybh"];
		$sqdw=$_POST["sqdw"];
//require("../conn.php");
    

$sql1 = "INSERT INTO 个人信息(会员标记码,账号,密码,企业名称) values('$id2','$wdzh','$wdmm','$sqdw')";

if ($conn->query($sql1) === TRUE) {
    echo "保存成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	$Phone="";		                   
	$sql = "select * from 外地会员  where 会员标记码='".$id2."'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		$Phone=$row["总经理手机号码"]."|*|".$row["联系人手机号码"];
		
	}
    $Phone=explode("|*|",$Phone);
	$sqli2 = "update 外地会员 set 会员状态='$hyzt3',会员编号='$whybh' where 会员标记码 ='$id2'";
if ($conn->query($sqli2) === TRUE) {
    echo "修改成功";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}
//$conn->close();		
?>

<!--<script type="text/javascript">
  window.history.go(-2);
//location.reload();
</script>-->
