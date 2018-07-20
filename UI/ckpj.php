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
                        <li class="myclass9">
                            <a href="gctz.php"><i class="icon-chevron-right"></i> 工程台账</a>
                           
                        </li>
                        
                       
                        
                        <li>	
	                            <a href="hyfw.php"><i class="icon-chevron-right"></i> 会员服务</a>
	                            <ul class="">
	                            <li><a href="cygm1.php">活动报名</a></li>
	                            <li  style="text-decoration:underline"><a href="ckpj.php">查看评价</a></li>
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
						      <div class="navbar navbar-inner block-header " >
	                                <div class="btn-group">	
	                                	</div>
	                            </div>
						      	<div class="block-content collapse in " >
                                	<div class="span12">
                                		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered   " id="bmhd" >
											<thead>
												<tr>
													<th>序号</th>
													<th>会员	名称</th>
													<th>年份</th>
													<th>评分信息</th>
													
												</tr>
											</thead>
											
											<tbody id="" class="">
												
											<?php
											require("conn.php");
					                   $yhtag=$_SESSION["yhtag"];
					                     $sql = "select * from 会员评价  where 会员标记码='$yhtag'" ;
										   $result = $conn->query($sql);
									   $i=1;
									    while($row = $result->fetch_assoc()) {
									    	?>
					                   	 															 
										   
										     <tr class="even gradeC " id="">
											<td><?php echo $i++;?></td> 
											<td><?php echo $row["会员单位"]?></td> 
											<td><?php echo $row["年份"]?></td>
											<td class="center">
														<button type="button" id="<?php echo $row["id"];?>"   class="btn btn-primary myclass3" data-toggle="modal" data-target="#myModal3" onclick="ck(this.id);">查看
</button>
													</td>
													 </tr>
														  <?php 
                                                }     
											     
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
                            <!--模态框2-->
						<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  	 &times;
	                  </button>
										<h4 class="modal-title" id="myModalLabel">评分信息查看</h4>
									</div>
									<form id="gmhd1" name="gmhd1" action="data/gmhd1.php" method="post" role="form" enctype="multipart/form-data">		
									<div class="modal-body">
										<div class="form-group">
												
												<div class="span6">
													<label for="hfjn" class="span4 control-label">会费缴纳</label>
													<input type="text" class="span8 form-control" id="hfjn" name="hfjn" placeholder="">
												</div>
												
												<div class="span6">
													<label for="ygsm" class="span4 control-label">用工实名制管理</label>
													<input type="text" class="span8 form-control" id="ygsm" name="ygsm" placeholder="">
												</div>
											</div>	
											<div class="form-group">
												
												<div class="span6">
													<label for="cygm" class="span4 control-label">创优观摩活动</label>
													<input type="text" class="span8 form-control" id="cygm" name="cygm" placeholder="">
												</div>

												<div class="span6">
												<label for="cyjz" class="span4 control-label">创优讲座活动</label>
													
													<input type="text" class="span8 form-control" id="cyjz" name="cyjz" placeholder="">
												</div>
											</div>	
											<div class="form-group">

												<div class="span6">
												<label for="xxjl" class="span4 control-label">学习交流活动</label>
													
													<input type="text" class="span8 form-control" id="xxjl" name="xxjl" placeholder="">
												</div>

												<div class="span6">
												<label for="qt" class="span4 control-label">其他活动</label>
													
													<input type="text" class="span8 form-control" id="qt" name="qt" placeholder="">
												</div>
											</div>
											<div class="span12">
												</div>
											<div class="form-group">

												<div class="span6">
												<label for="xzcf" class="span4 control-label">行政处罚</label>
													
													<input type="text" class="span8 form-control" id="xzcf" name="xzcf" placeholder="">
												</div>

												<div class="span6">
												<label for="bz" class="span4 control-label">备注</label>
													
													<input type="text" class="span8 form-control" id="bz" name="bz" placeholder="">
												</div>
											</div>
											<div class="form-group">
												
												<div class="span12">
													<label for="zhpj" class="span2 control-label">综合评价结果</label>
													<input type="text" class="span10 form-control" id="zhpj" name="zhpj" placeholder="">
												</div>
												</div>
												<input type="type" class="span12 form-control hidden" id="gcid" name="gcid"value="gcid">
													<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">确认</button>
											
										</div>
									</form>
									</div>
							</div>
						</div>	
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
        	var hfjn=document.getElementById("hfjn");
        	var ygsm=document.getElementById("ygsm");
        	var cygm=document.getElementById("cygm");
        	var cyjz=document.getElementById("cyjz");
        	var xxjl=document.getElementById("xxjl");
        	var qt=document.getElementById("qt");
        	var xzcf=document.getElementById("xzcf");
        	var bz=document.getElementById("bz");
        	var zhpj=document.getElementById("zhpj");
        	
        	$.ajax({
					type:"POST",
					url:"data/ckpj.php",
					data:{
						gcid:id
					},
					dataType : "json",
					timeout: 10000,
   					success : function(data){
						var length = data.length;			
   						for (var i=0;i<length-1;i++) {
   							hfjn.value = data[i].会费缴纳得分;
							ygsm.value = data[i].用工实名制管理;
							xzcf.value = data[i].主管部门的行政处罚;
							cygm.value = data[i].创优观摩得分;
							cyjz.value = data[i].创优讲座得分;
							xxjl.value = data[i].学习交流得分;
							qt.value = data[i].其他活动得分;
							bz.value = data[i].备注;
							zhpj.value = data[i].综合评价结果;
				}
//						 						alert(gcmc.value); 
					},
					error: function(e) {
						alert("ajax数据请求失败，请重新加载！");
					}
				});
			};
        </script>
         </body> 
      </html>	
											
											