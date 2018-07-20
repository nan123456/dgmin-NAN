<?php

	require("../conn.php");
	


	 $today4 = date ( "Y", time () );
	 $sql="select 企业名称,会员性质,会员标记码 from 本地会员 where 会员状态='通过' UNION select 企业名称,会员性质,会员标记码 from 外地会员 where 会员状态='通过'";
	 $result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		$a=$row["企业名称"];
		$b=$row["会员性质"];
	    $c='未缴费';
		$d=$row["会员标记码"];
	$sql1="INSERT INTO 会员评价(会员单位,会员性质,年份,缴费状态,会员标记码)values('$a','$b','$today4','$c','$d')";
	if($conn->query($sql1) === TRUE){
	echo "保存成功";
	}
	else{
	echo "Error: " . $sql . "<br>" . $conn->error;}}
	$conn->close();	
?>