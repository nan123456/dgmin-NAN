<?php
//	本后台根据$selTag变量进行判断是查看，还是删除，还是增加。
//	以后再增加字段不用另写一个文件，只需要在$selTag=1的情况里开始编写就好。
//	如你们所见，$id是拿来判断哪个字段需要被修改。
//	如果以后增加了新的字段，只需要添加相应的case语句，然后再cx.php页面写好相应的id就好。

//然后在响应的填写页面内，只要在开头取出相应的数据，进行分割，就能显示多个选择了。
	
	require("../conn.php");
//	$selTag="2";
	$selTag=$_POST['selTag'];
	if($selTag==1){
		$id=$_POST['id1'];//取相应的字段
		$data="";
		$sqldate="";
		$sql="select * from 修改字段内容表 where id='1'";
		$result=$conn->query($sql);
		switch($id)
		{
			case "jglx":
			 while($row=$result->fetch_assoc()){
			 		$data_one=$row['结构类型'];
					}
				$data=explode("||",$data_one);
				for($i=0;$i<count($data);$i++){
			$sqldate= $sqldate.'{"数据":"'. $data[$i].'"},';
					}
			$jsonresult = 'success';
			$otherdate = '{"result":"'.$jsonresult.'"
				}';
			$ziduan = ',{"字段名":"结构类型"}';
			$json = '['.$sqldate.$otherdate.$ziduan.']';
			echo $json;
			
				
				
			break;
			case 2:
			break;
			default:
		}
	}
	elseif($selTag==2){
		$data="";
		$name_value="";
		$name_Tname="";
		$sqldate="";
		$name_value=$_POST['name_value'];//要删除的内容
		$name_Tname=$_POST['name_Tname'];//字段名
		$sql="select ".$name_Tname." from 修改字段内容表 where id='1' ";
		$result=$conn->query($sql);
		while($row=$result->fetch_assoc()){$data_two=$row[$name_Tname];}
		$data=explode("||",$data_two);
		$key="";
		$key = array_search($name_value, $data);
		if($key !== false)
    	array_splice($data,$key,1);
 		$data=implode("||",$data);
 		$sqli = "update 修改字段内容表 set ".$name_Tname."='".$data."' ";
 		$result=$conn->query($sqli);
 		
// 		不echo$json就会输出erro,未知错误
 		$data=explode("||",$data);
				for($i=0;$i<count($data);$i++){
			$sqldate= $sqldate.'{"数据":"'. $data[$i].'"},';
					}
			$jsonresult = 'success';
			$otherdate = '{"result":"'.$jsonresult.'"
				}';
			$ziduan = ',{"字段名":"结构类型"}';
			$json = '['.$sqldate.$otherdate.$ziduan.']';
			echo $json;
 		
	}
	elseif($selTag==3){
		$data="";
		$sqldate="";
		$name_value="";
		$name_Tname="";
		$name_value=$_POST['name_value'];//要增加的内容
		$name_Tname=$_POST['name_Tname'];//字段名
		$sql="select ".$name_Tname." from 修改字段内容表 where id='1' ";
		$result=$conn->query($sql);
		while($row=$result->fetch_assoc()){$data_two=$row[$name_Tname];}
		$data=$data_two."||".$name_value;
		$sqli = "update 修改字段内容表 set ".$name_Tname."='".$data."' ";
 		$result=$conn->query($sqli);
 		
 		// 		不echo$json就会输出erro,未知错误
 		$data=explode("||",$data);
				for($i=0;$i<count($data);$i++){
			$sqldate= $sqldate.'{"数据":"'. $data[$i].'"},';
					}
			$jsonresult = 'success';
			$otherdate = '{"result":"'.$jsonresult.'"
				}';
			$ziduan = ',{"字段名":"结构类型"}';
			$json = '['.$sqldate.$otherdate.$ziduan.']';
			echo $json;
	}
	else{}
	$conn->close();	
	
?>