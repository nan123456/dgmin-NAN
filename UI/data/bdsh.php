<?php
	//引入连接数据库文件
//	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
//	$sjc=$timestr;
//		$sjcc =strtotime(".$sjc.");
//		$file=$_POST["file"];
	require("../conn.php");
	    $id1=$_POST["id1"];
	    $hyzt2="通过";
	    $bdzh=$_POST["bdzh"];
	    $bdmm=$_POST["bdmm"];
		$bdhybh=$_POST["bdhybh"];
		$qymc1=$_POST["qymc1"];
        
	    

$sql1 = "INSERT INTO 个人信息(会员标记码,账号,密码,企业名称) values ('$id1','$bdzh','$bdmm','$qymc1')";

if($conn->query($sql1) === TRUE) {
    echo "保存成功";
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}


    $Phone="";		                   
	$sql = "select * from 本地会员  where 会员标记码='".$id1."'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		$Phone=$row["总经理手机号码"]."|*|".$row["联系人手机号码"];
		
	}
    $Phone=explode("|*|",$Phone);
    
	
	$sqli2 = "update 本地会员 set 会员状态='$hyzt2',会员编号='$bdhybh' where 会员标记码 ='$id1'";
if ($conn->query($sqli2) === TRUE) {
    echo "修改成功";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}

?>

<script type="text/javascript">
  window.history.go(-2);
//location.reload();
</script>
