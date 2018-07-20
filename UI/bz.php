<!DOCTYPE html>
<?php
session_start();
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
					                   	$sql =  "SELECT c.*FROM `项目申报` a,`外地会员` b,`消息` c WHERE a.`施工单位`=b.`企业名称` AND a.`会员标记码`=c.`收信会员标记码` AND b.`会员标记码`='".$yhtag."'UNION SELECT c.*FROM `外地会员` b,`消息` c WHERE b.`会员标记码`='".$yhtag."' AND b.`会员标记码`=c.`收信会员标记码`"; 
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
        	<input type="text" class="span12 form-control hidden" id="sbm" name="sbm" value="<?php echo $bjm?>" />
        	
        </div>
		<!------->
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li >
                        	
	                            <a href="xmgl.php"><i class="icon-chevron-right"></i> 项目管理</a>
	                            <ul class="">
	                            	<li><a href="sqyzj1.php">市优质奖</a></li>
	                            	<li><a href="ssfgd1.php">市示范工地</a></li>
	                            	<li><a href="syzj1.php">省优质奖</a></li>
	                            	<li><a href="syzjgj1.php">省优质结构奖</a></li>
	                            	<li><a href="syzqc1.php">省优秀QC</a></li>
	                            	<li><a href="slssg1.php">省绿色施工</a></li>
	                            </ul>
	                            
                            </li>
                       
                        
                        <li class="myclass0">
                            <a href="hyrh.php"><i class="icon-chevron-right"></i>会员入会</a>
                        </li>
                        <li class="myclass0">
                        	
	                            <a href="hyfw.php"><i class="icon-chevron-right"></i> 会员服务</a>
	                            <ul class="">
	                            	<li><a href="hfjn.php">会费缴纳</a></li>
	                            	<li><a href="xwzl.php">用工实名制管理</a></li>
	                            	<li><a href="cygm.php">活动</a></li>
	                            	<li><a href="qt.php">其他</a></li>
	                            	<li><a href="zgbm.php">主管部门行政处罚</a></li>
	                            	<li style="text-decoration:underline"><a href="bz.php">备注</a></li>
	                            	<li><a href="bbdy.php">报表打印</a></li>
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
                        <li class="myclass0">
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
                <div class="span9" id="content">
                    <div class="block" id="Tcontent">
					  	<div class="row-fluid">
					  		
						  <div class="tab-content ">
						    <div id="home" class="tab-pane fade in active">
						      <div class="block ">
                <div class="block-content collapse in " >
                                	<div class="span12">
                                		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example" >
											<thead>
												<tr>
													<th>序号</th>
													<th>会员名称</th>
													
													<th>备注</th>
													
													<th>操作</th>
													
														</tr>
											</thead>
											
											<tbody id="" class="">
												
											<?php
											require("conn.php");
//					                   $yhtag=$_SESSION["yhtag"];
                                       $today=date ( "Y", time () );
					                     $sql = "select 会员单位,会员标记码,id,备注 from 会员评价 where 年份='$today'" ;
										
					                   $result = $conn->query($sql);
									   $i=1;
					                   while($row = $result->fetch_assoc()) {  
					                         					
					                    ?>
					                   	 															 
										    
										     <tr class="even gradeC " id="">
											<td><?php echo $i++;?></td>
													<!--<td><input type="checkbox"></td>-->
													<td><?php echo $row["会员单位"]?></td>
													
													<td class="center">
														<?php echo $row["备注"]?>							
							                           </div>
							</td>
													
													<td class="center">
														<button type="button" id="<?php echo $row["会员标记码"];?>"   class="btn btn-primary"  data-toggle="modal" data-target="#myModal2" onclick="ck(this.id)">填写</button>
														</td>
														
														</tr>
														 
										 <?php  }
                                                
											$conn->close();
												?>
											
												
											</tbody>
											</table>
										</div>
										</div>
										</div>
										</div>
										</div>
										</div>
										</div>
										<!--模态框1-->
						<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  	 &times;
	                  </button>
										<h4 class="modal-title" id="myModalLabel">填写</h4>
									</div>
									<form id="bdhyform" name="bdhyform" action=" " method="post" enctype="multipart/form-data"  role="form">
										<div class="modal-body">
											<div class="form-group">
										<div class="span12">
											           <label for="bzxx" class="span4">备注</label>
											           <input type="text" class="span10 form-control" id="bzxx" name="bzxx" placeholder="">
											           	</div>
											           	</div>
											           	  <input type="type" class="hidden" id="hfid" name="hfid" value="hfid">                     	
							                           <div class="modal-footer">
											
											<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
											<button type="button" class="btn btn-primary" onclick="bc()">保存</button>
										</div>
									</form>
								</div>
										</div>
										</div>
										</div>
										<div class="span12">
										<footer>
                <p>&copy; Vincent Gabriel 2013</p>
            </footer>
            </div>
            <!--/.fluid-container-->
        <script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="assets/scripts.js"></script>       
        <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/DT_bootstrap.js"></script>
        
        <script>
        $(function() {
            // Easy pie charts
            
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
         <script type="text/javascript">
       
		function ck(id){
			
			 var hfid=document.getElementById("hfid");
		    hfid.value=id; 
		   }
        	
        	function bc(){
        		var bzxx=document.getElementById("bzxx").value;
        	    
        	
        	
                  
        	      $.ajax({
					cache: true,
					type: "POST",
					url:'data/bzfs.php',
					data:{
						hfid:hfid.value,
						bzxx:bzxx,
						
					  },
					async: false,
					error: function(request) {
						alert("Connection error");
					},
					success: function(data) {
						alert("保存成功");
						window.location.reload();
					}
					})
					}
		</script>
		<script type="text/javascript">
       
        	
        	
        	
        	
        	function bc1(id){
        		var bzxx1=document.getElementById("bzxx1").value;
        	    var bzdf1=document.getElementById("bzdf1").value;
        	
        	
                
        	      $.ajax({
					cache: true,
					type: "POST",
					url:'data/bzfs1.php',
					data:{
						hfid1:id,
						bzxx1:bzxx1,
						bzdf1:bzdf1,
						},
					async: false,
					error: function(request) {
						alert("Connection error");
					},
					success: function(data) {
						alert(data);
						window.location.reload();
					}
					})
					}
		</script>
        </body> 
      </html>	
										                
										                
										         

