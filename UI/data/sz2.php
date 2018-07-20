<?php
	//引入连接数据库文件
	 
	require("../conn.php");

	session_start();
	
		
		$xm=$_POST["xm"];
		$xb=$_POST["xb"];
		$lxr=$_POST["lxr"];
		$lxdh=$_POST["lxdh"];
		$sj=$_POST["sj"];
		$dzyx=$_POST["dzyx"];
		$cjdw=$_POST["cjdw"];	
       
	    $yhtag = $_SESSION["yhtag"];
		
	$sql = "select * from 个人信息  where 会员标记码='$yhtag'";
	$sql1 = "select * from 本地会员  where 会员标记码='$yhtag'";	
	$sql2 = "select * from 外地会员  where 会员标记码='$yhtag'";
	$sql3 = "select * from 项目申报  where 会员标记码='$yhtag'";
	
	$sqli = "update 个人信息 set 姓名='$xm',性别='$xb',联系人='$lxr',联系电话='$lxdh',手机='$sj',电子邮箱='$dzyx',企业名称='$cjdw' where 会员标记码='$yhtag'";
    $sqli1 = "update 本地会员 set 企业名称='$cjdw' where 会员标记码='$yhtag'";
    $sqli2 = "update 外地会员 set 企业名称='$cjdw' where 会员标记码='$yhtag'";
    $sqli3 = "update 项目申报 set 施工单位='$cjdw' where 会员标记码='$yhtag'";
if ($conn->query($sqli) === TRUE) {
	if ($conn->query($sqli1) === TRUE and $row["企业名称"]!=""){
    echo "修改成功";
} else if ($conn->query($sqli2) === TRUE and $row["企业名称"]!=""){
	echo "修改成功";
}
else if ($conn->query($sqli3) === TRUE and $row["施工单位"]!=""){
	echo "修改成功";
}
}
$conn->close();		
?>
<!--<script type="text/javascript">
  window.history.go(-1);
</script>-->
