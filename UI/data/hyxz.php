<?php
require("../conn.php");
$hfid=$_POST["hfid"];
$xmsl=$_POST["xmsl"];
$today=date("Y",time());


if($xmsl<6){$a=$xmsl;}
else if($xmsl<11){$a=5+3;}
else if($xmsl>10){
	$b=floor(($xmsl-10)/5);
	$a=8+$b*2;}

$sql="update 会员评价 set 用工实名制项目数='$xmsl',用工实名制管理='$a'  where 会员标记码='$hfid' and 年份='$today'";
if ($conn->query($sql) === TRUE) {
echo "保存成功";
	header("refresh:0;url=../xwzl.php");
		}
		else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();	
?>