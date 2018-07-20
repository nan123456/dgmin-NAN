<?php
require("../conn.php");
$hfid=$_POST["hfid"];
$jfsj=$_POST["jfsj"];
$jfj2=$_POST["jfj2"];
$hyxz=$_POST["hyxz"];
$c="";$b="";$d="";
$jfzt1='已缴费';
//
$today=date("Y",time());
//
if($jfsj!==""){
$a=substr($jfsj, 4,2); 
if($a<"7"){$b="3";}
else if("6"<$a and $a<"13"){$b="0";}

}
else {$b="0";}


$r=substr($hfid,0,1);
//
if($jfsj !==""){
	if($hyxz=="普通会员"){$c="60";}
else if($hyxz=="理事单位"){$c="65";}
else if($hyxz=="常务理事单位"){$c="68";}
else if($hyxz=="副会长单位"){$c="72";}
else if($hyxz=="会长单位"){$c="80";}
$d=$b+$c;	
$sql = "update 会员评价 set 会员性质='$hyxz',缴费时间='$jfsj',缴费金额='$jfj2',缴费状态='$jfzt1',会费缴纳得分='$d' where 会员标记码='$hfid' and 年份='$today' ";
if ($conn->query($sql) === TRUE) {
	if($r=="1"){
		$sql1 = "update 本地会员 set 会员性质='$hyxz' where 会员标记码='$hfid' ";
		if ($conn->query($sql1) === TRUE) {
			echo "保存成功";
	header("refresh:0;url=../hfjn.php");
		}
		else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	}
    else
		{
		$sql1 = "update 外地会员 set 会员性质='$hyxz' where 会员标记码='$hfid' ";
		if ($conn->query($sql1) === TRUE) {
			echo "保存成功";
	header("refresh:0;url=../hfjn.php");
		}
		else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
		
} 
}
}	
else {
	$sql = "update 会员评价 set 会员性质='$hyxz' where 会员标记码='$hfid' and 年份='$today' ";
    if ($conn->query($sql) === TRUE) {
   if($r=="1"){
		$sql1 = "update 本地会员 set 会员性质='$hyxz' where 会员标记码='$hfid' ";
		if ($conn->query($sql1) === TRUE) {
			echo "保存成功";
			echo $hyxz;
	header("refresh:0;url=../hfjn.php");
		}
		else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}
	}
    else
		{
		$sql1 = "update 外地会员 set 会员性质='$hyxz' where 会员标记码='$hfid' ";
		if ($conn->query($sql1) === TRUE) {
			echo "保存成功";
	header("refresh:0;url=../hfjn.php");
		}
		else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}
		
} 
}
}	

$conn->close();	
	
?>
