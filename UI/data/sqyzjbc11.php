<?php
	require("../conn.php");
	$today = date ( "Ymd", time () );
		$gcid1=$_POST["gcid1"];  
        $xggcmc=$_POST["xggcmc"];
	    $xggcdz=$_POST["xggcdz"];
	    $xgsbrq=$_POST["xgsbrq"];
	    $xgcjdw=$_POST["xgcjdw"];
	    $xgcjlxr=$_POST["xgcjlxr"];
	    $xgcjlxrdh=$_POST["xgcjlxrdh"];
	    $xgjzsxm=$_POST["xgjzsxm"];    
	    $xgcjdw1=$_POST["xgcjdw1"];
	    $xgcjlxr1=$_POST["xgcjlxr1"] ;
	    $xgcjlxrdh1=$_POST["xgcjlxrdh1"];
	    $xgjldw=$_POST["xgjldw"];
	    $xgzjxm=$_POST["xgzjxm"];
	    $xglxrdh1=$_POST["xglxrdh1"]; 
	    $xgjldw=$_POST["xgjldw"]; 
	    $xgzjxm=$_POST["xgzjxm"];
	    $xgjllxr=$_POST["xgjllxr"];
	  	$xgjllxrdh=$_POST["xgjllxrdh"];
	    $xgmj=$_POST["xgmj"];
		$xggm=$_POST["xggm"];
	    $xgjg=$_POST["xgjg"];
	    $xgsc=$_POST["xgsc"];
		$xgxc=$_POST["xgxc"];
	    $xgjgg=$_POST["xgjgg"];
		$xgys=$_POST["xgys"];
	    $xgbeizhu=$_POST["xgbeizhu"];
	    $upload_filedDir=$_POST["picture3"];
$upload_filedDir1=$_POST["picture4"];
$upload_filedDir2=$_POST["picture5"];
//
	
	$sql="select * from 市优质奖  where id='$gcid1'";
	$result=$conn->query($sql);	
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			$a=$row["验收报告"].$upload_filedDir;
			$b=$row["监督报告"].$upload_filedDir1;
			$c=$row["备案证"].$upload_filedDir2;
		$sqli = "update 市优质奖  set 工程名称='$xggcmc',项目地址='$xggcdz',申报日期='$today',承建单位='$xgcjdw',承建联系人='$xgcjlxr',承建联系人电话='$xgcjlxrdh',参建单位='$xgcjdw1',参建联系人姓名='$xgcjlxr1',参建联系人电话='$xgcjlxrdh1',监理单位='$xgjldw',项目总监姓名='$xgzjxm',监理联系人姓名='$xgjllxr',监理联系人电话='$xgjllxrdh',面积='$xgmj',规模='$xggm',结构='$xgjg',上层='$xgsc',下层='$xgxc',竣工验收='$xgjgg',备案时间='$xgys',备注='$xgbeizhu',建造师姓名='$xgjzsxm',验收报告='$a',监督报告='$b',备案证='$c'where id ='$gcid1' ";
		
		
	if ($conn->query($sqli) === TRUE) {
    echo "修改成功";
		header("refresh:0;url=../sqyzj1.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	header("refresh:0;url=../sqyzj1.php");
}
	}}
?>



	