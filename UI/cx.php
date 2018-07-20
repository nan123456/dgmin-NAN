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
		<title>
			东莞市建筑业协会创优项目申报系统
		</title>
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
			<div class="row-fluid" id="ImgBackground">
				<input type="text" id="sbm" name="sbm" value="<?php echo $bjm ?>" class="hidden">
			</div>
			<!------->
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span3" id="sidebar">
						<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
							<li>
								<a href="sqyzj1.php"><i class="icon-chevron-right"></i> 项目管理</a>
								<ul class="">
									<li>
										<a href="sqyzj1.php">市优质奖</a>
									</li>
									<li>
										<a href="ssfgd1.php">市示范工地</a>
									</li>
									<li>
										<a href="syzj1.php">省优质奖</a>
									</li>
									<li>
										<a href="syzjgj1.php">省优质结构奖</a>
									</li>
									<li>
										<a href="syzqc1.php">省优秀QC</a>
									</li>
									<li>
										<a href="slssg1.php">省绿色施工</a>
									</li>
								</ul>
							</li>
							<li class="myclass9">
								<a href="gctz.php"><i class="icon-chevron-right"></i> 工程台账</a>

							</li>
							<li class="myclass0">
								<a href="hyrh.php"><i class="icon-chevron-right"></i>会员入会</a>
							</li>
							<!--<li >
                        	
	                            <a href="hyfw.php"><i class="icon-chevron-right"></i> 会员服务</a>
	                            <ul class="">
	                            	<li><a href="hfjn.php">会费缴纳</a></li>
	                            	<li><a href="xwzl.php">行为自律</a></li>
	                            	<li><a href="cygm.php">创优观摩</a></li>
	                            	<li><a href="cyjz.php">创优讲座</a></li>
	                            	<li><a href="xxjl.php">学习交流</a></li>
	                            	<li><a href="qt.php">其他</a></li>
	                            	<li><a href="zgbm.php">主管部门行政处罚</a></li>
	                            	<li><a href="bz.php">备注</a></li>
	                            	<li><a href="bbdy.php">报表打印</a></li>
	                            </ul>
	                            
                            </li>-->
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
							<li class=" active  myclass1">
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
					<div class="span9" id="content">
						<div class="block" id="Tcontent">
							<div class="row-fluid">
								<ul class="nav navbar-inner block-header  nav-tabs">
									<li>
										<i class="icon-chevron-left hide-sidebar" style="display: inline-block;">
										<a href="#" title="Hide Sidebar" rel="tooltip">
											&nbsp;
										</a>
									</i>
										<i class="icon-chevron-right show-sidebar" style="display: none;">
										<a href="#" title="Show Sidebar" rel="tooltip">
											&nbsp;
										</a>
									</i>
									</li>
									<li class="active">
										<a data-toggle="tab" href="#home">查询</a>
									</li>
									<li>
										<a data-toggle="tab" href="#menu1">字段内容修改</a>
									</li>
									<li>
										<a data-toggle="tab" href="#menu2">查询账号密码</a>
									</li>
								</ul>
								<div class="tab-content ">
									<!--内容区↓-->
									<!--标签页一-->
									<div id="home" class="tab-pane fade in active">
										<div class="block ">
											<div class="navbar navbar-inner block-header ">
											</div>
											<div class="block-content collapse in">
												<div align="center">
													<form id="cxmmform" name="cxmmform" action="cxmm.php" method="post" role="form" class="span12 control-label">
														<label for="zh" class=" span12 control-label">账号：</label>
														<div class="col-md-4">
															<input type="text" class="form-control" id="zh" name="zh" placeholder="">
														</div>
														<p>
														</p>
														<label for="mima" class=" span11 control-label">密码：</label>
														<div class="col-md-4">
															<input type="text" class="form-control" id="mima" name="mima" placeholder="">
														</div>
													</form>
												</div>

												<div class="modal-footer">
													<div align="center">
														<button id="save" type="button" class="btn btn-primary">
														查询
													</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!--标签页二-->
									<div id="menu1" class="tab-pane fade ">
										<div class="block ">
											<div class="navbar navbar-inner block-header ">
											</div>
											<div class="block-content collapse in">
												<div class="modal-footer">

													<div class="span12">
														<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="">
															<thead>
																<tr>
																	<th>字段名称</th>
																	<th>操作</th>
																	
																</tr>
															</thead>
															<tbody>
																
																	<tr class="odd gradeX">
																		<td class="center">
																			结构类型
																		</td>
																		<td class="center">
																			<button id="jglx" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1" onclick="caozuo(this.id)">操作</button>
																		</td>
																	</tr>
																
															</tbody>
														</table>
													</div>

												</div>
											</div>
										</div>
										
										<!--模态框1-->
					
						<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  						 &times;
	                  					</button>
										<h4 class="modal-title" id="myModalLabel">查看</h4>
									</div>
										<div class="modal-body">
											<table class="table table-bordered">
							<thead>
								<tr>
								<th>部门</th>
								<th>操作</th>
								</tr>
							</thead>
							<tbody id="zd">
									
								
								
							</tbody>
						</table>
										
											
										
											

										</div>
										<div class="modal-footer">
											<input type="text" name="add" id="add"  />
											<button type="button" class="btn btn-primary"  onclick="add()" >增加</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
										</div>
									
								</div>
							</div>
						
						</div>
									</div>
									<div id="menu2" class="tab-pane fade">
										<div class="block ">
											<div class="navbar navbar-inner block-header ">
											</div>
											<div class="block-content collapse in">
												<div align="center">
													<form id="cxmmform" name="cxmmform" action="cxmm.php" method="post" role="form" class="span12 control-label">
														<label for="dwmc" class=" span12 control-label">会员单位名称：</label>
														<div class="col-md-4">
															<input type="text" class="form-control" id="dwmc" name="dwmc" placeholder="">
														</div>
														<label for="zh1" class=" span11 control-label">账号：</label>
														<div class="col-md-4">
															<input type="text" class="form-control" id="zh1" name="zh1" placeholder="">
														</div>
														
														<label for="mima1" class=" span11 control-label">密码：</label>
														<div class="col-md-4">
															<input type="text" class="form-control" id="mima1" name="mima1" placeholder="">
														</div>
													</form>
												</div>

												<div class="modal-footer">
													<div align="center">
														<button id="save1" type="button" class="btn btn-primary">
														查询
													</button>
													</div>
												</div>
											</div>
										</div>
									</div>

									<!--内容区↑-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer>
				<p>
					&copy; Vincent Gabriel 2013
				</p>
			</footer>
			</div>
			<!--/.fluid-container-->
			<script src="vendors/jquery-1.9.1.min.js"></script>
			<script src="bootstrap/js/bootstrap.min.js"></script>
			<script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
			<script src="assets/scripts.js"></script>
			<script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
			<script src="assets/DT_bootstrap.js"></script>
			<script type="text/javascript">
				$("#save").click(function() {
					var zh = document.getElementById("zh");
					var mima = document.getElementById("mima");
					$.ajax({
						cache: true,
						type: "POST",
						url: "data/cxmm.php",
						dataType:'json',
						data: {
							zh: zh.value,
						},
						async: false,
						success: function(data) {
							mima.value = data[0].count;
						},
						error: function(request) {
							alert('账号错误');
						},
					});
				});
				$("#save1").click(function() {
					var dwmc = document.getElementById("dwmc");
					var mima1 = document.getElementById("mima1");
					var zh1 = document.getElementById("zh1");
				
					$.ajax({
						cache: true,
						type: "POST",
						url: "data/cx1.php",
						dataType:'json',
						data: {
							dwmc: dwmc.value
						},
						async: false,
						success: function(data) {
//							alert(data);
							mima1.value = data[0].密码;
							zh1.value = data[0].账号;
						},
						
						error: function(jqXHR, textStatus, errorMsg){
							   alert( "error:" + errorMsg );
				
						},
					});
				});
			</script>
			<script>
				$(function() {
					// Easy pie charts
					$('.chart').easyPieChart({
						animate: 1000
					});
				});
			</script>
			<script>
				var sbm = document.getElementById("sbm");
				var myclass9 = document.getElementsByClassName("myclass9");
				var myclass0 = document.getElementsByClassName("myclass0");

				if(sbm.value == '0') {
					myclass9[0].setAttribute("class", "hidden");

				} else {
					myclass0[0].setAttribute("class", "hidden");

				}
			</script>
		<script type="text/javascript">
		
			function caozuo(id){
				
				var selTag=1;
				$.ajax({
					cache: true,
					type:"POST",
					url:"data/cx_xgzdnr.php",
					data:{
						id1:id,
						selTag:selTag
					},
					dataType:"json",
					async:true,
					success: function(data) {
						var length = data.length;
						$('tbody[id=zd]').html("");
						$('tbody[id=zd]').attr('name',data[length-1].字段名);
   						for (var i=0;i<length-2;i++){
							 var data_text= data[i].数据;
							 $('tbody[id=zd]').append('<tr><td>'+data_text+'</td><td><button  onclick="delte(this.name);" name="'+data_text+'" type="button" class="btn btn-default">删除</button></td>	</tr>');
						};
						
					},
					error:function(request) {
						alert("Connection error");
					}
				});
				
			};
			
			function delte(name_value){
				var zd = document.getElementsByClassName("zd");
				var selTag=2;
				var name_Tname=$('tbody[id=zd]').attr('name');
				$.ajax({
					cache: true,
					type:"POST",
					url:"data/cx_xgzdnr.php",
					data:{
						name_value:name_value,
						selTag:selTag,
						name_Tname:name_Tname
					},
					dataType:"json",
					async:true,
					success: function(data) {
						alert("删除成功");
						var length = data.length;
						$('tbody[id=zd]').html("");
						$('tbody[id=zd]').attr('name',data[length-1].字段名);
   						for (var i=0;i<length-2;i++){
							 var data_text= data[i].数据;
							 $('tbody[id=zd]').append('<tr><td>'+data_text+'</td><td><button  onclick="delte(this.name);" name="'+data_text+'" type="button" class="btn btn-default">删除</button></td>	</tr>');
						};
					},
					error:function(request) {
						alert("Connection error");
					}
				});
				
			};
			
			function add(){
				var selTag=3;
				var name_Tname=$('tbody[id=zd]').attr('name');//字段名
//				var name_value=$('input[id=add]').attr('value');//增加的内容
				var name_value=document.getElementById("add");
				$.ajax({
					cache: true,
					type:"POST",
					url:"data/cx_xgzdnr.php",
					data:{
						name_value:name_value.value,
						selTag:selTag,
						name_Tname:name_Tname
					},
					dataType:"json",
					async:true,
					success: function(data) {
						alert("增加成功");
						var length = data.length;
						$('tbody[id=zd]').html("");
						$('tbody[id=zd]').attr('name',data[length-1].字段名);
   						for (var i=0;i<length-2;i++){
							 var data_text= data[i].数据;
							 $('tbody[id=zd]').append('<tr><td>'+data_text+'</td><td><button  onclick="delte(this.name);" name="'+data_text+'" type="button" class="btn btn-default">删除</button></td>	</tr>');
						};
					},
					error:function(request) {
						alert("Connection error");
					}
				});
				
			};
		</script>
	</body>

	</html>