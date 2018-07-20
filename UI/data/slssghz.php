<?php
	require("../conn.php");  
		$qssj=$_POST["qssj"];
		$jssj=$_POST["jssj"];
		$bjm1=$_POST["bjm1"];
		$cjdw1=$_POST["cjdw1"];
		$yhtag1=$_POST["yhtag1"];
//		echo gcid;
		$sqldate='';
	if($bjm1=='0'){
		 $sql = "select * from 省绿色施工 where 工程状态='已受理' and 审核通过时间  between '$qssj' and '$jssj' ";
	}elseif($bjm=='1'||$bjm=='2'){
		$sql = "select * from 省绿色施工  where 会员标记码='$yhtag1'and 工程状态='已受理' or 承建单位='$cjdw1' and 工程状态='已受理'  ";
   }else{
   	    $sql = "select * from 省绿色施工  where 会员标记码='$yhtag1'and 工程状态='已受理' ";
   }
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"工程名称":"'. $row["工程名称"].'","项目地址":"'.$row["项目地址"].'","申报日期":"'.$row["申报日期"].'","承建单位":"'. $row["承建单位"].'","施工单位联系人":"'. $row["施工单位联系人"].'","施工单位联系人手机":"'. $row["施工单位联系人手机"].'","建造师项目经理":"'. $row["建造师项目经理"].'","监理单位":"'. $row["监理单位"].'","总监":"'. $row["总监"].'","工程规模":"'. $row["工程规模"].'","结构":"'. $row["结构"].'","开工时间":"'. $row["开工时间"].'","竣工时间":"'. $row["竣工时间"].'","备注":"'. $row["备注"].'","上层":"'. $row["上层"].'","下层":"'. $row["下层"].'"},'; 
		}
	} else {
		   
	}
	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'",		
					"count":"'.$count.'"
			}';
				
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();	
	
?>