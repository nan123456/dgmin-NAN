<?php
	require("../conn.php");
	$today = date ( "Ymd", time () );
		$gcid=$_POST["gcid"];  
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
	    $xgsyzjgsj=$_POST["xgsyzjgsj"];
	    $xglssgsj=$_POST["xglssgsj"];
	    $xgssgdsj=$_POST["xgssgdsj"];
//
	
	$sql="select * from 省优质奖  where id='$gcid'";
	$result=$conn->query($sql);	
	if($result->num_rows > 0){
		$sqli = "update 省优质奖  set 工程名称='$xggcmc',项目地址='$xggcdz',申报日期='$today',承建单位='$xgcjdw',承建联系人='$xgcjlxr',承建联系人电话='$xgcjlxrdh',参建单位='$xgcjdw1',参建联系人姓名='$xgcjlxr1',参建联系人电话='$xgcjlxrdh1',监理单位='$xgjldw',项目总监姓名='$xgzjxm',监理联系人姓名='$xgjllxr',监理联系人电话='$xgjllxrdh',面积='$xgmj',规模='$xggm',结构='$xgjg',上层='$xgsc',下层='$xgxc',竣工验收='$xgjgg',备案时间='$xgys',备注='$xgbeizhu' ,建造师姓名='$xgjzsxm',获省建设工程优质结构奖时间='$xgsyzjgsj',获省建筑业绿色施工示范工程时间='$xglssgsj',获省安全文明示范工地时间='$xgssgdsj' where id ='$gcid' ";
		
		if($conn->query($sqli)){
			$jsonresult = "success";
		}else{
			$jsonresult = "error";
		}	
	}else{
		$jsonresult='1';				
	}
	if ($conn->query($sql) === TRUE) {
    echo "修改成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	
?>

	