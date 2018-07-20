<?php
	//引入连接数据库文件
		
//		$num='123456';
		$num=$_POST["num"];
		$hybjm=$_POST["hybjm"];
		$fsyzmm="验证码为：   $num";
//      $fsyzmm='11';
		
      
		
	require'../conn.php';
	$sql = "select * from 项目申报  where 会员标记码='$hybjm'";
	$result = $conn->query($sql);
	$sqli = "update 项目申报 set 验证码='$num',发送信息='$fsyzmm' where 会员标记码='$hybjm'";

	if ($conn->query($sqli) === TRUE) {
	    echo "修改成功";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

//       $Phone="";	
////      $yhtag=$_SESSION["yhtag"];
//      $fenge=explode("h","$yhtag");
//	    $bjm=$fenge[0];
//		if($bjm=='0'){
//		$sql = "select * from 个人信息  where 会员标记码='0h0000001'";
//      $result = $conn->query($sql);
//     	while($row = $result->fetch_assoc()){
//		$Phone=$row["手机"];}	
//		}else if($bjm=='1'){
//      $sql = "select * from 本地会员  where 会员标记码='$yhtag'";
//      $result = $conn->query($sql);
//     	while($row = $result->fetch_assoc()){
//		$Phone=$row["联系人手机号码"];}
//	    }else if($bjm=='2'){	                   
//	    $sql = "select * from 外地会员  where 会员标记码='$yhtag'";
//	    $result = $conn->query($sql);
//	    while($row = $result->fetch_assoc()){
//		$Phone=$row["通讯员手机号码"];}
//	    }else if($bjm=='3'){
//	    $sql = "select * from 项目申报  where 会员标记码='$yhtag'";
//	    $result = $conn->query($sql);
//	    while($row = $result->fetch_assoc()){
//		$Phone=$row["手机"];}
//	    }
//	    echo $Phone;
?>

