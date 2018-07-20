<?php
header("Content-Type: text/html;charset=utf-8");
  if($_POST['txtframe']!="")
  {
  $fileName=$_POST['txtframe'];;
  $info=GetTxtString($fileName);
  
  print_r($info);
  }
  function GetTxtString($fileName)
  {
  print_r("ddd");
  $fp=fopen($fileName,'r');
  $recordstr="";
  while(!feof($fp))
  {
     $buffer=fgets($fp);
	 $recordstr=$recordstr.$buffer;
  }
  fclose($fp);
  print_r( $recordstr);
  return $recordstr;
  }
?>
<html>
<head>
<title>测试</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<form action="textFile.php" method="post" enctype="multipart/form-data">
<input name="txtframe" id="txtframe" type="text" size="50" maxlength="3000" value="C:\Users\zhongry\Desktop\hhh.txt">(同帧用','隔开；不同帧用';';隔开
<input type="submit" name="Submit" value="提交">
</form>
</body>
</html>