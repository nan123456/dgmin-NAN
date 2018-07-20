<!DOCTYPE html>
<?php
     session_start();
	      if($_SESSION['yhtag']){
     	$yhtag=$_SESSION['yhtag'];
     }
     else{
     	header("refresh:0;url=login.php");
     }
?>
<html class="no-js">    
    <head>
    	<meta charset="utf-8">
        <title>东莞市建筑业协会创优项目申报系统</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
       
        
    </head>
    
    <body>
    	
    	<?php
    		require("conn.php");
    		$yhtag=$_SESSION["yhtag"];
			$fenge=explode("h","$yhtag");
			$bjm=$fenge[0];
			
			//										消息数目↓
										$tag=explode("h",$yhtag);
					                   switch($tag[0])
					                   {
					                   	case 0:
					                   	$sql = "select * from 消息  where 收信会员标记码='$yhtag' ";
					                   	break;
					                   	case 1:
					                   	$sql = "SELECT c.*FROM `项目申报` a,`本地会员` b,`消息` c WHERE a.`施工单位`=b.`企业名称` AND a.`会员标记码`=c.`收信会员标记码` AND b.`会员标记码`='".$yhtag."'UNION SELECT c.*FROM `本地会员` b,`消息` c WHERE b.`会员标记码`='".$yhtag."' AND b.`会员标记码`=c.`收信会员标记码`";	  
					                   	break;
					                   	case 2:
					                   	$sql =  "SELECT c.*FROM `项目申报` a,`外地会员` b,`消息` c WHERE a.`施工单位`=b.`申请单位名称` AND a.`会员标记码`=c.`收信会员标记码` AND b.`会员标记码`='".$yhtag."'UNION SELECT c.*FROM `外地会员` b,`消息` c WHERE b.`会员标记码`='".$yhtag."' AND b.`会员标记码`=c.`收信会员标记码`"; 
					                   	break;
					                   	case 3:
					                   	$sql = "select * from 消息  where 收信会员标记码='$yhtag' ";
					                   	break;
					                   }
			$result = $conn->query($sql);
			$rec=$result->num_rows;


			$sqli="select * from 消息 where 发信会员标记码='$yhtag'";
			$result = $conn->query($sqli);
			$sent=$result->num_rows;
    		?>
    	<!--headbackground-->
        <div class="row-fluid" id="ImgBackground" >
        	<input type="text" id="sbm" name="sbm" value="<?php echo $bjm ?>" class="hidden" >
        </div>
		<!------->
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li class="active ">
                            <a href="sqyzj1.php"><i class="icon-chevron-right"></i> 项目管理</a>
                            <ul class="">
                            	<li><a href="sqyzj1.php">市优质奖</a></li>
                            	<li><a href="ssfgd1.php">市示范工地</a></li>
                            	<li><a href="syzj1.php">省优质奖</a></li>
                            	<li><a href="syzjgj1.php">省优质结构奖</a></li>
                            	<li><a href="syzqc1.php">省优秀QC</a></li>
                            	<li><a href="slssg1.php">省绿色施工</a></li>
                            </ul>
                        </li>
                        <li class="myclass9">
                            <a href="gctz.php"><i class="icon-chevron-right"></i> 工程台账</a>
                           
                        </li>
                        <li>
                            <a href="hyrh.php"><i class="icon-chevron-right"></i>会员入会</a>
                        </li>
                       <li >
                        	
	                            <a href="hyfw.php"><i class="icon-chevron-right"></i> 会员服务</a>
	                            <ul class="">
	                            	<li  class="myclass11"><a href="hfjn.php">会费缴纳</a></li>
	                            	<li  class="myclass12"><a href="xwzl.php">用工实名制管理</a></li>
	                            	<li  class="myclass13"><a href="cygm.php">活动</a></li>
	                            	<li class="myclass10"><a href="cygm1.php">活动报名</a></li>
	                            	<li class="myclass8"><a href="ckpj.php">查看评价</a></li>
	                            	<li  class="myclass14"><a href="qt.php">其他</a></li>
	                            	<li  class="myclass15"><a href="zgbm.php">主管部门行政处罚</a></li>
	                            	<li  class="myclass16"><a href="bz.php">备注</a></li>
	                            	<li  class="myclass17"><a href="bbdy.php">报表打印</a></li>
	                            </ul>
	                            
                            </li>
                        <li>
                            <a href="xx.php"><i class="icon-chevron-right"></i>消息</a>
                            <ul>
                            	<li>发送消息</li>
                            	<li>消息列表<span class="badge badge-info pull-right"><?php echo $rec; ?></span></li>
								<li>已发消息<span class="badge badge-success pull-right"><?php echo $sent; ?></span></li>
                            </ul>
                        </li>
                        <li>
                            <a href="sz.php"> 设置</a>
                            
                        </li>
                            <li class="myclass1">
                            <a href="cx.php">管理员功能</a>
                        	</li>
                        <li>
                            <a href="czsc.php">操作手册</a>
                            
                        </li>
                        <li>
                            <a href="login.php"> 退出</a>
                        </li>
                    </ul>
                </div>
                <!--/span-->

        <!--/.fluid-container-->
        <script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="assets/scripts.js"></script>       
        <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/DT_bootstrap.js"></script>
        <script>
        	var sbm=document.getElementById("sbm");
        	var myclass1=document.getElementsByClassName("myclass1");
        	var myclass8=document.getElementsByClassName("myclass8");
        	var myclass9=document.getElementsByClassName("myclass9");
        	var myclass10=document.getElementsByClassName("myclass10");
        	var myclass11=document.getElementsByClassName("myclass11");
        	var myclass12=document.getElementsByClassName("myclass12");
        	var myclass13=document.getElementsByClassName("myclass13");
        	var myclass14=document.getElementsByClassName("myclass14");
        	var myclass15=document.getElementsByClassName("myclass15");
        	var myclass16=document.getElementsByClassName("myclass16");
        	var myclass17=document.getElementsByClassName("myclass17");
        	
        	if(sbm.value !='0'){
			myclass1[0].setAttribute("class","hidden");
        	myclass11[0].setAttribute("class","hidden");
        	myclass12[0].setAttribute("class","hidden");
        	myclass13[0].setAttribute("class","hidden");
        	myclass14[0].setAttribute("class","hidden");
        	myclass15[0].setAttribute("class","hidden");
        	myclass16[0].setAttribute("class","hidden");	
        	myclass17[0].setAttribute("class","hidden");
        	}else{
        		myclass9[0].setAttribute("class","hidden");
        		myclass10[0].setAttribute("class","hidden");
        		myclass8[0].setAttribute("class","hidden");
        	}
        </script>
        
        
    </body>

</html>