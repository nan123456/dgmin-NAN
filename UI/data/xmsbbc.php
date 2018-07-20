<?php
	//引入连接数据库文件
	require("../conn.php");
//		$sjc=$_POST["sjc"];
        $xmmc=$_POST["xmmc"];
	    $xmdz=$_POST["xmdz"];
	    $lxr=$_POST["lxr"];
	    $sj=$_POST["sj"];
	    $yx=$_POST["yx"];
	    $sgdw=$_POST["sgdw"];
		$xmlx=$_POST["xmlx"];
		
	    $sqldate='';
//创建会员标记码↓
$old="";
$sqli="select 会员标记码 from 项目申报  order by 会员标记码 DESC limit 1 ";
$result = $conn->query($sqli);
if($result->fetch_assoc()){
	for(;;){
	$result = $conn->query($sqli);
	while($row = $result->fetch_assoc()) {
		$old=$row["会员标记码"];
	}
	$old=explode("h",$old);
	$oldf=intval($old[1]+1);
	$oldf=sprintf("%07d",$oldf);
	$oldf=strval($oldf);
	$new="3h".$oldf;
	$result1 = $conn->query($sqli);
	while($row = $result1->fetch_assoc()) {
		$oldone=$row["会员标记码"];
	}
	if($new==$oldone)
	{continue;}
	else{break;}
 }
}
else{$new="3h0000000";}

//创建会员标记码↑
$Query = "Select count(*) as AllNum from 个人信息  where  账号='".$sj."' "; 
//							echo $Query;
		$a     = mysqli_query( $conn, $Query ); 
		$b     = mysqli_fetch_assoc( $a ); 
//							echo $b['AllNum']; //条数  	

	  if($b['AllNum']){
	  		echo "<script language=javascript>alert('账号已被注册');history.back();</script>";//跳转页面，注意路径
	  }else{
$sql = "INSERT INTO 项目申报(项目名称,项目地址,联系人,手机,邮箱,施工单位,会员标记码,申报类型) values ('$xmmc','$xmdz','$lxr','$sj','$yx','$sgdw','$new','$xmlx')";

//$json = $new;
if ($conn->query($sql) === TRUE) {
    echo $new;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$today = date ( "Ymd", time () );//获取系统当前时间
//在数据库中查询当日是否已经有编号产生，如果有返回最大值的那一条
$old="";

if($xmlx=='市优质奖'){
	$sqli="select Id1  from 市优质奖  order by Id1 DESC limit 1 ";
	$result = $conn->query($sqli);
	while($row = $result->fetch_assoc()) {
		$old=$row["Id1"];
	}
	$old=str_replace('sy','',$old);
}else if($xmlx=='市示范工地'){
	$sqli="select Id1  from 市示范工地  order by Id1 DESC limit 1 ";
	$result = $conn->query($sqli);
	while($row = $result->fetch_assoc()) {
		$old=$row["Id1"];
	}
	$old=str_replace('ss','',$old);
}else if($xmlx=='省优质奖'){
	$sqli="select Id1  from 省优质奖  order by Id1 DESC limit 1 ";
	$result = $conn->query($sqli);
	while($row = $result->fetch_assoc()) {
		$old=$row["Id1"];
	}
	$old=str_replace('sz','',$old);
}else if($xmlx=='省优质结构奖'){
	$sqli="select Id1  from 省优质结构奖  order by Id1 DESC limit 1 ";
	$result = $conn->query($sqli);
	while($row = $result->fetch_assoc()) {
		$old=$row["Id1"];
	}
	$old=str_replace('jg','',$old);
}else if($xmlx=='省优秀qc'){
	$sqli="select Id1  from 省优秀qc  order by Id1 DESC limit 1 ";
	$result = $conn->query($sqli);
	while($row = $result->fetch_assoc()) {
		$old=$row["Id1"];
	}
	$old=str_replace('qc','',$old);
}else if($xmlx=='省绿色施工'){
	$sqli="select Id1  from 省绿色施工  order by Id1 DESC limit 1 ";
	$result = $conn->query($sqli);
	while($row = $result->fetch_assoc()) {
		$old=$row["Id1"];
	}
	$old=str_replace('sl','',$old);
   
	
}
$today1 = mb_substr($old, 0, mb_strlen($old) - 3);
	
	
if($today==$today1){
	
	
    $bianhao=$old+1;
	
} else //否则直接在当日的上一个编号上增加1 
{
	
	 $bianhao= str_pad ( $today, 11, 0, STR_PAD_RIGHT ) + 1;
}	
if($xmlx=='市优质奖'){
	$bh="sy".$bianhao;
}else if($xmlx=='市示范工地'){
	$bh="ss".$bianhao;
}else if($xmlx=='省优质奖'){
	$bh="sz".$bianhao;
}else if($xmlx=='省优质结构奖'){
	$bh="jg".$bianhao;
}else if($xmlx=='省优秀qc'){
	$bh="qc".$bianhao;
}else if($xmlx=='省绿色施工'){
	$bh="sl".$bianhao;
}
	



if($xmlx=='市优质奖'){
	
	$sql = "INSERT INTO 市优质奖(工程名称,项目地址,承建单位,会员标记码,Id1) values ('$xmmc','$xmdz','$sgdw','$new','$bh')";
}else if($xmlx=='市示范工地'){
	$sql = "INSERT INTO 市示范工地(工程名称,项目地址,承建单位,会员标记码,Id1) values ('$xmmc','$xmdz','$sgdw','$new','$bh')";
}else if($xmlx=='省优质奖'){
	$sql = "INSERT INTO 省优质奖(工程名称,项目地址,承建单位,会员标记码,Id1) values ('$xmmc','$xmdz','$sgdw','$new','$bh')";
}else if($xmlx=='省优质结构奖'){
	$sql = "INSERT INTO 省优质结构奖(工程名称,项目地址,承建单位,会员标记码,Id1) values ('$xmmc','$xmdz','$sgdw','$new','$bh')";
}else if($xmlx=='省优秀qc'){
	$sql = "INSERT INTO 省优秀qc(工程名称,项目地址,承建单位,会员标记码,Id1) values ('$xmmc','$xmdz','$sgdw','$new','$bh')";
}else if($xmlx=='省绿色施工'){
	$sql = "INSERT INTO 省绿色施工(工程名称,项目地址,承建单位,会员标记码,Id1) values ('$xmmc','$xmdz','$sgdw','$new','$bh')";
}
else{
	
}
if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();		
?>