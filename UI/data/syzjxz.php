<?php
	//引入连接数据库文件
	require("../conn.php");
	$today = date ( "Ymd", time () );//获取系统当前时间
//在数据库中查询当日是否已经有编号产生，如果有返回最大值的那一条
	$sqli="select Id1  from 省优质奖  order by Id1 DESC limit 1 ";
	$result = $conn->query($sqli);
	while($row = $result->fetch_assoc()) {
		$old=$row["Id1"];
	}
	$old=str_replace('sz','',$old);
	$today1 = mb_substr($old, 0, mb_strlen($old) - 3);
	
	
if($today==$today1){
	
	
    $bianhao=$old+1;
	
} else //否则直接在当日的上一个编号上增加1 
{
	
	 $bianhao= str_pad ( $today, 11, 0, STR_PAD_RIGHT ) + 1;
}	

     $bh="sz".$bianhao;
//		$sjc=$_POST["sjc"];
		$hybjm=$_POST["hybjm"];
		$gcfl=$_POST["gcfl"];  
		$gczt=$_POST["gczt"];
        $gcmc=$_POST["gcmc"];
	    $gcdz=$_POST["gcdz"];
	    $sbrq=$_POST["sbrq"];
	    $cjdw=$_POST["cjdw"];
	    $cjlxr=$_POST["cjlxr"];    
	    $cjlxrdh=$_POST["cjlxrdh"];
	    $jzsxm=$_POST["jzsxm"] ;
	    $cjdw1=$_POST["cjdw1"];
	    $cjlxr1=$_POST["cjlxr1"];
	    $cjlxrdh1=$_POST["cjlxrdh1"]; 
	    $jldw=$_POST["jldw"]; 
	    $zjxm=$_POST["zjxm"];
	    $jllxr=$_POST["jllxr"];
	    $jllxrdh=$_POST["jllxrdh"];
	    $mj=$_POST["mj"];
		$gm=$_POST["gm"];
	    $jg=$_POST["jg"];
	    $sc=$_POST["sc"];
	    $xc=$_POST["xc"];
	    $jgg=$_POST["jgg"];
		$ys=$_POST["ys"];
	    $beizhu=$_POST["beizhu"];
	    $syzjgsj =$_POST["syzjgsj"];
	    $lssgsj=$_POST["lssgsj"];
	    $ssgdsj=$_POST["ssgdsj"];
		
		if($gcmc=="" or $gcdz=="" or $cjdw=="" or $cjlxr=="" or $cjlxrdh=="" or $jzsxm=="" or $cjdw1=="" or $cjlxr1=="" or $cjlxrdh1=="" or $jldw=="" or $zjxm=="" or $jllxrdh=="" or $jllxr=="" or $mj=="" or $gm=="" or $sc=="" or $xc=="" or $jgg=="" or $ys=="" or $beizhu=="" or $syzjgsj=="" or $lssgsj=="" or $ssgdsj==""){
			echo "<script>alert('请填写必填信息');</script>" ;
	    	header("refresh:2;url=../syzj.php");
		}else{
//  		$time=getdate();
//			$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
//			$sjc=$timestr;
			$sql = "INSERT INTO 省优质奖(会员标记码,工程分类,工程状态,工程名称,项目地址,申报日期,承建单位,承建联系人,承建联系人电话,建造师姓名,参建单位,参建联系人姓名,参建联系人电话,监理单位,项目总监姓名,监理联系人姓名,监理联系人电话,面积,规模,结构,上层,下层,竣工验收,备案时间,备注,Id1,获省建设工程优质结构奖时间,获省建筑业绿色施工示范工程时间,获省安全文明示范工地时间) values ('$hybjm','$gcfl','$gczt','$gcmc','$gcdz','$today','$cjdw','$cjlxr','$cjlxrdh','$jzsxm','$cjdw1','$cjlxr1','$cjlxrdh1','$jldw','$zjxm','$jllxr','$jllxrdh','$mj','$gm','$jg','$sc','$xc','$jgg','$ys','$beizhu','$bh','$syzjgsj','$lssgsj','$ssgdsj')";
//			$sql = "select * from 工程组维护  where id='$cddid'";
//			$result = $conn->query($sql);
//			$sqli = "update 工程组维护 set 工程组='$gcz',组长姓名='$xm',手机='$sj' where id ='$gcid1'";
			if ($conn->query($sql) === TRUE) {
    			echo "保存成功";
			} else {
    			echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
$conn->close();		
?>
<!--<script type="text/javascript">
  window.history.go(-1);
</script>-->