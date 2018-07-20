<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
  </head>
<body>
<?php
	require("conn.php");
	$username=$_POST['username'];
 	$password=$_POST['password'];
	if ($username && $password){
		$Query = "Select count(*) as AllNum from 个人信息  where  账号='".$username."' and 密码='".$password."'"; 
///							echo $Query;
		$a     = mysqli_query( $conn, $Query ); 
		$b     = mysqli_fetch_assoc( $a ); 
	  if($b['AllNum']){
	  	$sql = "select * from 个人信息  where 账号='".$username."'";
	  	$result = $conn->query($sql);
	   						while($row = $result->fetch_assoc()) {
              $yhtag=$row['会员标记码'];
	   						}
     session_start();
     $_SESSION["yhtag"]=$yhtag;
	   header("refresh:0;url=xmgl.php");//跳转页面，注意路径
	   
	   exit;
	 }
	  else{
	  	echo "<script language=javascript>alert('用户名密码错误');history.back();</script>";
	  }
	 
	}else {
	 echo "<script language=javascript>alert('用户名密码不能为空');history.back();</script>";
	}
?>
  </body>
</html>